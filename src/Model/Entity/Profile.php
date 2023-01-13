<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Profile Entity
 *
 * @property int $id
 * @property string $last_name
 * @property string $first_name
 * @property \Cake\I18n\FrozenDate $dob
 * @property string $phone
 * @property string $address
 * @property string $passport
 * @property string $sign
 * @property int $status_id
 * @property int $account_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Account $account
 * @property \App\Model\Entity\User $user
 */
class Profile extends Entity
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
        'last_name' => true,
        'first_name' => true,
        'dob' => true,
        'phone' => true,
        'address' => true,
        'passport' => true,
        'sign' => true,
        'status_id' => true,
        'account_id' => true,
        'user_id' => true,
        'status' => true,
        'account' => true,
        'user' => true
    ];
}
