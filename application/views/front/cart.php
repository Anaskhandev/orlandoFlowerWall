<main>
  <?php



  ?>
  <section class="cart_sec">
    <div class="spots product_spots">
      <img src="assets/img/net-s4.png" alt="">
    </div>
    <div class=" shape-1 sal-animate" data-sal="slide-left" data-sal-duration="500" data-sal-delay="700">
      <img src="<?= base_url('assets/front/img/bubble-4.png') ?>" alt="Bubble">
    </div>
    <div class=" shape-10 sal-animate" data-sal="slide-left" data-sal-duration="500" data-sal-delay="700">
      <img src="<?= base_url('assets/front//img/bubble-31.png') ?>" alt="Bubble">
    </div>
    <div class="asset-abt-img product_leaf_right">
      <img src="assets/img/asset-abt-img.png" alt="">
    </div>
    <div class="leaf_lf product_leaf_left">
      <img src="assets/img/home-4-hero-left.png" alt="">
    </div>
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-12">
          <h2>Shopping Cart</h2>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">

        <div class="col-lg-7">
          <h4>Products</h4>
          <div class="container-fluid p-0">
            <div class="row align-items-center">
              <p class="d-none" id="abcd"></p>
              <?php
              $shipping_cost = 0;
              $disabled = "";
              foreach ($cartItems as $cart) {
                $textLength = $cart['qty'] * $cart['options']['textLength'];
                $textHeight = $cart['qty'] * $cart['options']['textHeight'];

                // echo $textHeight . "<br/>";
                // echo $textLength . "<br/>";

                foreach ($cost as $co) {
                  if ($textHeight > 75) {
                    if ($textHeight > 100) {

                      if ($co->Height === '150' && $textLength <= $co->Width && $textLength > ($co->Width - 10)) {
                        // echo $co->cost . '<br/>';
                        $shipping_cost = $shipping_cost + $co->cost;
                      }
                    } else if ($co->Height === '100' && $textLength <= $co->Width && $textLength > ($co->Width - 10)) {
                      // echo $co->cost . '<br/>';
                      $shipping_cost = $shipping_cost + $co->cost;
                    }
                  } else if ($textHeight < 50) {
                    if ($co->Height === '50' && $textLength <= $co->Width && $textLength > ($co->Width - 10)) {
                      // echo $co->cost . '<br/>';
                      $shipping_cost = $shipping_cost + $co->cost;
                    }
                  } else if ($textHeight <= $co->Height && $textHeight > ($co->Height - 25) && $textLength <= $co->Width && $textLength > ($co->Width - 10)) {
                    // echo $co->cost . '<br/>';
                    $shipping_cost = $shipping_cost + $co->cost;
                  }
                }



              ?>
                <div class="row col-12 my-2">
                  <script>
                    $('#abcd').append("<?= " " . $cart['name'] . " X " . $cart['qty']   . ", " ?>")
                  </script>

                  <div class="col-lg-3">
                    <img class="img-fluid product_img" src="<?= $cart['image'] ?>" alt="">
                  </div>
                  <div class="col-lg-6 product_card_detail">
                    <div class="btn_cart">

                      <a href="#"><?= $cart['name'] ?></a>
                    </div>
                    <p>
                      <span>Price per item: </span>$<?php echo $cart['price']; ?>
                    </p>

                    <p>
                      <?php
                      if (!empty($cart['options']['recieving_date'])) {
                      ?>
                        <span>Delivery Date: </span>
                        <?php echo $cart['options']['recieving_date']; ?>

                      <?php
                      }
                      ?>
                    </p>
                    <p><?php
                        // echo print_r($cart['options']);
                        ?></p>
                    <p>
                      <span>Quantity: </span> <input class="form-control" type="number" min="1" size="3" maxlength="3" class="quantity" name="updates[]" id="updates_19583041665" value="<?= $cart['qty'] ?>" data-line-id="1" onchange="updateCartItem(this, '<?= $cart["rowid"]; ?>')">
                    </p>
                    <p>
                      <span>Item total: </span>$<span class="amount"><?= $cart['qty'] * $cart['price'] ?></span>
                    </p>
                    <a href="<?= base_url('cart/removeItem/') . $cart['rowid'] ?>"> Remove</a>
                  </div>
                  <hr class="mt-4" />
                </div>
              <?php
                $type = array();
                $type_n = $cart['options']['type_n'];
                $deliveryPrice = 0;
                if ($type_n === "Flower Page") {
                  array_push($type, "true");
                }
                if (count($type) > 0) {
                  $disabled = "disabled";
                  $deliveryPrice = $delivery_price[0]->price;
                }
              }
              // echo $shipping_cost;
              ?>
            </div>
          </div>
        </div>
        <!-- <div class="input-group date" data-provide="datepicker">
                    <input type="text" class="form-control">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div> -->
        <div class="col-lg-5 cart_det">
          <h4>SUBTOTAL</h4>
          <?php
          $TPrice = $this->cart->total() + $this->cart->total() * $tax;
          $T_Price = round($TPrice, 2);
          ?>
          $ <span id="total_price"><?php echo $T_Price ?></span> USD
          <p>Including <?php echo $tax * 100 ?>% tax</p>
          <!-- <p>or 4 interest-free payments of $2.13 with</p>
          <p>Orders will be processed in USD.</p> -->

          <label class="fw-bold mt-3 small" for="check_box_purchase"><input class="check_box" type="checkbox" name="check_box" id="check_box_purchase">BY PURCHASING A CUSTOM
            ITEM FROM OFW, YOU ARE AGREEING TO OUR PROCESSING TIMES, CUSTOM ORDER TERMS AND
            SHIPPING + RETURNS POLICY.</label>

          <div class="btn_check">
            <a class="addtocartbtn" href="javascript:void(0)" data-item_index="1" id="createYourOwnButtonId">CHECKOUT</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<div class="modal fade" id="createYourOwnModalId" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CHECKOUT FOR OFW GIFT SHOP</h5>
      </div>
      <form id="cart_half_cred" action="<?= base_url('make-stripe-payment-owf'); ?>" method="post">
        <div class="modal-body">
          <!-- <div class="form-group">
            <label for="fullName" class="col-form-label">Full Name:</label>
            <input type="text" class="form-control" id="fullName" name="fullName" required>
          </div>
          <div class="form-group">
            <label for="email" class="col-form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="address" class="col-form-label">Order Note:</label>
            <textarea class="form-control" id="order_text" name="order_text"></textarea>
          </div> -->
          <div class="form-group">
            <label for="address" class="col-form-label">Address:</label>
            <textarea class="form-control" id="address" name="address" required readonly></textarea>
          </div>
          <div class="form-group">
            <label for="fullName" class="col-form-label">Items:</label>
            <input type="text" class="form-control" id="items" name="items" required readonly>
          </div>

          <!-- <div class="form-group">
            <label for="totalPrice" class="col-form-label">Total Price in $:</label>
            <input type="number" class="form-control" id="totalPrice" name="totalPrice" required readonly>
          </div> -->

          <!-- <div class="form-group">
            <label for="delivery_type" class="col-form-label">Delivery type:</label>
            <input type="text" class="form-control" id="delivery_type" name="delivery_type" value="<?php echo $this->session->userdata('delivery_type'); ?>" required readonly>
          </div> -->

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary createYourOwnCloseButtonId" data-dismiss="modal">Close</button>
          <input type="hidden" name="neon_type" id="neon_type" />
          <button type="submit" class="btn" style="background-color:#CE3DBA;color:white">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- <div class="container">
  <div class="row " style="width:50vw;box-sizing: border-box;word-break:break-all;">

  </div>
