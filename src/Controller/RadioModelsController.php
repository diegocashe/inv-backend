<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\ApiController;


/**
 * RadioModels Controller
 *
 * @property \App\Model\Table\RadioModelsTable $RadioModels
 * @method \App\Model\Entity\RadioModel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RadioModelsController extends ApiController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $body = $this->RadioModels->find('all', [
            'contain' => ['Models', 'RadioBands', 'RadioFrequencys', 'RadioTypes'],
        ]);

        $response = $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($body));
        return $response;
    }

    /**
     * View method
     *
     * @param string|null $id Radio Model id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $radioModel = $this->RadioModels->get($id, [
            'contain' => ['Models', 'RadioBands', 'RadioFrequencys', 'RadioTypes'],
        ]);

        $response = $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($radioModel));
        return $response;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $radioModel = $this->RadioModels->newEmptyEntity();
        if ($this->request->is('post')) {
            $radioModel = $this->RadioModels->patchEntity($radioModel, $this->request->getData());
            if ($this->RadioModels->save($radioModel)) {
                $this->Flash->success(__('The radio model has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The radio model could not be saved. Please, try again.'));
        }
        $models = $this->RadioModels->Models->find('list', ['limit' => 200])->all();
        $radioBands = $this->RadioModels->RadioBands->find('list', ['limit' => 200])->all();
        $radioFrequencys = $this->RadioModels->RadioFrequencys->find('list', ['limit' => 200])->all();
        $radioTypes = $this->RadioModels->RadioTypes->find('list', ['limit' => 200])->all();
        $this->set(compact('radioModel', 'models', 'radioBands', 'radioFrequencys', 'radioTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Radio Model id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $radioModel = $this->RadioModels->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $radioModel = $this->RadioModels->patchEntity($radioModel, $this->request->getData());
            $radioModel = $this->RadioModels->save($radioModel);
            $response = $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($radioModel));
            return $response;
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Radio Model id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $radioModel = $this->RadioModels->get($id);
        if ($this->RadioModels->delete($radioModel)) {
            $this->Flash->success(__('The radio model has been deleted.'));
        } else {
            $this->Flash->error(__('The radio model could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function settings()
    {
        $body = [
            'models' => $this->fetchTable('Models')->find(),
            'radioTypes' => $this->fetchTable('RadioTypes')->find(),
            'radioBands' => $this->fetchTable('RadioBands')->find(),
            'radioFrecuency' => $this->fetchTable('RadioFrequencys')->find()
        ];

        $response = $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($body));
        return $response;
    }
}
