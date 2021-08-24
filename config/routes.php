<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/*
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 * Cache: Routes are cached to improve performance, check the RoutingMiddleware
 * constructor in your `src/Application.php` file to change this behavior.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::prefix('api', function (RouteBuilder $routes) {
    $routes->getExtensions(['json', 'xml', 'ajax']);
    //$routes->extensions(['json', 'xml', 'ajax']);
    $routes->resources('Instrumentos');
    $routes->resources('Users');
    $routes->resources('Categorias');
    $routes->resources('Origens');
    $routes->resources('Status');
    $routes->resources('Tipos');
    $routes->resources('Imagens');
    
    Router::connect('/api/users/register', ['controller' => 'Users', 'action' => 'add', 'prefix' => 'api']);
    Router::connect('/api/users/recuperar-senha', ['controller' => 'Users', 'action' => 'recuperarSenha', 'prefix' => 'api']);
    Router::connect('/api/users/login-nova-senha', ['controller' => 'Users', 'action' => 'loginNovaSenha', 'prefix' => 'api']);
    $routes->fallbacks('InflectedRoute');
});

Router::scope('/', function (RouteBuilder $routes) {
    // Register scoped middleware for in scopes.
    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true,
    ]));

    /*
     * Apply a middleware to the current route scope.
     * Requires middleware to be registered through `Application::routes()` with `registerMiddleware()`
     */
    $routes->applyMiddleware('csrf');

    /*
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'main']);
    $routes->connect('/dna', ['controller' => 'Pages', 'action' => 'dna']);
    $routes->connect('/eventos', ['controller' => 'Eventos', 'action' => 'index']);
    $routes->connect('/bate-papo-ml', ['controller' => 'Materias', 'action' => 'index']);
    $routes->connect('/sobre-nos', ['controller' => 'Pages', 'action' => 'sobreNos']);
    $routes->connect('/parceiros', ['controller' => 'Catalogos', 'action' => 'index']);
    $routes->connect('/contato', ['controller' => 'Pages', 'action' => 'contato']);
    $routes->connect('/registrar-usuario', ['controller' => 'Users', 'action' => 'add']);
    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/recuperar-senha', ['controller' => 'Users', 'action' => 'recuperarSenha']);
    $routes->connect('/login-nova-senha', ['controller' => 'Users', 'action' => 'loginNovaSenha']);
    $routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
    $routes->connect('/perfil/*', ['controller' => 'Users', 'action' => 'perfil', ]);
    $routes->connect('/newsletter', ['controller' => 'Newsletters', 'action' => 'add']);
    $routes->connect('/politica-privacidade', ['controller' => 'Pages', 'action' => 'privacidade']);
    $routes->connect('/termos-de-uso', ['controller' => 'Pages', 'action' => 'termos']);
    $routes->connect('/exclusao-de-dados', ['controller' => 'Pages', 'action' => 'exclusao']);

    $routes->connect(
        '/instrumentos/:id-:marca-:modelo',
        ['controller' => 'Instrumentos', 'action' => 'view'], // Local à ser redirecionado
        [
            'pass' => ['id'], // Passamos o elemento de rota ":id" para a action (ver) como parâmetro
            'id' => '[0-9]+', // Especificamos que o elemento de rota ":id" só casará com números (através de expressão regular)
            'marca' => '[a-zA-Z0-9_-]*', // Regra (expressão regular) para o elemento de rota ":titulo", apenas casará com letras, numeros, traços ou underlines
            'modelo' => '[a-zA-Z0-9_-]*', // Regra (expressão regular) para o elemento de rota ":titulo", apenas casará com letras, numeros, traços ou underlines
        ]
    );

    $routes->connect(
        '/bate-papo-ml/:id/:titulo',
        ['controller' => 'Materias', 'action' => 'view'], // Local à ser redirecionado
        [
            'pass' => ['id'], // Passamos o elemento de rota ":id" para a action (ver) como parâmetro
            'id' => '[0-9]+', // Especificamos que o elemento de rota ":id" só casará com números (através de expressão regular)
            'titulo' => '[a-zA-Z0-9_-]*', // Regra (expressão regular) para o elemento de rota ":titulo", apenas casará com letras, numeros, traços ou underlines
        ]
    );

    $routes->connect(
        '/parceiros/:id/:nome',
        ['controller' => 'Catalogos', 'action' => 'view'], // Local à ser redirecionado
        [
            'pass' => ['id'], // Passamos o elemento de rota ":id" para a action (ver) como parâmetro
            'id' => '[0-9]+', // Especificamos que o elemento de rota ":id" só casará com números (através de expressão regular)
            'nome' => '[a-zA-Z0-9_-]*', // Regra (expressão regular) para o elemento de rota ":titulo", apenas casará com letras, numeros, traços ou underlines
        ]
    );
    
    /*
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    //$routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /*
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *
     * ```
     * $routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);
     * $routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);
     * ```
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});

/*
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * Router::scope('/api', function (RouteBuilder $routes) {
 *     // No $routes->applyMiddleware() here.
 *     // Connect API actions here.
 * });
 * ```
 */

