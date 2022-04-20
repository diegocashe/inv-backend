<?php

namespace App\Controller;

use App\Controller\ApiController;
use Cake\Auth\DefaultPasswordHasher;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

/**
 * Login Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @property \App\Model\Table\PeopleTable $People
 * @property Cake\Auth\DefaultPasswordHasher $hasher
 * @method \App\Model\Entity\Login[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LoginController extends ApiController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->Users = $this->fetchTable('Users');
        $this->People = $this->fetchTable('People');
        $this->hasher =  new DefaultPasswordHasher();

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
        //     'loginAction' => true
        // ]);
    }
    function loggear($id, $user)
    {
        $key = "secret";
        $payload = [
            "sub" => $id,
            "username" => $user,
        ];

        $jwt = JWT::encode($payload, $key, 'HS256');
        $decoded = JWT::decode($jwt, new Key($key, 'HS256'));

        return $jwt;
    }

    /**
     * login method
     *
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function login()
    {
        $body = $this->request->getData();

        $user = $this->Users->findByUsername($body['username']);
        $user= $user->first();
        
        if ($this->hasher->check($body['password'], $user->password)) {

            $response = [
                "id" => $user->id,
                "access_token" => $this->loggear($user->id, $user->username),
            ];

            $response =  $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($response));
            return $response;
        }
    }

    /**
     * singin method
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function singin()
    {
        $body = $this->request->getData();

        if ($this->request->is('post')) {


            $user = $this->Users->newEmptyEntity();
            $user = $this->Users->patchEntity($user, $body);
            $person = $this->Users->People->newEmptyEntity();
            $person = $this->Users->People->patchEntity($person, $body);

            $user->password = $this->hasher->hash($body["password"]);
            $user->rol_id = ($body["userType"] === "regular") ? 3 : 2;
            $user->person = $person;
            $user = $this->Users->save($user);

            $response = [
                "access_token" => $this->loggear($user->id, $user->username),
                "id" => $user->id,
            ];

            $response =  $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($response));
            return $response;
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->request->is('post')) {



            // $item = $this->Items->save($item);
            // $response =  $this->response
            //     ->withType('application/json')
            //     ->withStringBody(json_encode($item));
            // return $response;
        };
    }
}
