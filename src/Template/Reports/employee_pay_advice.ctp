        <section class="invoice no-print">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('Form'); ?></h3>
            <form action="<?php echo $this->Url->build(); ?>" method="POST" class='pull-right' id='empForm'>
              <div class="col-md-3" style="width:350px">
              <label class="form-check-label" for="">General Pay Advice</label>
                <?php echo $this->Form->checkbox('gpa', ['hiddenField' => true]) ?> <br>
                <label class="form-check-label" for="">Service Charge Pay Advice</label>
                <?php echo $this->Form->checkbox('spa', ['hiddenField' => true]) ?> <br>
                <label class="form-check-label" for="">Employees</label>
                <?php echo $this->Form->select('employee',$employees,['empty' => "Select Employee", 'title'=> 'Select an employee to add transaction','rel'=>'tooltip', 'onChange'=>'document.getElementById("empForm").submit();']);?>                
              </div>
            </form>   
            <form action="<?php echo $this->Url->build(); ?>" method="POST" class='pull-right' id='empForm1'>
              <div class="col-md-3" style="width:300px">              
                <label class="form-check-label" for="">General Pay Advice</label>
                <?php echo $this->Form->checkbox('gpa', ['hiddenField' => true]) ?> <br>
                <label class="form-check-label" for="">Service Charge Pay Advice</label>
                <?php echo $this->Form->checkbox('spa', ['hiddenField' => true]) ?> <br>
                <label class="form-check-label" for="">Department</label>
                <?php echo $this->Form->select('department',$depts,['empty' => "Select Department", 'title'=> 'Select an employee to add transaction','rel'=>'tooltip', 'onChange'=>'document.getElementById("empForm1").submit();']);?>
              </div>
            </form>           
          </div>
        </section>
<!-- Main content -->
  <section class="invoice">
    <?php echo $this->element('employee-pay-advice'); ?>
  </section>
  <!-- /.content -->
 
