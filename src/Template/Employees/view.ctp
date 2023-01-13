<section class="content-header">
  <h1>
    Employee
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
          <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->id], ['class'=>'btn btn-warning btn-xs']) ?>
          <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->name_desc), 'class'=>'btn btn-danger btn-xs']) ?>
          <form action="<?php echo $this->Url->build(); ?>" method="POST" class='pull-right' id='empForm'>
              <div class="input-group input-group-sm" style="width: 150px;">
              <?php echo $this->Form->select('id',$employees,['value' => $employee->id, 'title'=> 'Select an employee to view','rel'=>'tooltip','class' => 'form-control', 'onChange'=>'document.getElementById("empForm").submit();']); ?> 
              </div>
            </form>             
        </div>        
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <div class="col-md-6">
            <dt scope="row"><?= __('Staff No') ?></dt>
            <dd><?= h($employee->staff_no) ?></dd>
            <dt scope="row"><?= __('First Name') ?></dt>
            <dd><?= h($employee->first_name) ?></dd>
            <dt scope="row"><?= __('Last Name') ?></dt>
            <dd><?= h($employee->last_name) ?></dd>
            <dt scope="row"><?= __('Bank') ?></dt>
            <dd><?= $employee->has('bank') ? $this->Html->link($employee->bank->bank_desc, ['controller' => 'Banks', 'action' => 'view', $employee->bank->id]) : '' ?></dd>
            <dt scope="row"><?= __('Acct No') ?></dt>
            <dd><?= h($employee->acct_no) ?></dd>
            <dt scope="row"><?= __('Service Charge Number') ?></dt>
            <dd><?= h($employee->service_charge_number) ?></dd>
            <dt scope="row"><?= __('Department') ?></dt>
            <dd><?= $employee->has('department') ? $this->Html->link($employee->department->name, ['controller' => 'Departments', 'action' => 'view', $employee->department->id]) : '' ?></dd>
            <dt scope="row"><?= __('Grade') ?></dt>
            <dd><?= $employee->has('grade') ? $this->Html->link($employee->grade->name, ['controller' => 'Grades', 'action' => 'view', $employee->grade->id]) : '' ?></dd>
            <dt scope="row"><?= __('Housing Upfront') ?></dt>
            <dd><?= h($employee->housing_upfront) ?></dd>
            <dt scope="row"><?= __('Designation') ?></dt>
            <dd><?= $employee->has('designation') ? $this->Html->link($employee->designation->name, ['controller' => 'Designations', 'action' => 'view', $employee->designation->id]) : '' ?></dd>
            <dt scope="row"><?= __('Status') ?></dt>
            <dd><?= $employee->has('status') ? $this->Html->link($employee->status->name, ['controller' => 'Statuses', 'action' => 'view', $employee->status->id]) : '' ?></dd>
            <dt scope="row"><?= __('Cadre') ?></dt>
            <dd><?= $employee->has('cadre') ? $this->Html->link($employee->cadre->name, ['controller' => 'Cadres', 'action' => 'view', $employee->cadre->id]) : '' ?></dd>
            <dt scope="row"><?= __('Branch') ?></dt>
            <dd><?= $employee->has('branch') ? $this->Html->link($employee->branch->name, ['controller' => 'Branches', 'action' => 'view', $employee->branch->id]) : '' ?></dd>
            <dt scope="row"><?= __('Tax Number') ?></dt>
            <dd><?= h($employee->tax_number) ?></dd>            
            <dt scope="row"><?= __('Pension No') ?></dt>
            <dd><?= h($employee->pension_no) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($employee->id) ?></dd>
            <dt scope="row"><?= __('Salary') ?></dt>
            <dd><?= $this->Number->format($employee->salary, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Service Charge') ?></dt>
            <dd><?= $employee->has('service_charge') ? $this->Html->link($employee->service_charge->bank_desc, ['controller' => 'Banks', 'action' => 'view', $employee->service_charge->id]) : '' ?></dd>
            <dt scope="row"><?= __('Housing Allowance') ?></dt>
            <dd><?= $this->Number->format($employee->housing_allowance, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Utility Allowance') ?></dt>
            <dd><?= $this->Number->format($employee->utility_allowance, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Transport Allowance') ?></dt>
            <dd><?= $this->Number->format($employee->transport_allowance, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Domestic Allowance') ?></dt>                      
            <dd><?= $this->Number->format($employee->domestic_allowance, ['places' => 2]) ?></dd>            
            </div>            
            <div class="col-md-6"> 
            
            <dt scope="row"><?= __('Tax Relief') ?></dt>
            <dd><?= $this->Number->format($employee->tax_relief, ['places' => 2]) ?></dd>               

            <dt scope="row"><?= __('Tax Paid To Date') ?></dt>
            <dd><?= $this->Number->format($employee->tax_paid_to_date, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Medical Allowance') ?></dt>
            <dd><?= $this->Number->format($employee->medical_allowance , ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Entertainment Allowance') ?></dt>
            <dd><?= $this->Number->format($employee->entertainment_allowance, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Other Allowance') ?></dt>
            <dd><?= $this->Number->format($employee->other_allowance, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Personal Loan') ?></dt>
            <dd><?= $this->Number->format($employee->personal_loan, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Pers Loan Rep') ?></dt>
            <dd><?= $this->Number->format($employee->pers_loan_rep, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Pers Loan Paid') ?></dt>
            <dd><?= $this->Number->format($employee->pers_loan_paid, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Pers Loan Inst') ?></dt>
            <dd><?= $this->Number->format($employee->pers_loan_inst) ?></dd>
            <dt scope="row"><?= __('Car Loan') ?></dt>
            <dd><?= $this->Number->format($employee->car_loan, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Car Loan Rep') ?></dt>
            <dd><?= $this->Number->format($employee->car_loan_rep, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Car Loan Inst') ?></dt>
            <dd><?= $this->Number->format($employee->car_loan_inst) ?></dd>
            <dt scope="row"><?= __('Car Loan Paid') ?></dt>
            <dd><?= $this->Number->format($employee->car_loan_paid, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Whl Cics') ?></dt>
            <dd><?= $this->Number->format($employee->whl_cics, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Pension Control') ?></dt>
            <dd><?= $this->Number->format($employee->pension_control, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Salary Advance') ?></dt>
            <dd><?= $this->Number->format($employee->salary_advance, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Salary Advance Rep') ?></dt>
            <dd><?= $this->Number->format($employee->salary_advance_rep, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Salary Advance Paid') ?></dt>
            <dd><?= $this->Number->format($employee->salary_advance_paid, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Salary Advance Inst') ?></dt>
            <dd><?= $this->Number->format($employee->salary_advance_inst) ?></dd>
            <dt scope="row"><?= __('Drivers Allowance') ?></dt>
            <dd><?= $this->Number->format($employee->drivers_allowance, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Bro HCICS') ?></dt>
            <dd><?= $this->Number->format($employee->bro_HCICS, ['places' => 2]) ?></dd>
            </div>
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
          <h3 class="box-title"><?= __('Transactions') ?> </h3>
          <div class="pull-right"><?php echo $this->Html->link(__('New Transaction'), ['controller' => 'transactions','action' => 'add',$employee->id], ['class'=>'btn btn-success btn-xs']) ?></div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                  <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('basic_salary') ?></th>                  
                  <th scope="col"><?= $this->Paginator->sort('housing_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('transport_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('utility_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('pension_deduction') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('tax_amount') ?></th>
                  <!--<th scope="col"><?= $this->Paginator->sort('created') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('domestic_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('living_in_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('medical_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('entertainment_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('other_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('WHL_CISC') ?></th>                  
                  <th scope="col"><?= $this->Paginator->sort('other_deduction') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('salary_advance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('drivers_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('bar_account') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('union_due') ?></th>                  
                  <th scope="col"><?= $this->Paginator->sort('arrears') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('sc_deduction') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('ileya_xmas_bonus') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('end_of_year_bonus') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('service_charge') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('personal_loan') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('BRO_HCICS') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('surcharge') ?></th> -->                
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($employee->transactions as $transaction): ?>
                <tr>
                  <td><?= $this->Number->format($transaction->id) ?></td>
                  <td><?= h($transaction->date) ?></td>
                  <td><?= $this->Number->format($transaction->basic_salary, ['precision' => 2]) ?></td>                  
                  <td><?= $this->Number->format($transaction->housing_allowance, ['precision' => 2]) ?></td>
                  <td><?= $this->Number->format($transaction->transport_allowance, ['precision' => 2]) ?></td>
                  <td><?= $this->Number->format($transaction->utility_allowance, ['precision' => 2]) ?></td>
                  <td><?= $this->Number->format($transaction->pension_deduction, ['precision' => 2]) ?></td>
                  <td><?= $this->Number->format($transaction->tax_amount, ['precision' => 2]) ?></td>
                  <!-- <td><?= h($transaction->created) ?></td>
                  <td><?= h($transaction->modified) ?></td>
                  <td><?= $this->Number->format($transaction->domestic_allowance) ?></td>
                  <td><?= $this->Number->format($transaction->living_in_allowance) ?></td>
                  <td><?= $this->Number->format($transaction->medical_allowance) ?></td>
                  <td><?= $this->Number->format($transaction->entertainment_allowance) ?></td>
                  <td><?= $this->Number->format($transaction->other_allowance) ?></td>
                  <td><?= $this->Number->format($transaction->WHL_CISC) ?></td>                  
                  <td><?= $this->Number->format($transaction->other_deduction) ?></td>
                  <td><?= $this->Number->format($transaction->salary_advance) ?></td>
                  <td><?= $this->Number->format($transaction->drivers_allowance) ?></td>
                  <td><?= $this->Number->format($transaction->bar_account) ?></td>
                  <td><?= $this->Number->format($transaction->union_due) ?></td>                  
                  <td><?= $this->Number->format($transaction->arrears) ?></td>
                  <td><?= $this->Number->format($transaction->sc_deduction) ?></td>
                  <td><?= $this->Number->format($transaction->ileya_xmas_bonus) ?></td>
                  <td><?= $this->Number->format($transaction->end_of_year_bonus) ?></td>
                  <td><?= $this->Number->format($transaction->service_charge) ?></td>
                  <td><?= $this->Number->format($transaction->personal_loan) ?></td>
                  <td><?= $this->Number->format($transaction->BRO_HCICS) ?></td>
                  <td><?= $this->Number->format($transaction->surcharge) ?></td>-->              
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller'=>'Transactions','action' => 'view', $transaction->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller'=>'Transactions','action' => 'edit', $transaction->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller'=>'Transactions','action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
