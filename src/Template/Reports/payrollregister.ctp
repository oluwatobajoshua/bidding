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

<!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-6">
        <h2 class="page-header">PAYROLL REGISTER FOR  <?= h($company->date) ?></h2>
      </div>
      <div class="col-xs-6 no-print">
        <form action="<?php echo $this->Url->build(); ?>" method="POST" class='pull-right' id='empForm'>
          <div class="col-md-3" style="width:600px">
              <label class="form-check-label" for="">Cadre</label>
              <?php echo $this->Form->select('cadres',$cadres,['empty'=>'Select a cadre','title'=> 'Select a Cadre','rel'=>'tooltip', 'onChange'=>'document.getElementById("empForm").submit();']);?>                
              <label class="form-check-label" for="">Demartment</label>
                 <?php echo $this->Form->select('id',$depts,['empty'=>'Select a department','title'=> 'Select a department','rel'=>'tooltip', 'onChange'=>'document.getElementById("empForm").submit();']);?>
          </div>
        </form>
      </div>
      <!-- /.col -->
    </div>    
    <!-- Table row -->
    <div class="row">
    <?php 
      //grand total 
      $gtbasic     = 0.00;
      $gttrans     = 0.00;
      $gthouse     = 0.00;
      $gtutility   = 0.00;
      $gtleave     = 0.00;
      $gtentert    = 0.00;
      $gtmedical   = 0.00;
      $gtarrears   = 0.00;
      $gtother     = 0.00;
      $gtgross     = 0.00;
      $gtpaye      = 0.00;
      $gtpersloan  = 0.00;
      $gtctcs      = 0.00;
      $gtsaladv    = 0.00;
      $gtsur       = 0.00;
      $gtuniond    = 0.00;
      $gtpension   = 0.00;
      $gtbar       = 0.00;
      $gtotherd    = 0.00;
      $gttotald    = 0.00;
      $gtnetpay    = 0.00;    
    ?>
    
    <?php foreach ($departments as $department): 
          $id         = 0; 
          $tbasic     = 0.00;
          $ttrans     = 0.00;
          $thouse     = 0.00;
          $tutility   = 0.00;
          $tleave     = 0.00;
          $tentert    = 0.00;
          $tmedical   = 0.00;
          $tarrears   = 0.00;
          $tother     = 0.00;
          $tgross     = 0.00;
          $tpaye      = 0.00;
          $tpersloan  = 0.00;
          $tctcs      = 0.00;
          $tsaladv    = 0.00;
          $tsur       = 0.00;
          $tuniond    = 0.00;
          $tpension   = 0.00;
          $tbar       = 0.00;
          $totherd    = 0.00;
          $ttotald    = 0.00;
          $tnetpay    = 0.00;
        ?>
      <?php if(count($department->employees) > 0): ?>
      <div class="col-xs-12 table-responsive">             
      <h3> <?= h($department->name); ?> </h3>
        <table class="table table-bordered">
          <thead>
          <tr style="text-align:center">
            <th>S/N</th><th>STAFF<br>NO</th><th>GRADE</th><th style="text-align:center">NAME OF STAFF </th><th>BASIC SALARY</th><th>TRANSP.</th><th>HOUSING</th><th>UTILITY</th><th>LEAVE ALLOW</th><th>ENTERT.</th><th>MEDIC. ALLOW</th><th>ARREARS</th><th>OTHER ALLOW</th>
            <th>GROSS</th><th>P.A.Y.E</th><th>PERS LOAN</th><th>CTCS</th><th>SALARY <br> ADVC</th><th>SURCHARGE</th><th>UNION <br> DUE</th><th>PENSION</th><th>BAR ACCT</th><th>OTHER <br> DEDUCT.</th>
            <th>TOTAL DEDU</th><th>NETPAY</th>
          </tr>
          </thead>
          <tbody> 
            <?php foreach ($department->employees as $employees): ?>              
            <?php foreach ($employees->transactions as $t): 
               /* $gross      =  $t->basic_salary + $t->transport_allowance + $t->housing_allowance + $t->utility_allowance + $t->entertainment_allowance + 
                               $t->medical_allowance + $t->arrears + $t->other_allowance; 
                $paye       =  $t->basic_salary * 0.1;  
                $totald     =  $paye + $t->personal_loan + $t->BRO_HCICS + $t->salary_advance + $t->surcharge + $t->union_due + $t->pension_deduction +
                               $t->bar_account + $t->other_deduction;
                $netpay     =  $gross - $totald;*/

                //Group Total
                $tbasic     += $t->basic_salary;
                $ttrans     += $t->transport_allowance;
                $thouse     += $t->housing_allowance;
                $tutility   += $t->utility_allowance;
                $tleave     += $t->leave_allowance;
                $tentert    += $t->entertainment_allowance;
                $tmedical   += $t->medical_allowance;
                $tarrears   += $t->arrears;
                $tother     += $t->other_allowance;
                $tgross     += $t->gross;
                $tpaye      += $t->paye;
                $tpersloan  += $t->personal_loan;
                $tctcs      += $t->BRO_HCICS;
                $tsaladv    += $t->salary_advance;
                $tsur       += $t->surcharge;
                $tuniond    += $t->union_due;
                $tpension   += $t->pension_deduction;
                $tbar       += $t->bar_account	;
                $totherd    += $t->other_deduction;
                $ttotald    += $t->total_deduction;
                $tnetpay    += $t->net_pay;
                
                //id
                $id++;
              ?> 
            <tr style="text-align:right">          
            <td style="text-align:center"><?= h($id) ?></td>
            <td style="text-align:center"><?= h($t->employee->staff_no) ?></td><td style="text-align:center"><?= h($t->employee->grade->name) ?></td>
            <td style="text-align:left"><?= h($t->employee->name_desc) ?></td>
            <td><?= $this->Number->precision($t->basic_salary,2) ?></td>
            <td><?= $this->Number->precision($t->transport_allowance,2) ?></td>
            <td><?= $this->Number->precision($t->housing_allowance,2) ?></td>
            <td><?= $this->Number->precision($t->utility_allowance,2) ?></td>
            <td><?= $this->Number->precision($t->leave_allowance,2) ?></td>
            <td><?= $this->Number->precision($t->entertainment_allowance,2) ?></td>
            <td><?= $this->Number->precision($t->medical_allowance,2) ?></td>
            <td><?= $this->Number->precision($t->arrears,2) ?></td>
            <td><?= $this->Number->precision($t->other_allowance,2) ?></td>
            <td><?= $this->Number->precision($t->gross,2) ?></td><!-- Gross -->
            <td><?= $this->Number->precision($t->paye,2) ?></td><!--PAYE -->
            <td><?= $this->Number->precision($t->personal_loan,2) ?></td>
            <td><?= $this->Number->precision($t->BRO_HCICS,2) ?></td><!-- CTCS -->
            <td><?= $this->Number->precision($t->salary_advance,2) ?></td>
            <td><?= $this->Number->precision($t->surcharge,2) ?></td>
            <td><?= $this->Number->precision($t->union_due,2) ?></td>
            <td><?= $this->Number->precision($t->pension_deduction,2) ?></td>
            <td><?= $this->Number->precision($t->bar_account,2) ?></td>
            <td><?= $this->Number->precision($t->other_deduction,2) ?></th>
            <td><?= $this->Number->precision($t->total_deduction,2) ?></td><!--total deduction -->
            <td><?= $this->Number->precision($t->net_pay,2) ?></td>           
          </tr>    
        <?php endforeach ?>
      <?php endforeach ?>
      <?php 
        //get grand total 
        $gtbasic    += $tbasic;
        $gttrans    += $ttrans;
        $gthouse    += $thouse;
        $gtutility  += $tutility;
        $gtleave    += $tleave;
        $gtentert   += $tentert;
        $gtmedical  += $tmedical;
        $gtarrears  += $tarrears;
        $gtother    += $tother;
        $gtgross    += $tgross;
        $gtpaye     += $tpaye;
        $gtpersloan += $tpersloan;
        $gtctcs     += $tctcs;
        $gtsaladv   += $tsaladv;
        $gtsur      += $tsur;
        $gtuniond   += $tuniond;
        $gtpension  += $tpension;
        $gtbar      += $tbar;
        $gtotherd   += $totherd;
        $gttotald   += $ttotald;
        $gtnetpay   += $tnetpay;
      ?>
        <thead>
          <tr style="text-align:right">
            <th colspan="4" style="text-align:center"> Group Total</th>
            <th style="text-align:right"><?= $this->Number->precision($tbasic,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($ttrans,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($thouse,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($tutility,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($tleave,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($tentert,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($tmedical,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($tarrears,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($tother,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($tgross,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($tpaye,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($tpersloan,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($tctcs,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($tsaladv,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($tsur,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($tuniond,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($tpension,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($tbar,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($totherd,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($ttotald,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($tnetpay,2) ?></th>          
          </tr>
          <thead>
          </tbody>
        </table>
      </div>
      <?php endif ?>
      <?php endforeach  ?>
      <!-- /.col -->
      <div class="col-xs-12 table-responsive">
        <h3> Grand Total </h3>
        <table class="table table-bordered">
          <thead>
          <tr style="text-align:center">
            <th>S/N</th><th>STAFF<br>NO</th><th>GRADE</th><th style="text-align:center">NAME OF STAFF </th><th>BASIC SALARY</th><th>TRANSP.</th><th>HOUSING</th><th>UTILITY</th><th>LEAVE</th><th>ENTERT.</th><th>MEDIC. ALLOW</th><th>ARREARS</th><th>OTHER ALLOW</th>
            <th>GROSS</th><th>P.A.Y.E</th><th>PERS LOAN</th><th>CTCS</th><th>SALARY <br> ADVC</th><th>SURCHARGE</th><th>UNION <br> DUE</th><th>PENSION</th><th>BAR ACCT</th><th>OTHER <br> DEDUCT.</th>
            <th>TOTAL DEDU</th><th>NETPAY</th>
          </tr>
          </thead>
          <tbody> 
        <thead>
          <tr style="text-align:right">
            <th colspan="4" style="text-align:center"> Group Total</th>
            <th style="text-align:right"><?= $this->Number->precision($gtbasic,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($gttrans,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($gthouse,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($gtutility,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($gtleave,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($gtentert,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($gtmedical,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($gtarrears,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($gtother,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($gtgross,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($gtpaye,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($gtpersloan,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($gtctcs,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($gtsaladv,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($gtsur,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($gtuniond,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($gtpension,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($gtbar,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($gtotherd,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($gttotald,2) ?></th>
            <th style="text-align:right"><?= $this->Number->precision($gtnetpay,2) ?></th>          
          </tr>
          <thead>
          </tbody>
        </table style="page-break-after: always">
    </div>
    </div>
    <!-- /.row -->             
  </section>
  <!-- /.content -->
