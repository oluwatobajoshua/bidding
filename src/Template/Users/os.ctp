<!-- Content Header (Page header) -->
<section class="content-header">
  <?php if (@$admin): ?>
    <h1> Other Services for <?= h($branch->name) ?> Branch </h1><br>
    <?php echo $this->element('summary'); ?>
    <?php endif; ?>

<?php if (!@$admin): ?>
  <h3>
    Other Services for <?= h($branch->name) ?> Branch
  </h3>
 <?php endif; ?>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('Other Services coming soon...'); ?></h3>
          <div class="box-tools">

          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
