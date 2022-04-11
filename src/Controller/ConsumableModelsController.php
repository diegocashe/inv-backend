<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * ConsumableModels Controller
 *
 * @property \App\Model\Table\ConsumableModelsTable $ConsumableModels
 *
 * @method \App\Model\Entity\ConsumableModel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConsumableModelsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $consumableModels = $this->ConsumableModels->find('all', [
            'contain' => ['Models', 'ConsumableColors', 'ConsumableTypes'],
        ]);

        $response = $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($consumableModels));
        return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Consumable Model id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $consumableModel = $this->ConsumableModels->get($id, [
            'contain' => ['Models', 'ConsumableColors', 'ConsumableTypes'],
        ]);

        $response = $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($consumableModel));
        return $response;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $consumableModel = $this->ConsumableModels->newEmptyEntity();
        if ($this->request->is('post')) {
            $consumableModel = $this->ConsumableModels->patchEntity($consumableModel, $this->request->getData());
            $consumableModel = $this->ConsumableModels->save($consumableModel);
            if ($consumableModel) {
                $response = $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($consumableModel));
            return $response;
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Consumable Model id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $consumableModel = $this->ConsumableModels->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $consumableModel = $this->ConsumableModels->patchEntity($consumableModel, $this->request->getData());
            $consumableModel = $this->ConsumableModels->save($consumableModel);
            $response = $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($consumableModel));
            return $response;
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Consumable Model id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $consumableModel = $this->ConsumableModels->get($id);
        if ($this->ConsumableModels->delete($consumableModel)) {
            $this->Flash->success(__('The consumable model has been deleted.'));
        } else {
            $this->Flash->error(__('The consumable model could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function settings()
    {
        $body = [
            'models' => $this->loadModel('Models')->find(),
            'consumableTypes' => $this->loadModel('ConsumableTypes')->find(),
            'consumableColors' => $this->loadModel('ConsumableColors')->find(),
        ];

        $response = $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($body));
        return $response;
    }
}
