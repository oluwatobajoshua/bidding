<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Company Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $rc
 * @property string $address
 * @property \Cake\I18n\FrozenDate $date
 * @property float|null $union_due
 * @property int|null $employees_id
 * @property float|null $company_leave
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\ServiceCharge[] $service_charges
 */
class Company extends Entity
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
        'name' => true,
        'rc' => true,
        'address' => true,
        'date' => true,
        'union_due' => true,
        'employees_id' => true,
        'company_leave' => true,
        'employee' => true,
        'service_charges' => true
    ];
}
