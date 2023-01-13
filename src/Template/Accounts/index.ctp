<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Accounts
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
                <input type="text" name="table_search" class="form-control pull-right" placeholder="<?php echo __('Search'); ?>">
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
                  <th scope="col"><?= $this->Paginator->sort('acc_name',['label'=>'Name']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('user_id',['label'=>'Credit Officer']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('branch_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('transactions_count',['label'=>'Transactions']) ?></th>
                  <th scope="col"><?= $this->Paginator->sort('credit') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('debit') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('balance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('acc_name',['label'=>'Name']) ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($accounts as $account): ?>
                <tr>
                  <td><?= h($account->acc_name) ?></td>
                  <td><?= $account->has('user') ? $this->Html->link($account->user->username, ['controller' => 'Users', 'action' => 'view', $account->user->id]) : '' ?></td>
                  <td><?= $account->has('branch') ? $this->Html->link($account->branch->name, ['controller' => 'Branches', 'action' => 'view', $account->branch->id]) : '' ?></td>
                  <td><?= $this->Number->format($account->transactions_count) ?></td>
                  <td><?= $this->Number->format($account->credit) ?></td>
                  <td><?= $this->Number->format($account->debit) ?></td>
                  <td><?= $this->Number->format($account->balance) ?></td>
                  <td><?= h($account->modified) ?></td>
                  <td><?= h($account->acc_name) ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $account->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?php if(@$cashier): ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $account->id], ['class'=>'btn btn-warning btn-xs']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $account->id], ['confirm' => __('Are you sure you want to delete # {0}?', $account->id), 'class'=>'btn btn-danger btn-xs']) ?>
                      <?php endif ;?>
                  </td>
                </tr>
                <tr>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <ul class="pagination" style="padding-left: 20px">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p style="padding-left: 20px">Page <?= $this->Paginator->counter() ?></p>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>