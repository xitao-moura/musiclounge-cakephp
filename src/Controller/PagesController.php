<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->Auth->allow(['main', 'dna', 'batePapoMl', 'sobreNos', 'contato', 'privacidade', 'exclusao', 'parceiros', 'termos']);
    }

    public function main(){

        $this->set('title', 'MusicLounge - Seu Espaço colaborativo da Música');

        $conditions = [
            'Materias.status_id' => 1
        ];

        $this->loadModel('Materias');
        $materias = $this->Materias->find('all')
        ->contain(['Users', 'Status', 'Tipos'])
        ->where($conditions)
        ->order(['Materias.created' => 'DESC'])
        ->limit(3);

        $this->set(compact('materias'));
    }

    public function dna(){
        $this->set('title', 'MusicLounge - DNA');
    }

    public function batePapoMl(){
        $this->set('title', 'MusicLounge - Bate Papo ML');
    }

    public function sobreNos(){
        $this->set('title', 'MusicLounge - Sobre nós');
    }

    public function contato(){
        $this->set('title', 'MusicLounge - Contato');
    }

    public function privacidade(){
        $this->set('title', 'MusicLounge - Política e Privacidade');
    }

    public function termos(){
        $this->set('title', 'MusicLounge - Termos de Uso');
    }

    public function exclusao(){
        $this->set('title', 'MusicLounge - Exclusão de Dados');
    }

    public function parceiros(){
        $this->set('title', 'MusicLounge - Parceiros');

        $this->paginate = [
            'contain' => ['Tipos', 'Status', 'Marcas', 'Cidades', 'Estados'],
        ];

        $conditions['Users.status_id'] = 1;

        $this->loadModel('Users');
        $query = $this->Users->find('all')
        ->where($conditions);

        $parceiros = $this->paginate($query);


        //debug($parceiros->toArray());

        $this->set(compact('parceiros'));
    }

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function display(...$path)
    {
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }
}
