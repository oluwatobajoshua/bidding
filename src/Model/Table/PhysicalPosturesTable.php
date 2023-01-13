<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PhysicalPostures Model
 *
 * @property \App\Model\Table\EmployeesTable&\Cake\ORM\Association\HasMany $Employees
 *
 * @method \App\Model\Entity\PhysicalPosture get($primaryKey, $options = [])
 * @method \App\Model\Entity\PhysicalPosture newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PhysicalPosture[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PhysicalPosture|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PhysicalPosture saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PhysicalPosture patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PhysicalPosture[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PhysicalPosture findOrCreate($search, callable $callback = null, $options = [])
 */
class PhysicalPosturesTable extends Table
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

        $this->setTable('physical_postures');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Employees', [
            'foreignKey' => 'physical_posture_id'
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
            ->scalar('name')
            ->maxLength('name', 20)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
