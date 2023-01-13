<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher; // Add this line

/**
 * User Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property string $username
 * @property string $password
 * @property string $raw_password
 * @property string $quest_one
 * @property string $ans_one
 * @property string $quest_two
 * @property string $ans_two
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Grade[] $grades
 * @property \App\Model\Entity\Profile[] $profiles
 */
class User extends Entity
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
        'employee_id' => true,
        'username' => true,
        'password' => true,
        'raw_password' => true,
        'quest_one' => true,
        'ans_one' => true,
        'quest_two' => true,
        'ans_two' => true,
        'created' => true,
        'modified' => true,
        'employee' => true,
        'grades' => true,
        'profiles' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
        'raw_password'
    ];

    // Add this method
    protected function _setPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }

    protected function _setRawPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }
}
