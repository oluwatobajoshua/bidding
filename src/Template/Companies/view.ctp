<section class="content-header">
  <h1>
    Company
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
            <dd><?= h($company->name) ?></dd>
            <dt scope="row"><?= __('Rc') ?></dt>
            <dd><?= h($company->rc) ?></dd>
            <dt scope="row"><?= __('Address') ?></dt>
            <dd><?= h($company->address) ?></dd>
            <dt scope="row"><?= __('Employee') ?></dt>
            <dd><?= $company->has('employee') ? $this->Html->link($company->employee->last_name, ['controller' => 'Employees', 'action' => 'view', $company->employee->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($company->id) ?></dd>
            <dt scope="row"><?= __('Union Due') ?></dt>
            <dd><?= $this->Number->format($company->union_due) ?></dd>
            <dt scope="row"><?= __('Company Leave') ?></dt>
            <dd><?= $this->Number->format($company->company_leave) ?></dd>
            <dt scope="row"><?= __('Date') ?></dt>
            <dd><?= h($company->date) ?></dd>
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
          <h3 class="box-title"><?= __('Service Charges') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($company->service_charges)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Grade Id') ?></th>
                    <th scope="col"><?= __('Amount') ?></th>
                    <th scope="col"><?= __('Ileya Xmas Bonus') ?></th>
                    <th scope="col"><?= __('End Of Year Bonus') ?></th>
                    <th scope="col"><?= __('Njic Arrears') ?></th>
                    <th scope="col"><?= __('Company Id') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($company->service_charges as $serviceCharges): ?>
              <tr>
                    <td><?= h($serviceCharges->id) ?></td>
                    <td><?= h($serviceCharges->grade_id) ?></td>
                    <td><?= h($serviceCharges->amount) ?></td>
                    <td><?= h($serviceCharges->ileya_xmas_bonus) ?></td>
                    <td><?= h($serviceCharges->end_of_year_bonus) ?></td>
                    <td><?= h($serviceCharges->njic_arrears) ?></td>
                    <td><?= h($serviceCharges->company_id) ?></td>
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