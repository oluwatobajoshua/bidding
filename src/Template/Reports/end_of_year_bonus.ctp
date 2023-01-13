

<!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
           GENERAL STAFF END OF YEAR BONUS  <?= h($company->date->year) ?>          
        </h2>
      </div>
      <!-- /.col -->
    </div>

    <!-- Table row -->
    <?php foreach ($departments as $department): 
          $id         = 0; 
          $tbasic     = 0.00;
          $tbonus     = 0.00;
        ?>
    <div class="row">
      
      <div class="col-xs-12 table-responsive">                     
        <?php //if(count($department->employees) > 0): ?>
        <div class="col-xs-6">
        <h3> <?= h($department->name); ?> </h3>
        <table class="table table-bordered">
          <thead>
          <tr style="text-align:center">
            <th>S/N</th><th>STAFF<br>NO</th><th>NAME OF STAFF</th><th>BASIC SALARY</th><th>BONUS</th>
          </tr>
          </thead>
          <tbody> 
            <?php foreach ($department->employees as $employees): ?>              
            <?php foreach ($employees->transactions as $t): 

                $bonus     =  $t->basic_salary;
                //Group Total
                $tbasic     += $t->basic_salary;                
                $tbonus     += $bonus;
                
                //id
                $id++;
              ?> 
          <tr style="text-align:right">          
            <td style="text-align:center"><?= h($id) ?></td>
            <td style="text-align:center"><?= h($t->employee->staff_no) ?></td>
            <td style="text-align:left"><?= h($t->employee->name_desc) ?></td>
            <td><?= $this->Number->precision($t->basic_salary,2) ?></td>
            <td><?= $this->Number->precision($bonus,2) ?></td>           
          </tr>    
        <?php endforeach ?>
      <?php endforeach ?>
        <thead>
          <tr style="text-align:right">
            <th colspan="3" style="text-align:center"> Group Total</th>
            <th style="text-align:right"><?= $this->Number->precision($tbonus,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($tbonus,2) ?></th>          
          </tr>
          <thead>
          </tbody>
        </table>
        </div>
        <?php //endif ?>
      </div>      
      <!-- /.col -->
    </div>
    <!-- /.row -->   
    <?php endforeach  ?>      
    
  </section>
  <!-- /.content -->
