<main>

  <section class="banner-section p-0" id="home">

    <div class="banner-carousel owl-theme owl-carousel">
      <?php foreach ($data as $a) : ?>

        <div class="slide-item">
          <div class="image-layer" style="background-image: url( <?php echo base_url('/assets/front/img/upload/' . $a->picture); ?>);">
          </div>
          <div class="auto-container">
            <div class="row justify-content-center text-center">
              <div class="col-lg-6">
                <div class="content-box">
                  <div class="content">
                    <div class="inner text-center">
                      <?php
                      if (!empty($a->heading)) {
                      ?>
                        <div class="sub-title">welcome to</div>
                        <h1> <?php echo $a->heading; ?></span>
                        </h1>
                      <?php

                      }
                      ?>
                      <div class="link-box">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      <?php endforeach; ?>


    </div>
    </div>
  </section>
  <!-- <section class="hero_sec">

        </section> -->
  <section class="about_sec pb-lg-0">
    <div class="left_shape">
      <img src="<?= base_url('assets/front/img/abou-shape side.png'); ?>" alt="">
    </div>
    <div class="right_image">
      <img src="<?= base_url('assets/front/img/right_image-2.png'); ?>" alt="">
    </div>
    <div class="container">
      <div class="row left_image justify-content-center ">
        <div class="col-lg-11">
          <div class="container-fluid">
            <div class="row align-items-center">
              <div class="col-lg-12 text-center">
                <h2>OFW GIFT SHOP</h2>
                <h3 class="mb-4">Rentals, Florist & Gift Shop</h3>
                <p>Welcome to the OFW Shop! Your happy neighborhood fresh flower and custom gift shop.
                </p>
                <p>Walk into our studio to discuss your party rentals and take home a bit of the party
                  with a custom gift or stunning fresh flower arrangement.</p>
                <p>All your favorite things, straight from the hands of your favorite team at Orlando
                  Flower Walls & Rentals.</p>
                <p>We can't wait to party with you!</p>
              </div>
              <div class=" mt-5 text-center">
                <!-- <img class="img-fluid left" src="<?= base_url('assets/front/img/about_side.jpeg'); ?>" alt=""> -->
                <!-- <div class="left_bg">
                                        <img src="<?= base_url('assets/front/img/08-1.png.webp'); ?>" alt="">
                                    </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php

  function moveElement(&$section_content, $a, $b)
  {
    $out = array_splice($section_content, $a, 1);
    array_splice($section_content, $b, 0, $out);
  }




  $count = count($section_content);
  $i = 0;
  while ($i < $count) {
    $name = $section_content[$i]['heading'];
    if (strpos($name, "Flower") !== false) {
      moveElement($section_content, $i, 0);
    }
    if (strpos($name, "Sign") !== false) {
      moveElement($section_content, $i, 1);
    }
    if (strpos($name, "Gift") !== false) {
      moveElement($section_content, $i, 2);
    }
    $i++;
  }

  foreach ($section_content as $d) :

    $heading = $d['heading'];
    $id = str_replace(' ', '', $heading);
  ?>
    <section class="name_neon pt-4" id="<?= $id; ?>">
      <div class="tables-right-dec">
        <img src="<?= base_url('assets/front/img/polka-pink.png'); ?>" alt="">
      </div>
      <div class="bg_net">
        <img src="<?= base_url('assets/front/img/bg_animated.png'); ?>" alt="">
      </div>
      <ul class="list-unstyled shape-group-18">
        <li class="shape shape-4 sal-animate" data-sal="zoom-in" data-sal-duration="500" data-sal-delay="600">
          <img class="img-fluid" src="<?= base_url('assets/front/img/bubble-15.png'); ?>" alt="Shape">
        </li>
        <li class="shape shape-5 sal-animate" data-sal="zoom-in" data-sal-duration="500" data-sal-delay="600">
          <img class="img-fluid" src="<?= base_url('assets/front/img/bubble-14.png'); ?>" alt="Shape">
        </li>
      </ul>
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-12">
            <?= !empty($heading) ? '<h2>' . $heading . '</h2>' : ''; ?>
            <p><?= $d['subHeading']; ?></p>
          </div>
        </div>
        <div class="row justify-content-center text-center images">
          <?php
          $filterProducts = array_filter($products, function ($val, $key) use ($d) {
            return $val->brand->id == $d["id"];
          }, ARRAY_FILTER_USE_BOTH);

          // $reply = $this->db->select('*')->from('gift_products')->where(array('related' => $d['relatedContent'], 'gift_products_status' => 'enable'))->get()->result();
          foreach ($filterProducts as $f) :

            if (!empty($f->variant_parent_id)) {
              continue;
            }

          ?>
            <div class="col-md-3 mb-5">
              <div class="position-relative items_box">
                <img class="img-fluid flower_img" src="<?= isset($f->images[0]) ? $f->images[0]->url : $f->image_url; ?>" alt="">
                <div class="p_overlay">
                  <h3><?= $f->name; ?></h3>
                  <h4>$
                    <?= $f->price_excluding_tax; ?>
                  </h4>
                  <a class="p_btn" href="<?= base_url('ProductDetail?id=') . $f->id; ?>">QUICK VIEW</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="text-center">
          <?php
          $name = $d["heading"];
          if (strpos($name, "Flower") !== false) {
            echo '<a class="btn theme-btn text-white" href="flowers">
              SHOP FLOWERS
            </a>';
          } elseif (strpos($name, "Sign") !== false) {

            echo '<a class="btn theme-btn text-white" href="custom_neon">
              SHOP SIGNS
            </a>';
          } elseif (strpos($name, "Gift") !== false) {
            echo '<a class="btn theme-btn text-white" href="gifts">
              SHOP GIFTS
            </a>';
          } ?>
        </div>
      </div>
    </section>
  <?php
  endforeach
  ?>

  <!-- <section class="our_gallery pt-0">
            <div class="container-fluid">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-12">
                        <h2>We make dreams bloom to life!</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 p-0 item">
                        <a class="image-popup-vertical-fit" href="<?= base_url('assets/front/img/dream1.webp'); ?>">
                            <img class="img-fluid p-0" src="<?= base_url('assets/front/img/dream1.webp'); ?>">
                        </a>
                    </div>
                    <div class="col-lg-3 p-0 item">
                        <a class="image-popup-vertical-fit" href="<?= base_url('assets/front/img/dream2.webp'); ?>">
                            <img class="img-fluid p-0" src="<?= base_url('assets/front/img/dream2.webp'); ?>">
                        </a>
                    </div>
                    <div class="col-lg-3 p-0 item">
                        <a class="image-popup-vertical-fit" href="<?= base_url('assets/front/img/dream3.webp'); ?>">
                            <img class="img-fluid p-0" src="<?= base_url('assets/front/img/dream3.webp'); ?>">
                        </a>
                    </div>
                    <div class="col-lg-3 p-0 item">
                        <a class="image-popup-vertical-fit" href="<?= base_url('assets/front/img/dream4.webp'); ?>">
                            <img class="img-fluid p-0" src="<?= base_url('assets/front/img/dream4.webp'); ?>">
                        </a>
                    </div>
                    <div class="col-lg-3 p-0 item">
                        <a class="image-popup-vertical-fit" href="<?= base_url('assets/front/img/dream5.webp'); ?>">
                            <img class="img-fluid p-0" src="<?= base_url('assets/front/img/dream5.webp'); ?>">
                        </a>
                    </div>
                    <div class="col-lg-3 p-0 item">
                        <a class="image-popup-vertical-fit" href="<?= base_url('assets/front/img/gallery-img6.webp'); ?>">
                            <img class="img-fluid p-0" src="<?= base_url('assets/front/img/gallery-img6.webp'); ?>">
                        </a>
                    </div>
                    <div class="col-lg-3 p-0 item">
                        <a class="image-popup-vertical-fit" href="<?= base_url('assets/front/img/gallery-img8.webp'); ?>">
                            <img class="img-fluid p-0" src="<?= base_url('assets/front/img/gallery-img8.webp'); ?>">
                        </a>
                    </div>
                    <div class="col-lg-3 p-0 item">
                        <a class="image-popup-vertical-fit" href="<?= base_url('assets/front/img/dream8.webp'); ?>">
                            <img class="img-fluid p-0" src="<?= base_url('assets/front/img/dream8.webp'); ?>">
                        </a>
                    </div>
                </div>
            </div>
        </section> -->
  <!-- <section class="Custom_neon pt-0">
            <div class="bg_Side_image">
                <img src="<?= base_url('assets/front/img/faq_bg.png'); ?>" alt="">
            </div>
            <div class="dots_bg">
                <img src="<?= base_url('assets/front/img/bg_animated.png'); ?>" alt="">
            </div>
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-12">
                        <h2>How it Works</h2>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="faq_card">
                            <img class="card_icon" src="<?= base_url('assets/front/img/design_icon.svg'); ?>" alt="">
                            <h3>Lit or Laser?</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque dolor voluptas harum,
                                neque autem asperiores rem doloribus tempore porro laborum?</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="faq_card">
                            <img class="card_icon" src="<?= base_url('assets/front/img/nonprofit_icon.svg'); ?>" alt="">
                            <h3>Perfect Fit</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque dolor voluptas harum,
                                neque autem asperiores rem doloribus tempore porro laborum?</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="faq_card">
                            <img class="card_icon" src="<?= base_url('assets/front/img/exceptation.svg'); ?>" alt="">
                            <h3>Direct to your Door</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque dolor voluptas harum,
                                neque autem asperiores rem doloribus tempore porro laborum?</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
</main>