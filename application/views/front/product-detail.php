<main>
    <!-- <section class="product_bg">
    <div class="container">
      <div class="row justify-content-center text-center text-white">
        <div class="col-lg-12">
          <h2>Products Details</h2>
          <a href="index.html">Home</a> <span class="fw-bold">/</span>
          <a href="products.html">Product</a>
        </div>
      </div>
    </div>
  </section> -->
    <section id="services" class="services section-bg">
        <div class="container">
            <!-- <div class="col-lg-12 text-center">
        <h2>Wave Your Crown</h2>


      </div> -->


<!-- <?php echo print_r($product) ?> -->
            <div class="row row-sm">
                <div class="alert alert-success" id="success_alert" role="alert">
                    Product Added to cart
                </div>




                <div class="col-md-6 _boxzoom">
                    <!-- <div class="zoom-thumb">
                        <ul class="piclist">
                            <li><img src="assets/img/gallery-img3.jpg"></li>
                            <li><img src="assets/img/gallery-img5.jpg"></li>
                            <li><img src="assets/img/gallery-img6.jpg"></li>
                            <li><img src="assets/img/gallery-img7.webp"></li>
                        </ul>
                    </div> -->
                    <div class="_product-images">
                        <div class="picZoomer owl-carousel">
                            <?php
                            $images = $product->images;
                            foreach ($images as $image) {
                            ?>
                                <img class="my_img item img-fluid" src="<?= $image->url; ?>" alt="">
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <!-- <div class="">
                        <?php
                        // $images = $product->images;
                        // foreach ($images as $image) {
                        ?>
                            <img class="my_img below_carousel img-fluid" src="<?= $image->url; ?>" alt="">
                        <?php
                        // }
                        ?>
                    </div> -->

                    <script>
                        $('.owl-carousel').owlCarousel({
                            loop: true,
                            margin: 10,
                            nav: true,
                            navText: [
                                "<i class='fa fa-caret-left'></i>",
                                "<i class='fa fa-caret-right'></i>"
                            ],
                            autoplay: true,
                            autoplayHoverPause: true,
                            items: 1
                        })
                    </script>
                </div>
                <div class="col-md-6">
                    <div class="_product-detail-content">
                        <input type="hidden" id="product_id" name="product_id" value="<?= $product->id; ?>">
                        <h3 class="_p-name"><?= $product->name; ?> </h3>
                        <div class="_p-price-box">
                            <div class="p-list">
                                <span> Price : </span>
                                <span class="price">$<?= $product->price_excluding_tax; ?> </span>
                            </div>
                            <form action="<?= base_url("ProductDetail/addToCart/{$product->id}") ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                <ul class="spe_ul"></ul>
                                <div class="_p-qty-and-cart">
                                    <div class="_p-add-cart">
                                        <div class="_p-add-cart">
                                            <div class="_p-qty">
                                                <span> Quantity </span>
                                                <!-- <div class="value-button decrease_" id="" value="Decrease Value">-</div> -->
                                                <input type="number" min="1" name="qty" id="number" value="1" />
                                                <!-- <div class="value-button increase_" id="" value="Increase Value">+</div> -->
                                            </div>
                                        </div>
                                        <div class="_p-features">
                                            <span> Description About this product:- </span>
                                            <?php echo $product->description . '<br/>';
                                            // echo print_r($product->product_category->name); 
                                            ?>
                                        </div>
                                        <!-- <a href="cart" class="theme-btn btn buy-btn" tabindex="0">
                                            <i class="fa fa-shopping-cart"></i> See Cart
                                        </a> -->
                                        <div class="selector my-4">
                                            <?php
                                            if (count($variants) > 1) {

                                                usort($variants, function ($a, $b) {
                                                    return $a->sku - $b->sku;
                                                });

                                                foreach ($variants as $variant) {
                                                    // echo "<pre>";
                                                    // echo $variant->sku . "<br/>" . "<br/>";
                                                    // echo "</pre>  <br/>";
                                                    // continue;
                                                    $name = substr($variant->variant_name, strpos($variant->variant_name, "/") + 1);
                                                    $price  = $variant->price_including_tax;

                                            ?>
                                                    <div class="selecotr-item fifty">
                                                        <input type="radio" id="<?php echo $name ?>" data-price="<?php echo $price  ?>" name="selector" class="selector-item_radio" value="<?php echo $name  ?>">
                                                        <label for="<?php echo $name ?>" class="selector-item_label"><?php echo $name  ?></label>
                                                    </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <?php
                                        // echo print_r($product);
                                        if ($product->product_category->name === 'Flower Page') {
                                        ?>

                                            <div class="form-group mb-3">
                                                <input type="text" class="form-control" name="amount_flowers" id="amount_flowers" hidden>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="delivering">Who we are delivering to?</label>
                                                <input type="text" class="form-control" name="delivering" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="recieving_date">Desired date of delivery?</label>
                                                <input type="date" class="form-control" name="recieving_date" required>
                                                <!-- <small>Please allow a minimum of 24 hours for your order.</small> -->
                                            </div>
                                            <script>
                                                $('.fifty:first-child input').attr('checked', 'true')
                                                $('.selecotr-item').click(function() {
                                                    $('#amount_flowers').val($('.selector-item_radio:checked').val())
                                                    // console.log($('.selector-item_radio:checked').attr('id'))    
                                                    $('.price').text('$' + $('.selector-item_radio:checked').attr('data-price'))
                                                    $('input[name="price"]').val($('.selector-item_radio:checked').attr('data-price'))
                                                })
                                            </script>


                                            <?php
                                        } else if ($product->product_category->name === 'Gifts And More') {
                                            if ($product->brand->name === 'Tops' || $product->brand->name === "Drinkware") {
                                            } else {
                                            ?>
                                                <div class="form-group mb-3">
                                                    <label><strong>Upload Image Of Design</strong></label>
                                                    <div class="input-group-btn">
                                                        <div class="image-upload">
                                                            <img src="">
                                                            <div class="file-btn">
                                                                <input type="file" id="picture" class="form-control" name="picture">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="delivering">What do you want to to be written on it? </label>
                                                    <input type="text" class="form-control" name="delivering">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="recieving_date">Desired date of delivery?</label>
                                                    <input type="date" class="form-control" name="recieving_date" required>
                                                    <!-- <small>Please allow a minimum of 24 hours for your order.</small> -->
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>



                                        <button type="submit" class="theme-btn btn">Add to Cart</button>

                                        <!-- <a href="<?= base_url("ProductDetail/addToCart/{$product->id}") ?>" class="theme-btn btn">
                                            <i class="fa fa-shopping-cart"></i> Add to Cart
                                        </a> -->
                                        <input type="hidden" name="type_n" value="<?= $product->type->name ?>" />
                                        <input type="hidden" name="pid" value="<?= $product->id; ?>" />
                                        <input type="hidden" name="price" value="<?= $product->price_excluding_tax; ?>" />
                                        <input type="hidden" name="url" value="" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>