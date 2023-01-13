<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Transactions
    <div class="pull-right">    
      <?php echo $this->Html->link(__('Employees'), ['controller' => 'Employees','action' => 'index'], ['class'=>'btn btn-success btn-xs','rel'=>'tooltip','title'=> 'Go back to employee & select view to add a new transaction']) ?>
      <?= $this->Form->postLink(__('New Month'), ['controller'=>'transactions','action' => 'newMonth'], ['confirm' => __('You are about to begin {0}?', 'new month'), 'class'=>'btn btn-success btn-xs']) ?>
    </div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('List'); ?></h3>
          <div class="box-tools">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="staff_no" class="form-control pull-right" title="Enter Staff No, Last or First name" placeholder="<?php echo __('Search...'); ?>">
                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                  <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('employee_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('basic_salary') ?></th>                  
                  <th scope="col"><?= $this->Paginator->sort('housing_allowance',['label'=>'Housing Allow']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('transport_allowance',['label'=>'Trans Allow']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('utility_allowance',['label'=>'Utility Allow']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('pension_deduction') ?></th>
                   <th scope="col"><?= $this->Paginator->sort('tax_amount') ?></th>
                 <!--<th scope="col"><?= $this->Paginator->sort('created') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('domestic_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('living_in_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('medical_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('entertainment_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('other_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('WHL_CISC') ?></th>                  
                  <th scope="col"><?= $this->Paginator->sort('other_deduction') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('salary_advance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('drivers_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('bar_account') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('union_due') ?></th>                  
                  <th scope="col"><?= $this->Paginator->sort('arrears') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('sc_deduction') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('ileya_xmas_bonus') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('end_of_year_bonus') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('service_charge') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('personal_loan') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('BRO_HCICS') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('surcharge') ?></th> -->                
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($transactions as $transaction): ?>
                <tr>
                  <td><?= $this->Number->format($transaction->id) ?></td>
                  <td><?= $transaction->has('employee') ? $this->Html->link($transaction->employee->name_desc, ['controller' => 'Employees', 'action' => 'view', $transaction->employee->id]) : '' ?></td>                  
                  <td><?= h($transaction->date) ?></td>
                  <td><?= $this->Number->format($transaction->basic_salary, ['places' => 2, 'pattern'=> 0,000.00,'before'=>'₦']) ?></td>                  
                  <td><?= $this->Number->format($transaction->housing_allowance, ['places' => 2, 'pattern'=> 0,000.00,'before'=>'₦']) ?></td>
                  <td><?= $this->Number->format($transaction->transport_allowance, ['places' => 2, 'pattern'=> 0,000.00,'before'=>'₦']) ?></td>
                  <td><?= $this->Number->format($transaction->utility_allowance, ['places' => 2, 'pattern'=> 0,000.00,'before'=>'₦']) ?></td>
                  <td><?= $this->Number->format($transaction->pension_deduction, ['places' => 2, 'pattern'=> 0,000.00,'before'=>'₦']) ?></td>
                  <td><?= $this->Number->format($transaction->tax_amount, ['places' => 2, 'pattern'=> 0,000.00,'before'=>'₦']) ?></td>
                  <!--<td><?= h($transaction->created) ?></td>
                  <td><?= h($transaction->modified) ?></td>
                  <td><?= $this->Number->format($transaction->domestic_allowance, ['places' => 2, 'pattern'=> 0,000.00,'before'=>'₦']) ?></td>
                  <td><?= $this->Number->format($transaction->living_in_allowance, ['places' => 2, 'pattern'=> 0,000.00,'before'=>'₦']) ?></td>
                  <td><?= $this->Number->format($transaction->medical_allowance, ['places' => 2, 'pattern'=> 0,000.00,'before'=>'₦']) ?></td>
                  <td><?= $this->Number->format($transaction->entertainment_allowance, ['places' => 2, 'pattern'=> 0,000.00,'before'=>'₦']) ?></td>
                  <td><?= $this->Number->format($transaction->other_allowance, ['places' => 2, 'pattern'=> 0,000.00,'before'=>'₦']) ?></td>
                  <td><?= $this->Number->format($transaction->WHL_CISC, ['places' => 2, 'pattern'=> 0,000.00,'before'=>'₦']) ?></td>                  
                  <td><?= $this->Number->format($transaction->other_deduction, ['places' => 2, 'pattern'=> 0,000.00,'before'=>'₦']) ?></td>
                  <td><?= $this->Number->format($transaction->salary_advance, ['places' => 2, 'pattern'=> 0,000.00,'before'=>'₦']) ?></td>
                  <td><?= $this->Number->format($transaction->drivers_allowance, ['places' => 2, 'pattern'=> 0,000.00,'before'=>'₦']) ?></td>
                  <td><?= $this->Number->format($transaction->bar_account) ?></td>
                  <td><?= $this->Number->format($transaction->union_due) ?></td>                  
                  <td><?= $this->Number->format($transaction->arrears) ?></td>
                  <td><?= $this->Number->format($transaction->sc_deduction) ?></td>
                  <td><?= $this->Number->format($transaction->ileya_xmas_bonus) ?></td>
                  <td><?= $this->Number->format($transaction->end_of_year_bonus) ?></td>
                  <td><?= $this->Number->format($transaction->service_charge) ?></td>
                  <td><?= $this->Number->format($transaction->personal_loan) ?></td>
                  <td><?= $this->Number->format($transaction->BRO_HCICS) ?></td>
                  <td><?= $this->Number->format($transaction->surcharge) ?></td>-->              
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $transaction->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transaction->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <ul class="pagination" style="padding-left: 20px">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p style="padding-left: 20px"> <?= $this->Paginator->counter(
      'Page {{page}} of {{pages}} showing {{current}} records out of {{count}} total, starting on record {{start}}, ending on {{end}}'
      ) ?>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>