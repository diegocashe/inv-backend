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
 * @method \App\Model\Entity\Login[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LoginController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->Users = $this->fetchTable('Users');
        $this->People = $this->fetchTable('People');

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


    public function index()
    {
        // $body = $this->request->getData();
        // $key = "example_key";
        // $payload = array(
        //     "sub" => 1,
        //     "iss" => "http://example.org",
        //     "aud" => "http://example.com",
        //     "iat" => 1356999524,
        //     "nbf" => 1357000000
        // );
        // $jwt = JWT::encode($payload, $key, 'HS256');
        // $decoded = JWT::decode($jwt, new Key($key, 'HS256'));

        // $response =  $this->response
        //     ->withType('application/json')
        //     ->withStringBody(json_encode(['encoded'=>$jwt, 'decoded'=>$decoded]));
        // return $response;
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
        $key = "example_key";
        $payload = array(
            "sub" => 1,
            "iss" => "http://exampleasdasd.org",
            "aud" => "http://example.com",
            "iat" => 1356999524,
            "nbf" => 1357000000
        );
        $jwt = JWT::encode($payload, $key, 'HS256');
        $decoded = JWT::decode($jwt, new Key($key, 'HS256'));

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode(['encoded' => $jwt, 'decoded' => $decoded]));
        return $response;
    }

    /**
     * singin method
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function singin()
    {
        $body = $this->request->getData();

        if ($this->request->is('post')) {
            $hasher =  new DefaultPasswordHasher();

            $user = $this->Users->newEmptyEntity();
            $user = $this->Users->patchEntity($user, $body);

            $user->password = $hasher->hash($body["password"]);
            // $user->person = $person;
            $user->rol_id = ($body["userType"] === "regular") ? 3 : 2;
            $user = $this->Users->save($user);

                        
            $person = $this->Users->People->newEmptyEntity();
            // $person = $this->Users->People->patchEntity($person, $body);
            $person->user_id =8;
            $person = $this->People->save($person);

            
            
            // $person = $this->People->newEmptyEntity();
            // // $person = $this->Users->People->patchEntity($person, $body);
            // $person->user_id = 6;
            // $person = $this->People->save($person);
            
            $response =  $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($user));
            return $response;

            // $this->login($user)
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
