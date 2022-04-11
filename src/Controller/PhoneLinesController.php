<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Phonelines Controller
 *
 * @property \App\Model\Table\PhonelinesTable $Phonelines
 *
 * @method \App\Model\Entity\Phoneline[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PhonelinesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $phonelines = $this->Phonelines->find('all', [
            'contain' => ['Operators', 'Telephony'],
        ]);

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($phonelines));
        return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Phoneline id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $phoneline = $this->Phonelines->get($id, [
            'contain' => ['Operators', 'Telephony'],
        ]);

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($phoneline));
        return $response;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $phoneline = $this->Phonelines->newEntity();
        if ($this->request->is('post')) {
            $phoneline = $this->Phonelines->patchEntity($phoneline, $this->request->getData());
            if ($this->Phonelines->save($phoneline)) {
                $this->Flash->success(__('The phoneline has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The phoneline could not be saved. Please, try again.'));
        }
        $operators = $this->Phonelines->Operators->find('list', ['limit' => 200]);
        $this->set(compact('phoneline', 'operators'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Phoneline id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $phoneline = $this->Phonelines->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $body = $this->request->getData();
            $phoneline = $this->Phonelines->patchEntity($phoneline, $body);

            $phoneline =  $this->Phonelines->save($phoneline);
            $response =  $this->response
                ->withType('application/json')
                ->withStringBody(json_encode($phoneline));
            return $response;
        }
    }

    // /**
    //  * Delete method
    //  *
    //  * @param string|null $id Phoneline id.
    //  * @return \Cake\Http\Response|null Redirects to index.
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function delete($id = null)
    // {
    //     // $this->request->allowMethod(['post', 'delete']);
    //     // $phoneline = $this->Phonelines->get($id);
    //     // if ($this->Phonelines->delete($phoneline)) {
    //     //     $this->Flash->success(__('The phoneline has been deleted.'));
    //     // } else {
    //     //     $this->Flash->error(__('The phoneline could not be deleted. Please, try again.'));
    //     // }

    //     // return $this->redirect(['action' => 'index']);
    // }

    public function settings()
    {
        $body = [
            'operators' => $this->fetchTable('Operators')->find(),
            'items' => $this->fetchTable('Items')->find()
        ];

        $response =  $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($body));
        return $response;
    }
}
