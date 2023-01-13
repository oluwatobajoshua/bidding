<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Companies

    <div class="pull-right"><?php echo $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
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
                  <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('rc') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('union_due') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('employees_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('company_leave') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($companies as $company): ?>
                <tr>
                  <td><?= $this->Number->format($company->id) ?></td>
                  <td><?= h($company->name) ?></td>
                  <td><?= h($company->rc) ?></td>
                  <td><?= h($company->address) ?></td>
                  <td><?= h($company->date) ?></td>
                  <td><?= $this->Number->format($company->union_due, ['places' => 2]) ?></td>
                  <td><?= $company->has('employee') ? $this->Html->link($company->employee->last_name, ['controller' => 'Employees', 'action' => 'view', $company->employee->id]) : '' ?></td>
                  <td><?= $this->Number->format($company->company_leave, ['places' => 2]) ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $company->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $company->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $company->id], ['confirm' => __('Are you sure you want to delete # {0}?', $company->id), 'class'=>'btn btn-danger btn-xs']) ?>
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