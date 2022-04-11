<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
   /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        try {
            $user = $this->Users->get($id, [
            'contain' => ['People', 'Roles'],
            ]);
        } catch (\Throwable $th) {
            $user = $th->getMessage();
        }
        
        $this->set('user', $user);

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            try {
                $addedUser = $this->Users->save($user);
                $message = (!$addedUser)
                    ? 'The user has been saved.'
                    : 'The user could not be saved. Please, try again.';
            } catch (\Throwable $th) {
                $addedUser = $th->getMessage();
                $message = 'The user could not be saved. Please, try again.';
            }
        }
        $this->set('user', $addedUser);
        $this->set(compact('message'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        try {
            $user = $this->Users->get($id, [
                'contain' => [],
            ]); 
            if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $editedUser = $this->Users->save($user);
            $message = (!$editedUser)
                ? 'The user has been saved.'
                : 'The user could not be saved. Please, try again.';
            }
        } catch (\Throwable $th) {
            $editedUser = $th->getMessage();
            $message = 'The user could not be saved. Please, try again.';
        }
       
        $this->set('user', $editedUser);
        $this->set(compact('message'));
    }

    /**
     * disabledUser method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function disabledUser($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        try {
            $user = $this->Users->get($id);
            $user->active = false;
            $disabledUser = $this->Users->save($user);
            
            $message = (!$disabledUser)
                ? 'The user has been disabled.'
                : 'The user could not be disabled. Please, try again.';

        } catch (\Throwable $th) {
            $user = $th->getMessage();
            $message = 'The user could not be disabled. Please, try again.';
        }

        return $this->redirect(['action' => 'index']); // buscar retornar sin templates
    }
}
