<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\I18n\Date;


/**
 * Reports Controller
 *
 * @property \App\Model\Table\ReportsTable $Reports
 *
 * @method \App\Model\Entity\Report[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReportsController extends AppController
{
    
    /**
     * payrollRegister method
     *
     * @return \Cake\Http\Response|null
     */
    public function payrollRegister()
    {
        $this->loadModel('Departments');
        $this->loadModel('Companies');
        $this->loadModel('Cadres');

        $dlist  = $this->Departments->find();

        $department_id = 1; 

        if($this->request->is('post')  &&  $this->request->getData('id'))
        {
            //get using id
            $department_id = $this->request->getData('id');  
            debug($department_id);
            $dlist  = $this->Departments->find()->where(['Departments.id' => $department_id]);


        }

        if($this->request->is('post')  &&  $this->request->getData('cadres'))
        {
            //get using id
            $cadre_id = $this->request->getData('cadres');  
            $dlist = $dlist->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $company = $this->Companies->get(1);
                        $cadre = $this->request->getData('cadres');
                        return $q->order(['Employees.staff_no' => 'ASC'])->where(['Employees.cadre_id' => $cadre])
                        ->contain(['Transactions'=>[
                        'strategy' => 'subquery',
                        'queryBuilder' => function ($q) {
                            $company = $this->Companies->get(1);
                            return $q->where(['Transactions.date' => new Time($company->date)])
                            ->contain('Employees.Grades');                    
                        }]]);                                        
                    }
                ]
            ]);

        }

        $departments = $dlist->contain([
            'Employees' => [
                'strategy' => 'subquery',
                'queryBuilder' => function ($q) {
                    $company = $this->Companies->get(1);
                    return $q->order(['Employees.staff_no' => 'ASC'])
                    ->contain(['Transactions'=>[
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $company = $this->Companies->get(1);
                        return $q->where(['Transactions.date' => new Time($company->date)])
                        ->contain('Employees.Grades');                    
                    }]]);                                        
                }
            ]
        ]);

        $company = $this->Companies->get(1);

        $depts = $this->Departments->find('list', ['limit' => 200]);
        $cadres = $this->Cadres->find('list', ['limit' => 200]);

        $this->set(compact('departments','company','depts','cadres'));
    }


    /**
     * payrollRegister method
     *
     * @return \Cake\Http\Response|null
     */
    public function endOfYearBonus()
    {
        $this->loadModel('Companies');
        $this->loadModel('Departments');

        $departments = $this->Departments->find()->contain([
            'Employees' => [
                'strategy' => 'subquery',
                'queryBuilder' => function ($q) {
                    return $q->order(['Employees.staff_no' => 'ASC'])
                    ->contain(['Transactions'=>[
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $company = $this->Companies->get(1);
                        return $q->where(['Transactions.date' => new Time($company->date)])
                        ->contain('Employees.Grades');
                    
                        }]
                    ])
                    ->contain('Banks');                                        
                }
            ]
        ]);

        $company = $this->Companies->get(1);

        $this->set(compact('departments','company'));
    }


    /**
     * payrollRegister method
     *
     * @return \Cake\Http\Response|null
     */
    public function employeePayAdvice()
    {
        $this->loadModel('Departments');
        $this->loadModel('Companies');
        $this->loadModel('Employees');

        $gpa = 1;

        $spa = 1;

        $dlist  = $this->Departments->find();

        $department_id; 

        if($this->request->is('post')  &&  $this->request->getData('department'))
        {
            //get using id
            $department_id = $this->request->getData('department'); 
            
            //get general pay advice checkbox value
            $gpa = $this->request->getData('gpa'); 

            //get service charge checkbox value
            $spa = $this->request->getData('spa'); 
            
            $dlist  = $this->Departments->find()->where(['Departments.id' => $department_id]);
        }
        if($this->request->is('post')  &&  $this->request->getData('employee'))
        {
            //get using id
            $department_id = 0; 

            //get general pay advice checkbox value
            $gpa = $this->request->getData('gpa'); 

            //get service charge checkbox value
            $spa = $this->request->getData('spa'); 

            $dlist  = $this->Departments->find()->contain([
                'Employees' => [
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $employee_id = $this->request->getData('employee');              
                        $emp = $this->Employees->get($employee_id);
                        return $q->where(['Employees.id' => $emp->id]);                                                                                   
                    }]
            ]);
            //debug($employee_id);
        }

        $departments = $dlist->contain([
            'Employees' => [
                'strategy' => 'subquery',
                'queryBuilder' => function ($q) {
                    $company = $this->Companies->get(1);
                    return $q->order(['Employees.staff_no' => 'ASC'])
                    ->contain(['Transactions'=>[
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $company = $this->Companies->get(1);
                        return $q->where(['Transactions.date' => new Time($company->date)])
                        ->contain('Employees.Grades')
                        ->contain('Employees.Cadres')
                        ->contain('Employees.Banks');                    
                    }]]);                                        
                }
            ]
        ]);

        $company = $this->Companies->get(1);
        $depts = $this->Departments->find('list', ['limit' => 200]);
        $employees = $this->Employees->find('list')
        ->contain(['Transactions'=>[
            'strategy' => 'subquery',
            'queryBuilder' => function ($q) {
                $company = $this->Companies->get(1);
                return $q->where(['Transactions.date' => new Time($company->date)]);                    
            }]]);
        $this->set(compact('departments','company','depts','employees','gpa','spa'));
    }

    /**
     * bankLetter method
     *
     * @return \Cake\Http\Response|null
     */
    public function bankLetter()
    {
        $this->loadModel('Companies');
        $this->loadModel('Banks');

        $banks  = $this->Banks->find();

        $bank_id = 1; 

        if($this->request->is('post')  &&  $this->request->getData('bank'))
        {
            //get using id
            $bank_id = $this->request->getData('bank');  
            $banks  = $this->Banks->find()->where(['Banks.id' => $bank_id]);
        }

        $company = $this->Companies->get(1,[
            'contain' => ['Employees']]);

        $bankList = $this->Banks->find('list', ['limit' => 200]);

        $this->set(compact('banks','company','bankList'));
    }

    /**
     * staff-List method
     *
     * @return \Cake\Http\Response|null
     */
    public function staffList()
    {
        $this->loadModel('Companies');
        $this->loadModel('Banks');

        $bank  = $this->Banks->find();

        $bank_id; 

        if($this->request->is('post')  &&  $this->request->getData('bank'))
        {
            //get using id
            $bank_id = $this->request->getData('bank');  
            $bank  = $this->Banks->find()->where(['Banks.id' => $bank_id]);
        }

        $banks = $bank->contain([
            'Employees' => [
                'strategy' => 'subquery',
                'queryBuilder' => function ($q) {
                    $company = $this->Companies->get(1);
                    return $q->order(['Employees.staff_no' => 'ASC'])
                    ->contain(['Transactions'=>[
                    'strategy' => 'subquery',
                    'queryBuilder' => function ($q) {
                        $company = $this->Companies->get(1);
                        return $q->where(['Transactions.date' => new Time($company->date)])
                        ->contain('Employees.Grades');                    
                    }]]);                                        
                }
            ]
        ]);

        $company = $this->Companies->get(1);

        $bankList = $this->Banks->find('list', ['limit' => 200]);

        $this->set(compact('banks','company','bankList'));
    }

    /**
     * staffListIleyaXmasBonus
     *
     * @return \Cake\Http\Response|null
     */
    public function staffListIleyaXmas()
    {
        //using the same function as staff list but different template
        return $this->staffList();

    }


    /**
     * staffListEndOfYearBonus
     *
     * @return \Cake\Http\Response|null
     */
    public function staffListBonus()
    {
        //using the same function as staff list but different template
        return $this->staffList();

    }


    /**
     * staffListEndOfYearBonus
     *
     * @return \Cake\Http\Response|null
     */
    public function cashPayment()
    {
        //using the same function as staff list but different template
        return $this->endOfYearBonus();

    }
    

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->loadModel('Transactions');

        $reports = $this->paginate($this->Transactions);
        debug($reports);

        $this->set(compact('reports'));
    }

    /**
     * View method
     *
     * @param string|null $id Report id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $report = $this->Reports->get($id, [
            'contain' => []
        ]);

        $this->set('report', $report);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $report = $this->Reports->newEntity();
        if ($this->request->is('post')) {
            $report = $this->Reports->patchEntity($report, $this->request->getData());
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The {0} has been saved.', 'Report'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Report'));
        }
        $this->set(compact('report'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Report id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $report = $this->Reports->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $report = $this->Reports->patchEntity($report, $this->request->getData());
            if ($this->Reports->save($report)) {
                $this->Flash->success(__('The {0} has been saved.', 'Report'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Report'));
        }
        $this->set(compact('report'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Report id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $report = $this->Reports->get($id);
        if ($this->Reports->delete($report)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Report'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Report'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
