<?php

namespace App\Controller;

use App\Controller\ApiController;
use Cake\Http\Client\Message;

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
        try {
            $allocations = $this->Allocations->find('all', [
                'contain' => ['People', 'Items', 'Observations'],
            ]);
        } catch (\Throwable $th) {
            $allocations = $th->getMessage();
        }
        $this->set(compact('allocations'));
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
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $allocation = $this->Allocations->newEmptyEntity();
        if ($this->request->is('post')) {
            $allocation = $this->Allocations->patchEntity($allocation, $this->request->getData());
            try {
                $allocationAdded = $this->Allocations->save($allocation);
                $message = 'The allocation has been saved.';
            } catch (\Throwable $th) {
                $message = 'The allocation could not be saved. Please, try again.';
            }
        }
        $this->set(compact('allocation', 'message'));
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

        try {
            $allocation = $this->Allocations->get($id);
            $isDelete = $this->Allocations->delete($allocation);
            $message = 'The allocation has been deleted.';
        } catch (\Throwable $th) {
            $isDelete = null;
            $message = 'The allocation could not be deleted. Please, try again.';
        }
        $this->set(compact('idDelete', 'message'));
    }

    public function settings()
    {

        $body = [
            'items' => $items = $this->loadModel('Items')->find(),
        ];

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($body));
        return $response;
    }
}
