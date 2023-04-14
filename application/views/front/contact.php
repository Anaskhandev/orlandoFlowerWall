<main>
    <section class="product_bg contact_bg">
        <div class="container">
            <div class="row justify-content-center text-center text-white">
                <div class="col-lg-12">
                    <h2>Contact Us</h2>
                    <a href="<?= base_url(); ?>">Home</a> <span class="fw-bold">/</span>
                    <a href="<?= base_url('contact'); ?>">Contact Us</a>
                </div>
            </div>
        </div>
    </section>


    <section class="contact__area fix p-relative pt-120 pb-190 position-relative">
        <!-- <img src="<?= base_url('assets/front/img/asset-abt-img.png'); ?>" alt="" class="img-fluid contact-style5 position-absolute"> -->
        <div class="container position-relative">
            <img src="<?= base_url('assets/front/img/p-s-2.png'); ?>" alt="" class="img-fluid contact-style6 position-absolute">
            <div class="section-title text-left text-center">
                <h2 class="section-title__title">Any Question? Feel Free to Contact</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-7 col-md-8">
                    <div class="contact__info">
                        <div class="contact__info-content d-flex mb-30">
                            <div class="contact__info-icon">
                                <i class="fa fa-map-marker-alt"></i>
                            </div>
                            <div class="contact__info-title">
                                <h5>Location</h5>
                                <p>1150 Douglas Ave #1090, Altamonte Springs, FL 32714</p>
                            </div>
                        </div>
                        <div class="contact__info-content d-flex mb-30">
                            <div class="contact__info-icon">
                                <i class="fa fa-phone green"></i>
                            </div>
                            <div class="contact__info-title">
                                <h5>Phone</h5>
                                <p><a href="tel:4079515684">4079515684</a></p>
                                <!-- <p><a href="tel:+0066442211">+00 66 44 22 11</a></p> -->
                            </div>
                        </div>
                        <div class="contact__info-content d-flex">
                            <div class="contact__info-icon">
                                <i class="fa fa-mail-bulk blue"></i>
                            </div>
                            <div class="contact__info-title">
                                <h5>Email us</h5>
                                <p><a href="mailto:shop@orlandoflowerwalls.com">shop@orlandoflowerwalls.com</a>
                                </p>
                                <!-- <p><a href="mailto:info@example.com">info@example.com</a></p> -->
                            </div>
                        </div>
                        <div class="contact-page__social">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-5 col-12">
                    <!-- <div class="contact__title">
                                        <h2 class="section__title">
                                            <span>Ready to get our</span>
                                            marketing services
                                        </h2> 
                                        <div class="contact__title-icon">
                                            <a href="#contact"><i class="fa-solid fa-arrow-down-long"></i></a>
                                        </div>
                                    </div> -->
                    <div class="contact__form contact__form-2">
                        <div class="contact__form-title mb-40">
                            <h4>Send us a message</h4>
                        </div>
                        <div class="contact__form-content">
                            <form method="post" id="contactEnqForm" onsubmit="contact_form();" class="comment-one__form contact-form-validated">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" placeholder="Your name" name="fname" id="fname">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="email" placeholder="Email address" name="emailids" id="emailids">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="comment-form__input-box">
                                            <textarea name="cmessage" id="cmessage" placeholder="Write Comment"></textarea>
                                        </div>
                                        <!-- <button type="submit" class="thm-btn comment-form__btn">Send a
                                                        message</button> -->
                                        <input type="submit" value="Send a message" class="theme-btn">
                                    </div>
                                </div>
                            </form>
                            <p class="ajax-response"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="spots">
            <img src="<?= base_url('assets/front/img/net-s4.png'); ?>" alt="">
        </div>
        <div class=" shape-1 sal-animate" data-sal="slide-left" data-sal-duration="500" data-sal-delay="700">
            <img src="<?= base_url('assets/front/img/bubble-4.png'); ?>" alt="Bubble">
        </div>
        <div class=" shape-10 sal-animate" data-sal="slide-left" data-sal-duration="500" data-sal-delay="700">
            <img src="<?= base_url('assets/front/img/bubble-31.png'); ?>" alt="Bubble">
        </div>
        <div class="shade_bt">
            <img src="<?= base_url('assets/front/img/srv-4-t-r.png'); ?>" alt="">
        </div>
    </section>
</main>