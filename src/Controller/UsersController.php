<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize(){
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->Auth->allow(['add', 'recuperarSenha', 'loginNovaSenha', 'mail']);
    }

    public function login(){
        $this->set('title', 'MusicLounge - Login');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Usuário ou senha incorretos'));
        }
    }

    public function logout(){
        $this->Auth->logout();
        return $this->redirect($this->Auth->logout());
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

    public function recuperarSenha(){
        $this->set('title', 'MusicLounge - Esqueceu a senha');
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
                    $this->Flash->success(__('Lhe enviamos um email com as instruções para alterar a senha.'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                }
            }else{
                $this->Flash->error(__('E-mail não encontrado.'));
            }
        }
    }

    public function loginNovaSenha($token = null){
        $this->set('title', 'MusicLounge - Recuperar senha');

        $userTable = TableRegistry::getTableLocator()->get('Users');
        $user = $userTable->find('all')
        ->where(['hash' => $token])
        ->first();

        if(empty($user)){
            $this->Flash->error(__('Token inválido, por favor tente novamente.'));
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        if ($this->request->is('post')) {
            $user = $this->Users->get($user->id);
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->hash = '';
            if ($this->Users->save($user)) {
                $this->mail($user->email, 'MusicLounge - Alteração de senha', 'Senha alterada com sucesso.');
                $this->Auth->setUser($user);
                $this->Flash->success(__('Senha alterada com sucesso.'));
                return $this->redirect(['controller' => 'Instrumentos', 'action' => 'index']);
            }else{
                $this->Flash->error(__('Não foi possível alterar a senha. Por favor, tente novamente.'));
            }
        }
    }

    public function perfil(){
        $this->set('title', 'MusicLounge - Meu perfil');
        $id = $this->getRequest()->getSession()->read('Auth.User.id');;
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $user = $this->Users->patchEntity($user, $this->request->getData());

            if(!empty($this->request->getData())){
                $user->password = $this->request->getData('new-password');
            }

            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuário salvo com sucesso.'));

                return $this->redirect(['action' => 'perfil']);
            }
            debug($user->getErrors());
            $this->Flash->error(__('O usuário não pôde ser salvo. Por favor, tente novamente.'));
        }
        $tipos = $this->Users->Tipos->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $status = $this->Users->Status->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $marcas = $this->Users->Marcas->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $cidades = $this->Users->Cidades->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $estados = $this->Users->Estados->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $this->set(compact('user', 'tipos', 'status', 'marcas', 'marcas', 'estados', 'cidades'));
    }

    public function upload(){
        $ext = explode('/', $this->request->getData('avatar.type'));
        //debug($this->request->getData());
        $novoNome = md5(date('YmdHis')) . '.' . $ext[1];
        $diretorio = WWW_ROOT . '/assets/images/users/';
        $destino = $diretorio . '/' . $novoNome;
        $arquivo_tmp = $this->request->getData('avatar.tmp_name');

        if(move_uploaded_file($arquivo_tmp, $destino)){
            $userTable = TableRegistry::getTableLocator()->get('Users');
            $user = $userTable->get($this->Auth->user('id'));
            $user->avatar = $novoNome;
            if ($userTable->save($user)) {
                echo $user->avatar;
                exit();
            }else{
                echo 'error';
                exit();
            }
        }
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        if($this->Auth->user('tipo_id') != 2){
            $this->Flash->error(__('Você não tem acesso a esta área.'));
            return $this->redirect(['controller' => 'Pages', 'action' => 'main']);
        }

        $this->paginate = [
            'contain' => ['Tipos', 'Status'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if($this->Auth->user('tipo_id') != 2){
            $this->Flash->error(__('Você não tem acesso a esta área.'));
            return $this->redirect(['controller' => 'Pages', 'action' => 'main']);
        }

        $user = $this->Users->get($id, [
            'contain' => ['Tipos', 'Status', 'Marcas', 'Historicos', 'Logs', 'Materias', 'Cidades', 'Estados'],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->set('title', 'MusicLounge - Cadastro');

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->avatar = 'usr_avatar.png';
            $user->username = $user->email;

            if ($this->Users->save($user)) {
                if($user->tipo_id == 1){
                    $this->Flash->success(__('Usuário salvo com sucesso.'));
                }else if($user->tipo_id == 3){
                    $this->Flash->success(__('Estamos analisando seu cadastro, e logo menos entramos em contato para pegarmos mais informações para o seu cadastro. Enquanto isso navegue e veja o que o Music Lounge tem a lhe oferece. ;)'));
                }
                

                $this->Auth->setUser($user);
                $this->mail($user->email, 'MusicLounge - Cadastro', 'Pronto para aproveitar ao máximo nossa plataforma? =)');

                return $this->redirect(['controller' => 'Instrumentos', 'action' => 'index']);
            }
            $this->Flash->error(__('O usuário não pôde ser salvo. Por favor, tente novamente.'));
        }
        $tipos = $this->Users->Tipos->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $status = $this->Users->Status->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $marcas = $this->Users->Marcas->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $cidades = $this->Users->Cidades->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $estados = $this->Users->Estados->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $this->set(compact('user', 'tipos', 'status', 'marcas', 'marcas', 'estados', 'cidades'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->set('title', 'MusicLounge - Editar perfil');

        $user = $this->Users->get($id, [
            'contain' => ['Tipos', 'Status', 'Marcas', 'Historicos', 'Logs', 'Materias', 'Cidades', 'Estados'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->username = $user->email;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuário salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O usuário não pôde ser salvo. Por favor, tente novamente.'));
        }
        $tipos = $this->Users->Tipos->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $status = $this->Users->Status->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $marcas = $this->Users->Marcas->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $cidades = $this->Users->Cidades->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $estados = $this->Users->Estados->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $this->set(compact('user', 'tipos', 'status', 'marcas', 'estados', 'cidades'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('O usuário foi excluído.'));
        } else {
            $this->Flash->error(__('O usuário não pôde ser excluído. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
