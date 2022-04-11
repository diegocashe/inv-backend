<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Controller\ApiController;

/**
 * TelephonyModels Controller
 *
 * @property \App\Model\Table\TelephonyModelsTable $TelephonyModels
 *
 * @method \App\Model\Entity\TelephonyModel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TelephonyModelsController extends ApiController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

        $telephonyModels = $this->TelephonyModels->find('all', [
            'contain' => ['Models', 'TelephonyTypes'],
        ]);

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($telephonyModels));
        return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Telephony Model id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $telephonyModel = $this->TelephonyModels->get($id, [
            'contain' => ['Models', 'TelephonyTypes'],
        ]);

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($telephonyModel));
        return $response;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {
    //     $telephonyModel = $this->TelephonyModels->newEntity();
    //     if ($this->request->is('post')) {
    //         $telephonyModel = $this->TelephonyModels->patchEntity($telephonyModel, $this->request->getData());
    //         if ($this->TelephonyModels->save($telephonyModel)) {
    //             $this->Flash->success(__('The telephony model has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The telephony model could not be saved. Please, try again.'));
    //     }
    //     $models = $this->TelephonyModels->Models->find('list', ['limit' => 200]);
    //     $telephonyTypes = $this->TelephonyModels->TelephonyTypes->find('list', ['limit' => 200]);
    //     $this->set(compact('telephonyModel', 'models', 'telephonyTypes'));
    // }

    /**
     * Edit method
     *
     * @param string|null $id Telephony Model id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $telephonyModel = $this->TelephonyModels->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $telephonyModel = $this->TelephonyModels->patchEntity($telephonyModel, $this->request->getData());
            $telephonyModel = $this->TelephonyModels->save($telephonyModel);

            $response =  $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($telephonyModel));
            return $response;
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Telephony Model id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $telephonyModel = $this->TelephonyModels->get($id);
    //     if ($this->TelephonyModels->delete($telephonyModel)) {
    //         $this->Flash->success(__('The telephony model has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The telephony model could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }

    public function settings()
    {
        $body = [
            'models' => $this->fetchTable('Models')->find(),
            'telephonyTypes' => $this->fetchTable('TelephonyTypes')->find(),
        ];

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($body));
        return $response;
    }
}
