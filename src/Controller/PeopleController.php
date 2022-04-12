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
        try {
            $people = $this->People->find('all');
            $response =  $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($people));
            return $response;
        } catch (\Throwable $th) {
            $people = $th->getMessage();
        }
        $this->set(compact('people'));
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

        try {
            $person = $this->People->get($id, [
                'contain' => ['Departments', 'Positions'],
            ]);
        } catch (\Throwable $th) {
            $person = $th->getMessage();
        }

        $this->set('person', $person);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $person = $this->People->newEntity();
        if ($this->request->is('post')) {
            $person = $this->People->patchEntity($person, $this->request->getData());

            try {
                $newPerson = $this->People->save($person);

                $message = (!$newPerson)
                    ? 'The person has been saved.'
                    : 'The person could not be saved. Please, try again.';
            } catch (\Throwable $th) {
                $newPerson = $th->getMessage();
                $message = 'The person could not be saved. Please, try again.';
            }
        }

        $this->set('person', $newPerson);
        $this->set('message', $message);
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
        $headquarters = $this->loadModel('Headquarters');
        $department = $this->loadModel('Departments');
        $positions = $this->loadModel('Position');
        // $people = $this->People obtener las filas y columnas de aqui
        $this->set(compact('headquarters', 'departments', 'positions'));
    }
}
