<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $id
 * @property int $staff_no
 * @property string $first_name
 * @property string $last_name
 * @property float $salary
 * @property int $bank_id
 * @property string $acct_no
 * @property string $service_charge_number
 * @property int $service_charge_bank
 * @property int $department_id
 * @property int $grade_id
 * @property float|null $housing_allowance
 * @property string|null $housing_upfront
 * @property int $designation_id
 * @property int $status_id
 * @property int $cadre_id
 * @property float|null $utility_allowance
 * @property float|null $transport_allowance
 * @property float|null $domestic_allowance
 * @property string|null $tax_number
 * @property float|null $tax_relief
 * @property float|null $tax_paid_to_date
 * @property string|null $pension_no
 * @property float|null $medical_allowance
 * @property float|null $entertainment_allowance
 * @property float|null $other_allowance
 * @property float|null $personal_loan
 * @property float|null $pers_loan_rep
 * @property float|null $pers_loan_paid
 * @property int|null $pers_loan_inst
 * @property float|null $car_loan
 * @property float|null $car_loan_rep
 * @property int|null $car_loan_inst
 * @property float|null $car_loan_paid
 * @property float|null $whl_cics
 * @property float|null $pension_control
 * @property float|null $salary_advance
 * @property float|null $salary_advance_rep
 * @property float|null $salary_advance_paid
 * @property int|null $salary_advance_inst
 * @property float|null $drivers_allowance
 * @property float|null $bro_HCICS
 *
 * @property \App\Model\Entity\Bank $bank
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Grade $grade
 * @property \App\Model\Entity\Designation $designation
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Cadre $cadre
 * @property \App\Model\Entity\Transaction[] $transactions
 * @property \App\Model\Entity\Transactions1[] $transactions1
 * @property \App\Model\Entity\User[] $users
 */
class Employee extends Entity
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
        'staff_no' => true,
        'first_name' => true,
        'last_name' => true,
        'salary' => true,
        'bank_id' => true,
        'acct_no' => true,
        'service_charge_number' => true,
        'service_charge_bank' => true,
        'department_id' => true,
        'grade_id' => true,
        'housing_allowance' => true,
        'housing_upfront' => true,
        'designation_id' => true,
        'status_id' => true,
        'cadre_id' => true,
        'utility_allowance' => true,
        'transport_allowance' => true,
        'domestic_allowance' => true,
        'tax_number' => true,
        'tax_relief' => true,
        'tax_paid_to_date' => true,
        'pension_no' => true,
        'medical_allowance' => true,
        'entertainment_allowance' => true,
        'other_allowance' => true,
        'personal_loan' => true,
        'pers_loan_rep' => true,
        'pers_loan_paid' => true,
        'pers_loan_inst' => true,
        'car_loan' => true,
        'car_loan_rep' => true,
        'car_loan_inst' => true,
        'car_loan_paid' => true,
        'whl_cics' => true,
        'pension_control' => true,
        'salary_advance' => true,
        'salary_advance_rep' => true,
        'salary_advance_paid' => true,
        'salary_advance_inst' => true,
        'drivers_allowance' => true,
        'bro_HCICS' => true,
        'bank' => true,
        'department' => true,
        'grade' => true,
        'designation' => true,
        'status' => true,
        'cadre' => true,
        'transactions' => true,
        'transactions1' => true,
        'users' => true
    ];

    protected function _getNameDesc()
    {
        return
            $this->_properties['first_name'] .
            '  ' .
            $this->_properties['last_name'];
    }
}
