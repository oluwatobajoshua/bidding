<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * HighestEducations Controller
 *
 * @property \App\Model\Table\HighestEducationsTable $HighestEducations
 *
 * @method \App\Model\Entity\HighestEducation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HighestEducationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $highestEducations = $this->paginate($this->HighestEducations);

        $this->set(compact('highestEducations'));
    }

    /**
     * View method
     *
     * @param string|null $id Highest Education id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $highestEducation = $this->HighestEducations->get($id, [
            'contain' => ['Employees']
        ]);

        $this->set('highestEducation', $highestEducation);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $highestEducation = $this->HighestEducations->newEntity();
        if ($this->request->is('post')) {
            $highestEducation = $this->HighestEducations->patchEntity($highestEducation, $this->request->getData());
            if ($this->HighestEducations->save($highestEducation)) {
                $this->Flash->success(__('The {0} has been saved.', 'Highest Education'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Highest Education'));
        }
        $this->set(compact('highestEducation'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Highest Education id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $highestEducation = $this->HighestEducations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $highestEducation = $this->HighestEducations->patchEntity($highestEducation, $this->request->getData());
            if ($this->HighestEducations->save($highestEducation)) {
                $this->Flash->success(__('The {0} has been saved.', 'Highest Education'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Highest Education'));
        }
        $this->set(compact('highestEducation'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Highest Education id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $highestEducation = $this->HighestEducations->get($id);
        if ($this->HighestEducations->delete($highestEducation)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Highest Education'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Highest Education'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
