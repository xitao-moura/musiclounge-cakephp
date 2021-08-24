<?php
	namespace App\Controller\Api;

	use App\Controller\Api\AppController;

	class ImagensController extends AppController
	{
		public $paginate = [
	        'page' => 1,
	        'limit' => 5,
	        'maxLimit' => 15,
	        'sortWhitelist' => [
	            'id', 'nome'
	        ]
	    ];

	    public function initialize(){
	        parent::initialize();
	        //$this->Auth->allow(['index','view']);
	    }

	    public function view($id = null)
	    {
	    	$imagem = $this->Imagens->find('all', [
	    		//'contain' => ['Instrumentos', 'Status']
	    	])
	    	->where([
	    		'instrumento_id' => $id
	    	]);

	        echo json_encode([
	        	'success' => true,
	        	'data' => $imagem
	        ]);
	        exit();
	    }
	}