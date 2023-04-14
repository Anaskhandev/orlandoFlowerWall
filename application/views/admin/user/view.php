<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?php echo !empty($title) ? $title : 'Title'; ?>
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">View Data</h3>
          </div>
          <div class="col-md-12">
            <div class="box-body box-body-view">

              <small class="text-success"><i class="fa fa-calendar"></i>User Created on: <?php
                                                                                          $db = $record->master_admin_created_at;
                                                                                          $timestamp = strtotime($db);
                                                                                          echo date("F j, Y, g:i a", $timestamp); ?></small> <br>

              <small class="text-info"><i class="fa fa-calendar"></i> Updated on: <?php
                                                                                  $db2 = $record->master_admin_updated_at;
                                                                                  $timestamp2 = strtotime($db2);
                                                                                  echo date("F j, Y, g:i a", $timestamp2); ?></small>

              <?php if (!empty($record->master_admin_name)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">User Name</span>
                  <span class="col-md-10 view_details"><?php echo $record->master_admin_name; ?></span>
                </div>
              <?php endif; ?>

              <?php if (!empty($record->master_admin_email)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">User Email</span>
                  <span class="col-md-10 view_details"><?php echo $record->master_admin_email; ?></span>
                </div>
              <?php endif; ?>

              <?php if (!empty($record->master_admin_phone)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">User Phone</span>
                  <span class="col-md-10 view_details"><?php echo $record->master_admin_phone; ?></span>
                </div>
              <?php endif; ?>

              <?php if (!empty($record->master_admin_password)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">User Password</span>
                  <span class="col-md-10 view_details"><?php echo $this->encryption->decrypt($record->master_admin_password); ?></span>
                </div>
            </div>
          <?php endif; ?>

          <?php if (!empty($record->master_admin_address)) : ?>
            <div class="form-group clearfix">
              <span class="col-md-2 view_label">User Address</span>
              <span class="col-md-10 view_details"><?php echo $record->master_admin_address; ?></span>
            </div>
          <?php endif; ?>

          <?php if (!empty($record->master_admin_role)) : ?>
            <div class="form-group clearfix">
              <span class="col-md-2 view_label">User Role</span>
              <span class="col-md-10 view_details"><?php echo $record->master_admin_role; ?></span>
            </div>
          <?php endif; ?>

          <?php if (!empty($record->master_admin_image)) : ?>
            <div class="form-group clearfix">
              <span class="col-md-2 view_label">User Image</span>
              <span class="col-md-10 view_details"><img src="<?php echo !empty($record->master_admin_image) ? base_url('uploads/users/') . $record->master_admin_image : base_url('assets/front/img/placeholder.png') ?>" height="80px"></span>
            </div>
          <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
</div>
</section>
</div>