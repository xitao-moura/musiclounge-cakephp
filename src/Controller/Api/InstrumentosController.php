<?php
	namespace App\Controller\Api;

	use App\Controller\Api\AppController;

	class InstrumentosController extends AppController
	{
		public $paginate = [
	        'page' => 1,
	        'limit' => 5,
	        'maxLimit' => 15,
	        'sortWhitelist' => [
	            'id', 'modelo', 'marca', 'categoria', 'origem', 'status', 'user'
	        ]
	    ];

	    public function initialize(){
	        parent::initialize();
	        $this->Auth->allow(['index', 'view']);
	    }
	}