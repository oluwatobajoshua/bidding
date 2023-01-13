<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Transaction
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
          <?php echo $this->Form->create($transaction, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
                echo '<div class="col-md-12">';
                echo $this->Form->control('date',['value'=>$transaction->company->date,'disabled'=>true]);
                echo '</div>';  
                echo '<div class="col-md-3">';                
                
                echo $this->Form->control('employee_id', ['options' => $employee,'value'=>$transaction->employee_id]);
                echo $this->Form->control('company_id', ['options' => $companies,'value'=>$transaction->company_id, 'type'=>'hidden']);
                echo $this->Form->control('basic_salary');
                echo $this->Form->control('paye');
                echo $this->Form->control('union_due');                    
                
                                
                //echo $this->Form->control('domestic_allowance');
                //echo $this->Form->control('housing_allowance');
                //echo $this->Form->control('transport_allowance');
                //echo $this->Form->control('utility_allowance');
                //echo $this->Form->control('living_in_allowance');
                
                echo '</div>';            
                echo '<div class="col-md-3">';                             
                echo $this->Form->control('pension_deduction');
                echo $this->Form->control('leave_allowance');
                echo $this->Form->control('other_deduction');
                echo $this->Form->control('salary_advance');
                echo $this->Form->control('bar_account');
                                           
                
                //echo $this->Form->control('medical_allowance');                
                //echo $this->Form->control('entertainment_allowance');
                //echo $this->Form->control('other_allowance');
                echo '</div>';            
                echo '<div class="col-md-3">';   
                echo $this->Form->control('personal_loan');
                echo $this->Form->control('BRO_CICS',['label' => 'BRO C.I.C.S']);
                echo $this->Form->control('WHL_CISC',['label' => 'WHL C.I.C.S']);
                echo $this->Form->control('surcharge');  
                
                //echo $this->Form->control('ileya_xmas_bonus');
                //echo $this->Form->control('drivers_allowance');                

                echo '</div>';  
                echo '<div class="col-md-3">';
                echo $this->Form->control('arrears');
                //echo $this->Form->control('end_of_year_bonus');

                echo '</div>';  
                echo '<div class="col-md-12">';
                echo $this->Form->submit(__('Submit'));
                echo '</div>';
              ?>
            </div>
            <!-- /.box-body -->

          <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.box -->
      </div>
  </div>
  <!-- /.row -->
</section>
