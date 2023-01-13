<!-- Content Header (Page header) -->
<section class="content-header">
  <?php if (@$admin): ?>
    <h1> Credit Officers for <?= h($branch->name) ?> Branch </h1><br>
    <?php echo $this->element('summary'); ?>
    <?php endif; ?>

<?php if (!@$admin): ?>
  <h3>
    Credit Officers for <?= h($branch->name) ?> Branch
  </h3>
 <?php endif; ?>
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
                  <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('branch') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('accounts_count') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('credit') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('debit') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('balance') ?></th>                  
                  <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($creditofficers as $co): ?>
                <tr>
                  <td><?= h($co->username) ? $this->Html->link($co->username, ['controller' => 'Users', 'action' => 'view', $co->id]): '' ?></td>
                  <td><?= $co->has('branch') ? $this->Html->link($co->branch->name, ['controller' => 'Branches', 'action' => 'view', $co->branch->id]) : '' ?></td>                
                  <td><?= $this->Number->format($co->accounts_count) ?></td>
                  <td><?= $this->Number->format($co->credit) ?></td>
                  <td><?= $this->Number->format($co->debit) ?></td>
                  <td><?= $this->Number->format($co->balance) ?></td>                  
                  <td><?= h($branch->created) ?></td>
                  <td><?= h($branch->modified) ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller'=>'Accounts','action' => 'abco', $co->id], ['class'=>'btn btn-info btn-xs']) ?>          
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
