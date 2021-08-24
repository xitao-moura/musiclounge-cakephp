<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Mailer\Email;

/**
 * Instrumentos Controller
 *
 * @property \App\Model\Table\InstrumentosTable $Instrumentos
 *
 * @method \App\Model\Entity\Instrumento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InstrumentosController extends AppController
{

    public function initialize(){
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->Auth->allow(['pesquisa', 'view']);
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

    public function setHistorico($instrumento_id, $data){
        $historicosTable = TableRegistry::getTableLocator()->get('Historicos');
        $historico = $historicosTable->newEntity();

        $historico->user_id = $this->Auth->user('id');
        $historico->instrumento_id = $instrumento_id;
        $historico->data = $data;
        $historicosTable->save($historico);
    }

    public function setRoubado($id = null)
    {
        $this->autoRender = false;
        $instrumento = $this->Instrumentos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $instrumento = $this->Instrumentos->patchEntity($instrumento, $this->request->getData());
            //debug($instrumento);
            $instrumento->status_id = 4;
            //debug($instrumento);
            if ($this->Instrumentos->save($instrumento)) {
                //debug($instrumento);
                //exit();
                $this->Flash->success(__('Informe no campo "Detalhes Roubo", a baixo mais informações como, data, hora, local e etc do roubo/furto!'));

                $this->setHistorico($instrumento->id, 'Instrumento Roubado');

                return $this->redirect(['action' => 'edit', $id]);
            }
            $this->Flash->error(__('The instrumento could not be saved. Please, try again.'));
        }
    }

    public function setEncontrado($id = null)
    {
        $this->autoRender = false;
        $instrumento = $this->Instrumentos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $instrumento = $this->Instrumentos->patchEntity($instrumento, $this->request->getData());
            $instrumento->status_id = 1;
            if ($this->Instrumentos->save($instrumento)) {
                $this->Flash->success(__('O Status do seu instrumento foi alterado com sucesso.'));

                $this->setHistorico($instrumento->id, 'Instrumento Encontrado');

                return $this->redirect(['action' => 'edit', $id]);
            }
            $this->Flash->error(__('The instrumento could not be saved. Please, try again.'));
        }
    }

    public function setTransferencia()
    {
        $this->autoRender = false;

        $validaAcesso = $this->Instrumentos->find('all')
        ->where(['Instrumentos.user_id' => $this->Auth->user('id'), 'Instrumentos.id' => $this->request->getData('instrumento_id')]);

        if(empty($validaAcesso)){
            $this->Flash->error(__('Você não tem transferir este instrumento.'));
            return $this->redirect(['action' => 'edit']);
        }

        $instrumento = $this->Instrumentos->get($this->request->getData('instrumento_id'), [
            'contain' => ['Users'],
        ]);

        $this->loadModel('Users');
        $user = $this->Users->find('all')
        ->where(['Users.email' => $this->request->getData('email')])
        ->first();

        if($user){
            $user_id = $user->id;
            //$this->setHistorico($instrumento->id, 'Instrumento vinculado ao usuário, ' . $user->nome);
        }else{
            $user = $this->Users->newEntity();
            $user = $this->Users->patchEntity($user, [
                'nome' => $this->request->getData('nome'),
                'username' => $this->request->getData('username'),
                'status_id' => 1,
                'avatar' => 'usr_avatar.png',
                'tipo_id' => 1,
                'hash' => md5(date('YmdHis') . $this->request->getData('username'))
            ]);
            //$this->setHistorico($instrumento->id, 'Instrumento vinculado ao usuário, ' . $user->nome);
            
            if($this->Users->save($user)){
                $user_id = $user->id;
            }
        }

        //debug($user);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $instrumento = $this->Instrumentos->patchEntity($instrumento, $this->request->getData());
            $instrumento->user_id = $user->id;
            if ($this->Instrumentos->save($instrumento)) {
                $this->Flash->success(__('A propriedade do instrumento foi trânsferida com sucesso.'));

                $this->setHistorico($instrumento->id, 'Instrumento Transferida propriedade para, <strong>' . $user->nome . '</strong>');

                return $this->redirect(['action' => 'index']);
            }
            //debug($instrumento->getErrors());
            return $this->redirect(['action' => 'edit', $instrumento->id]);
            $this->Flash->error(__('Não foi possível transferir a propriedade. Por favor tente novamente.'));
        }
    }

    public function pesquisa(){
        $this->set('title', 'MusicLounge - Instrumentos resultado de : ' . $this->request->getQuery('search'));

        $this->paginate = [
            'contain' => ['Categorias', 'Origens', 'Status', 'Users', 'Imagens'],
        ];

        $conditions = [
            'Instrumentos.status_id IN' => [4]
        ];

        if(!empty($this->request->getQuery('search'))){
            $conditions['OR'] = [
                ['Instrumentos.descricao LIKE' => '%'.$this->request->getQuery('search').'%'],
                ['Instrumentos.caracteristicas LIKE' => '%'.$this->request->getQuery('search').'%'],
                ['Instrumentos.numero_serie LIKE' => '%'.$this->request->getQuery('search').'%'],
                ['Instrumentos.marca LIKE' => '%'.$this->request->getQuery('search').'%'],
                ['Instrumentos.modelo LIKE' => '%'.$this->request->getQuery('search').'%'],
                ['Categorias.nome LIKE' => '%'.$this->request->getQuery('search').'%'],
                ['Origens.nome LIKE' => '%'.$this->request->getQuery('search').'%']
            ];
        }

        $query = $this->Instrumentos->find('all')
        ->where($conditions);

        $instrumentos = $this->paginate($query);

        $this->set(compact('instrumentos'));
        $this->set('_serialize', 'instrumentos');
    }

    // public function upload($instrumento_id = null){
    //     $ext = explode('/', $this->request->getData('avatar.type'));
    //     //debug($this->request->getData());
    //     $novoNome = md5(date('YmdHis')) . '.' . $ext[1];
    //     $diretorio = WWW_ROOT . '/assets/images/instrumentos/';
    //     $destino = $diretorio . '/' . $novoNome;
    //     $arquivo_tmp = $this->request->data['avatar']['tmp_name'];

    //     if(move_uploaded_file($arquivo_tmp, $destino)){
    //         $imagemTable = TableRegistry::getTableLocator()->get('Imagens');
    //         $imagem = $imagemTable->newEntity();
    //         $imagem->imagem = $novoNome;
    //         $imagem->instrumento_id = $instrumento_id;
    //         if ($imagemTable->save($imagem)) {
    //             echo $imagem->imagem;
    //             exit();
    //         }else{
    //             echo 'error';
    //             exit();
    //         }
    //     }
    // }

    public function upload_2($instrumento_id = null) {

        $this->autoRender = false;
        $preview = $config = $errors = [];
        $targetDir = WWW_ROOT . '/assets/images/instrumentos';
        if (!file_exists($targetDir)) {
            @mkdir($targetDir);
        }
        // debug($this->request->getData('kartik-input-700'));
        // exit();
        $fileBlob = 'kartik-input-700';                      // the parameter name that stores the file blob
        if ($this->request->getData('kartik-input-700')) {
            $token = $this->request->getData('uploadToken');          // gets the upload token
            // if (!validateToken($token)) {            // your access validation routine (not included)
            //     echo json_encode([
            //         'error' => 'Access not allowed'  // return access control error
            //     ]);
            // }
            $file = $this->request->getData('kartik-input-700')[0]['tmp_name'];  // the path for the uploaded file chunk 
            $fileName = $this->request->getData('kartik-input-700')[0]['name'];          // you receive the file name as a separate post data
            $fileSize = $this->request->getData('kartik-input-700')[0]['size'];          // you receive the file size as a separate post data
            $fileId = $this->request->getData('fileId');              // you receive the file identifier as a separate post data
            //$index =  $_POST['chunkIndex'];          // the current file chunk index
            //$totalChunks = $_POST['chunkCount'];     // the total number of chunks for this file

            $ext = explode('/', $this->request->getData('kartik-input-700')[0]['type']);
            $novoNome = md5(date('YmdHis')) . '.' . $ext[1];

            $targetFile = $targetDir.'/'.$novoNome;  // your target file path
            // if ($totalChunks > 1) {                  // create chunk files only if chunks are greater than 1
            //     $targetFile .= '_' . str_pad($index, 4, '0', STR_PAD_LEFT); 
            // } 
            $thumbnail = 'unknown.jpg';

            if(move_uploaded_file($file, $targetFile)) {
                // get list of all chunks uploaded so far to server
                $chunks = glob("{$targetDir}/{$fileName}_*"); 
                // check uploaded chunks so far (do not combine files if only one chunk received)
                //$allChunksUploaded = $totalChunks > 1 && count($chunks) == $totalChunks;
                // if ($allChunksUploaded) {           // all chunks were uploaded
                //     $outFile = $targetDir.'/'.$fileName;
                //     // combines all file chunks to one file
                //     combineChunks($chunks, $outFile);
                // } 
                // if you wish to generate a thumbnail image for the file
                //$targetUrl = $this->getThumbnailUrl($path, $fileName);
                // separate link for the full blown image file
                $zoomUrl = WWW_ROOT . '/assets/images/instrumentos/' . $fileName;

                $imagemTable = TableRegistry::getTableLocator()->get('Imagens');
                $imagem = $imagemTable->newEntity();
                $imagem->imagem = $novoNome;
                $imagem->instrumento_id = $instrumento_id;
                $imagem->status_id = 1;
                $imagemTable->save($imagem);

                echo json_encode([
                    //'chunkIndex' => $index,         // the chunk index processed
                    //'initialPreview' => $targetUrl, // the thumbnail preview data (e.g. image)
                    'initialPreviewConfig' => [
                        [
                            'type' => 'image',      // check previewTypes (set it to 'other' if you want no content preview)
                            'caption' => $fileName, // caption
                            'key' => $fileId,       // keys for deleting/reorganizing preview
                            'fileId' => $fileId,    // file identifier
                            'size' => $fileSize,    // file size
                            'zoomData' => $zoomUrl, // separate larger zoom data
                        ]
                    ],
                    'append' => true
                ]);
                exit();
            } else {
                echo json_encode([
                    'error' => 'Error uploading chunk ' . $_POST['chunkIndex']
                ]);
                exit();
            }
        }
        echo json_encode([
            'error' => 'No file found'
        ]);
        exit();
    }
     
    // combine all chunks
    // no exception handling included here - you may wish to incorporate that
    public function combineChunks($chunks, $targetFile) {
        // open target file handle
        $handle = fopen($targetFile, 'a+');
        
        foreach ($chunks as $file) {
            fwrite($handle, file_get_contents($file));
        }
        
        // you may need to do some checks to see if file 
        // is matching the original (e.g. by comparing file size)
        
        // after all are done delete the chunks
        foreach ($chunks as $file) {
            @unlink($file);
        }
        
        // close the file handle
        fclose($handle);
    }
     
    // generate and fetch thumbnail for the file
    public function getThumbnailUrl($path, $fileName) {
        // assuming this is an image file or video file
        // generate a compressed smaller version of the file
        // here and return the status
        $sourceFile = $path . '/' . $fileName;
        $targetFile = $path . '/thumbs/' . $fileName;
        //
        // generateThumbnail: method to generate thumbnail (not included)
        // using $sourceFile and $targetFile
        //
        if ($this->generateThumbnail($sourceFile, $targetFile) === true) { 
            return '/assets/images/instrumentos/thumbs/' . $fileName;
        } else {
            return '/assets/images/instrumentos/' . $fileName; // return the original file
        }
    }

    public function upload($instrumento_id = null) {
        $preview = $config = $errors = [];
        $input = 'kartik-input-700'; // the input name for the fileinput plugin

        if (empty($_FILES[$input])) {
            return [];
        }

        $total = count($_FILES[$input]['name']); // multiple files
        $path = WWW_ROOT . 'assets/images/instrumentos/'; // your upload path

        for ($i = 0; $i < $total; $i++) {
            $tmpFilePath = $_FILES[$input]['tmp_name'][$i]; // the temp file path
            //$fileName = $novoNome; // the file name
            $fileName = $_FILES[$input]['name'][$i]; // the file name
            $fileSize = $_FILES[$input]['size'][$i]; // the file size

            // debug();
            // exit();
            
            //Make sure we have a file path
            if ($tmpFilePath != ""){
                //Setup our new file path
                $newFilePath = $path . $fileName;
                $newFileUrl = 'https://musiclounge.com.br/assets/images/instrumentos/' . $fileName;
                
                //Upload the file into the new path
                if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                    $fileId = $fileName . $i; // some unique key to identify the file
                    $preview[] = $newFileUrl;
                    $config[] = [
                        'key' => $fileId,
                        'caption' => $fileName,
                        'size' => $fileSize,
                        'downloadUrl' => $newFileUrl, // the url to download the file
                        'url' => '', // server api to delete the file based on key
                    ];

                    $imagemTable = TableRegistry::getTableLocator()->get('Imagens');
                    $imagem = $imagemTable->newEntity();
                    $imagem->imagem = $fileName;
                    $imagem->instrumento_id = $instrumento_id;
                    $imagem->status_id = 1;
                    $imagemTable->save($imagem);

                } else {
                    $errors[] = $fileName;
                    debug('error 1');
                    debug($fileName);
                }
            } else {
                $errors[] = $fileName;
                debug('error 2');
                debug($fileName);
            }
        }
        $out = ['initialPreview' => $preview, 'initialPreviewConfig' => $config, 'initialPreviewAsData' => true];
        if (!empty($errors)) {
            $img = count($errors) === 1 ? 'file "' . $error[0]  . '" ' : 'files: "' . implode('", "', $errors) . '" ';
            $out['error'] = 'Oh snap! We could not upload the ' . $img . 'now. Please try again later.';
        }
        //return $out;
        echo json_encode($out);
        exit();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->set('title', 'MusicLounge - Meus Instrumentos (DNA`s)');

        $this->paginate = [
            'contain' => ['Categorias', 'Origens', 'Status', 'Users', 'Imagens'],
        ];

        $conditions['Instrumentos.status_id IN'] = [1,4];

        if($this->Auth->user('tipo_id') != 2){

            if(empty($this->Auth->user('marca_id'))){
                $conditions['Instrumentos.user_id'] = $this->Auth->user('id');
            }

            if(!empty($this->Auth->user('marca_id'))){
                $conditions['Instrumentos.marca_id'] = $this->Auth->user('marca_id');
            }
        }

        $query = $this->Instrumentos->find('all')
        ->where($conditions);

        $instrumentos = $this->paginate($query);

        $this->set(compact('instrumentos'));
        $this->set('_serialize', 'instrumentos');
    }

    /**
     * View method
     *
     * @param string|null $id Instrumento id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $instrumento = $this->Instrumentos->get($id, [
            'contain' => ['Categorias', 'Origens', 'Status', 'Users', 'Historicos' => ['sort' => ['Historicos.created' => 'DESC']], 'Imagens'],
        ]);

        $this->set('title', 'MusicLounge -Instrumentos (DNA) | ' .$instrumento->descricao );

        $this->set('instrumento', $instrumento);
        $this->set('_serialize', 'instrumento');
    }

    public function add()
    {
        $this->autoRender = false;
        $instrumento = $this->Instrumentos->newEntity();
        //if ($this->request->is('post')) {
            $instrumento = $this->Instrumentos->patchEntity($instrumento, $this->request->getData());
            //$instrumento->marca_id = 2;
            //$instrumento->modelo_id = 3;
            $instrumento->categoria_id = 2;
            $instrumento->origem_id = 2;
            $instrumento->status_id = 5;
            $instrumento->user_id = $this->Auth->user('id');
            if ($this->Instrumentos->save($instrumento)) {
                //$this->Flash->success(__('The instrumento has been saved.'));

                $this->setHistorico($instrumento->id, 'Instrumento cadastrado');

                return $this->redirect(['action' => 'edit', $instrumento->id]);
            }
            //debug($instrumento->getErrors());
            $this->Flash->error(__('O instrumento não pôde ser salvo. Por favor, tente novamente.'));
        //}
        //$this->set(compact('instrumento'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add_()
    {
        $instrumento = $this->Instrumentos->newEntity();
        if ($this->request->is('post')) {
            $instrumento = $this->Instrumentos->patchEntity($instrumento, $this->request->getData());
            if ($this->Instrumentos->save($instrumento)) {
                $this->Flash->success(__('O instrumento foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O instrumento não pôde ser salvo. Por favor, tente novamente.'));
        }
        //$marcas = $this->Instrumentos->Marcas->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        ////$modelos = $this->Instrumentos->Modelos->find('list', ['keyField' => 'id', 'valueField' => 'descricao']);
        $categorias = $this->Instrumentos->Categorias->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $origens = $this->Instrumentos->Origens->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $status = $this->Instrumentos->Status->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $users = $this->Instrumentos->Users->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $this->set(compact('instrumento', 'categorias', 'origens', 'status', 'users'));
        $this->set('_serialize', 'instrumento');
    }

    /**
     * Edit method
     *
     * @param string|null $id Instrumento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $validaAcesso = $this->Instrumentos->find('all')
        ->where(['Instrumentos.user_id' => $this->Auth->user('id'), 'Instrumentos.id' => $id]);

        if(empty($validaAcesso)){
            $this->Flash->error(__('Você não tem acesso a este instrumento.'));
            return $this->redirect(['action' => 'index']);
        }

        $instrumento = $this->Instrumentos->get($id, [
            'contain' => ['Categorias', 'Origens', 'Status', 'Users', 'Historicos', 'Imagens'],
        ]);


        if($instrumento->status_id == 5){
            $this->set('title', 'MusicLounge - Novo Instrumento (DNA)');
        }else{
            $this->set('title', 'MusicLounge - Editar Instrumento (DNA) | ' . $instrumento->descricao);
        }


        if ($this->request->is(['patch', 'post', 'put'])) {
            $instrumento = $this->Instrumentos->patchEntity($instrumento, $this->request->getData());

            if(!empty($this->Auth->user('marca_id'))){
                if($instrumento->status_id == 5){
                    //verifica se usuario existe na plataforma
                    $this->loadModel('Users');
                    $user = $this->Users->find('all')
                    ->where(['Users.username' => $this->request->getData('username')])
                    ->first();

                    if($user){
                        $instrumento->user_id = $user->id;
                        $this->setHistorico($instrumento->id, 'Instrumento vinculado ao usuário, ' . $user->nome);
                    }else{
                        $user = $this->Users->newEntity();
                        $user = $this->Users->patchEntity($user, [
                            'nome' => $this->request->getData('nome'),
                            'username' => $this->request->getData('username'),
                            'status_id' => 1,
                            'avatar' => 'usr_avatar.png',
                            'tipo_id' => 1,
                            'hash' => md5(date('YmdHis') . $this->request->getData('username'))
                        ]);
                        $this->setHistorico($instrumento->id, 'Instrumento vinculado ao usuário, ' . $user->nome);
                        
                        if($this->Users->save($user)){
                            $instrumento->user_id = $user->id;
                        }
                    }
                }
            }

            if($instrumento->status_id == 5){
                $instrumento->status_id = 1;
            }
            
            if ($this->Instrumentos->save($instrumento)) {
                $this->Flash->success(__('O instrumento foi salvo.'));
                if(!empty($this->Auth->user('marca_id'))){
                    if(empty($user->password)){
                        $this->mail($user->username, 'MusicLounge - Cadastro e vinculo de instrumento', 'Um novo instrumento foi vinculado ao você no <strong>MusicLounge</strong>, por <strong>' . $this->Auth->user('nome') . '</strong>. Clique no link para gerar sua senha. ' . Router::url(['controller' => 'users', 'action' => 'loginNovaSenha', $user->hash], true) . ', e ter acesso a ele.');
                    }else{
                        $this->mail($user->username, 'MusicLounge - Instrumento vinculado', 'Olá <strong>'.$user->nome.'</strong>,<br>Novo instrumento vinculado a sua conta, por <strong>' . $this->Auth->user('nome') . '</strong>.');
                    }
                }

                $this->setHistorico($instrumento->id, 'Instrumento editado');

                return $this->redirect(['action' => 'index']);
            }else{
                $instrumento->status_id = 5;
            }
            $this->Flash->error(__('O instrumento não pôde ser salvo. Por favor, tente novamente.'));
        }
        //$marcas = $this->Instrumentos->Marcas->find('list', ['keyField' => 'id', 'valueField' => 'nome'])->where(['Marcas.id <>' => 2])->order(['Marcas.nome' => 'ASC']);
        //$modelos = $this->Instrumentos->Modelos->find('list', ['keyField' => 'id', 'valueField' => 'descricao'])->where(['Modelos.id <>' => 3]);
        $categorias = $this->Instrumentos->Categorias->find('list', ['keyField' => 'id', 'valueField' => 'nome'])->where(['Categorias.id <>' => 2])->order(['Categorias.nome' => 'ASC']);
        $origens = $this->Instrumentos->Origens->find('list', ['keyField' => 'id', 'valueField' => 'nome'])->where(['Origens.id <>' => 2])->order(['Origens.nome' => 'ASC']);
        $status = $this->Instrumentos->Status->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $users = $this->Instrumentos->Users->find('list', ['keyField' => 'id', 'valueField' => 'nome']);
        $this->set(compact('instrumento', 'categorias', 'origens', 'status', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Instrumento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $instrumento = $this->Instrumentos->get($id);
        if ($this->Instrumentos->delete($instrumento)) {
            $this->Flash->success(__('O instrumento foi deletado.'));
        } else {
            $this->Flash->error(__('O instrumento não pôde ser deletado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
