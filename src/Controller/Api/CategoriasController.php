<?php
	namespace App\Controller\Api;

	use App\Controller\Api\AppController;

	class CategoriasController extends AppController
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
	        $this->Auth->allow(['index']);
	    }
	}