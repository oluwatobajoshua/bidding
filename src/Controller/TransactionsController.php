<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Date;

/**
 * Transactions Controller
 *
 * @property \App\Model\Table\TransactionsTable $Transactions
 *
 * @method \App\Model\Entity\Transaction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransactionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

        $transactions = $this->Transactions;
        $keyword = '';
        $staff_no = '';
        if($this->request->is('post'))
        {
            //delete using id
            $keyword = $this->request->getData('staff_no'); 
            
            if(!empty($keyword) && is_numeric($keyword)){
                //using find matching to get the transaction by staff no
                $trans= $this->Transactions->find()->matching('Employees', function ($q) { 
                    $keyword = $this->request->getData('staff_no'); 
                    return $q->where(['Employees.staff_no' => $keyword]); });
                //debug($trans);
                if($trans->count()>0){
                    $transactions = $trans; 
                }else{
                    $this->Flash->error(__('There is no employee with staff no {0} ',$keyword));
                }
            }else{
                if(!empty($keyword) && is_string($keyword)){
                    debug('string');
                    $trans= $this->Transactions->find()->matching('Employees', function ($q) { 
                        $keyword = $this->request->getData('staff_no'); 
                        return $q->where(['Employees.first_name LIKE'=> '%'.$keyword.'%']); });
                    if($trans->count()>0){
                        $transactions = $trans; 
                    }elseif($trans= $this->Transactions->find()->matching('Employees', function ($q) { 
                        $keyword = $this->request->getData('staff_no'); 
                        return $q->where(['Employees.last_name LIKE'=> '%'.$keyword.'%']); })){
                        if($trans->count()>0){
                            $transactions = $trans; 
                        }else{
                            $this->Flash->error(__('There is no employee with first or last name {0} ',$keyword));
                        }                        
                    }
                }
            }
        }

        $this->paginate = [
            'contain' => ['Employees','Companies'],
            'limit' => 10
        ];
        $transactions = $this->paginate($transactions);

        $this->set(compact('transactions'));
    }

    /**
     * View method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transaction = $this->Transactions->get($id, [
            'contain' => ['Employees', 'Companies']
        ]);

        $this->set('transaction', $transaction);
    }


     /**
     * New Month
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function newMonth()
    {
        $this->request->allowMethod(['post', 'delete']);
        
        

        $transactions = [];
        
        $employees = $this->Transactions->Employees->find('all')->contain(['Cadres','Departments']);

        foreach($employees as $employeed){
            //process the values
            $transaction = $this->Transactions->newEntity();

            $cadre = $employeed->cadre->name;
            $company = $this->Transactions->Companies->find()->first();

            $transaction->employee_id = $employeed->id;
            $transaction->company_id = $company->id;
            $transaction->department_id = $employeed->department->id;
            $transaction->date = new Date($company->date);
            $transaction->basic_salary = round(($employeed->salary/12),2);
            /*
            'WHL_CISC' => true,
            'pension_deduction' => true,
            'other_deduction' => true,
            'salary_advance' => true,
            'drivers_allowance' => true,
            'leave_allowance' => true,
            'bar_account' => true,
            'arrears' => true,
            'sc_deduction' => true,
            'ileya_xmas_bonus' => true,
            'end_of_year_bonus' => true,
            'service_charge' => true,
            'personal_loan' => true,
            'BRO_HCICS' => true,
            'surcharge' => true, */
        
            if($cadre == 'JUNIOR STAFF' || 'SENIOR STAFF'){
                $pension = $employeed->salary+$employeed->housing_allowance+$employeed->transport_allowance;
                $transaction->pension_deduction = round((($pension/12)*0.08),2);
                $transaction->paye  = round(($transaction->basic_salary * 0.1),2);  
                $transaction->union_due = round(($transaction->basic_salary) * 0.05,2);
                $transaction->transport_allowance = round($employeed->transport_allowance/12,2); 
                $transaction->housing_allowance = round($employeed->housing_allowance/12,2);
                $transaction->utility_allowance =  round($employeed->utility_allowance/12,2);
                $transaction->entertainment_allowance = round($employeed->entertainment_allowance/12,2);
                $transaction->medical_allowance = round($employeed->medical_allowance/12,2); 
                $transaction->other_allowance =  round($employeed->other_allowance/12,2);
              }else{
                $transaction->pension_deduction = 0.00;
                $transaction->union_due = 0.00;
                $transaction->paye  = round(($transaction->basic_salary * 0.05),2); 
              }
            
            $transaction->personal_loan = round($employeed->personal_loan_rep,2);            

            $transaction->gross =   $transaction->basic_salary + $transaction->transport_allowance + + $transaction->leave_allowance + 
                                    $transaction->housing_allowance + $transaction->utility_allowance + $transaction->entertainment_allowance + 
                                    $transaction->medical_allowance + $transaction->arrears + $transaction->other_allowance;
            
            $transaction->total_deduction      =  $transaction->paye + $transaction->personal_loan + $transaction->BRO_CICS + 
                                                  $transaction->salary_advance + $transaction->surcharge + $transaction->union_due + 
                                                  $transaction->pension_deduction + $transaction->bar_account + $transaction->other_deduction;

            $transaction->net_pay              =  $transaction->gross - $transaction->total_deduction;

           // debug($transaction);
           
            if ($this->Transactions->save($transaction)) {
                //$this->Flash->success(__('The {0} has been saved, please select another employee from the list or click Home to view transactions list.', $employeed->name_desc));
            }else{
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', $employeed->name_desc));
                $this->redirect(['action'=>'index']);
            }
            
        }
        $this->Flash->success(__('New months created successfully'));
        $this->redirect(['action'=>'index']);

        $this->autoRender = false;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($employeeid)
    {
        $employees = $this->Transactions->Employees->find('list', ['limit' => 200]);
        $employee = $this->Transactions->Employees->find('list')->where(['id' => $employeeid]);
        $employeed = $this->Transactions->Employees->get($employeeid,['contain'=>'Cadres']);
        $companies = $this->Transactions->Companies->find('list', ['limit' => 200]);
        $company = $this->Transactions->Companies->find()->first();
        $department = $this->Transactions->Employees->Departments->get($employeed->department_id);
        $dept = $employeed->cadre->name;
        $transaction = $this->Transactions->newEntity();
        if ($this->request->is('post') && $this->request->getData('basic_salary')) {
            $transaction = $this->Transactions->patchEntity($transaction, $this->request->getData());
            debug($transaction);
            $transaction->gross =   $transaction->basic_salary + $transaction->transport_allowance + 
                                    $transaction->housing_allowance + $transaction->utility_allowance + $transaction->entertainment_allowance + 
                                    $transaction->medical_allowance + $transaction->arrears + $transaction->other_allowance;
            
            $transaction->total_deduction      =  $transaction->paye + $transaction->personal_loan + $transaction->BRO_CICS + 
                                                  $transaction->salary_advance + $transaction->surcharge + $transaction->union_due + 
                                                  $transaction->pension_deduction + $transaction->bar_account + $transaction->other_deduction;
            $transaction->net_pay              =  $transaction->gross - $transaction->total_deduction;

            if ($this->Transactions->save($transaction)) {
                $this->Flash->success(__('The {0} has been saved, please select another employee from the list or click Home to view transactions list.', 'Transaction'));
                //return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Transaction'));
            }           
        }        

        if($this->request->is('post')  &&  $this->request->getData('id'))
        {
            //get using id
            $employeeid = $this->request->getData('id');  
            $employee = $this->Transactions->Employees->find('list')->where(['id' => $employeeid]);   
            $employeed = $this->Transactions->Employees->get($employeeid,['contain'=>'Cadres']);
            $department = $this->Transactions->Employees->Departments->get($employeed->department_id);
            $dept = $employeed->cadre->name;
        }
        
        if($this->request->is('post')  &&  $this->request->getData('staff_no'))
        {
            //get using id
            $staff_no = $this->request->getData('staff_no'); 
            $emp = $this->Transactions->Employees->find('list')->where(['staff_no'=>$staff_no]); 
            if($emp->count() > 0){
                $employee = $emp;
                $employeed = $this->Transactions->Employees->find('all')->contain('Cadres')->where(['staff_no'=>$staff_no ])->first(); 
                $dept = $employeed->cadre->name;
            }else{
                $this->Flash->error(__('There is no employee with staff no {0} ',$staff_no));
            }                
        }
        
        $this->set(compact('transaction','employees','companies','company','employee','employeed','dept'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transaction = $this->Transactions->get($id, [
            'contain' => ['Employees','Companies']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transaction = $this->Transactions->patchEntity($transaction, $this->request->getData());

            $transaction->gross =   $transaction->basic_salary + $transaction->transport_allowance + 
                                    $transaction->housing_allowance + $transaction->utility_allowance + $transaction->leave_allowance+ $transaction->entertainment_allowance + 
                                    $transaction->medical_allowance + $transaction->arrears + $transaction->other_allowance;
            
            $transaction->total_deduction      =  $transaction->paye + $transaction->personal_loan + $transaction->BRO_CICS + 
                                                  $transaction->salary_advance + $transaction->surcharge + $transaction->union_due + 
                                                  $transaction->pension_deduction + $transaction->bar_account + $transaction->other_deduction;
            $transaction->net_pay              =  $transaction->gross - $transaction->total_deduction;

            if ($this->Transactions->save($transaction)) {
                $this->Flash->success(__('The {0} has been saved.', 'Transaction'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Transaction'));
        }
        $employee = $this->Transactions->Employees->find('list')->where(['id' => $transaction->employee_id]);
        $companies = $this->Transactions->Companies->find('list')->where(['id' => $transaction->company_id]);
        $this->set(compact('transaction', 'employee', 'companies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transaction id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transaction = $this->Transactions->get($id);
        if ($this->Transactions->delete($transaction)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Transaction'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Transaction'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
