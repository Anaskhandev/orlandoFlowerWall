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



              <?php if (!empty($r->heading)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Heading</span>
                  <span class="col-md-10 view_details"><?php echo $r->heading; ?></span>
                </div>
              <?php endif; ?>

              <?php if (!empty($r->page)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Page</span>
                  <span class="col-md-10 view_details"><?php echo $r->page; ?></span>
                </div>
              <?php endif; ?>


              <?php if (!empty($r->relatedContent)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Related Content</span>
                  <span class="col-md-10 view_details"><?php echo $r->relatedContent; ?></span>
                </div>
              <?php endif; ?>


              <?php if (!empty($r->text)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Text</span>
                  <span class="col-md-10 view_details"><?php echo $r->text; ?></span>
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