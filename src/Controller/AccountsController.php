<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Accounts Controller
 *
 * @property \App\Model\Table\AccountsTable $Accounts
 *
 * @method \App\Model\Entity\Account[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccountsController extends AppController
{
    public function setpermission(){
        
        $user = $this->Accounts->Users->get($this->Auth->User('id'));
        
        if($user->role_id == 1){
            $this->set('admin','admin');
        }elseif($user->role_id == 3){
            $this->set('cashier','cashier');
        }elseif($user->role_id == 2){
            $this->set('manager','manager');
        }
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function abco($co)
    {
        
        $this->setpermission();
        
        $keyword = '';
        if($this->request->is('post'))
        {
            //delete using id
            $keyword = $this->request->getData('table_search');        
       
        }
        
        $this->paginate = [
            'contain' => ['Users', 'Branches'],
            'limit' => 10,
            'order' => [
            'created' => 'desc']
        ];
        
        $accounts = $this->Accounts->find()->where(['user_id' => $co])->where(['acc_name LIKE'=>'%'.$keyword.'%']);
        
        $accounts = $this->paginate($accounts);
        
        $co = $co;
        
        //$accounts = $this->paginate($this->Accounts->find()->where(['user_id' => $co]));
        $user = $this->Accounts->Users->get($co);
        $this->set(compact('accounts','user','co'));
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->setpermission();
        
        $keyword = '';
        if($this->request->is('post'))
        {
            //delete using id
            $keyword = $this->request->getData('table_search');        
       
        }
        
        $this->paginate = [
            'contain' => ['Users', 'Branches'],
            'limit' => 20,
            'order' => [
            'created' => 'desc']
        ];
        $accounts = $this->paginate($this->Accounts->find()->where(['acc_name LIKE'=>'%'.$keyword.'%']));

        $this->set(compact('accounts'));
    }

    /**
     * View method
     *
     * @param string|null $id Account id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->setpermission();
        
        $account = $this->Accounts->get($id, [
            'contain' => ['Users', 'Branches', 'Transactions']
        ]);
        
        $this->set('account', $account);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($co = null)
    {
        $this->setpermission();
        $account = $this->Accounts->newEntity();
        if ($this->request->is('post')) {
            $account = $this->Accounts->patchEntity($account, $this->request->getData());
            $account->debit = 0.00;
            $account->credit = 0.00;
            $account->balance = 0.00;
            if ($this->Accounts->save($account)) {
                $this->Flash->success(__('The {0} has been saved.', 'Account'));
                return $this->redirect(['action' => 'abco', $co]);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Account'));
        }
        $users = $this->Accounts->Users->find('list')->where(['id' => $co]);
        $user = $this->Accounts->Users->find()->where(['id' => $co])->first();
        $branches = $this->Accounts->Branches->find('list')->where(['id' => $user->branch_id]);
        $this->set(compact('account', 'users', 'branches'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Account id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->setpermission();
        
        $account = $this->Accounts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $account = $this->Accounts->patchEntity($account, $this->request->getData());
            if ($this->Accounts->save($account)) {
                $this->Flash->success(__('The {0} has been saved.', 'Account'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Account'));
        }
        $users = $this->loadModel('Users')->find('list')->where(['id' => $account->user_id]);
        $branches = $this->Accounts->Branches->find('list', ['limit' => 200]);
        $this->set(compact('account', 'users', 'branches'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Account id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->setpermission();
        
        $this->request->allowMethod(['post', 'delete']);
        $account = $this->Accounts->get($id);
        if ($this->Accounts->delete($account)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Account'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Account'));
        }

        return $this->redirect($this->referer());
    }
}
