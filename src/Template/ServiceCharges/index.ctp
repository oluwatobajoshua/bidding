<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Service Charges

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
                  <th scope="col"><?= $this->Paginator->sort('grade_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('ileya_xmas_bonus') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('end_of_year_bonus') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('njic_arrears') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($serviceCharges as $serviceCharge): ?>
                <tr>
                  <td><?= $this->Number->format($serviceCharge->id) ?></td>
                  <td><?= $serviceCharge->has('grade') ? $this->Html->link($serviceCharge->grade->name, ['controller' => 'Grades', 'action' => 'view', $serviceCharge->grade->id]) : '' ?></td>
                  <td><?= $this->Number->format($serviceCharge->amount) ?></td>
                  <td><?= $this->Number->format($serviceCharge->ileya_xmas_bonus) ?></td>
                  <td><?= $this->Number->format($serviceCharge->end_of_year_bonus) ?></td>
                  <td><?= $this->Number->format($serviceCharge->njic_arrears) ?></td>
                  <td><?= $serviceCharge->has('company') ? $this->Html->link($serviceCharge->company->name, ['controller' => 'Companies', 'action' => 'view', $serviceCharge->company->id]) : '' ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $serviceCharge->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $serviceCharge->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $serviceCharge->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serviceCharge->id), 'class'=>'btn btn-danger btn-xs']) ?>
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