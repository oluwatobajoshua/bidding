        <section class="invoice no-print">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('Bank Letter'); ?></h3>
            <form action="<?php echo $this->Url->build(); ?>" method="POST" class='pull-right' id='empForm'>
              <div class="col-md-3" style="width:400px">
                <label class="form-check-label" for="">Bank</label>
                <?php echo $this->Form->select('bank',$bankList,['empty' => "Select Bank", 'title'=> 'Select an employee to add transaction','rel'=>'tooltip', 'onChange'=>'document.getElementById("empForm").submit();']);?>                
                <a href=""  class="btn btn-xs btn-default no-print" onClick="window.print();"><i class="fa fa-print" ></i> Print</a>
              </div>
            </form>            
          </div>
        </section>
<!-- Main content -->
  <section class="invoice">
    <?php echo $this->element('bank-letter'); ?>
  </section>
  <!-- /.content -->
 
