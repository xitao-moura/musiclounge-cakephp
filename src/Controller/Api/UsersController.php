<?php
	namespace App\Controller\Api;

	use Cake\Event\Event;
	use Cake\Network\Exception\UnauthorizedException;
	use Cake\Utility\Security;
	use Firebase\JWT\JWT;

	use Cake\Mailer\Email;
	use Cake\ORM\TableRegistry;
	use Cake\Routing\Router;

	class UsersController extends AppController
	{
	    public function initialize()
	    {
	        parent::initialize();
	        $this->Auth->allow(['add', 'token', 'recuperarSenha', 'loginNovaSenha']);
	    }

	    public function mail($to, $subject, $message){
	        $this->autoRender = false;
	        $email = new Email('default');
	        $email
	            ->setTransport('zoho')
	            ->setFrom(['noreply@musiclounge.com.br' => 'noreply@musiclounge.com.br'])
	            ->setTo($to)
	            ->setSubject($subject)
	             ->setEmailFormat('html')
	            ->send($message);
	    }

	    public function add()
		{
			$this->Crud->on('beforeSave', function(\Cake\Event\Event $event) {
		        $this->log("Found item: " . $event->getSubject()->entity->email . " in the database");
		        $event->getSubject()->entity->username = $event->getSubject()->entity->email;
		    });

		    return $this->Crud->execute();

		    $this->Crud->on('afterSave', function(Event $event) {
		        if ($event->subject->created) {
		            $this->set('data', [
		                'id' => $event->subject->entity->id,
		                'token' => JWT::encode(
		                    [
		                        'sub' => $event->subject->entity->id,
		                        'exp' =>  time() + 604800
		                    ],
		                Security::salt())
		            ]);
		            $this->Crud->action()->config('serialize.data', 'data');
		        }
		    });
		    return $this->Crud->execute();
		}

		public function token()
		{
		    $user = $this->Auth->identify();
		    if (!$user) {
		        throw new UnauthorizedException('Invalid username or password');
		    }

		    $this->set([
		        'success' => true,
		        'data' => [
		            'token' => JWT::encode([
		                'sub' => $user['id'],
		                'exp' =>  time() + 604800
		            ],
		            Security::salt())
		        ],
		        '_serialize' => ['success', 'data']
		    ]);
		}

		public function recuperarSenha(){
	        if ($this->request->is('post')) {

	            $user = $this->Users->find('all')
	            ->where(['email' => $this->request->getData('email')])
	            ->first();

	            if(!empty($user)){
	                $usersTable = TableRegistry::getTableLocator()->get('Users');
	                $user = $usersTable->get($user->id);

	                $user->hash = md5(date('YmdHis') . $user->hash);
	                
	                if($usersTable->save($user)){
	                    $this->mail($user->email, 'MusicLounge - Esqueci minha senha', 'Clique no link para resetar sua senha. ' . Router::url(['controller' => 'users', 'action' => 'loginNovaSenha', $user->hash], true));
	                    echo json_encode([
	                    	'success' => true,
	                    	'data' => [
	                    		'message' => 'Lhe enviamos um email com as instruções para alterar a senha.'
	                    	]
	                    ]);
	                    exit();
	                }
	            }else{
	                echo json_encode([
	                    	'success' => false,
	                    	'data' => [
	                    		'message' => 'E-mail não encontrado.'
	                    	]
	                    ]);
	                exit();
	            }
	        }
	    }

	    public function loginNovaSenha($token = null){
	    	$this->autoRender = false;
	        $userTable = TableRegistry::getTableLocator()->get('Users');
	        $user = $userTable->find('all')
	        ->where(['hash' => $token])
	        ->first();

	        if(empty($user)){
	            echo json_encode([
                    	'success' => false,
                    	'data' => [
                    		'message' => 'Token inválido, por favor tente novamente.'
                    	]
                    ]);
                    exit();
	        }

	        if ($this->request->is('post')) {
	            $user = $this->Users->get($user->id);
	            $user = $this->Users->patchEntity($user, $this->request->getData());
	            $user->hash = '';
	            if ($this->Users->save($user)) {
	                $this->mail($user->email, 'MusicLounge - Alteração de senha', 'Senha alterada com sucesso.');
	                echo json_encode([
                    	'success' => true,
                    	'data' => [
                    		'message' => 'Senha alterada com sucesso.'
                    	]
                    ]);
                    exit();
	            }else{
	                echo json_encode([
	                    	'success' => false,
	                    	'data' => [
	                    		'message' => 'Não foi possível alterar a senha. Por favor, tente novamente.'
	                    	]
	                    ]);
	                exit();
	            }
	        }
	    }
	}