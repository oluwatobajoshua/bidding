<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Employees Model
 *
 * @property \App\Model\Table\BanksTable&\Cake\ORM\Association\BelongsTo $Banks
 * @property \App\Model\Table\DepartmentsTable&\Cake\ORM\Association\BelongsTo $Departments
 * @property \App\Model\Table\GradesTable&\Cake\ORM\Association\BelongsTo $Grades
 * @property \App\Model\Table\DesignationsTable&\Cake\ORM\Association\BelongsTo $Designations
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\BelongsTo $Statuses
 * @property \App\Model\Table\CadresTable&\Cake\ORM\Association\BelongsTo $Cadres
 * @property \App\Model\Table\TransactionsTable&\Cake\ORM\Association\HasMany $Transactions
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Employee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Employee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Employee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Employee|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Employee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Employee findOrCreate($search, callable $callback = null, $options = [])
 */
class EmployeesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('employees');
        $this->setDisplayField('name_desc');
        $this->setPrimaryKey('id');

        $this->belongsTo('Banks', [
            'foreignKey' => 'bank_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ServiceCharges', [
            'className' => 'Banks',
            'foreignKey' => 'service_charge_bank',
            'joinType' => 'INNER'
        ]);        
        $this->belongsTo('Departments', [
            'foreignKey' => 'department_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Grades', [
            'foreignKey' => 'grade_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Designations', [
            'foreignKey' => 'designation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Branches', [
            'foreignKey' => 'branch_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Cadres', [
            'foreignKey' => 'cadre_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Transactions', [
            'foreignKey' => 'employee_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'employee_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('staff_no')
            ->requirePresence('staff_no', 'create')
            ->notEmptyString('staff_no');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->numeric('salary')
            ->requirePresence('salary', 'create')
            ->notEmptyString('salary');

        $validator
            ->scalar('acct_no')
            ->maxLength('acct_no', 10)
            ->requirePresence('acct_no', 'create')
            ->notEmptyString('acct_no');

        $validator
            ->scalar('service_charge_number')
            ->maxLength('service_charge_number', 10)
            ->requirePresence('service_charge_number', 'create')
            ->notEmptyString('service_charge_number');

        $validator
            ->integer('service_charge_bank')
            ->requirePresence('service_charge_bank', 'create')
            ->notEmptyString('service_charge_bank');

        $validator
            ->numeric('housing_allowance')
            ->allowEmptyString('housing_allowance');

        $validator
            ->scalar('housing_upfront')
            ->maxLength('housing_upfront', 1)
            ->allowEmptyString('housing_upfront');

        $validator
            ->numeric('utility_allowance')
            ->allowEmptyString('utility_allowance');

        $validator
            ->numeric('transport_allowance')
            ->allowEmptyString('transport_allowance');

        $validator
            ->numeric('domestic_allowance')
            ->allowEmptyString('domestic_allowance');

        $validator
            ->scalar('tax_number')
            ->maxLength('tax_number', 20)
            ->allowEmptyString('tax_number');

        $validator
            ->numeric('tax_relief')
            ->allowEmptyString('tax_relief');

        $validator
            ->numeric('tax_paid_to_date')
            ->allowEmptyString('tax_paid_to_date');

        $validator
            ->scalar('pension_no')
            ->maxLength('pension_no', 15)
            ->allowEmptyString('pension_no');

        $validator
            ->numeric('medical_allowance')
            ->allowEmptyString('medical_allowance');

        $validator
            ->numeric('entertainment_allowance')
            ->allowEmptyString('entertainment_allowance');

        $validator
            ->numeric('other_allowance')
            ->allowEmptyString('other_allowance');

        $validator
            ->numeric('personal_loan')
            ->allowEmptyString('personal_loan');

        $validator
            ->numeric('pers_loan_rep')
            ->allowEmptyString('pers_loan_rep');

        $validator
            ->numeric('pers_loan_paid')
            ->allowEmptyString('pers_loan_paid');

        $validator
            ->integer('pers_loan_inst')
            ->allowEmptyString('pers_loan_inst');

        $validator
            ->numeric('car_loan')
            ->allowEmptyString('car_loan');

        $validator
            ->numeric('car_loan_rep')
            ->allowEmptyString('car_loan_rep');

        $validator
            ->integer('car_loan_inst')
            ->allowEmptyString('car_loan_inst');

        $validator
            ->numeric('car_loan_paid')
            ->allowEmptyString('car_loan_paid');

        $validator
            ->numeric('whl_cics')
            ->allowEmptyString('whl_cics');

        $validator
            ->numeric('pension_control')
            ->allowEmptyString('pension_control');

        $validator
            ->numeric('salary_advance')
            ->allowEmptyString('salary_advance');

        $validator
            ->numeric('salary_advance_rep')
            ->allowEmptyString('salary_advance_rep');

        $validator
            ->numeric('salary_advance_paid')
            ->allowEmptyString('salary_advance_paid');

        $validator
            ->integer('salary_advance_inst')
            ->allowEmptyString('salary_advance_inst');

        $validator
            ->numeric('drivers_allowance')
            ->allowEmptyString('drivers_allowance');

        $validator
            ->numeric('bro_HCICS')
            ->allowEmptyString('bro_HCICS');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['bank_id'], 'Banks'));
        $rules->add($rules->existsIn(['department_id'], 'Departments'));
        $rules->add($rules->existsIn(['grade_id'], 'Grades'));
        $rules->add($rules->existsIn(['designation_id'], 'Designations'));
        $rules->add($rules->existsIn(['status_id'], 'Statuses'));
        $rules->add($rules->existsIn(['cadre_id'], 'Cadres'));
        $rules->add($rules->existsIn(['branch_id'], 'Branches'));

        $rules->add($rules->isUnique(
            ['staff_no'],
            'This staff No has already been used.'
        ));

        

        return $rules;
    }
}
