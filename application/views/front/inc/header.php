<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OFW Gift Shop</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/front/img/neon_logo.png'); ?>">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <!--footer scripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/front/js/script.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="<?= base_url('assets/front/js/magic_scroll.js'); ?>"></script>

    <link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <!--alert scripts-->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/alert.css'); ?>" />
    <script src="<?php echo base_url('assets/admin/js/alert.js'); ?>"></script>
    <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="<?= base_url('assets/front/css/magic_scroll.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/front/css/style.css'); ?>">


</head>

<body>

    <?php if ($this->session->flashdata('success')) : ?>
        <script>
            alert_success("<?php echo $this->session->flashdata('success') ?>");
            <?php unset($_SESSION['success']); ?>
        </script>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')) : ?>
        <script>
            alert_danger("<?php echo $this->session->flashdata('error') ?>");
            <?php unset($_SESSION['error']); ?>
        </script>
    <?php endif; ?>


    <header class="top_header">
        <div class="container">
            <div class="row justify-content-center text-center">
                <!-- <div class="col-lg-2">
                    <h6>
                        Free DIMMER/REMOTE
                    </h6>
                </div>
                <div class="col-lg-3">
                    <h6>

                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        4.9 GOODLE RATING
                    </h6>
                </div>
                <div class="col-lg-2">
                    <h6>
                        2 YEAR WARRANTY
                    </h6>
                </div> -->
            </div>
        </div>
    </header>
    <div class="navigation_bar">
        <nav class="navbar navbar-expand-xl navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url(); ?>"><img class="img-fluid" src="<?= base_url('assets/front/img/neon_logo.png'); ?>" style="width: 75px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php
                function active($currect_page)
                {
                    $url_array =  explode('/', $_SERVER['REQUEST_URI']);
                    $url = end($url_array);
                    if ($currect_page == $url) {
                        echo 'active'; //class name in css 
                    }
                }
                ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= base_url('home'); ?>">FLOWERS</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link <?php active('flowers') ?>" aria-current="page" href="<?= base_url('flowers'); ?>">FLOWERS</a>
                        </li>
                        <!-- <li class="nav-item"> 
                            <a class="nav-link" href="<?= base_url('about'); ?>">ABOUT</a>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle  <?php active('custom_neon');
                                                                active('backdrop_signs_orlando');
                                                                active('sign_logos');  ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">SIGNS</a>
                            <!-- href="<?= base_url('custom_neon'); ?>" -->
                            <ul class="dropdown-menu">
                                <li class="me-0"><a class="dropdown-item" href="<?= base_url('custom_neon'); ?>">Custom Neon Lights</a></li>
                                <li class="me-0"><a class="dropdown-item" href="<?= base_url('backdrop_signs_orlando'); ?>">Custom Non Lit</a></li>
                                <li class="me-0"><a class="dropdown-item" href="<?= base_url('sign_logos'); ?>">Light Up Logos</a></li>
                                <!-- <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php active('gifts') ?>" href="<?= base_url('gifts'); ?>">GIFT & MORE</a>
                        </li>

                        <!-- <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('backdrop_signs_orlando'); ?>">Gifts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('sign_logos'); ?>">Events</a>
                        </li>-->
                        <li class="nav-item">
                            <a class="nav-link" href="https://orlandoflowerwalls.com/contact">CONTACT</a>
                        </li>
                        <li class="nav-item">
                            <a title="cart" class="nav-link" href="<?= base_url('cart'); ?>"><i class="fa-solid fa-cart-shopping"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>