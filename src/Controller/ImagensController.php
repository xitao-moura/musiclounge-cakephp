<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Imagens Controller
 *
 * @property \App\Model\Table\ImagensTable $Imagens
 *
 * @method \App\Model\Entity\Imagem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImagensController extends AppController
{
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
            'contain' => ['Instrumentos', 'Status'],
        ];
        $imagens = $this->paginate($this->Imagens);

        $this->set(compact('imagens'));
    }

    /**
     * View method
     *
     * @param string|null $id Imagem id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if($this->Auth->user('tipo_id') != 2){
            $this->Flash->error(__('Você não tem acesso a esta área.'));
            return $this->redirect(['controller' => 'Pages', 'action' => 'main']);
        }

        $imagem = $this->Imagens->get($id, [
            'contain' => ['Instrumentos', 'Status'],
        ]);

        $this->set('imagem', $imagem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if($this->Auth->user('tipo_id') != 2){
            $this->Flash->error(__('Você não tem acesso a esta área.'));
            return $this->redirect(['controller' => 'Pages', 'action' => 'main']);
        }

        $imagem = $this->Imagens->newEntity();
        if ($this->request->is('post')) {
            $imagem = $this->Imagens->patchEntity($imagem, $this->request->getData());
            if ($this->Imagens->save($imagem)) {
                $this->Flash->success(__('The imagem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The imagem could not be saved. Please, try again.'));
        }
        $instrumentos = $this->Imagens->Instrumentos->find('list', ['limit' => 200]);
        $status = $this->Imagens->Status->find('list', ['limit' => 200]);
        $this->set(compact('imagem', 'instrumentos', 'status'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Imagem id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->Auth->user('tipo_id') != 2){
            $this->Flash->error(__('Você não tem acesso a esta área.'));
            return $this->redirect(['controller' => 'Pages', 'action' => 'main']);
        }

        $imagem = $this->Imagens->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $imagem = $this->Imagens->patchEntity($imagem, $this->request->getData());
            if ($this->Imagens->save($imagem)) {
                $this->Flash->success(__('The imagem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The imagem could not be saved. Please, try again.'));
        }
        $instrumentos = $this->Imagens->Instrumentos->find('list', ['limit' => 200]);
        $status = $this->Imagens->Status->find('list', ['limit' => 200]);
        $this->set(compact('imagem', 'instrumentos', 'status'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Imagem id.
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
        $imagem = $this->Imagens->get($id);
        if ($this->Imagens->delete($imagem)) {
            $this->Flash->success(__('The imagem has been deleted.'));
        } else {
            $this->Flash->error(__('The imagem could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
