<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;

/**
 * Contatos Controller
 *
 * @property \App\Model\Table\ContatosTable $Contatos
 *
 * @method \App\Model\Entity\Contato[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContatosController extends AppController
{
    public function initialize(){
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->Auth->allow(['add']);
    }


    public function mail($to, $subject, $message){
        $this->autoRender = false;
        $email = new Email('default');
        $email
            ->setTransport('zohor')
            ->setFrom(['noreply@musiclounge.com.br' => 'noreply@musiclounge.com.br'])
            ->setTo($to)
            ->setSubject($subject)
             ->setEmailFormat('html')
            ->send($message);
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

        $contatos = $this->paginate($this->Contatos);

        $this->set(compact('contatos'));
    }

    /**
     * View method
     *
     * @param string|null $id Contato id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if($this->Auth->user('tipo_id') != 2){
            $this->Flash->error(__('Você não tem acesso a esta área.'));
            return $this->redirect(['controller' => 'Pages', 'action' => 'main']);
        }

        $contato = $this->Contatos->get($id, [
            'contain' => [],
        ]);

        $this->set('contato', $contato);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contato = $this->Contatos->newEntity();
        if ($this->request->is('post')) {
            $contato = $this->Contatos->patchEntity($contato, $this->request->getData());
            if ($this->Contatos->save($contato)) {
                $this->Flash->success(__('Contato enviado com sucesso. Em Breve entraremos em contato.'));

                $this->mail('musiclounge@musiclounge.com.br', 'MusicLounge - Formulario de contato', 'Nome: ' . $this->request->getData('nome') . '<br>Email: ' . $this->request->getData('email') . '<br>Telefone: ' . $this->request->getData('telefone') . '<br>Assunto: ' . $this->request->getData('assunto') . '<br>Mensagem: ' . $this->request->getData('mensagem'));

                return $this->redirect(['controller' => 'Pages', 'action' => 'contato']);
            }
            $this->Flash->error(__('Não foi possível enviar o contato. Por favor, tente novamente.'));
            return $this->redirect(['controller' => 'Pages', 'action' => 'contato']);
        }
        $this->set(compact('contato'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contato id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->Auth->user('tipo_id') != 2){
            $this->Flash->error(__('Você não tem acesso a esta área.'));
            return $this->redirect(['controller' => 'Pages', 'action' => 'main']);
        }

        $contato = $this->Contatos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contato = $this->Contatos->patchEntity($contato, $this->request->getData());
            if ($this->Contatos->save($contato)) {
                $this->Flash->success(__('O contato foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível salvar o contato. Por favor, tente novamente.'));
        }
        $this->set(compact('contato'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contato id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if($this->Auth->user('tipo_id') != 2){
            $this->Flash->error(__('Você não tem acesso a esta área.'));
            return $this->redirect(['controller' => 'Pages', 'action' => 'main']);
        }
        
        $this->request->allowMethod(['post', 'delete']);
        $contato = $this->Contatos->get($id);
        if ($this->Contatos->delete($contato)) {
            $this->Flash->success(__('O contato foi deletado.'));
        } else {
            $this->Flash->error(__('Não foi possível deletar o contato. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
