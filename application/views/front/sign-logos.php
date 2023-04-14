    <section class="upload pt-5">
        <div class="container-fluid">
            <div class="row justify-content-center text-center">
                <div class="col-lg-12">
                    <h2>Upload your Logo or Image for a Free Quote</h2>
                </div>
            </div>
            <div class="row">
                <?php foreach ($gal as $f) : ?>
                    <div class="col-lg-2 col-md-6 p-0 item">
                        <a class="image-popup-vertical-fit" href="<?= base_url('assets/front/img/upload/' . $f->picture); ?>">

                            <img class="img-fluid p-0" src="<?= base_url('assets/front/img/upload/' . $f->picture); ?>" alt="">
                        </a>
                    </div>
                <?php endforeach; ?>
                <!-- <div class="col-lg-2 p-0 item">
                    <a class="image-popup-vertical-fit" href="./assets/img/upload1.jpg');?>">

                        <img class="img-fluid p-0" src="<?= base_url('assets/front/img/upload1.jpg'); ?>" alt="">
                    </a>
                </div>
                <div class="col-lg-2 p-0 item">
                    <a class="image-popup-vertical-fit" href="./assets/img/upload2.jpg');?>">

                        <img class="img-fluid p-0" src="<?= base_url('assets/front/img/upload2.jpg'); ?>" alt="">
                    </a>
                </div>
                <div class="col-lg-2 p-0 item">
                    <a class="image-popup-vertical-fit" href="./assets/img/upload3.jpg');?>">

                        <img class="img-fluid p-0" src="<?= base_url('assets/front/img/upload3.jpg'); ?>" alt="">
                    </a>
                </div>
                <div class="col-lg-2 p-0 item">
                    <a class="image-popup-vertical-fit" href="./assets/img/upload4.jpg');?>">

                        <img class="img-fluid p-0" src="<?= base_url('assets/front/img/upload4.jpg'); ?>" alt="">
                    </a>
                </div>
                <div class="col-lg-2 p-0 item">
                    <a class="image-popup-vertical-fit" href="./assets/img/upload5.jpg');?>">

                        <img class="img-fluid p-0" src="<?= base_url('assets/front/img/upload5.jpg'); ?>" alt="">
                    </a>
                </div>
                <div class="col-lg-2 p-0 item">
                    <a class="image-popup-vertical-fit" href="./assets/img/upload6.jpg');?>">

                        <img class="img-fluid p-0" src="<?= base_url('assets/front/img/upload6.jpg'); ?>" alt="">
                    </a>
                </div>
                <div class="col-lg-2 p-0 item">
                    <a class="image-popup-vertical-fit" href="./assets/img/upload7.jpg');?>">

                        <img class="img-fluid p-0" src="<?= base_url('assets/front/img/upload7.jpg'); ?>" alt="">
                    </a>
                </div>
                <div class="col-lg-2 p-0 item">
                    <a class="image-popup-vertical-fit" href="./assets/img/upload8.jpg');?>">

                        <img class="img-fluid p-0" src="<?= base_url('assets/front/img/upload8.jpg'); ?>" alt="">
                    </a>
                </div>
                <div class="col-lg-2 p-0 item">
                    <a class="image-popup-vertical-fit" href="./assets/img/upload9.jpg');?>">

                        <img class="img-fluid p-0" src="<?= base_url('assets/front/img/upload9.jpg'); ?>" alt="">
                    </a>
                </div>
                <div class="col-lg-2 p-0 item">
                    <a class="image-popup-vertical-fit" href="./assets/img/upload10.jpg');?>">

                        <img class="img-fluid p-0" src="<?= base_url('assets/front/img/upload10.jpg'); ?>" alt="">
                    </a>
                </div>
                <div class="col-lg-2 p-0 item">
                    <a class="image-popup-vertical-fit" href="./assets/img/gallery-img8.webp');?>">
                        <img class="img-fluid p-0" src="<?= base_url('assets/front/img/gallery-img8.webp'); ?>" alt="">
                    </a>

                </div>
                <div class="col-lg-2 p-0 item">
                    <a class="image-popup-vertical-fit" href="assets/img/gallery-img7.webp');?>">
                        <img class="img-fluid p-0" src="<?= base_url('assets/front/img/gallery-img7.webp'); ?>" alt="">
                    </a>
                </div> -->
            </div>
        </div>
    </section>
    <?php if (!empty($first_section)) { ?>
        <section class="upload pt-5 position-relative">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-12">
                        <h2>LED Neon Business Signs</h2>
                    </div>
                    <?php foreach ($first_section as $s) : ?>
                        <div class="col-lg-12">
                            <h4><?php echo $s->heading; ?></h4>
                        </div>
                        <div class="col-12 my-5">
                            <?php echo $s->content; ?>
                        </div>
                        <!-- <div class="col-md-3 upload-cards mx-md-4 py-5 px-4">
                            <h3>I WANT TO DESIGN MY OWN SIGN</h3>
                            <a href="#uploading_f" class="btn theme-btn des-btn">Design Your Own</a>
                        </div>
                        <div class="col-md-3 upload-cards mx-md-4 py-5 px-4">
                            <h3>I HAVE AN IMAGE OR LOGO</h3>
                            <a href="#uploading_f" class="btn theme-btn des-btn">Light It Up</a>
                        </div>
                        <div class="col-md-3 upload-cards mx-md-4 py-5 px-4">
                            <h3>I NEED A QUOTE ON MY SIGN IDEA</h3>
                            <a href="#uploading_f" class="btn theme-btn des-btn">Quick Qoute</a>
                        </div> -->
                    <?php endforeach; ?>
                </div>
            </div>
            <ul class="list-unstyled shape-group-18">
                <li class="shape shape-4 sal-animate" data-sal="zoom-in" data-sal-duration="500" data-sal-delay="600">
                    <img class="img-fluid" src="<?= base_url('assets/front/img/bubble-15.png'); ?>" alt="Shape">
                </li>
                <li class="shape shape-5 sal-animate" data-sal="zoom-in" data-sal-duration="500" data-sal-delay="600">
                    <img class="img-fluid" src="<?= base_url('assets/front/img/bubble-14.png'); ?>" alt="Shape">
                </li>
            </ul>
            <div class="bg_Side_image second-animation">
                <img src="<?= base_url('assets/front/img/faq_bg.png'); ?>" alt="">
            </div>
        </section>
    <?php } ?>

    <section class="upload pt-5 position-relative">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-12 mt-5">
                    <h4>Custom Led Neon Signs For Business!</h4>
                </div>
                <div class="col-lg-12 mb-5">
                    <h2>Light Up Logos & Illuminated Window Signs</h2>
                </div>
                <div class="col-12 text-start">
                    <form id="uploading_f" action="<?= base_url('sign_logos/submit'); ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="first">First Name</label>
                                    <input type="text" class="form-control" placeholder="" id="first" name="fname" required>
                                    <input type="hidden" class="form-control" id="rangeVal" value="" name="budget">
                                </div>
                            </div>
                            <!--  col-md-6   -->

                            <div class="col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="last">Last Name</label>
                                    <input type="text" class="form-control" placeholder="" id="last" name="lname" required>
                                </div>
                            </div>
                            <!--  col-md-6   -->


                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input type="email" class="form-control" placeholder="" id="email" name="email" required>
                                </div>


                            </div>
                            <!--  col-md-6   -->

                            <div class="col-md-12 mb-4">

                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="phone" name="phone" required>
                                </div>
                            </div>
                            <!--  col-md-6   -->
                        </div>

                        <label for="contact-preference">Indoor / Outdoor Sign</label>
                        <div class="radio">
                            <label>
                                <input type="radio" id="contact-preference" value="am" checked name="indoorOutdoor"><span class="ms-2">Indoor</span>
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" id="contact-preference" value="pm" checked name="indoorOutdoor"><span class="ms-2">Outdoor</span>
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-md-12 my-4">
                                <div class="form-group">
                                    <label for="size">Approximate size (length/height)</label>
                                    <input name="size" required type="text" class="form-control" placeholder="" id="size">
                                </div>
                            </div>
                            <div class="col-md-8 mb-4">
                                <label for="neon-sign">Tell us as much as you can about your new Custom Neon sign
                                </label>
                                <textarea name="tellMore" id="neon-sign" cols="80" rows="5" placeholder="Please include details like font style, color, picture or design, and how soon you need it."></textarea>
                            </div>
                            <div class="col-md-4 py-5">
                                <ul>
                                    <li>Wording / design (or attach an image)</li>
                                    <li>Colors and fonts</li>
                                    <li>Any other requirements / notes</li>
                                    <li>How soon do you need the sign?</li>
                                </ul>
                            </div>

                            <div class="col-12 mb-4">
                                <label>Budget Idea:</label>
                                <span id="rangeValue">0</span>
                                <Input class="range" type="range" value="200" min="200" max="2000" onChange="rangeSlide(this.value)" onmousemove="rangeSlide(this.value)"></Input>
                                <p>This is a rough, ball-park guess at what you like to spend on your sign. It will help
                                    us make sure we quote sizes and options that suit you, and give you flexible choices
                                    to suit your needs.</p>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="file-drop-area d-flex align-items-center justify-content-center flex-column ">
                                    <i class="fa fa-cloud-arrow-up upload-fa mb-2"></i>
                                    <div>
                                        <img id="blah" src="#" alt="" class="img-fluid" />
                                        <span class="fake-btn">Choose files</span>
                                        <span class="file-msg">or drag and drop files here</span>
                                        <input class="file-input" onchange="readURL(this);" type="file" multiple name="fileToUpload">
                                        <script>
                                            function readURL(input) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();

                                                    reader.onload = function(e) {
                                                        $('#blah').attr('src', e.target.result).css('max-height', '200px');
                                                        $('.fake-btn').css('display', 'none')
                                                        $('.file-msg').css('display', 'none')
                                                        $('.fa-cloud-arrow-up').css('display', 'none')
                                                    };

                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <script type="text/javascript">
                    function rangeSlide(value) {
                        document.getElementById('rangeValue').innerHTML = value;
                    }
                </script>



                <button type="submit" class="btn theme-btn">GET A FREE QUOTE & MOCKUP</button>
                <p class="my-5">Use our online design tool to <a href="">Create Your Own Neon</a>, or email your files
                    and requirements
                    to <a href="mailto:shop@orlandoflowerwalls.com">
                        shop@orlandoflowerwalls.com</a></p>
                </form>
            </div>
        </div>
        </div>
        <div class="dots_bg third-animation">
            <img src="<?= base_url('assets/front/img/bg_animated.png'); ?>" alt="">
        </div>
    </section>

    <section class="upload-scroll-bg">

    </section>

    <section class="sec-upload-cards position-relative">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <?php foreach ($cards as $c) : ?>
                    <div class="col-md-3 upload-cards mx-md-4">
                        <img src="<?= base_url('assets/front/img/') . $c->picture; ?>" alt="" class="img-fluid">
                        <div class="p-4">
                            <?php echo $c->content ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="tables-right-dec">
            <img src="<?= base_url('assets/front/img/polka-pink.png'); ?>" alt="">
        </div>
    </section>

    <section class="upload position-relative">
        <div class="container">
            <div class="row">
                <?php
                foreach ($text as $t) :
                ?>
                    <div class="col-md-12 col-12 mb-5">
                        <h4><?php echo $t->main_heading ?></h4>
                        <h3><?php echo $t->sub_heading ?></h3>
                        <p><?php echo $t->text ?></p>
                    </div>

                <?php
                endforeach;
                ?>
            </div>
        </div>
        <div class="bg_net">
            <img src="<?= base_url('assets/front/img/bg_animated.png'); ?>" alt="">
        </div>
    </section>