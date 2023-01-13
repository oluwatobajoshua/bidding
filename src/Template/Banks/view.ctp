<section class="content-header">
  <h1>
    Bank
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('Name') ?></dt>
            <dd><?= h($bank->name) ?></dd>
            <dt scope="row"><?= __('Code') ?></dt>
            <dd><?= h($bank->code) ?></dd>
            <dt scope="row"><?= __('Branch') ?></dt>
            <dd><?= h($bank->branch) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($bank->id) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($bank->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($bank->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Employees') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <?php if (!empty($bank->employees)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('First Name') ?></th>
                    <th scope="col"><?= __('Last Name') ?></th>
                    <th scope="col"><?= __('Salary') ?></th>
                    <th scope="col"><?= __('Status Id') ?></th>
                    <th scope="col"><?= __('Grade Id') ?></th>
                    <th scope="col"><?= __('Department Id') ?></th>
                    <th scope="col"><?= __('Domestic Allowance') ?></th>
                    <th scope="col"><?= __('Housing Allowance') ?></th>
                    <th scope="col"><?= __('Tax Number') ?></th>
                    <th scope="col"><?= __('Housing Upfront') ?></th>
                    <th scope="col"><?= __('Transport Allowance') ?></th>
                    <th scope="col"><?= __('Tax Relief') ?></th>
                    <th scope="col"><?= __('Tax Paid To Date') ?></th>
                    <th scope="col"><?= __('Utility Allowance') ?></th>
                    <th scope="col"><?= __('Pension No') ?></th>
                    <th scope="col"><?= __('Bank Id') ?></th>
                    <th scope="col"><?= __('Medical Allowance') ?></th>
                    <th scope="col"><?= __('Acct No') ?></th>
                    <th scope="col"><?= __('Entertainment Allowance') ?></th>
                    <th scope="col"><?= __('Other Allowance') ?></th>
                    <th scope="col"><?= __('Personal Loan') ?></th>
                    <th scope="col"><?= __('Pers Loan Rep') ?></th>
                    <th scope="col"><?= __('Pers Loan Paid') ?></th>
                    <th scope="col"><?= __('Pers Loan Inst') ?></th>
                    <th scope="col"><?= __('Car Loan') ?></th>
                    <th scope="col"><?= __('Car Loan Rep') ?></th>
                    <th scope="col"><?= __('Car Loan Inst') ?></th>
                    <th scope="col"><?= __('Car Loan Paid') ?></th>
                    <th scope="col"><?= __('Whl Cics') ?></th>
                    <th scope="col"><?= __('Pension Control') ?></th>
                    <th scope="col"><?= __('Salary Advance') ?></th>
                    <th scope="col"><?= __('Salary Advance Rep') ?></th>
                    <th scope="col"><?= __('Salary Advance Paid') ?></th>
                    <th scope="col"><?= __('Salary Advance Inst') ?></th>
                    <th scope="col"><?= __('Drivers Allowance') ?></th>
                    <th scope="col"><?= __('Cadre Id') ?></th>
                    <th scope="col"><?= __('Service Charge Bank') ?></th>
                    <th scope="col"><?= __('Service Charge Number') ?></th>
                    <th scope="col"><?= __('Bro HCICS') ?></th>
                    <th scope="col"><?= __('Designation Id') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($bank->employees as $employees): ?>
              <tr>
                    <td><?= h($employees->id) ?></td>
                    <td><?= h($employees->first_name) ?></td>
                    <td><?= h($employees->last_name) ?></td>
                    <td><?= h($employees->salary) ?></td>
                    <td><?= h($employees->status_id) ?></td>
                    <td><?= h($employees->grade_id) ?></td>
                    <td><?= h($employees->department_id) ?></td>
                    <td><?= h($employees->domestic_allowance) ?></td>
                    <td><?= h($employees->housing_allowance) ?></td>
                    <td><?= h($employees->tax_number) ?></td>
                    <td><?= h($employees->housing_upfront) ?></td>
                    <td><?= h($employees->transport_allowance) ?></td>
                    <td><?= h($employees->tax_relief) ?></td>
                    <td><?= h($employees->tax_paid_to_date) ?></td>
                    <td><?= h($employees->utility_allowance) ?></td>
                    <td><?= h($employees->pension_no) ?></td>
                    <td><?= h($employees->bank_id) ?></td>
                    <td><?= h($employees->medical_allowance) ?></td>
                    <td><?= h($employees->acct_no) ?></td>
                    <td><?= h($employees->entertainment_allowance) ?></td>
                    <td><?= h($employees->other_allowance) ?></td>
                    <td><?= h($employees->personal_loan) ?></td>
                    <td><?= h($employees->pers_loan_rep) ?></td>
                    <td><?= h($employees->pers_loan_paid) ?></td>
                    <td><?= h($employees->pers_loan_inst) ?></td>
                    <td><?= h($employees->car_loan) ?></td>
                    <td><?= h($employees->car_loan_rep) ?></td>
                    <td><?= h($employees->car_loan_inst) ?></td>
                    <td><?= h($employees->car_loan_paid) ?></td>
                    <td><?= h($employees->whl_cics) ?></td>
                    <td><?= h($employees->pension_control) ?></td>
                    <td><?= h($employees->salary_advance) ?></td>
                    <td><?= h($employees->salary_advance_rep) ?></td>
                    <td><?= h($employees->salary_advance_paid) ?></td>
                    <td><?= h($employees->salary_advance_inst) ?></td>
                    <td><?= h($employees->drivers_allowance) ?></td>
                    <td><?= h($employees->cadre_id) ?></td>
                    <td><?= h($employees->service_charge_bank) ?></td>
                    <td><?= h($employees->service_charge_number) ?></td>
                    <td><?= h($employees->bro_HCICS) ?></td>
                    <td><?= h($employees->designation_id) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Employees', 'action' => 'view', $employees->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Employees', 'action' => 'edit', $employees->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Employees', 'action' => 'delete', $employees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employees->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
