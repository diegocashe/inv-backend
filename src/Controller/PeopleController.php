<?php

namespace App\Controller;

use App\Controller\ApiController;

/**
 * People Controller
 *
 * @property \App\Model\Table\PeopleTable $People
 *
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PeopleController extends ApiController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $people = $this->People->find('all');
        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($people));
        return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $person = $this->People->get($id, [
            'contain' => ['Departments', 'Positions'],
        ]);
        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($person));
        return $response;
    }

/**
     * Allocations method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function allocations($id = null)
    {
        $person = $this->People->get($id, [
            // 'contain' => ['Allocations'],
        ]);
        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($id));
        return $response;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $person = $this->People->newEmptyEntity();
        if ($this->request->is('post')) {
            $person = $this->People->patchEntity($person, $this->request->getData());

            $newPerson = $this->People->save($person);

            $response =  $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($newPerson));
            return $response;
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $person = $this->People->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $person = $this->People->patchEntity($person, $this->request->getData());

            try {
                $editedPerson = $this->People->save($person);

                $message = (!$editedPerson)
                    ? 'The person has been saved.'
                    : 'The person could not be saved. Please, try again.';
            } catch (\Throwable $th) {
                $editedPerson = $th->getMessage();
                $message = 'The person could not be saved. Please, try again.';
            }

            $this->set('person', $editedPerson);
            $this->set('message', $message);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        try {
            $person = $this->People->get($id);
            $isDeleted = $this->People->delete($person);
            $message = ($isDeleted)
                ? 'The person has been deleted.'
                : 'The person could not be deleted. Please, try again.';
        } catch (\Throwable $th) {
            $isDeleted = $th->getMessage();
            $message = 'The person could not be deleted. Please, try again.';
        }

        $this->set('deleted', $isDeleted);
        $this->set('message', $message);
    }

    public function settings()
    {
        $headquarters = $this->fetchTable('Headquarters');
        $department = $this->fetchTable('Departments');
        $positions = $this->fetchTable('Position');
        // $people = $this->People obtener las filas y columnas de aqui
        $this->set(compact('headquarters', 'departments', 'positions'));
    }
}
