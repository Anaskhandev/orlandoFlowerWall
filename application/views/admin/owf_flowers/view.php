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

              <small class="text-success"><i class="fa fa-calendar"></i> Order Time: <?php
                                                                                      $db = $r->owf_flowers_created_at;
                                                                                      $timestamp = strtotime($db);
                                                                                      echo date("F j, Y, g:i a", $timestamp); ?></small> <br><br>

              <div class="form-group clearfix">
                <span class="col-md-2 view_label">Payment ID</span>
                <span class="col-md-10 view_details"><?php echo $r->payment_id; ?></span>
              </div>


              <?php if (!empty($r->totalPrice)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Total Price</span>
                  <span class="col-md-10 view_details">$<?php echo $r->totalPrice; ?></span>
                </div>
              <?php endif; ?>

              <?php if (!empty($r->fullName)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Full Name</span>
                  <span class="col-md-10 view_details"><?php echo $r->fullName; ?></span>
                </div>
              <?php endif; ?>


              <?php if (!empty($r->email)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Email</span>
                  <span class="col-md-10 view_details"><?php echo $r->email; ?></span>
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

              <?php if (!empty($r->delivery_type)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Delivery type</span>
                  <span class="col-md-10 view_details"><?php echo $r->delivery_type; ?></span>
                </div>
              <?php endif; ?>


              <?php if (!empty($r->delivering)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Delivering Details</span>
                  <span class="col-md-10 view_details">
                    <?php
                    $cartArray = unserialize($r->delivering);
                    $i = 1;
                    foreach ($cartArray as $c) {
                      if (array_key_exists('delivering', $c['options'])) {

                        echo 'ITEM ' . $i . ' :';
                        echo '<br/>' . '<pre>Name: ' . $c['name'] . '<br/>';
                        echo '<br/>' . 'Quantity: ' . $c['qty'] . '<br/>';
                        echo '<br/>' . 'image : <img src="' . $c['image'] . '" class="admin_imgs" alt="image"/><br/>';
                        echo '<br/>' . 'Delivering date : ' . $c['options']['recieving_date'] . '<br/>';
                        echo '<br/>' . 'Delivering To : ' . $c['options']['delivering'] . '<br/>';
                        if (array_key_exists('image', $c['options'])) {
                          echo '<br/>' . 'uploaded image : <img src="' . base_url() . '/assets/front/img/upload/' . $c['options']['image'] . '" class="admin_imgs" alt="image"/><br/>';
                        } else if (array_key_exists('amount_flowers', $c['options'])) {
                          echo '<br/>' . 'Variant: ' . $c['options']['amount_flowers'] . '<br/>';
                        }
                        echo '<br/>' . 'Price: ' . $c['price'] . '</pre><br/>';
                      } else  if (array_key_exists('sizeTitle', $c['options'])) {

                        echo 'ITEM ' . $i . ' :';
                        echo '<br/>' . '<pre>Name: ' . $c['name'] . '<br/>';
                        echo '<br/>' . 'Quantity: ' . $c['qty'] . '<br/>';
                        echo '<br/>' . 'Delivering date : ' . $c['options']['recieving_date'] . '<br/>';
                        echo '<br/>' . 'image : <img src="' . $c['image'] . '" alt="image"/><br/>';
                        echo '<br/>' . 'Text Length : ' . $c['options']['textLength'] . '<br/>';
                        echo '<br/>' . 'Text Height : ' . $c['options']['textHeight'] . '<br/>';
                        echo '<br/>' . 'Text Font Size : ' . $c['options']['textFontSize'] . '<br/>';
                        echo '<br/>' . 'Text Color : ' . $c['options']['textColor'] . '<br/>';
                        echo '<br/>' . 'BackBoard : ' . $c['options']['backBoard'] . '<br/>';
                        echo '<br/>' . 'Price : ' . $c['options']['totalPrice'] . '<br/>';
                        echo '<br/>' . 'Neon Type : ' . $c['options']['neon_type'] . '<br/>';
                        echo '<br/>' . 'Background Color : ' . $c['options']['bg_color'] . '<br/>';


                        echo '<br/>' . 'Price: ' . $c['price'] . '</pre><br/>';
                      }
                      $i++;
                    } ?>
                  </span>
                </div>
              <?php endif; ?>

              <?php if (!empty($r->recieving_date)) : ?>
                <div class="form-group clearfix">
                  <span class="col-md-2 view_label">Delivery date</span>
                  <span class="col-md-10 view_details"><?php echo $r->recieving_date; ?></span>
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