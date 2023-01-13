<style>
table.table-bordered{
    border:1px solid black;
    margin-top:20px;
  }
table.table-bordered > thead > tr > th{
    border:1px solid black;
}
table.table-bordered > tbody > tr > td{
    border:1px solid black;
}
</style>

<?php use Cake\I18n\Time; 
  $time = Time::now();
?>

        <section class="invoice no-print">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('Staff List'); ?></h3>
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
    <!-- Main content -->
    <!-- Table row -->            
            
    <?php foreach ($banks as $bank):
        $id = 0;
        $ttotal    = 0.00;
  ?>  
            <br> 
            <br>
            <br>
            <br> 
            <br>
            <br>
            <br>
            <br> 
            <br>
            <br>
            <br>
        <div class="row">
          <div class="col-xs-8 ">       
            <!-- date -->                                  
            <br>
            <br>           
            <!-- Bank Address -->
            <span>THE MANAGER <span class='pull-right'><?=$company->date->format('M, Y');?></span></span><br>
            <span><?= h($bank->name) ?></span><br>
            <span><?= h($bank->branch) ?></span><br>
            <br>                         
            <p>Dear sir/Madam,</p>
            <p><b>STAFF SALARY SCHEDULE FOR <?= h($company->date->format('M, Y')); ?></b></p>
            <p>PLEASE CREDIT THE ACCOUNTS OF THE FOLLOWING STAFF AS PER OUR ATTACHED <br> CHEUQUE NO: ______________________ DATE: _____________ </p>
            <?php if(count($bank->employees) > 0): ?>
            <div class="table-responsive">  
            <table class="table table-bordered">
              <thead>
              <tr style="text-align:center">
                <th style="text-align:center">S/N</th><th style="text-align:center">STAFF NO</th><th style="text-align:center">NAME OF STAFF </th><th style="text-align:center">ACCOUNT NUMBER</th><th style="text-align:center">TOTAL</th>
              </tr>
              </thead>
              <tbody> 
                <?php foreach ($bank->employees as $employee): ?>              
                <?php foreach ($employee->transactions as $t): 
                    $total = 0; 
                   
                    if($bank->id == $employee->service_charge_bank){
                        $total = $t->net_pay + $t->service_charge;
                    }else{
                      $total = $t->net_pay;
                    }
                    $ttotal    += $total;
                    
                    //id
                    $id++;
                  ?> 
                <tr style="text-align:right">          
                <td style="text-align:center"><?= h($id) ?></td>
                <td style="text-align:center"><?= h($t->employee->staff_no) ?></td>
                <td style="text-align:left"><?= h($t->employee->name_desc) ?></td>
                <td style="text-align:center"><?= h($t->employee->acct_no) ?></td>
                <td><?= $this->Number->precision($total,2) ?></td>           
              </tr>    
            <?php endforeach ?>
          <?php endforeach ?>
            <thead>
              <tr style="text-align:right">
                <th colspan="4" style="text-align:left"> Group Total</th>
                <th style="text-align:right"><?= $this->Number->precision($ttotal,2) ?></th>          
              </tr>
              <thead>
              </tbody>
            </table>
          </div>
          <?php endif ?>
              </div>      
              <!-- /.col -->
            </div> 
            <hr />     
        <?php endforeach  ?>    

  <!-- /.content -->
  </section>
  <!-- /.content -->
 
