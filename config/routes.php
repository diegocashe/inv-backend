<?php

/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
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

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return static function (RouteBuilder $routes) {
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
     * inconsistently cased URLs when used with `{plugin}`, `{controller}` and
     * `{action}` markers.
     */
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder) {
        /*
         * Here, we are connecting '/' (base path) to a controller called 'Pages',
         * its action called 'display', and we pass a param to select the view file
         * to use (in this case, templates/Pages/home.php)...
         */
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

        /*
         * ...and connect the rest of 'Pages' controller's URLs.
         */
        // $builder->connect('/pages/*', 'Pages::display');

        /*
         * Connect catchall routes for all controllers.
         *
         * The `fallbacks` method is a shortcut for
         *
         * ```
         * $builder->connect('/{controller}', ['action' => 'index']);
         * $builder->connect('/{controller}/{action}/*', []);
         * ```
         *
         * You can remove these routes once you've connected the
         * routes you want in your application.
         */
        $builder->fallbacks();
    });

    /*
     * If you need a different set of middleware or none at all,
     * open new scope and define routes there.
     *
     * ``` * ```
     */
    $routes->scope('/api', function (RouteBuilder $builder) {
        // No $builder->applyMiddleware() here.

        // Parse specified extensions from URLs
        // $builder->setExtensions(['json', 'xml']);

        // Connect API actions here.
        // Settigns APIs
         $builder->get('/printers/settings', ['controller' => 'Printers',  'action' => 'settings']);
        // $routes->get('/radios/settings', ['controller' => 'Radios',  'action' => 'settings']);
        $builder->get('/models/settings', ['controller' => 'Models',  'action' => 'settings']);
        $builder->get('/allocations/settings', ['controller' => 'Allocations',  'action' => 'settings']);

        $builder->get('/profile/settings', ['controller' => 'Profile',  'action' => 'settings']);
        // items settings

        $builder->get('/items/settings', ['controller' => 'Items',  'action' => 'settings']);
        $builder->get('/telephony/settings', ['controller' => 'Telephony',  'action' => 'settings']);
        $builder->get('/phonelines/settings', ['controller' => 'PhoneLines',  'action' => 'settings']);

        // models settings 
        $builder->get('/radio-models/settings', ['controller' => 'RadioModels',  'action' => 'settings']);
        $builder->get('/printer-models/settings', ['controller' => 'PrinterModels',  'action' => 'settings']);
        $builder->get('/consumable-models/settings', ['controller' => 'ConsumableModels',  'action' => 'settings']);
        $builder->get('/telephony-models/settings', ['controller' => 'TelephonyModels',  'action' => 'settings']);

        $builder->connect('/allocations/people/{id}', ['controller' => 'Allocations',  'action' => 'people'])->setPass(['id']);

        $builder->connect('/login', ['controller' => 'Login',  'action' => 'login']);
        $builder->connect('/singin', ['controller' => 'Login', 'action' => 'singin']);
        // $builder->connect('/profile/:id', ['controller' => 'Profile', 'action' => 'view']);

        $builder->resources('Profile');
        //principal controllers
        $builder->resources('Allocations');
        $builder->resources('Brands');
        $builder->resources('Items');
        $builder->resources('Login');
        $builder->resources('Models');
        $builder->resources('People');
        $builder->resources('Users');

        $builder->resources('Printers');
        $builder->resources('Consumables');
        $builder->resources('Telephony');
        $builder->resources('Phonelines');
        $builder->resources('Radios');

        // $builder->connect( '/radio_models',['controller' => 'RadioModels']);
        
        $builder->resources('RadioModels');
        $builder->resources('ConsumableModels');
        $builder->resources('TelephonyModels');
        $builder->resources('PrinterModels');

    });
};
