<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Origens Controller
 *
 * @property \App\Model\Table\OrigensTable $Origens
 *
 * @method \App\Model\Entity\Origem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrigensController extends AppController
{
    public function initialize(){
        parent::initialize();

        if($this->Auth->user('tipo_id') != 2){
            $this->Flash->error(__('Você não tem acesso a esta área.'));
            return $this->redirect(['controller' => 'Pages', 'action' => 'main']);
        }
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Status'],
        ];
        $origens = $this->paginate($this->Origens);

        $this->set(compact('origens'));
    }

    /**
     * View method
     *
     * @param string|null $id Origem id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $origem = $this->Origens->get($id, [
            'contain' => ['Status', 'Instrumentos'],
        ]);

        $this->set('origem', $origem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $origem = $this->Origens->newEntity();
        if ($this->request->is('post')) {
            $origem = $this->Origens->patchEntity($origem, $this->request->getData());
            if ($this->Origens->save($origem)) {
                $this->Flash->success(__('The origem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The origem could not be saved. Please, try again.'));
        }
        $status = $this->Origens->Status->find('list', ['limit' => 200]);
        $this->set(compact('origem', 'status'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Origem id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $origem = $this->Origens->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $origem = $this->Origens->patchEntity($origem, $this->request->getData());
            if ($this->Origens->save($origem)) {
                $this->Flash->success(__('The origem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The origem could not be saved. Please, try again.'));
        }
        $status = $this->Origens->Status->find('list', ['limit' => 200]);
        $this->set(compact('origem', 'status'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Origem id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $origem = $this->Origens->get($id);
        if ($this->Origens->delete($origem)) {
            $this->Flash->success(__('The origem has been deleted.'));
        } else {
            $this->Flash->error(__('The origem could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
