<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 *
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $employees = $this->Employees;
        $keyword = '';
        $staff_no = '';
        if($this->request->is('post'))
        {
            //delete using id
            $keyword = $this->request->getData('staff_no'); 
            if(!empty($keyword) && is_numeric($keyword)){
                $emp= $this->Employees->find()->where(['staff_no'=> $keyword]);
                if($emp->count()>0){
                    $employees = $emp; 
                }else{
                    $this->Flash->error(__('There is no employee with staff no {0} ',$keyword));
                }
            }else{
                if(!empty($keyword) && is_string($keyword)){
                    $emp= $this->Employees->find()->where(['Employees.first_name LIKE'=> '%'.$keyword.'%']);
                    if($emp->count()>0){
                        $employees = $emp; 
                    }elseif($emp= $this->Employees->find()->where(['Employees.last_name LIKE'=> '%'.$keyword.'%'])){
                        if($emp->count()>0){
                            $employees = $emp; 
                        }else{
                            $this->Flash->error(__('There is no employee with first or last name {0} ',$keyword));
                        }                        
                    }
                }
            }
        }
        
        $this->paginate = [
            'contain' => ['Banks','ServiceCharges', 'Departments', 'Grades', 'Designations', 'Statuses', 'Cadres'],
            'limit' => 10,
            'order' => [
                'id' => 'asc'
            ],
            'sortWhitelist' => [
                'id', 'first_name','last_name', 'Departments.id', 'staff_no','Grades.name'
            ]
        ];
        
        
        $employees = $this->paginate($employees);
                
        $this->set(compact('employees'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['Banks','ServiceCharges','Departments', 'Grades', 'Designations', 'Statuses', 'Cadres', 'Transactions', 'Users']
        ]);

        if($this->request->is('post') &&  $this->request->getData('id'))
        {
            //delete using id
            $id = $this->request->getData('id');  
            
            $employee = $this->Employees->get($id, [
                'contain' => ['Banks','ServiceCharges','Departments', 'Grades', 'Designations', 'Statuses', 'Cadres', 'Transactions', 'Users']
            ]);
        }
        
        $employees = $this->Employees->find('list', ['limit' => 200]);
        $this->set('employee', $employee);
        $this->set('employees', $employees);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employee = $this->Employees->newEntity();
        if ($this->request->is('post')) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $banks = $this->Employees->Banks->find('list', ['limit' => 200]);
        $serviceCharges = $this->Employees->ServiceCharges->find('list', ['limit' => 200]);
        $departments = $this->Employees->Departments->find('list', ['limit' => 200]);
        $grades = $this->Employees->Grades->find('list', ['limit' => 200]);
        $designations = $this->Employees->Designations->find('list', ['limit' => 200]);
        $branches = $this->Employees->Branches->find('list', ['limit' => 200]);
        $statuses = $this->Employees->Statuses->find('list', ['limit' => 200]);
        $cadres = $this->Employees->Cadres->find('list', ['limit' => 200]);
        $this->set(compact('branches','employee', 'banks','serviceCharges', 'departments', 'grades', 'designations', 'statuses', 'cadres'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $banks = $this->Employees->Banks->find('list', ['limit' => 200]);
        $serviceCharges = $this->Employees->ServiceCharges->find('list', ['limit' => 200]);
        $departments = $this->Employees->Departments->find('list', ['limit' => 200]);
        $grades = $this->Employees->Grades->find('list', ['limit' => 200]);
        $designations = $this->Employees->Designations->find('list', ['limit' => 200]);
        $branches = $this->Employees->Branches->find('list', ['limit' => 200]);
        $statuses = $this->Employees->Statuses->find('list', ['limit' => 200]);
        $cadres = $this->Employees->Cadres->find('list', ['limit' => 200]);
        $this->set(compact('employee', 'banks','serviceCharges', 'departments', 'grades', 'designations', 'statuses', 'cadres','branches'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
