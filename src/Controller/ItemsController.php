<?php

namespace App\Controller;

use App\Controller\ApiController;
use App\Model\Entity\Item;
use App\Model\Table\ConsumablesTable;
use App\Model\Table\PhoneLinesTable;
use App\Model\Table\PrintersTable;
use Cake\Http\Client\Message;
use php\Exception;

/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 *
 * @method \App\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItemsController extends ApiController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

        $items = $this->Items->find('all', [
            'contain' => ['Models' => ['Brands', 'ItemTypes'], 'States', 'Allocations', 'ExtraRows'],
        ])->toList();

        // 3 telephony --- 4 phoneline
        $fn = function (Item $e) {
            $itemType = $e->model->item_type_id;
            if ($itemType === 3) {

                $item = $this->Items->get($e->id, [
                    'contain' => [
                        'Models' => ['Brands', 'ItemTypes'], 'States', 'Allocations', 'ExtraRows',
                        'Telephony'
                    ],
                ]);

                if ($item->telephony->phone_line_id != null) {
                    $item = $this->Items->get($e->id, [
                        'contain' => [
                            'Models' => ['Brands', 'ItemTypes'], 'States', 'Allocations', 'ExtraRows',
                            'Telephony' => ['PhoneLines']
                        ],
                    ]);
                }

                return $item;
            }
            if ($itemType === 4) {
                $item = $this->Items->get($e->id, [
                    'contain' => [
                        'Models' => ['Brands', 'ItemTypes'], 'States', 'Allocations', 'ExtraRows',
                        'PhoneLines' => ['Operators', 'Telephony']
                    ]
                ]);
                return $item;
            }
            return $e;
        };

        $items = array_map($fn, $items);

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($items));
        return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Models', 'States', 'Allocations', 'ExtraRows'],
        ]);

        $itemType = $item->model->item_type_id;
        if ($itemType === 3) {
            $item = $this->Items->get($item->id, [
                'contain' => [
                    'Models', 'States', 'Allocations', 'ExtraRows',
                    'Telephony' => ['PhoneLines']
                ],
            ]);
        }

        if ($itemType === 4) {
            $item = $this->Items->get($item->id, [
                'contain' => [
                    'Models', 'States', 'Allocations', 'ExtraRows',
                    'PhoneLines' => ['Operators', 'Telephony']
                ]
            ]);
        }

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($item));
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
            $item = $this->Items->newEmptyEntity();
            $item = $this->Items->patchEntity($item, $body);

            //  3 -- telefonía, 4 -- phonelines
            $type = $body['item_type_id'];
            if ($type == 3) {
                $telephony = $this->Items->Telephony->newEntity($body['telephony']);
                $item->telephony = $telephony;
            }
            if ($type == 4) {
                $phoneline = $this->Items->PhoneLines->newEntity($body['phoneline']);
                $item->phone_line = $phoneline;
            }

            // $item = $this->Items->patchEntity($item, $this->request->getData());

            $item = $this->Items->save($item);
            $response =  $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($item));
            return $response;
        };
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        if ($this->request->is(['patch', 'post', 'put'])) {

            $body = $this->request->getData();

            $item = $this->Items->get($id, [
                'contain' => ['Models' => ['Brands', 'ItemTypes',]],
            ]);

            $item = $this->Items->patchEntity($item, $body);
            $item = $this->Items->save($item);


            //  3 -- telefonía, 4 -- phonelines
            $type = $item->model->item_type_id;

            if ($type == 3 && array_key_exists('telephony', $body)) {
                $item = $this->Items->get($id, [
                    'contain' => ['Telephony'],
                ]);

                $telephony = $this->Items->Telephony->patchEntity($item->telephony, $body['telephony']);
                $telephony = $this->Items->Telephony->save($telephony);
            }
            if ($type == 4 && array_key_exists('phoneline', $body)) {
                $item = $this->Items->get($id, [
                    'contain' => ['PhoneLines'],
                ]);

                $phoneline = $this->Items->PhoneLines->patchEntity($item->phone_line, $body['phoneline']);
                $phoneline = $this->Items->PhoneLines->save($phoneline);
            }

            $response =  $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($item));
            return $response;
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        $isDeleted = $this->Items->delete($item);
        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($isDeleted));
        return $response;
    }

    public function settings()
    {
        $models = $this->fetchTable('Models');
        $brands = $this->fetchTable('Brands');
        $itemTypes = $this->fetchTable('ItemTypes');
        $states = $this->fetchTable('States');
        $status = $this->fetchTable('Status');

        $settings = [
            'itemTypes' => $itemTypes->find(),
            'brands' => $brands->find(),

            'models' => $models->find(),
            'states' => $states->find(),
            'status' => $status->find()
        ];

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($settings));
        return $response;
    }
}
