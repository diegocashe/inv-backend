<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\ApiController;


/**
 * Profile Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @property \App\Model\Table\PeopleTable $People
 * @method \App\Model\Entity\Profile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProfileController extends ApiController
{

    public function initialize(): void
    {
        $this->Users = $this->fetchTable('Users');
        $this->People = $this->fetchTable('People');
        parent::initialize();
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    // public function index()
    // {
    //     $profile = $this->paginate($this->Profile);

    //     $this->set(compact('profile'));
    // }

    private function getProfileData($userId = null){
        $contain = ['People', 'Roles'];
        $people = [];
        $profile = $this->Users->get($userId, [
            'contain' => $contain,
        ]);

        if ($profile->person->position_id !== null) {
            array_push($people, 'Positions');
        }
        if ($profile->person->department_headquarter_id !== null) {
            $people['DepartmentHeadquarter'] = ['Departments', 'Headquarters'];
        }
        if (count($people) > 0) {
            $contain = ['People' => $people, 'Roles'];
            $profile = $this->Users->get($userId, [
                'contain' => $contain,
            ]);
        }

        return $profile;
    }

    /**
     * View method
     *
     * @param string|null $id Profile id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $profile = $this->getProfileData($id);

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($profile));
        return $response;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {
    //     $profile = $this->Profile->newEmptyEntity();
    //     if ($this->request->is('post')) {
    //         $profile = $this->Profile->patchEntity($profile, $this->request->getData());
    //         if ($this->Profile->save($profile)) {
    //             $this->Flash->success(__('The profile has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The profile could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('profile'));
    // }

    /**
     * Edit method
     *
     * @param string|null $id Profile id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $body = $this->request->getData();

        $user = $this->Users->get($id, [
            'contain' => ['People'],
        ]);


        $department = $this->People->DepartmentHeadquarter->Departments->get($body['department_id']);
        $HQ = $this->People->DepartmentHeadquarter->Headquarters->get($body['headquarters_id']);

        if ($department && $HQ) {
            $Dt_HQ = $this->Users->People->DepartmentHeadquarter
                ->findOrCreate([
                    'department_id' => $body['department_id'],
                    'headquarters_id' => $body['headquarters_id']
                ]);  
        }else{
            $Dt_HQ = null;
        }
        

        if ($this->request->is(['patch', 'post', 'put'])) {

            $person = $this->Users->People->patchEntity($user->person, $body);
            $person->department_headquarter = $Dt_HQ;
            $person = $this->Users->People->save($person);

            $profile = $this->getProfileData($user->id);

            $response =  $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($profile));
            return $response;

        }

    }

    // /**
    //  * Delete method
    //  *
    //  * @param string|null $id Profile id.
    //  * @return \Cake\Http\Response|null|void Redirects to index.
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $profile = $this->Profile->get($id);
    //     if ($this->Profile->delete($profile)) {
    //         $this->Flash->success(__('The profile has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The profile could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }



    public function settings()
    {
        $positions = $this->fetchTable('Positions');
        $departments = $this->fetchTable('Departments');
        $departmentHeadquarter = $this->fetchTable('DepartmentHeadquarter');
        $Headquarters = $this->fetchTable('Headquarters');


        $settings = [
            'positions' => $positions->find(),
            'departments' => $departments->find(),
            'headquarters' => $Headquarters->find(),
            'department_headquarter' => $departmentHeadquarter->find()
        ];

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($settings));
        return $response;
    }
}
