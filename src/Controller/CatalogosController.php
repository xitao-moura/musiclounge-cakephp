<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Catalogos Controller
 *
 * @property \App\Model\Table\CatalogosTable $Catalogos
 *
 * @method \App\Model\Entity\Catalogo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CatalogosController extends AppController
{
    public function initialize(){
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->Auth->allow(['index', 'view']);
    }

    public function upload(){
        $ext = explode('/', $this->request->getData('avatar.type'));
        //debug($this->request->getData());
        $novoNome = md5(date('YmdHis')) . '.' . $ext[1];
        $diretorio = WWW_ROOT . '/assets/images/catalogos/';
        $destino = $diretorio . '/' . $novoNome;
        $arquivo_tmp = $this->request->getData('avatar.tmp_name');

        if(move_uploaded_file($arquivo_tmp, $destino)){
            $catalogoTable = TableRegistry::getTableLocator()->get('Catalogos');
            $catalogo = $catalogoTable->get($this->Auth->user('id'));
            $catalogo->avatar = $novoNome;
            if ($catalogoTable->save($catalogo)) {
                echo $catalogo->avatar;
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
        $this->set('title', 'MusicLounge - Parceiros');

        $this->paginate = [
            'contain' => ['Users.Cidades', 'Users.Estados', 'Status'],
        ];

        $query = $this->Catalogos->find('all');

        $catalogos = $this->paginate($query);

        $this->set(compact('catalogos'));
    }

    /**
     * View method
     *
     * @param string|null $id Catalogo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $catalogo = $this->Catalogos->get($id, [
            'contain' => ['Users.Cidades', 'Users.Estados', 'Status'],
        ]);

        $this->loadModel('Instrumentos');

        $this->paginate = [
            'contain' => ['Categorias', 'Origens', 'Status', 'Users', 'Imagens'],
        ];

        $query = $this->Instrumentos->find('all')
        ->where(['Instrumentos.status_id IN' => [1, 4], 'Instrumentos.user_id' => $catalogo->user_id]);

        $instrumentos = $this->paginate($query);

        $this->set('title', 'MusicLounge - Catálogo | ' . $catalogo->user->nome);

        $this->set(compact('catalogo', 'instrumentos'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $catalogo = $this->Catalogos->newEntity();
        if ($this->request->is('post')) {
            $catalogo = $this->Catalogos->patchEntity($catalogo, $this->request->getData());
            if ($this->Catalogos->save($catalogo)) {
                $this->Flash->success(__('The catalogo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The catalogo could not be saved. Please, try again.'));
        }
        $users = $this->Catalogos->Users->find('list', ['limit' => 200]);
        $status = $this->Catalogos->Status->find('list', ['limit' => 200]);
        $this->set(compact('catalogo', 'useres', 'status'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Catalogo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $catalogo = $this->Catalogos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $catalogo = $this->Catalogos->patchEntity($catalogo, $this->request->getData());
            if ($this->Catalogos->save($catalogo)) {
                $this->Flash->success(__('The catalogo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The catalogo could not be saved. Please, try again.'));
        }
        $users = $this->Catalogos->Users->find('list', ['limit' => 200]);
        $status = $this->Catalogos->Status->find('list', ['limit' => 200]);
        $this->set(compact('catalogo', 'useres', 'status'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Catalogo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $catalogo = $this->Catalogos->get($id);
        if ($this->Catalogos->delete($catalogo)) {
            $this->Flash->success(__('The catalogo has been deleted.'));
        } else {
            $this->Flash->error(__('The catalogo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
