<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ExtraRows Controller
 *
 * @property \App\Model\Table\ExtraRowsTable $ExtraRows
 *
 * @method \App\Model\Entity\ExtraRow[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExtraRowsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Items'],
        ];
        $extraRows = $this->paginate($this->ExtraRows);

        $this->set(compact('extraRows'));
    }

    /**
     * View method
     *
     * @param string|null $id Extra Row id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $extraRow = $this->ExtraRows->get($id, [
            'contain' => ['Items'],
        ]);

        $this->set('extraRow', $extraRow);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $extraRow = $this->ExtraRows->newEmptyEntity();
        if ($this->request->is('post')) {
            $extraRow = $this->ExtraRows->patchEntity($extraRow, $this->request->getData());
            if ($this->ExtraRows->save($extraRow)) {
                $this->Flash->success(__('The extra row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The extra row could not be saved. Please, try again.'));
        }
        $items = $this->ExtraRows->Items->find('list', ['limit' => 200]);
        $this->set(compact('extraRow', 'items'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Extra Row id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $extraRow = $this->ExtraRows->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $extraRow = $this->ExtraRows->patchEntity($extraRow, $this->request->getData());
            if ($this->ExtraRows->save($extraRow)) {
                $this->Flash->success(__('The extra row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The extra row could not be saved. Please, try again.'));
        }
        $items = $this->ExtraRows->Items->find('list', ['limit' => 200]);
        $this->set(compact('extraRow', 'items'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Extra Row id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $extraRow = $this->ExtraRows->get($id);
        if ($this->ExtraRows->delete($extraRow)) {
            $this->Flash->success(__('The extra row has been deleted.'));
        } else {
            $this->Flash->error(__('The extra row could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
