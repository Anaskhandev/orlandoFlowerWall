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
                                                                                      $db = $record->video_created_at;
                                                                                      $timestamp = strtotime($db);
                                                                                      echo date("F j, Y, g:i a", $timestamp); ?></small> <br>

              <small class="text-info"><i class="fa fa-calendar"></i> Updated on: <?php
                                                                                  $db2 = $record->video_updated_at;
                                                                                  $timestamp2 = strtotime($db2);
                                                                                  echo date("F j, Y, g:i a", $timestamp2); ?></small>
              <?php if (!empty($record->video_name)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Text</span>
                  <span class="col-md-10 view_details"><?php echo $record->video_name; ?></span>
                </div>
              <?php endif; ?>

              <?php if (!empty($record->video_first)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Video</span>
                  <span class="col-md-10 view_details"><img src="<?php echo !empty($record->video_first) ? base_url('uploads/gallery/') . $record->video_first : base_url('assets/front/img/placeholder.png') ?>" height="80px"></span>
                </div>
              <?php endif; ?>
              <?php if (!empty($record->video_second)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Video</span>
                  <span class="col-md-10 view_details"><img src="<?php echo !empty($record->video_second) ? base_url('uploads/gallery/') . $record->video_second : base_url('assets/front/img/placeholder.png') ?>" height="80px"></span>
                </div>
              <?php endif; ?>
              <?php if (!empty($record->video_third)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Video</span>
                  <span class="col-md-10 view_details"><img src="<?php echo !empty($record->video_third) ? base_url('uploads/gallery/') . $record->video_third : base_url('assets/front/img/placeholder.png') ?>" height="80px"></span>
                </div>
              <?php endif; ?>
              <?php if (!empty($record->video_fourth)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Video</span>
                  <span class="col-md-10 view_details"><img src="<?php echo !empty($record->video_fourth) ? base_url('uploads/gallery/') . $record->video_fourth : base_url('assets/front/img/placeholder.png') ?>" height="80px"></span>
                </div>
              <?php endif; ?>
              <?php if (!empty($record->video_fifth)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Video</span>
                  <span class="col-md-10 view_details"><img src="<?php echo !empty($record->video_fifth) ? base_url('uploads/gallery/') . $record->video_fifth : base_url('assets/front/img/placeholder.png') ?>" height="80px"></span>
                </div>
              <?php endif; ?>
              <?php if (!empty($record->video_sixth)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Video</span>
                  <span class="col-md-10 view_details"><img src="<?php echo !empty($record->video_sixth) ? base_url('uploads/gallery/') . $record->video_sixth : base_url('assets/front/img/placeholder.png') ?>" height="80px"></span>
                </div>
              <?php endif; ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>