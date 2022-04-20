<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Api Controller
 *
 *
 * @method \App\Model\Entity\Api[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApiController extends AppController
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize(): void
    {
        // View::disableAutoLayout() ;
        parent::initialize();
        $this->viewBuilder()->disableAutoLayout();
        // $this->loadComponent('Auth', [
        //     'storage' => 'Memory',
        //     'authenticate' => [
        //         'ADmad/JwtAuth.Jwt' => [
        //             'userModel' => 'Users',
        //             'fields' => [
        //                 'username' => 'id'
        //             ],

        //             'parameter' => 'token',

        //             // Boolean indicating whether the "sub" claim of JWT payload
        //             // should be used to query the Users model and get user info.
        //             // If set to `false` JWT's payload is directly returned.
        //             'queryDatasource' => true,
        //         ]
        //     ],

        //     'unauthorizedRedirect' => false,
        //     'checkAuthIn' => 'Controller.initialize',

        //     // If you don't have a login action in your application set
        //     // 'loginAction' to false to prevent getting a MissingRouteException.
        //     'loginAction' => false
        // ]);
    }
}
