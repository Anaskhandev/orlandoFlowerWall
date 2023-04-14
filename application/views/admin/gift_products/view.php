<div class="content-wrapper">
  <?php foreach ($record as $r) ?>
  <section class="content-header">
    <h1>
      <?php echo !empty($title) ? $title : 'Title';
      ?>
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

              <!-- <small class="text-success"><i class="fa fa-calendar"></i> Order Time: <?php
                                                                                          $db = $r->owf_flowers_created_at;
                                                                                          $timestamp = strtotime($db);
                                                                                          echo date("F j, Y, g:i a", $timestamp); ?></small> <br><br> -->

              <?php if (!empty($r->picture)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Image</span>
                  <span class="col-md-10 view_details"><img src="<?php echo base_url('/assets/front/img/upload/') . $r->picture; ?>" class="admin_imgs2" /></span>
                </div>
              <?php endif; ?>

              <?php if (!empty($r->name)) : ?>
                <div class=" form-group clearfix">
                  <span class="col-md-2 view_label">Name</span>
                  <span class="col-md-10 view_details"><?php echo $r->name; ?></span>
                </div>
              <?php endif; ?>

              <?php if (!empty($r->price)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Total Price</span>
                  <span class="col-md-10 view_details">$<?php echo $r->price; ?></span>
                </div>
              <?php endif; ?>



              <?php if (!empty($r->related)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Related Field</span>
                  <span class="col-md-10 view_details"><?php echo $r->related; ?></span>
                </div>
              <?php endif; ?>


              <?php if (!empty($r->address)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Address</span>
                  <span class="col-md-10 view_details"><?php echo $r->address; ?></span>
                </div>
              <?php endif; ?>


              <?php if (!empty($r->items)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Items</span>
                  <span class="col-md-10 view_details"><?php echo $r->items; ?></span>
                </div>
              <?php endif; ?>


              <?php if (!empty($r->order_text)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Message</span>
                  <span class="col-md-10 view_details"><?php echo $r->order_text; ?></span>
                </div>
              <?php endif; ?>

              <?php if (!empty($r->delivery)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Delivery Date</span>
                  <span class="col-md-10 view_details"><?php echo $r->delivery; ?></span>
                </div>
              <?php endif; ?>


              <?php if (!empty($r->commissionStatus)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Commission Status</span>
                  <span class="col-md-10 view_details"><?php echo $r->commissionStatus; ?></span>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>