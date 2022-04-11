<?php

namespace App\Controller;

use App\Controller\ApiController;
use App\Model\Entity\Model;
use Firebase\JWT\JWT;

use function PHPSTORM_META\map;

/**
 * Models Controller
 *
 * @property \App\Model\Table\ModelsTable $Models
 * @property \App\Model\Table\RadioModels $RadioModels
 * @property \App\Model\Table\ConsumableModels $ConsumableModels
 * @property \App\Model\Table\TelephonyModels $TelephonyModels
 * @property \App\Model\Table\PrinterModels $PrinterModels
 *
 * @method \App\Model\Entity\Model[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */


class ModelsController extends AppController
{

    public function initialize(): void
    {
        // $this->RadioModels = $this->fetchTable('RadioModels');
        // $this->PrinterModels = $this->fetchTable('PrinterModels');
        // $this->ConsumableModels = $this->fetchTable('ConsumableModels');
        // $this->TelephonyModels = $this->fetchTable('TelephonyModels');
        parent::initialize();
    }

    /**
     * Index method
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $models = $this->Models
            ->find()
            ->contain(['Brands', 'ItemTypes', 'Items', 'RadioModels', 'ConsumableModels', 'PrinterModels', 'TelephonyModels'])
            ->toList();

        $fun = function (Model $param) {
            // 1 -- impresora, 2 -- consumible, 3 -- telefonía, 5 -- radios
            $type = $param->item_type_id;
            if ($type == 1) {
                $id = $param->id;
                $model = $this->Models->get($id, [
                    'contain' => ['Brands', 'ItemTypes', 'Items', 'PrinterModels']
                ]);

                if ($model->printer_model->consumable_id !== null) {

                    $model = $this->Models->get($id, [
                        'contain' => ['Brands', 'ItemTypes', 'Items', 'PrinterModels' => ['PrinterTypes', 'ConsumableModels', 'PrintTypes']]
                    ]);

                    $consumable = $this->Models->ConsumableModels->get($model->printer_model->consumable_id, [
                        'contain' => ['Models', 'ConsumableColors', 'ConsumableTypes'],
                    ]);
                    $model->printer_model->consumable_model = $consumable;
                } else {
                    $model = $this->Models->get($id, [
                        'contain' => ['Brands', 'ItemTypes', 'Items', 'PrinterModels' => ['PrinterTypes', 'PrintTypes']]
                    ]);
                }
                return $model;
            }
            if ($type == 2) {
                $model = $this->Models->get($param->id, [
                    'contain' => ['Brands', 'ItemTypes', 'Items', 'ConsumableModels' => ['ConsumableColors', 'ConsumableTypes']]
                ]);
                return $model;
            }
            if ($type == 3) {
                $model = $this->Models->get($param->id, [
                    'contain' => ['Brands', 'ItemTypes', 'Items', 'TelephonyModels' => ['TelephonyTypes']]
                ]);
                return $model;
            }
            if ($type == 5) {
                $model = $this->Models->get($param->id, [
                    'contain' => ['Brands', 'ItemTypes', 'Items', 'RadioModels' => ['RadioTypes', 'RadioFrequencys', 'RadioBands']]
                ]);
                return $model;
            }
            return array_filter($param->toArray(), fn ($e) => ($e != null));
        };

        $models = array_map($fun, $models);

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($models));
        return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Model id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $model = $this->Models->get($id, [
            'contain' => ['Brands', 'ItemTypes', 'Items'],
        ]);

        $type = $model->item_type_id;

        if ($type == 1) {
            $model = $this->Models->get($id, [
                'contain' => ['Brands', 'ItemTypes', 'Items', 'PrinterModels']
            ]);

            if ($model->printer_model->consumable_id !== null) {
                $model = $this->Models->get($id, [
                    'contain' => ['Brands', 'ItemTypes', 'Items', 'PrinterModels' => ['PrinterTypes', 'ConsumableModels', 'PrintTypes']]
                ]);
                $consumable = $this->Models->ConsumableModels->get($model->printer_model->consumable_id, [
                    'contain' => ['Models', 'ConsumableColors', 'ConsumableTypes'],
                ]);
                $model->printer_model->consumable_model = $consumable;
            } else {
                $model = $this->Models->get($id, [
                    'contain' => ['Brands', 'ItemTypes', 'Items', 'PrinterModels' => ['PrinterTypes', 'PrintTypes']]
                ]);
            }
        }
        if ($type == 2) {
            // $model = $this->Models->get($id, [
            //     'contain' => ['Brands', 'ItemTypes', 'Items', 'ConsumableModels' => ['ConsumableColors', 'ConsumableTypes']]
            // ]);
        }
        if ($type == 3) {
            // $model = $this->Models->get($id, [
            //     'contain' => ['Brands', 'ItemTypes', 'Items', 'TelephonyModels' => ['TelephonyTypes']]
            // ]);
        }
        if ($type == 5) {
            // $model = $this->Models->get($id, [
            //     'contain' => ['Brands', 'ItemTypes', 'Items', 'RadioModels' => ['RadioTypes', 'RadioFrequencys', 'RadioBands']]
            // ]);
        }

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($model));
        return $response;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        if ($this->request->is('post')) {

            $body = $this->request->getData();

            $model = $this->Models->newEmptyEntity();
            // 1 -- impresora, 2 -- consumible, 3 -- telefonía, 5 -- radios
            $model = $this->Models->patchEntity($model, $body);
            $type = $model->item_type_id;

            // iniciar transaccion

            if ($type == 1) {
                $printerModel = $this->Models->PrinterModels->newEntity($body['printerDetails']);
                $model->printer_model = $printerModel;
            }
            if ($type == 2) {
                $consumableModel = $this->Models->ConsumableModels->newEntity($body['consumableDetails']);
                $model->consumable_model = $consumableModel;
            }
            if ($type == 3) {
                $telephonyModel = $this->Models->TelephonyModels->newEntity($body['telephonyDetails']);
                $model->telephony_model = $telephonyModel;
            }
            if ($type == 5) {
                $radioModel = $this->Models->RadioModels->newEntity($body['radioDetails']);
                $model->radio_model = $radioModel;
            }

            // $response =  $this->response
            //     ->withType('application/json')
            //     ->withStringBody(json_encode($model->toArray()));
            // return $response;
            $modelAdded = $this->Models->save($model);
            $response =  $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($modelAdded));
            return $response;
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Model id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $body = $this->request->getData();

        $model = $this->Models->get($id, [
            'contain' => [],
        ]);
        $type = $model->item_type_id;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $model = $this->Models->patchEntity($model, $body);
            $model = $this->Models->save($model);

            if ($type == 1  && array_key_exists('printerDetails', $body)) {
                $model = $this->Models->get($id, [
                    'contain' => ['PrinterModels'],
                ]);
                $printerModel = $this->Models->PrinterModels
                    ->patchEntity($model->printer_model, $body['printerDetails']);
                $printerModel = $this->Models->PrinterModels->save($printerModel);
            }
            if ($type == 2 && array_key_exists('consumableDetails', $body)) {
                $model = $this->Models->get($id, [
                    'contain' => ['ConsumableModels'],
                ]);
                $consumableModel = $this->Models->ConsumableModels
                    ->patchEntity($model->consumable_model, $body['consumableDetails']);
                $consumableModel = $this->Models->ConsumableModels->save($consumableModel);
            }
            if ($type == 3  && array_key_exists('telephonyDetails', $body)) {
                $model = $this->Models->get($id, [
                    'contain' => ['TelephonyModels'],
                ]);
                $telephonyModel = $this->Models->TelephonyModels
                    ->patchEntity($model->telephony_model, $body['telephonyDetails']);
                $telephonyModel = $this->Models->TelephonyModels->save($telephonyModel);
            }
            if ($type == 5 && array_key_exists('radioDetails', $body)) {
                $model = $this->Models->get($id, [
                    'contain' => ['RadioModels'],
                ]);
                $radioModel = $this->Models->RadioModels
                    ->patchEntity($model->radio_model, $body['radioDetails']);
                $radioModel = $this->Models->RadioModels->save($radioModel);
            }


            $response =  $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($model));
            return $response;
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Model id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $model = $this->Models->get($id);
        $type = $model->item_type_id;
        $this->Models->delete($model);

        $response = $this->response
            ->withType('application/json')
            ->withStringBody(json_encode(true));
        return $response;
    }

    /**
     * Settings  method
     * @return \Cake\Http\Response|null
     */
    public function settings()
    {
        $brands = $this->fetchTable('Brands')->find();
        $itemTypes = $this->fetchTable('ItemTypes')->find();

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode([
                'brands' => $brands,
                'itemTypes' => $itemTypes
            ]));
        return $response;
    }
}
