<section class="content-header">
  <h1>
    Account
    <small><?php echo __('Profile'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!--<div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
         
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('User') ?></dt>
            <dd><?= $account->has('user') ? $this->Html->link($account->user->username, ['controller' => 'Users', 'action' => 'view', $account->user->id]) : '' ?></dd>
            <dt scope="row"><?= __('Branch') ?></dt>
            <dd><?= $account->has('branch') ? $this->Html->link($account->branch->name, ['controller' => 'Branches', 'action' => 'view', $account->branch->id]) : '' ?></dd>
            <dt scope="row"><?= __('Acc Name') ?></dt>
            <dd><?= h($account->acc_name) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($account->id) ?></dd>
            <dt scope="row"><?= __('Transactions Count') ?></dt>
            <dd><?= $this->Number->format($account->transactions_count) ?></dd>
            <dt scope="row"><?= __('Credit') ?></dt>
            <dd><?= $this->Number->format($account->credit) ?></dd>
            <dt scope="row"><?= __('Debit') ?></dt>
            <dd><?= $this->Number->format($account->debit) ?></dd>
            <dt scope="row"><?= __('Balance') ?></dt>
            <dd><?= $this->Number->format($account->balance) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($account->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($account->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div> -->
  <div class="row">
      <div class="col-md-10 col-md-offset-1">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php echo $this->Html->image('user4-128x128.jpg', ['class' => 'profile-user-img img-responsive img-circle', 'alt' => 'User profile picture']); ?>

              <h3 class="profile-username text-center"><?= h($account->acc_name) ?></h3>

              <p class="text-muted text-center"><?= h('07068407128') ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                   <?= $this->Html->link(__('View Transaction'), ['controller'=>'Transactions','action' => 'tbacc', $account->id ], ['class' => 'btn btn-primary btn-block']) ?>
                </li>
                <li class="list-group-item">
                  <b>Credit Officer</b><?= $account->has('user') ? $this->Html->link($account->user->username, ['controller' => 'Users', 'action' => 'view', $account->user->id],['class' =>'pull-right']) : '' ?>
                </li>
                <li class="list-group-item">
                  <b>Branch</b> <?= $account->has('branch') ? $this->Html->link($account->branch->name, ['controller' => 'Branches', 'action' => 'view', $account->branch->id],['class' =>'pull-right']) : '' ?>
                </li>
                <li class="list-group-item">
                  <b>Transactions</b> <span class="pull-right"> <?= $this->Number->format($account->transactions_count) ?></span>
                </li>
                <?php
                                                //code for leading zeros
                                                $id = $account->id;
                                                $num = count($id);
                                                $diff = 10 - $num;
                                                
                                                //loop then add zeros
                                                while($diff > 0 )
                                                {
                                                    $id = '0' . $id;
                                                    $diff--;
                                                }
                                                                ?>  
                <li class="list-group-item">
                  <b>Account Number</b> <span class="pull-right"><?= ($id) ?> </span>
                </li>
                <li class="list-group-item">
                  <b>Credit </b> <span class="pull-right"><?= $this->Number->format($account->credit) ?> </span>
                </li>
                <li class="list-group-item">
                  <b>Debit</b> <span class="pull-right"><?= $this->Number->format($account->debit) ?> </span>
                </li>
                
                <li class="list-group-item">
                  <b>Balance</b> <span class="pull-right"><?= $this->Number->format($account->balance) ?> </span>
                </li>
              </ul>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box 
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
          </div>
        </div>
        -->
         <div class="col-md-10 col-md-offset-1">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#timeline" data-toggle="tab">Timeline</a></li><li >
              <a href="#activity" data-toggle="tab">Activity</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          <?= h($account->created) ?>
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header">Joined Sampresh</h3>

                      <div class="timeline-body">
                        Account was created by <?= h($account->user->username) ?> which automatically becomes your account manager
                      </div>
                      <div class="timeline-footer">
                       <!-- <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a> -->
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <p>
                    No activity yet
                  </p>
                </div>
                <!-- /.post -->

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
</section>
