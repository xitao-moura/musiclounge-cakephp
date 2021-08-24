<?php
    namespace App\Controller\Api;

    use Cake\Controller\Controller;
    use Cake\Event\Event;

    class AppController extends Controller
    {
        use \Crud\Controller\ControllerTrait;

        public function initialize()
        {

            $this->loadComponent('RequestHandler', [
                'enableBeforeRedirect' => false,
            ]);
            
            $this->loadComponent('Crud.Crud', [
                'actions' => [
                    'Crud.Index',
                    'Crud.View',
                    'Crud.Add',
                    'Crud.Edit',
                    'Crud.Delete'
                ],
                'listeners' => [
                    // 'Crud.Api',
                    // 'Crud.ApiPagination',
                    // 'Crud.ApiQueryLog'
                    'CrudJsonApi.JsonApi',
                    'CrudJsonApi.Pagination', // Pagination != ApiPagination
                    'Crud.ApiQueryLog',
                    'CrudView.Search'
                ]
            ]);

            $this->loadComponent('Auth', [
                'storage' => 'Memory',
                'authenticate' => [
                    'Form' => [
                        'scope' => ['Users.status_id' => 1]
                    ],
                    'ADmad/JwtAuth.Jwt' => [
                        'parameter' => 'token',
                        'userModel' => 'Users',
                        'scope' => ['Users.status_id' => 1],
                        'fields' => [
                            'username' => 'id'
                        ],
                        'queryDatasource' => true
                    ]
                ],
                'unauthorizedRedirect' => false,
                'checkAuthIn' => 'Controller.initialize'
            ]);
        }
    }