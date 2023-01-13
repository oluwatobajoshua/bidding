<section class="content-header">
  <h1>
    Branch
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('Name') ?></dt>
            <dd><?= h($branch->name) ?></dd>
            <dt scope="row"><?= __('Address') ?></dt>
            <dd><?= h($branch->address) ?></dd>
            <dt scope="row"><?= __('Compnay') ?></dt>
            <dd><?= $branch->has('Company') ? $this->Html->link($branch->company->name, ['controller' => 'Companies', 'action' => 'view', $branch->company->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($branch->id) ?></dd>            
          </dl>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Employees') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($branch->employees)): ?>
          <table class="table table-hover">
              <tr>
                  <th scope="col"><?= $this->Paginator->sort('Id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('staff No') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('Full Name') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($branch->employees as $employee): ?>
              <tr>
                    <td><?= h($employee->id) ?></td>
                    <td><?= h($employee->staff_no) ?></td>
                    <td><?= h($employee->name_desc) ?></td>
    
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'ServiceCharges', 'action' => 'view', $serviceCharges->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'ServiceCharges', 'action' => 'edit', $serviceCharges->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'ServiceCharges', 'action' => 'delete', $serviceCharges->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serviceCharges->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>