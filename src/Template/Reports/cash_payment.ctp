

<!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
           CASH PAYMENT SCHEDULE FOR  <?= h($company->date->format('M, Y')) ?>          
        </h2>
      </div>
      <!-- /.col -->
    </div>

    <!-- Table row -->
    <?php foreach ($departments as $department): 
          $id         = 0; 
          $tbasic     = 0.00;
          $cash = false;
        ?>
    <div class="row">      
      <div class="col-xs-12 table-responsive"> 
        <?php foreach ($department->employees as $employee): ?>   
        <?php if($employee->bank->name == 'CASH'): $cash = true ?>  

        <?php endif ?>  
        <?php endforeach ?>                    
        <?php if($cash): ?>
        <div class="col-xs-6">
        <h3> <?= h($department->name); ?> </h3>
        <table class="table table-bordered">
          <thead>
          <tr style="text-align:right">
            <th>S/N</th><th>STAFF<br>NO</th><th>NAME OF STAFF</th><th>SALARY</th><th>SIGNATURE</th>
          </tr>
          </thead>
          <tbody> 
            <?php foreach ($department->employees as $employee): ?>     
            <?php if($employee->bank->name == 'CASH'): ?>    
                
            <?php foreach ($employee->transactions as $t): 
                $basic     =  $t->gross - $t->total_deduction + $t->service_charge;
                //Group Total
                $tbasic     += $basic;                
                
                //id
                $id++;
              ?> 
                  <tr style="text-align:right">          
                    <td style="text-align:center"><?= h($id) ?></td>
                    <td style="text-align:center"><?= h($t->employee->staff_no) ?></td>
                    <td style="text-align:left"><?= h($t->employee->name_desc) ?></td>
                    <td ><?= $this->Number->precision($basic,2) ?></td>
                    <td style="border-bottom: 1px solid black"></td>           
                  </tr>    
                <?php endforeach ?>
              <?php endif ?> 
              <?php endforeach ?>
        <thead>
          <tr style="text-align:right">
            <th colspan="3" style="text-align:center"> Group Total</th>
            <th style="text-align:right;border-bottom:solid black;border-top:solid black"><?= $this->Number->precision($tbasic,2) ?></th>
            <th style="text-align:right;width:30%"></th>          
          </tr>
          <thead>
          </tbody>
        </table>
        </div>
        <?php endif ?>
      </div>      
      <!-- /.col -->
    </div>
    <!-- /.row -->   
    <?php endforeach  ?>      
    
  </section>
  <!-- /.content -->
