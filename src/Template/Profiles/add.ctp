<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Profile $profile
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Profile
      <small><?php echo __('Add'); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('Form'); ?></h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo $this->Form->create($profile, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
                echo $this->Form->control('last_name');
                echo $this->Form->control('first_name');
                echo $this->Form->control('dob');
                echo $this->Form->control('phone');
                echo $this->Form->control('address');
                echo $this->Form->control('passport');
                echo $this->Form->control('sign');
                echo $this->Form->control('status_id', ['options' => $statuses]);
                echo $this->Form->control('account_id');
                echo $this->Form->control('user_id', ['options' => $users]);
              ?>
            </div>
            <!-- /.box-body -->

          <?php echo $this->Form->submit(__('Submit')); ?>

          <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.box -->
      </div>
  </div>
  <!-- /.row -->
</section>
