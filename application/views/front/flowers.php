<?php



function moveElement(&$section_content, $a, $b)
{
  $out = array_splice($section_content, $a, 1);
  array_splice($section_content, $b, 0, $out);
}





$count = count($section_content);

$i = 0;
// echo print_r($section_content); 
while ($i < $count) {
  $name = $section_content[$i]['heading'];
  if (strpos($name, "Flower") !== false) {
    moveElement($section_content, $i, 0);
  }
  if (strpos($name, "Roses") !== false) {
    moveElement($section_content, $i, 1);
  }
  if (strpos($name, "Collection") !== false) {
    moveElement($section_content, $i, 2);
  }
  if (strpos($name, "Taste") !== false) {
    echo $i;
    moveElement($section_content, $i, 3);
  }
  $i++;
}



if (strpos($section_content[3]['heading'], "Flower") !== false) {
  moveElement($section_content, 3, 0);
}
if (strpos($section_content[3]['heading'], "Rose") !== false) {
  moveElement($section_content, 3, 1);
}
if (strpos($section_content[3]['heading'], "Collection") !== false) {
  moveElement($section_content, 3, 2);
}


foreach ($section_content as $d) : ?>
  <section class="name_neon pt-4">
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
      <div class="row justify-content-center text-start images">
        <?php

        $filterProducts = array_filter($products, function ($val, $key) use ($d) {
          return $val->brand->id == $d["id"];
        }, ARRAY_FILTER_USE_BOTH);
        // echo print_r($filterProducts);

        // // $CI = &get_instance();
        // // $CI->content($d['relatedContent']);
        // $reply = $this->db->select('*')->from('gift_products')->where(array('related' => $d['relatedContent'], 'gift_products_status' => 'enable'))->get()->result();
        foreach ($filterProducts as $f) :
          // echo "<pre>";
          if (!empty($f->variant_parent_id)) {
            continue;
          }
          // print_r($f);
          // echo "</pre>  <br/>";
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