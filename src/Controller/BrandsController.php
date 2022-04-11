<?php

// declare(strict_types=1);

namespace App\Controller;

use App\Controller\ApiController;


/**
 * Brands Controller
 *
 * @property \App\Model\Table\BrandsTable $Brands
 * @method \App\Model\Entity\Brand[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BrandsController extends ApiController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $brands = $this->Brands->find();
        $this->set('brands', $brands);

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($brands));
        return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Brand id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $brand = $this->Brands->get($id);

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($brand));
        return $response;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $brand = $this->Brands->newEmptyEntity();
        if ($this->request->is('post')) {
            $brand = $this->Brands->patchEntity($brand, $this->request->getData());
            $brandAdded = $this->Brands->save($brand);
            if ($brandAdded) {
                $response =  $this->response
                    ->withType('application/json')
                    ->withStringBody(json_encode($brandAdded));
                return $response;
            }
        }
        return null;
    }

    /**
     * Edit method
     *
     * @param string|null $id Brand id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $brand = $this->Brands->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $brand = $this->Brands->patchEntity($brand, $this->request->getData());
            $brandSaved = $this->Brands->save($brand);

            $response =  $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($brandSaved));
            return $response;
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Brand id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $brand = $this->Brands->get($id);
        $isDeleted = $this->Brands->delete($brand);
        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($isDeleted));
        return $response;
    }
}
