<?php

namespace App\Controller;

use App\Controller\ApiController;
use Cake\Chronos\Date;
use Cake\Http\Client\Message;
use DateTime;

/**
 * Allocations Controller
 *
 * @property \App\Model\Table\AllocationsTable $Allocations
 *
 * @method \App\Model\Entity\Allocation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AllocationsController extends ApiController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $allocations = $this->Allocations->find('all', [
            // 'contain' => ['People', 'Items', 'Observations'],
            'contain' => ['Items'],
        ])->toList();

        $fn = function ($e) {
            $assignor = $this->Allocations->People->get($e->assigned_people_id);
            $e['assignor'] = $assignor;
            $assigned = $this->Allocations->People->get($e->assignor_people_id);
            $e['assigned'] = $assigned;
            return $e;
        };
        $allocations = array_map($fn, $allocations);
        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($allocations));
        return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Allocation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            $allocation = $this->Allocations->get($id, [
                'contain' => ['People', 'Items', 'Observations'],
            ]);
        } catch (\Throwable $th) {
            $allocation = $th->getMessage();
        }

        $this->set('allocation', $allocation);
    }


    /**
     * people method
     *
     * @param string|null $id Allocation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function people($id = null)
    {

    //     $response =  $this->response
    //     ->withType('application/json')
    //     ->withStringBody(json_encode($id));
    // return $response;

        $allocations = $this->Allocations->find('all', [
            'contain' => ['People', 'Items'],
        ])->where(['assigned_people_id' => $id])->toList();

        $fn = function ($e) {
            $assignor = $this->Allocations->People->get($e->assigned_people_id);
            $e['assignor'] = $assignor;
            $assigned = $this->Allocations->People->get($e->assignor_people_id);
            $e['assigned'] = $assigned;
            $e['item'] = $this->Allocations->Items->get($e->item_id, [
                'contain' => ['Models' => ['Brands', 'ItemTypes'], 'States' ],
            ]);
            return $e;
        };
        $allocations = array_map($fn, $allocations);


        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($allocations));
        return $response;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $body = $this->request->getData();

        if ($this->request->is('post')) {
            // $allocation = $this->Allocations->newEmptyEntity();
            // $allocation = $this->Allocations->patchEntity($allocation, $body);
            // $allocation = $this->Allocations->save($allocation);

            // $response =  $this->response
            // ->withType('application/json')
            // ->withStringBody(json_encode($allocation));
            // return $response;

        }
        $ubication = $body['ubication'];
        $user = $body['user'];

        $user = $this->Allocations->People->Users->get($user['id'], [
            'contain' => array('People')
        ]);

        $assignor = $body['assignor'];

        $assignor = $this->Allocations->People->Users->get($assignor['id'], [
            'contain' => array('People')
        ]);

        $items = array_map(fn ($e) => $this->Allocations->Items->get($e['id']), $body['items']);

        $fn = fn ($e) =>  [
            'ubication' => $ubication,
            'active' => true,
            'item_id' => $e->id,
            'assigned_people_id' => $user->person->id,
            'assignor_people_id' => $assignor->person->id,
            "assigment_date" => Date::now(),
        ];

        $allocations = array_map($fn, $items);

        $allocations = $this->Allocations->newEntities($allocations);
        $allocations = $this->Allocations->saveMany($allocations);

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($allocations));
        return $response;


        $allocations = $this->Allocations->newEntities($allocations);

        $allocations = $this->Allocations->saveMany($allocations);
    }



    /**
     * Edit method
     *
     * @param string|null $id Allocation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        try {
            $allocation = $this->Allocations->get($id, [
                'contain' => [],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $allocation = $this->Allocations->patchEntity($allocation, $this->request->getData());
                $allocation = $this->Allocations->save($allocation);
                $message = 'The allocation has been saved.';
            }
        } catch (\Throwable $th) {
            $message = 'The allocation could not be saved. Please, try again.';
            $allocation = $th->getMessage();
        }
        $this->set(compact('allocation', 'message'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Allocation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $allocation = $this->Allocations->get($id);
        $isDelete = $this->Allocations->delete($allocation);
        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($isDelete));
        return $response;
    }

    public function getProfileData($userId = null)
    {
        $Users = $this->fetchTable('Users');
        $contain = ['People', 'Roles'];
        $people = [];
        $profile = $Users->get($userId, [
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
            $profile = $Users->get($userId, [
                'contain' => $contain,
            ]);
        }

        return $profile;
    }

    public function settings()
    {

        // $fn = $this->getProfileData;
        $users = $this->fetchTable('Users')->find()->contain(['People'])->toList();
        $users = array_map(fn ($user) => $this->getProfileData($user->id), $users);

        $items = $this->fetchTable('Items')->find()->contain(['Models' => ['ItemTypes', 'Brands']])->toList();

        $allocations = $this->Allocations->find()->toList();
        $itemsAssigned = array_map(fn ($e) => $e->item_id, $allocations);

        $fn = fn ($e) => !(in_array($e->id, $itemsAssigned));

        $items = array_filter($items, $fn);
        $items = array_values($items);

        $body = [
            'items' => $items,
            'users' => $users
        ];

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($body));
        return $response;
    }
}
