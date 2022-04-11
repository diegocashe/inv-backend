<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\PrinterModel;

/**
 * PrinterModels Controller
 *
 * @property \App\Model\Table\PrinterModelsTable $PrinterModels
 *
 * @method \App\Model\Entity\PrinterModel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PrinterModelsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

        $printerModels = $this->PrinterModels->find('all', [
            'contain' => ['Models', 'PrinterTypes', 'PrintTypes'],
        ])->toList();

        $fn = function (PrinterModel $e){
            if($e->consumable_id !== null){
                $printerModel = $this->PrinterModels->get($e->id, [
                    'contain' => ['Models', 'PrinterTypes', 'ConsumableModels', 'PrintTypes'],
                ]);
                return $printerModel;
            }
            return $e;
        };

        $resp = array_map($fn, $printerModels);

        $response = $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($resp));
        return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Printer Model id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $printerModel = $this->PrinterModels->get($id, [
            'contain' => ['Models', 'PrinterTypes', 'PrintTypes'],
        ]);

        if($printerModel->consumable_id !== null){
            $printerModel = $this->PrinterModels->get($id, [
                'contain' => ['Models', 'PrinterTypes', 'ConsumableModels', 'PrintTypes'],
            ]);
        }

        $response = $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($printerModel));
        return $response;
    }

    // /**
    //  * Add method
    //  *
    //  * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
    //  */
    // public function add()
    // {
    //     $printerModel = $this->PrinterModels->newEntity();
    //     if ($this->request->is('post')) {
    //         $printerModel = $this->PrinterModels->patchEntity($printerModel, $this->request->getData());
    //         if ($this->PrinterModels->save($printerModel)) {
    //             $this->Flash->success(__('The printer model has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The printer model could not be saved. Please, try again.'));
    //     }
    //     $models = $this->PrinterModels->Models->find('list', ['limit' => 200]);
    //     $printerTypes = $this->PrinterModels->PrinterTypes->find('list', ['limit' => 200]);
    //     $consumableModels = $this->PrinterModels->ConsumableModels->find('list', ['limit' => 200]);
    //     $printTypes = $this->PrinterModels->PrintTypes->find('list', ['limit' => 200]);
    //     $this->set(compact('printerModel', 'models', 'printerTypes', 'consumableModels', 'printTypes'));
    // }

    /**
     * Edit method
     *
     * @param string|null $id Printer Model id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $printerModel = $this->PrinterModels->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $printerModel = $this->PrinterModels->patchEntity($printerModel, $this->request->getData());
            $printerModel = $this->PrinterModels->save($printerModel);
            $response = $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($printerModel));
            return $response;
        }
    }

    // /**
    //  * Delete method
    //  *
    //  * @param string|null $id Printer Model id.
    //  * @return \Cake\Http\Response|null Redirects to index.
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $printerModel = $this->PrinterModels->get($id);
    //     if ($this->PrinterModels->delete($printerModel)) {
    //         $this->Flash->success(__('The printer model has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The printer model could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }

    public function settings()
    {
        $body = [
            'models' => $this->fetchTable('Models')->find(),
            'printerTypes' => $this->fetchTable('PrinterTypes')->find(),
            'printTypes' => $this->fetchTable('PrintTypes')->find(),
            'consumableModels' => $this->fetchTable('ConsumableModels')->find('all', [
                'contain' => ['Models'],
            ]),
        ];

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($body));
        return $response;
    }
}
