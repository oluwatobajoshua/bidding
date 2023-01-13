<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transactions Model
 *
 * @property \App\Model\Table\EmployeesTable&\Cake\ORM\Association\BelongsTo $Employees
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\BelongsTo $Companies
 *
 * @method \App\Model\Entity\Transaction get($primaryKey, $options = [])
 * @method \App\Model\Entity\Transaction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Transaction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transaction|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transaction saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Transaction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transaction findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TransactionsTable extends Table
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

        $this->setTable('transactions');
        $this->setDisplayField('particular');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER'
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
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        $validator
            ->numeric('basic_salary')
            ->requirePresence('basic_salary', 'create')
            ->notEmptyString('basic_salary');

        $validator
            ->numeric('domestic_allowance')
            ->allowEmptyString('domestic_allowance');

        $validator
            ->numeric('housing_allowance')
            ->requirePresence('housing_allowance', 'create')
            ->notEmptyString('housing_allowance');

        $validator
            ->numeric('transport_allowance')
            ->requirePresence('transport_allowance', 'create')
            ->notEmptyString('transport_allowance');

        $validator
            ->numeric('utility_allowance')
            ->requirePresence('utility_allowance', 'create')
            ->notEmptyString('utility_allowance');

        $validator
            ->numeric('living_in_allowance')
            ->allowEmptyString('living_in_allowance');

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
            ->numeric('WHL_CISC')
            ->allowEmptyString('WHL_CISC');

        $validator
            ->numeric('pension_deduction')
            ->notEmptyString('pension_deduction');

        $validator
            ->numeric('other_deduction')
            ->allowEmptyString('other_deduction');

        $validator
            ->numeric('salary_advance')
            ->allowEmptyString('salary_advance');

        $validator
            ->numeric('drivers_allowance')
            ->allowEmptyString('drivers_allowance');

        $validator
            ->numeric('leave_allowance')
            ->allowEmptyString('leave_allowance');

        $validator
            ->numeric('bar_account')
            ->allowEmptyString('bar_account');

        $validator
            ->numeric('union_due')
            ->allowEmptyString('union_due');

        $validator
            ->numeric('arrears')
            ->allowEmptyString('arrears');
        
        $validator
            ->numeric('paye')
            ->requirePresence('paye', 'create')
            ->notEmptyString('paye');

        $validator
            ->numeric('ileya_xmas_bonus')
            ->allowEmptyString('ileya_xmas_bonus');

        $validator
            ->numeric('end_of_year_bonus')
            ->allowEmptyString('end_of_year_bonus');

        $validator
            ->numeric('service_charge')
            ->allowEmptyString('service_charge');

        $validator
            ->numeric('personal_loan')
            ->allowEmptyString('personal_loan');

        $validator
            ->numeric('BRO_CICS')
            ->allowEmptyString('BRO_CICS');

        $validator
            ->numeric('surcharge')
            ->allowEmptyString('surcharge');

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
        $rules->add($rules->existsIn(['employee_id'], 'Employees'));
        $rules->add($rules->existsIn(['company_id'], 'Companies'));
        
        $rules->add($rules->isUnique(
            ['date', 'employee_id'],
            'Transaction for this month has already been processed.'
        ));

        return $rules;
    }
}
