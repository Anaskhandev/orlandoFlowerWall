<div class="page_heading">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2>GIFTS</h2>
      </div>
    </div>
  </div>
</div>
<div class="page_navigation">
  <nav class="navbar navigation navbar-expand-lg navbar-light">
    <div class="container">
      <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#alertnate" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="alertnate">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0"> -->
      <div class="carousel-wrap mx-auto my-0">
        <div class="owl-carousel justify-content-center d-flex owl-carousel-gifts">
          <?php
          foreach ($section_content as $d) :
            $str = $d['heading'];
            $abc = preg_replace('/[^a-zA-Z0-9_-]/s','',$str);
            if (!empty($str)) :
          ?>
              <div class="item text-center">
                <a class="nav-link navigation__link active" aria-current="page" href="#<?= $abc; ?>"><?= $str; ?></a>
              </div>
          <?php endif;
          endforeach; ?>

        </div>
      </div>
      <!-- <li class="nav-item">
                        <a class="nav-link navigation__link" href="#besties">BESTIES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navigation__link" href="#">BABY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navigation__link" href="#">BRIDAL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navigation__link" href="#">BRITHDAY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navigation__link" href="#seasonal">SEASONAL</a>
                    </li> -->
      <!-- </ul> -->
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
      <!-- </div> -->
    </div>
  </nav>
</div>

<?php


foreach ($section_content as $d) : ?>
  <?php
  $str = $d['heading'];
  $abc = preg_replace('/[^a-zA-Z0-9_-]/s','',$str);
  ?>
  <section class="name_neon pt-4" id="<?= $abc; ?>">
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
          <?= !empty($d['heading']) ? '<h2>' . $d['heading'] . '</h2>' : '';  ?>
          <p><?= $d['subHeading']; ?></p>

        </div>
      </div>
      <div class="row justify-content-center text-center images">
        <?php

        $filterProducts = array_filter($products, function ($val, $key) use ($d) {
          return $val->brand->id == $d["id"];
        }, ARRAY_FILTER_USE_BOTH);

        // $CI = &get_instance();
        // $CI->content($d['relatedContent']);
        // $reply = $this->db->select('*')->from('gift_products')->where(array('related' => $d['relatedContent'], 'gift_products_status' => 'enable'))->get()->result();
        foreach ($filterProducts as $f) :

          if (!empty($f->variant_parent_id)) {
            continue;
          }
          

        ?>
          <div class="col-lg-3 mb-5">
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
    </div>
  </section>
<?php endforeach ?>