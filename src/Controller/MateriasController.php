<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Materias Controller
 *
 * @property \App\Model\Table\MateriasTable $Materias
 *
 * @method \App\Model\Entity\Materia[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MateriasController extends AppController
{
    public function initialize(){
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->Auth->allow(['index', 'view']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->set('title', 'MusicLounge - Bate Papo ML');

        $this->paginate = [
            'contain' => ['Users', 'Status', 'Tipos'],
        ];

        $conditions = [
            'Materias.status_id' => 1
        ];

        if(!empty($this->request->getQuery('search'))){
            $conditions['OR'] = [['Materias.titulo LIKE' => '%'.$this->request->getQuery('search').'%'],['Materias.conteudo LIKE' => '%'.$this->request->getQuery('search').'%']];
        }

        $query = $this->Materias->find('all')
        ->where($conditions);

        $materias = $this->paginate($query);

        $this->set(compact('materias'));
    }

    /**
     * View method
     *
     * @param string|null $id Materia id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $materia = $this->Materias->get($id, [
            'contain' => ['Users', 'Status', 'Tipos'],
        ]);

        $this->set('title', 'MusicLounge - Bate Papo ML | ' . $materia->titulo);

        $this->set('materia', $materia);
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

        $materia = $this->Materias->newEntity();
        if ($this->request->is('post')) {
            $materia = $this->Materias->patchEntity($materia, $this->request->getData());
            if ($this->Materias->save($materia)) {
                $this->Flash->success(__('The materia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The materia could not be saved. Please, try again.'));
        }
        $users = $this->Materias->Users->find('list', ['limit' => 200]);
        $status = $this->Materias->Status->find('list', ['limit' => 200]);
        $tipos = $this->Materias->Tipos->find('list', ['limit' => 200]);
        $this->set(compact('materia', 'users', 'status', 'tipos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Materia id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->Auth->user('tipo_id') != 2){
            $this->Flash->error(__('Você não tem acesso a esta área.'));
            return $this->redirect(['controller' => 'Pages', 'action' => 'main']);
        }

        $materia = $this->Materias->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $materia = $this->Materias->patchEntity($materia, $this->request->getData());
            if ($this->Materias->save($materia)) {
                $this->Flash->success(__('The materia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The materia could not be saved. Please, try again.'));
        }
        $users = $this->Materias->Users->find('list', ['limit' => 200]);
        $status = $this->Materias->Status->find('list', ['limit' => 200]);
        $tipos = $this->Materias->Tipos->find('list', ['limit' => 200]);
        $this->set(compact('materia', 'users', 'status', 'tipos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Materia id.
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
        $materia = $this->Materias->get($id);
        if ($this->Materias->delete($materia)) {
            $this->Flash->success(__('The materia has been deleted.'));
        } else {
            $this->Flash->error(__('The materia could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