</div> -->

<script>
  function updateCartItem(obj, rowid) {
    console.log(rowid)
    $.get("<?= base_url('cart/updateItemQty/'); ?>", {
      rowid: rowid,
      qty: obj.value
    }, function(resp) {
      if (resp == 'ok') {
        location.reload();
      } else {
        alert('Cart update failed, please try again.');
      }
    });
  }

  $(document).ready(function() {
    $(document).on('click', '.createYourOwnCloseButtonId', function() {
      $('#createYourOwnModalId').modal('hide');
      return false;
    })
    $(document).on('click', '#createYourOwnButtonId', function() {

      var boxes = $('input[name=check_box]:checked');
      if ($('input[name=check_box]').is(':checked')) {
        var total_sel_price = $("#total_price").text();

        if (total_sel_price == '' || total_sel_price == "0") {
          toastr.error('Price can not be 0! Please add something in Cart First');
          return false;
        }
        var order_text = $(".order_text").val();
        var items = $('#abcd').text()
        console.log(items)
        $("#items").val(items);
        var delivery_type = $('.selector-item_radio:checked').val()
        $("#delivery_type").val(delivery_type);
        var cost = '<?php echo $shipping_cost; ?>';
        var deliveryPrice = <?php echo $deliveryPrice; ?>;
        let isnum = /^\d+$/.test(cost);
        if (delivery_type == 'shipping' && isnum == true) {
          var total_sel_price2 = parseFloat(total_sel_price) + parseInt(cost);
          $("#totalPrice").val(total_sel_price2);
        } else if (delivery_type == 'local delivery' && isnum == true) {
          var total_sel_price2 = parseFloat(total_sel_price) + parseInt(deliveryPrice);
          $("#totalPrice").val(total_sel_price2);
        } else {
          $("#totalPrice").val(total_sel_price);
        }
        if ($('.selector-item_radio:checked').val() === 'local delivery' || $('.selector-item_radio:checked').val() === 'shipping') {
          address = $('#yaddress').val()
          if (address === '') {
            toastr.error('Please enter address');
            return false;
          } else {
            if ($('.selector-item_radio:checked').val() === 'shipping') {
              address2 = 'Shipping: ' + address
              $('#address').val(address2)
            } else {
              $('#address').val(address)
            }
          }
        } else if ($('.selector-item_radio:checked').val() === 'store pickup') {
          $('#address').val('Pickup From Store')
        }
        $('#cart_half_cred').submit()
        // $('#createYourOwnModalId').modal('show');
      } else {
        toastr.error('Please check the checkbox');
        return false;
      }


    });
    $('.datepicker').datepicker({
      format: 'mm/dd/yyyy',
      startDate: '+3d'
    });

  });
</script>