// RESPONSIVE NAVIGATION

$(window).resize(function(){
    if (window.innerWidth <= 991) {
        $(".header-nav").addClass("mobile-menu");
        $("#navbar").on("click", function() {
          $(".mobile-menu").addClass("is-opened");
          $(".nav-overlay").addClass("is-on");
          $("body").addClass("nav-active");
        });
        $(".nav-overlay").on("click", function() {
          $(this).removeClass("is-on");
          $(".mobile-menu").removeClass("is-opened");
          $("body").removeClass("nav-active");
        });
    }
    else {
        $(".header-nav").removeClass("mobile-menu");
        $(".nav-overlay").removeClass("is-on");
        $("body").removeClass("nav-active");
    }
});
  $(document).ready(function () {
    if (window.innerWidth <= 991) {
        $(".header-nav").addClass("mobile-menu");
        $("#navbar").on("click", function() {
          $(".mobile-menu").addClass("is-opened");
          $(".nav-overlay").addClass("is-on");
          $("body").addClass("nav-active");
        });

        $(".nav-overlay").on("click", function() {
          $(this).removeClass("is-on");
          $(".mobile-menu").removeClass("is-opened");
          $("body").removeClass("nav-active");
        });
    }
    else {
        $(".header-nav").removeClass("mobile-menu");
        $(".nav-overlay").removeClass("is-on");
        $("body").removeClass("nav-active");
    }
  });
  // RESPONSIVE NAVIGATION

 // INDEX SEC 5 SLIDER 
$('.index-5-slider').owlCarousel({
    items:1,
    loop:false,
    margin:0,
    // autoplay:true,
    // autoplayTimeout:5000,
    //animateOut: 'fadeOut',
    mouseDrag: true,
    dotsData:true,
    nav:false,
    slideSpeed : 700,
    navText:["<i class='fas fa-arrow-left'></i>","<i class='fas fa-arrow-right'></i>"],
    responsive:{
        0:{
            items:1
        }
    }
});
var owl1 = $('.index-5-slider');
$('.index-5-slider .owl-dot').click(function() {
        owl1.trigger('to.owl.carousel', [$(this).index(), 1000]);
});


// TESTIMONIAL SLIDER
$('.testimonial_wrapper .owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots:false,
    autoplay: true,
    autoplayTimeout:6000,
    responsive:{
        0:{
            items:1
        },
        480:{
            items:2
        },
        768:{
            items:3
        }
    }
}); 

// TRAINER SLIDER
$('.trainer-slider').owlCarousel({
    loop:true,
    margin:15,
    nav:true,
    navText:["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
    dots:false,
    autoplay: true,
    autoplayTimeout:6000,
    responsive:{
        0:{
            items:1
        },
        480:{
            items:2
        },
        1024:{
            items:4
        }
    }
}); 

//PRODUCT QUANTITY SELECT INPUT
$(document).ready(function(){
    $('.count').prop('disabled', true);
    $(document).on('click','.plus',function(){
       $(this).siblings('.count').val(parseInt($(this).siblings('.count').val()) + 1 );
   });
    $(document).on('click','.minus',function(){
      $(this).siblings('.count').val(parseInt($(this).siblings('.count').val()) - 1 );
      if ($(this).siblings('.count').val() == 0) {
        $(this).siblings('.count').val(1);
        }
    });
});



// PRODUCT DETAIL SLIDER
$('.product-detail-slider').owlCarousel({
    loop:false,
    margin:10,
    nav:true,
    dotsData:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
var owl1 = $('.product-detail-slider');
$('.product-detail-slider .owl-dot').click(function() {
        owl1.trigger('to.owl.carousel', [$(this).index(), 1000]);
}); 
