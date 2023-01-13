<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Profiles

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
                  <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('dob') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('passport') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('sign') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('status_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('account_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($profiles as $profile): ?>
                <tr>
                  <td><?= $this->Number->format($profile->id) ?></td>
                  <td><?= h($profile->last_name) ?></td>
                  <td><?= h($profile->first_name) ?></td>
                  <td><?= h($profile->dob) ?></td>
                  <td><?= h($profile->phone) ?></td>
                  <td><?= h($profile->address) ?></td>
                  <td><?= h($profile->passport) ?></td>
                  <td><?= h($profile->sign) ?></td>
                  <td><?= $profile->has('status') ? $this->Html->link($profile->status->name, ['controller' => 'Statuses', 'action' => 'view', $profile->status->id]) : '' ?></td>
                  <td><?= $this->Number->format($profile->account_id) ?></td>
                  <td><?= $profile->has('user') ? $this->Html->link($profile->user->username, ['controller' => 'Users', 'action' => 'view', $profile->user->id]) : '' ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $profile->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $profile->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $profile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id), 'class'=>'btn btn-danger btn-xs']) ?>
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