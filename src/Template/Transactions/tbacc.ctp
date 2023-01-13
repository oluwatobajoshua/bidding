<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?= h($acctname->acc_name) ?>'s Transactions
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('Account Details'); ?></h3>
          <div class="box-tools">
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                  <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('user_id',['label'=>'Credit Officer']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('branch_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('transactions_count') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('acc_name') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('credit') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('debit') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('balance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <td><?= $this->Number->format($acctname->id) ?> </td>
                  <td><?= $acctname->has('user') ? $this->Html->link($acctname->user->username, ['controller' => 'Users', 'action' => 'view', $acctname->user->id]) : '' ?></td>
                  <td><?= $acctname->has('branch') ? $this->Html->link($acctname->branch->name, ['controller' => 'Branches', 'action' => 'view', $acctname->branch->id]) : '' ?></td>
                  <td><?= $this->Number->format($acctname->transactions_count) ?></td>
                  <td><?= h($acctname->acc_name) ?></td>
                  <td><?= $this->Number->format($acctname->credit) ?></td>
                  <td><?= $this->Number->format($acctname->debit) ?></td>
                  <td><?= $this->Number->format($acctname->balance) ?></td>
                  <td><?= h($acctname->created) ?></td>
                  <td><?= h($acctname->modified) ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Accounts', 'action' => 'view', $acctname->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?php if(@$cashier):?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Accounts','action' => 'edit', $acctname->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?php endif?>
                  </td>
                </tr>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('Transaction List'); ?></h3>
          <h3 class="box-title"><?php if(@$cashier):?>
            <?php echo $this->Html->link(__('  Add Transaction'), ['action' => 'add',$account], ['class'=>'btn btn-success btn-xs']) ?>
            <?php endif ?></h3>
          <div class="box-tools">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="<?php echo __('Search'); ?>">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-header -->
        <?php if((count($transactions) > 0)):?>
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                  <!--<th scope="col"></th>
                  <th scope="col"><?= $this->Paginator->sort('credit_officer') ?></th>-->
                  <th scope="col"><?= $this->Paginator->sort('bank_teller') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('ledger_number') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('reg_year',['label'=>'Year']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('reg_month',['label'=>'Month']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('reg_day',['label'=>'Day']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('state') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('particular') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction): ?>
                <tr>
                  <!--<td><?=$this->Form->checkbox('ids[]', ['value' => $transaction->id]);?></td>
                  <td><?= $transaction->account->user->username ?></td> -->
                  <td><?= $transaction->bank_teller ?></td>
                  <td><?= h($transaction->ledger_number) ?></td>
                  <td><?= $transaction->reg_year ?></td>
                  <td><?= $transaction->reg_month ?></td>
                  <td><?= $transaction->reg_day ?></td>
                  <td><?= h($transaction->state) ?></td>
                  <td><?= $this->Number->format($transaction->amount) ?></td>
                  <td><?= h($transaction->particular) ?></td>
                  <td><?= h($transaction->created) ?></td>
                  <td><?= h($transaction->modified) ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $transaction->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?php if(@$cashier): ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transaction->id, $account], ['class'=>'btn btn-warning btn-xs']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transaction->id, $account], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id), 'class'=>'btn btn-danger btn-xs']) ?>
                      <?php endif ?>
                  </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        </div><?php endif ?>
        <?php if((count($transactions) == 0)):?>
        <h4 class="box-title"><?php echo __('No transaction added to this account, please click on the new button to add transaction'); ?></h4>
        <br>
        </div><?php endif ?>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    
  </div>
</section>