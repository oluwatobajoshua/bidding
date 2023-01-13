<?php
use Cake\I18n\Number;

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Transaction
      <small><?php echo __('Add'); ?></small>
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
            <form action="<?php echo $this->Url->build(); ?>" method="POST" class='pull-right' id='empForm'>
              <div class="col-md-3" style="width:250px">
                <label class="form-check-label" for="">Employees</label>
                <?php echo $this->Form->select('id',$employees,['value' => $employeed->id, 'title'=> 'Select an employee to add transaction','rel'=>'tooltip', 'onChange'=>'document.getElementById("empForm").submit();']);?>                
              </div>
            </form>   
            <form action="<?php echo $this->Url->build(); ?>" method="POST" class='pull-right' id='empForm1'>
              <div class="col-md-3" style="width:250px">
                <label class="form-check-label" for="">Staff No</label>
                <?php echo $this->Form->text('staff_no',['value' => $employeed->staff_no, 'title'=> 'Enter staff number','rel'=>'tooltip', 'onBlur'=>'document.getElementById("empForm1").submit();']);?>
              </div>
            </form>           
          </div>
          
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo $this->Form->create($transaction, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
                if($cadre == 'JUNIOR STAFF' || 'SENIOR STAFF'){
                  $pension = $employeed->salary+$employeed->housing_allowance+$employeed->transport_allowance;
                  $transaction->basic_salary = $employeed->salary/12;
                  $paye  =   $transaction->basic_salary * 0.1;  
                  $transaction->union_due = $transaction->basic_salary * 0.05;
                }else{
                  $pension = 0.00;
                  $transaction->basic_salary = $employeed->salary;
                  $paye  = $employeed->salary * 0.05; 
                } 
                         
                echo '<div class="col-md-3">';
                echo $this->Form->control('employee_id', ['options' => $employee]);
                echo $this->Form->control('company_id', ['value'=>$company->id, 'type'=>'hidden']);
                echo $this->Form->Control('date', ['value' => $company->date, 'type'=>'']);                             
                echo $this->Form->control('basic_salary',['value' => round($transaction->basic_salary,2)]);                
                echo $this->Form->control('transport_allowance',['value' => round($employeed->transport_allowance/12,2),'places'=>2]); 
                echo $this->Form->control('pension_deduction',['value' => round(((($pension)/12)*0.08),2)]);               
                echo $this->Form->control('domestic_allowance',['value' => round($employeed->domestic_allowance/12,2)]);                                           
                echo $this->Form->control('living_in_allowance',['value' => round($employeed->living_allowance/12,2)]);
                echo $this->Form->control('medical_allowance',['value' => round($employeed->medical_allowance/12,2)]);                                
                echo '</div>';            
                echo '<div class="col-md-3">';
                echo $this->Form->control('utility_allowance',['value' => round($employeed->utility_allowance/12,2)]);
                echo $this->Form->control('entertainment_allowance',['value' => round($employeed->entertainment_allowance/12,2)]);
                echo $this->Form->control('other_allowance',['value' => round($employeed->other_allowance/12,2)]);
                echo $this->Form->control('WHL_CISC',['value' => round($employeed->whl_cisc/12,2)]);                
                echo $this->Form->control('other_deduction');
                echo $this->Form->control('salary_advance',['value' => round($employeed->salary_advance_rep,2)]);
                echo $this->Form->control('drivers_allowance',['value' => round($employeed->drivers_allowance/12,2)]);
                echo '</div>';                          
                echo '<div class="col-md-3">';
                echo $this->Form->control('bar_account');
                echo $this->Form->control('union_due',['value' => round($transaction->union_due,2)]);                                                       
                echo $this->Form->control('housing_allowance',['value' => round($employeed->housing_allowance/12,2)]);
                
                echo $this->Form->control('paye',['value' => round($paye,2)]);
                echo $this->Form->control('arrears');
                echo $this->Form->control('sc_deduction');
                echo $this->Form->control('ileya_xmas_bonus');                
                echo '</div>';                          
                echo '<div class="col-md-3">';
                echo $this->Form->control('end_of_year_bonus');
                echo $this->Form->control('leave_allowance');
                echo $this->Form->control('personal_loan',['value' => round($employeed->personal_loan_rep,2)]);
                echo $this->Form->control('BRO_CICS',['value' => round($employeed->bro_CICS/12,2)]);
                echo $this->Form->control('surcharge'); 
                echo '</div>';  
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
