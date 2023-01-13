<section class="content-header">
  <h1>
    Transaction
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
          <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transaction->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id), 'class'=>'btn btn-danger btn-xs']) ?>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">                     
            <div class="col-md-6"> 
            <dt scope="row"><?= __('Employee') ?></dt>
            <dd><?= $transaction->has('employee') ? $this->Html->link($transaction->employee->last_name, ['controller' => 'Employees', 'action' => 'view', $transaction->employee->id]) : '' ?></dd>
            <dt scope="row"><?= __('Company') ?></dt>
            <dd><?= $transaction->has('company') ? $this->Html->link($transaction->company->name, ['controller' => 'Companies', 'action' => 'view', $transaction->company->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($transaction->id) ?></dd>
            <dt scope="row"><?= __('Basic Salary') ?></dt>
            <dd><?= $this->Number->format($transaction->basic_salary, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Domestic Allowance') ?></dt>
            <dd><?= $this->Number->format($transaction->domestic_allowance, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Housing Allowance') ?></dt>
            <dd><?= $this->Number->format($transaction->housing_allowance, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Transport Allowance') ?></dt>
            <dd><?= $this->Number->format($transaction->transport_allowance, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Utility Allowance') ?></dt>
            <dd><?= $this->Number->format($transaction->utility_allowance, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Living In Allowance') ?></dt>
            <dd><?= $this->Number->format($transaction->living_in_allowance, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Medical Allowance') ?></dt>
            <dd><?= $this->Number->format($transaction->medical_allowance, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Entertainment Allowance') ?></dt>            

            <dd><?= $this->Number->format($transaction->entertainment_allowance, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Other Allowance') ?></dt>
            <dd><?= $this->Number->format($transaction->other_allowance, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('WHL CISC') ?></dt>
            <dd><?= $this->Number->format($transaction->WHL_CISC, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Pension Deduction') ?></dt>
            <dd><?= $this->Number->format($transaction->pension_deduction, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Other Deduction') ?></dt>
            <dd><?= $this->Number->format($transaction->other_deduction, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Leave Allowance') ?></dt>
            <dd><?= $this->Number->format($transaction->leave_allowance, ['places' => 2]) ?></dd>
            </div>            
            <div class="col-md-6"> 
            <dt scope="row"><?= __('Salary Advance') ?></dt>
            <dd><?= $this->Number->format($transaction->salary_advance, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Drivers Allowance') ?></dt>
            <dd><?= $this->Number->format($transaction->drivers_allowance, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Bar Account') ?></dt>
            <dd><?= $this->Number->format($transaction->bar_account, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Union Due') ?></dt>
            <dd><?= $this->Number->format($transaction->union_due, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Paye') ?></dt>
            <dd><?= $this->Number->format($transaction->paye, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Arrears') ?></dt>
            <dd><?= $this->Number->format($transaction->arrears, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Sc Deduction') ?></dt>
            <dd><?= $this->Number->format($transaction->sc_deduction, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Ileya Xmas Bonus') ?></dt>
            <dd><?= $this->Number->format($transaction->ileya_xmas_bonus, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('End Of Year Bonus') ?></dt>
            <dd><?= $this->Number->format($transaction->end_of_year_bonus, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Service Charge') ?></dt>
            <dd><?= $this->Number->format($transaction->service_charge, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Personal Loan') ?></dt>
            <dd><?= $this->Number->format($transaction->personal_loan, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('BRO HCICS') ?></dt>
            <dd><?= $this->Number->format($transaction->BRO_HCICS, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Surcharge') ?></dt>
            <dd><?= $this->Number->format($transaction->surcharge, ['places' => 2]) ?></dd>
            <dt scope="row"><?= __('Date') ?></dt>
            <dd><?= h($transaction->date) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($transaction->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($transaction->modified) ?></dd>
            </div>            
             
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
