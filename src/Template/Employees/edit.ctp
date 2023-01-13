<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Employee
      <small><?php echo __('Edit'); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('Form'); ?></h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo $this->Form->create($employee, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
                echo '<div class="col-md-3">';
                echo $this->Form->control('staff_no');
                echo $this->Form->control('first_name');
                echo $this->Form->control('last_name');
                echo $this->Form->control('salary');
                echo $this->Form->control('bank_id', ['options' => $banks]);
                echo $this->Form->control('acct_no');
                echo $this->Form->control('service_charge_number');
                echo $this->Form->control('service_charge_bank', ['options' => $serviceCharges]);
                echo $this->Form->control('department_id', ['options' => $departments]);                
                echo $this->Form->control('grade_id', ['options' => $grades]);
                echo $this->Form->control('housing_allowance');                
                echo '</div >';
                echo '<div class="col-md-3">';
                echo $this->Form->control('housing_upfront');
                echo $this->Form->control('branch_id', ['options' => $branches]);
                echo $this->Form->control('designation_id', ['options' => $designations]);
                echo $this->Form->control('status_id', ['options' => $statuses]);
                echo $this->Form->control('cadre_id', ['options' => $cadres]);
                echo $this->Form->control('utility_allowance');
                echo $this->Form->control('transport_allowance');
                echo $this->Form->control('domestic_allowance');
                echo $this->Form->control('tax_number');
                echo $this->Form->control('tax_relief');
                echo $this->Form->control('tax_paid_to_date');
                echo '</div >';
                echo '<div class="col-md-3">';
                echo $this->Form->control('pension_no');
                echo $this->Form->control('medical_allowance');
                echo $this->Form->control('entertainment_allowance');
                echo $this->Form->control('other_allowance');
                echo $this->Form->control('personal_loan');
                echo $this->Form->control('pers_loan_rep');
                echo $this->Form->control('pers_loan_paid');
                echo $this->Form->control('pers_loan_inst');
                echo $this->Form->control('car_loan');
                echo $this->Form->control('car_loan_rep');
                echo '</div >';
                echo '<div class="col-md-3">';
                echo $this->Form->control('car_loan_inst');
                echo $this->Form->control('car_loan_paid');
                echo $this->Form->control('whl_cics');
                echo $this->Form->control('pension_control');
                echo $this->Form->control('salary_advance');
                echo $this->Form->control('salary_advance_rep');
                echo $this->Form->control('salary_advance_paid');
                echo $this->Form->control('salary_advance_inst');
                echo $this->Form->control('drivers_allowance');
                echo $this->Form->control('bro_HCICS');
                echo '</div >';                
              ?>
            </div>
            <!-- /.box-body -->

          <?php echo $this->Form->submit(__('Submit')); ?>

          <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.box -->
      </div>
  </div>
  <!-- /.row -->
</section>
