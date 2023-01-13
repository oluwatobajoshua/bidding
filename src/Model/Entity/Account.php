<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Account Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $branch_id
 * @property int|null $transactions_count
 * @property string $acc_name
 * @property float $credit
 * @property float $debit
 * @property float $balance
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Branch $branch
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class Account extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'branch_id' => true,
        'transactions_count' => true,
        'acc_name' => true,
        'credit' => true,
        'debit' => true,
        'balance' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'branch' => true,
        'transactions' => true
    ];
    
    
    // full_name virtual field
    protected function _getNewName()
    {
        return $this->_properties['acc_name'] . ' ' . $this->_properties['branch_id'];
    }
    
    protected function _getTotalCredit()
    {
        return $this->_properties['acc_name'] . ' ' . $this->_properties['branch_id'];
    }
}
