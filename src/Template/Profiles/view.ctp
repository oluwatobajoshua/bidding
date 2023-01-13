<section class="content-header">
  <h1>
    Profile
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
            <dt scope="row"><?= __('Last Name') ?></dt>
            <dd><?= h($profile->last_name) ?></dd>
            <dt scope="row"><?= __('First Name') ?></dt>
            <dd><?= h($profile->first_name) ?></dd>
            <dt scope="row"><?= __('Phone') ?></dt>
            <dd><?= h($profile->phone) ?></dd>
            <dt scope="row"><?= __('Address') ?></dt>
            <dd><?= h($profile->address) ?></dd>
            <dt scope="row"><?= __('Passport') ?></dt>
            <dd><?= h($profile->passport) ?></dd>
            <dt scope="row"><?= __('Sign') ?></dt>
            <dd><?= h($profile->sign) ?></dd>
            <dt scope="row"><?= __('Status') ?></dt>
            <dd><?= $profile->has('status') ? $this->Html->link($profile->status->name, ['controller' => 'Statuses', 'action' => 'view', $profile->status->id]) : '' ?></dd>
            <dt scope="row"><?= __('User') ?></dt>
            <dd><?= $profile->has('user') ? $this->Html->link($profile->user->username, ['controller' => 'Users', 'action' => 'view', $profile->user->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($profile->id) ?></dd>
            <dt scope="row"><?= __('Account Id') ?></dt>
            <dd><?= $this->Number->format($profile->account_id) ?></dd>
            <dt scope="row"><?= __('Dob') ?></dt>
            <dd><?= h($profile->dob) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
