<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MaritalStatuses Controller
 *
 * @property \App\Model\Table\MaritalStatusesTable $MaritalStatuses
 *
 * @method \App\Model\Entity\MaritalStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MaritalStatusesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $maritalStatuses = $this->paginate($this->MaritalStatuses);

        $this->set(compact('maritalStatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Marital Status id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $maritalStatus = $this->MaritalStatuses->get($id, [
            'contain' => ['Employees']
        ]);

        $this->set('maritalStatus', $maritalStatus);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $maritalStatus = $this->MaritalStatuses->newEntity();
        if ($this->request->is('post')) {
            $maritalStatus = $this->MaritalStatuses->patchEntity($maritalStatus, $this->request->getData());
            if ($this->MaritalStatuses->save($maritalStatus)) {
                $this->Flash->success(__('The {0} has been saved.', 'Marital Status'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Marital Status'));
        }
        $this->set(compact('maritalStatus'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Marital Status id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $maritalStatus = $this->MaritalStatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $maritalStatus = $this->MaritalStatuses->patchEntity($maritalStatus, $this->request->getData());
            if ($this->MaritalStatuses->save($maritalStatus)) {
                $this->Flash->success(__('The {0} has been saved.', 'Marital Status'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Marital Status'));
        }
        $this->set(compact('maritalStatus'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Marital Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $maritalStatus = $this->MaritalStatuses->get($id);
        if ($this->MaritalStatuses->delete($maritalStatus)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Marital Status'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Marital Status'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
