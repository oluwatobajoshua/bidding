<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ServiceCharge Entity
 *
 * @property int $id
 * @property int $grade_id
 * @property float $amount
 * @property float|null $ileya_xmas_bonus
 * @property float|null $end_of_year_bonus
 * @property float|null $njic_arrears
 * @property int $company_id
 *
 * @property \App\Model\Entity\Grade $grade
 * @property \App\Model\Entity\Company $company
 */
class ServiceCharge extends Entity
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
        'grade_id' => true,
        'amount' => true,
        'ileya_xmas_bonus' => true,
        'end_of_year_bonus' => true,
        'njic_arrears' => true,
        'company_id' => true,
        'grade' => true,
        'company' => true
    ];
}
