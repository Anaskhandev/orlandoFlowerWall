<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?php echo !empty($title) ? $title : 'Title'; ?>
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">s
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">View Data</h3>
          </div>
          <div class="col-md-12">
            <div class="box-body box-body-view">
              <small class="text-success"><i class="fa fa-calendar"></i> Created on: <?php
                                                                                      $db = $record->sign_logos_created_at;
                                                                                      $timestamp = strtotime($db);
                                                                                      echo date("F j, Y, g:i a", $timestamp); ?></small> <br>

              <?php if (!empty($record->fname)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">First Name</span>
                  <span class="col-md-10 view_details"><?php echo $record->fname; ?></span>
                </div>
              <?php endif; ?>

              <?php if (!empty($record->lname)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Last Name</span>
                  <span class="col-md-10 view_details"><?php echo $record->lname; ?></span>
                </div>
              <?php endif; ?>

              <?php if (!empty($record->email)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Email</span>
                  <span class="col-md-10 view_details"><?php echo $record->email; ?></span>
                </div>
              <?php endif; ?>

              <?php if (!empty($record->phone)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Phone</span>
                  <span class="col-md-10 view_details"><?php echo $record->phone; ?></span>
                </div>
              <?php endif; ?>

              <?php if (!empty($record->budget)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Budget</span>
                  <span class="col-md-10 view_details"><?php echo $record->budget; ?></span>
                </div>
              <?php endif; ?>

              <?php if (!empty($record->size)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Size</span>
                  <span class="col-md-10 view_details"><?php echo $record->size; ?></span>
                </div>
              <?php endif; ?>

              <?php if (!empty($record->indoorOutdoor)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Indoor or Outdoor?</span>
                  <span class="col-md-10 view_details"><?php echo $record->indoorOutdoor; ?></span>
                </div>
              <?php endif; ?>

              <?php if (!empty($record->tellMore)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Brief</span>
                  <span class="col-md-10 view_details"><?php echo $record->tellMore; ?></span>
                </div>
              <?php endif; ?>

              <?php if (!empty($record->image)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Image</span>
                  <span class="col-md-10 view_details"><img src="<?php echo !empty($record->image) ? base_url('uploads/sign_logos/') . $record->image : base_url('assets/front/img/placeholder.png') ?>" height="80px"></span>
                </div>
              <?php endif; ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>