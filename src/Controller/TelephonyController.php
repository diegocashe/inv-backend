<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Telephony;

/**
 * Telephony Controller
 *
 * @property \App\Model\Table\TelephonyTable $Telephony
 *
 * @method \App\Model\Entity\Telephony[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TelephonyController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $telephony = $this->Telephony->find('all', [
            'contain' => ['Items' => ['Models'], 'PhoneLines'],
        ])->toList();

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($telephony));
        return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Telephony id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $telephony = $this->Telephony->get($id, [
            'contain' => ['Items' => ['Models'], 'PhoneLines'],
        ]);

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($telephony));
        return $response;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $telephony = $this->Telephony->newEntity();
        if ($this->request->is('post')) {
            $telephony = $this->Telephony->patchEntity($telephony, $this->request->getData());
            if ($this->Telephony->save($telephony)) {
                $this->Flash->success(__('The telephony has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The telephony could not be saved. Please, try again.'));
        }
        $phoneLines = $this->Telephony->PhoneLines->find('list', ['limit' => 200]);
        $thelephonyTypes = $this->Telephony->ThelephonyTypes->find('list', ['limit' => 200]);
        $this->set(compact('telephony', 'phoneLines', 'thelephonyTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Telephony id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $telephony = $this->Telephony->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $telephony = $this->Telephony->patchEntity($telephony, $this->request->getData());
            
            $telephony =  $this->Telephony->save($telephony);
            $response =  $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($telephony));
            return $response;
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Telephony id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $telephony = $this->Telephony->get($id);
        if ($this->Telephony->delete($telephony)) {
            $this->Flash->success(__('The telephony has been deleted.'));
        } else {
            $this->Flash->error(__('The telephony could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function settings()
    {

        $thelephonyTypes = $this->fetchTable('TelephonyTypes')->find();
        $phoneLines = $this->fetchTable('PhoneLines')->find();
        $items = $this->fetchTable('Items')->find();

        $body = [
            'phoneLines' => $phoneLines,
            'items' => $items
        ];

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($body));
        return $response;
    }
}
