<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property int $company_id
 * @property \Cake\I18n\FrozenDate $date
 * @property float $basic_salary
 * @property float|null $domestic_allowance
 * @property float $housing_allowance
 * @property float $transport_allowance
 * @property float $utility_allowance
 * @property float|null $living_in_allowance
 * @property float|null $medical_allowance
 * @property float|null $entertainment_allowance
 * @property float|null $other_allowance
 * @property float|null $WHL_CISC
 * @property float $pension_deduction
 * @property float|null $other_deduction
 * @property float|null $salary_advance
 * @property float|null $drivers_allowance
 * @property float|null $bar_account
 * @property float|null $union_due
 * @property float $tax_amount
 * @property float|null $arrears
 * @property float|null $sc_deduction
 * @property float|null $ileya_xmas_bonus
 * @property float|null $end_of_year_bonus
 * @property float|null $service_charge
 * @property float|null $personal_loan
 * @property float|null $BRO_HCICS
 * @property float|null $surcharge
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Company $company
 */
class Transaction extends Entity
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
        'company_id' => true,
        'date' => true,
        'basic_salary' => true,
        'domestic_allowance' => true,
        'housing_allowance' => true,
        'transport_allowance' => true,
        'utility_allowance' => true,
        'living_in_allowance' => true,
        'medical_allowance' => true,
        'entertainment_allowance' => true,
        'other_allowance' => true,
        'WHL_CISC' => true,
        'pension_deduction' => true,
        'other_deduction' => true,
        'salary_advance' => true,
        'drivers_allowance' => true,
        'leave_allowance' => true,
        'bar_account' => true,
        'union_due' => true,
        'tax_amount' => true,
        'paye' => true,
        'arrears' => true,
        'sc_deduction' => true,
        'ileya_xmas_bonus' => true,
        'end_of_year_bonus' => true,
        'service_charge' => true,
        'personal_loan' => true,
        'BRO_HCICS' => true,
        'surcharge' => true,
        'created' => true,
        'modified' => true,
        'employee' => true,
        'company' => true
    ];
}
