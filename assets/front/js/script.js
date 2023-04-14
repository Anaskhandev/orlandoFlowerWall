$(document).ready(function () {
  $('#success_alert').hide();
  function downloadImage() {
    width = $(window).width();
    // console.log(width)
    if (width > 992) {
      html2canvas(displayText[1]).then((canvas) => {
        // a = document.createElement('a');
        // document.body.appendChild(a);
        // a.download = "test.png";
        // a.href = canvas.toDataURL();
        // a.click();
        $('#image').val(canvas.toDataURL());
        $('#image2').html(canvas);
      });
    } else {
      html2canvas(displayText[0]).then((canvas) => {
        // a = document.createElement('a');
        // document.body.appendChild(a);
        // a.download = "test.png";
        // a.href = canvas.toDataURL();
        // a.click();
        $('#image').val(canvas);
        $('#image2').html(canvas);
      });
    }
  }

  setTimeout(() => {
    $('.size_box:nth-child(4)').addClass('active');
  }, 1000);
  $('.navigation').on('click', 'a.navigation__link', function (event) {
    event.preventDefault();
    var id = $(this).attr('href'),
      top = $(id).offset().top;
    $('body,html').animate({ scrollTop: top }, 800);
  });
  if ($('.banner-carousel').length) {
    $('.banner-carousel').owlCarousel({
      loop: true,
      animateOut: 'fadeOut',
      animateIn: 'fadeIn',
      margin: 0,
      nav: false,
      dots: false,
      smartSpeed: 500,
      autoplay: 6000,
      autoplayTimeout: 7000,
      navText: [
        '<span class="icon fa fa-angle-left"></span>',
        '<span class="icon fa fa-angle-right"></span>',
      ],
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 1,
        },
        800: {
          items: 1,
        },
        992: {
          items: 1,
        },
      },
    });
  }
  $('.owl-carousel-gifts').owlCarousel({
    loop: false,
    margin: 0,
    nav: true,
    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    autoplay: false,
    autoplayHoverPause: true,
    // center: true,

    responsive: {
      0: {
        items: 1,
        center: true,
      },
      600: {
        items: 3,
        center: false,
      },
      1200: {
        items: 4,
      },
    },
  });

  $('.image-popup-vertical-fit').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    mainClass: 'mfp-img-mobile',
    image: {
      verticalFit: true,
    },
  });
  var btn = $('#button');

  $(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
      btn.addClass('show');
    } else {
      btn.removeClass('show');
    }
  });

  btn.on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, '300');
  });

  $('.piclist li').on('click', function (event) {
    var $pic = $(this).find('img');
    $('.picZoomer-pic').attr('src', $pic.attr('src'));
  });

  var owl = $('#recent_post');
  owl.owlCarousel({
    margin: 20,
    dots: false,
    nav: true,
    navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 2,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 5,
      },
      1200: {
        items: 4,
      },
    },
  });

  $('.decrease_').click(function () {
    decreaseValue(this);
  });
  $('.increase_').click(function () {
    increaseValue(this);
  });
  function increaseValue(_this) {
    var value = parseInt($(_this).siblings('input#number').val(), 10);
    value = isNaN(value) ? 0 : value;
    value++;
    $(_this).siblings('input#number').val(value);
  }

  function decreaseValue(_this) {
    var value = parseInt($(_this).siblings('input#number').val(), 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? (value = 1) : '';
    value--;
    $(_this).siblings('input#number').val(value);
  }

  $('#myText').keyup(function () {
    let val = $(this).val();
    $('#myWidth').html(getCharWidth('Avante', '75px', val));
    $('#myHeight').html(getCharHeight('Avante', '75px', val));
  });

  function getCharWidth(fontFamily, fontSize, text) {
    var div = document.createElement('div');
    div.style.position = 'absolute';
    div.style.visibility = 'hidden';
    div.style.fontFamily = fontFamily;
    div.style.fontSize = fontSize;
    div.innerHTML = text;
    document.body.appendChild(div);
    var width = div.offsetWidth;
    document.body.removeChild(div);
    return width;
  }

  function getCharHeight(fontFamily, fontSize, text) {
    var div = document.createElement('div');
    div.style.position = 'absolute';
    div.style.visibility = 'hidden';
    div.style.fontFamily = fontFamily;
    div.style.fontSize = fontSize;
    div.innerHTML = text;
    document.body.appendChild(div);
    var width = div.offsetHeight;
    document.body.removeChild(div);
    return width;
  }
  let fontSize = 'small',
    text = 'Your Text',
    fontStyle = 'Alexa',
    box_width = '',
    box_height = '',
    price = 15,
    total = 0;
  let sb1, sb2, sb3, sb4, sb5;
  let displayText = $('.showText');

  displayText.html(text);
  displayText.attr('title', text);
  displayText.css('font-family', fontStyle);

  function calculateFontPrice(fontStyle, text) {
    // For Small Font
    let len = text.length;
    let cus_price = 0;

    box_width = Math.round(getCharWidth(fontStyle, '800px', text) / 96);
    box_height = Math.round(getCharHeight(fontStyle, '800px', text) / 96);
    if (len <= 2) {
      cus_price = 118;
    } else {
      cus_price = 118 + (len - 2) * 45; //28
    }
    $(".size_box[data-fs='small'] .size_box_details").find('span:eq(1)').html(`$${cus_price}`);
    $(".size_box[data-fs='small'] .size_box_details")
      .find('span:eq(1)')
      .html(`$${box_width * box_height * price}`);
    $(".size_box[data-fs='small'] .size_box_area .box_length").html(`${box_width}"`);
    $(".size_box[data-fs='small'] .size_box_area .box_height").html(
      `${box_height}" - ${box_height + 2}"`
    );

    // For Medium Font
    box_width = Math.round(getCharWidth(fontStyle, '900px', text) / 96);
    box_height = Math.round(getCharHeight(fontStyle, '900px', text) / 96);
    if (len <= 2) {
      cus_price = 133;
    } else {
      cus_price = 133 + (len - 2) * 45; //36
    }
    $(".size_box[data-fs='medium'] .size_box_details").find('span:eq(1)').html(`$${cus_price}`);
    // $(".size_box[data-fs='medium'] .size_box_details").find('span:eq(1)').html(`$${(box_width*box_height)*price}`);
    $(".size_box[data-fs='medium'] .size_box_area .box_length").html(`${box_width}"`);
    $(".size_box[data-fs='medium'] .size_box_area .box_height").html(
      `${box_height}" - ${box_height + 2}"`
    );

    // For Large Font
    box_width = Math.round(getCharWidth(fontStyle, '1000px', text) / 96);
    box_height = Math.round(getCharHeight(fontStyle, '1000px', text) / 96);
    if (len <= 2) {
      cus_price = 169;
    } else {
      cus_price = 169 + (len - 2) * 45; //47
    }
    $(".size_box[data-fs='large'] .size_box_details").find('span:eq(1)').html(`$${cus_price}`);
    // $(".size_box[data-fs='large'] .size_box_details").find('span:eq(1)').html(`$${(box_width*box_height)*price}`);
    $(".size_box[data-fs='large'] .size_box_area .box_length").html(`${box_width}"`);
    $(".size_box[data-fs='large'] .size_box_area .box_height").html(
      `${box_height}" - ${box_height + 2}"`
    );

    // For xLarge Font
    box_width = Math.round(getCharWidth(fontStyle, '1100px', text) / 96);
    box_height = Math.round(getCharHeight(fontStyle, '1100px', text) / 96);
    if (len <= 2) {
      cus_price = 180;
    } else {
      cus_price = 180 + (len - 2) * 45; //56
    }
    $(".size_box[data-fs='xlarge'] .size_box_details").find('span:eq(1)').html(`$${cus_price}`);
    // $(".size_box[data-fs='xlarge'] .size_box_details").find('span:eq(1)').html(`$${(box_width*box_height)*price}`);
    $(".size_box[data-fs='xlarge'] .size_box_area .box_length").html(`${box_width}"`);
    $(".size_box[data-fs='xlarge'] .size_box_area .box_height").html(
      `${box_height}" - ${box_height + 2}"`
    );

    // For xxLarge Font
    box_width = Math.round(getCharWidth(fontStyle, '1200px', text) / 96);
    box_height = Math.round(getCharHeight(fontStyle, '1200px', text) / 96);
    if (len <= 2) {
      cus_price = 211;
    } else {
      cus_price = 211 + (len - 2) * 45; //68
    }
    $(".size_box[data-fs='xxlarge'] .size_box_details").find('span:eq(1)').html(`$${cus_price}`);
    // $(".size_box[data-fs='xxlarge'] .size_box_details").find('span:eq(1)').html(`$${(box_width*box_height)*price}`);
    $(".size_box[data-fs='xxlarge'] .size_box_area .box_length").html(`${box_width}"`);
    $(".size_box[data-fs='xxlarge'] .size_box_area .box_height").html(
      `${box_height}" - ${box_height + 2}"`
    );

    // For surprized Font
    box_width = Math.round(getCharWidth(fontStyle, '1300px', text) / 96);
    box_height = Math.round(getCharHeight(fontStyle, '1300px', text) / 96);
    if (len <= 2) {
      cus_price = 247;
    } else {
      cus_price = 247 + (len - 2) * 45; //83
    }
    $(".size_box[data-fs='surprized'] .size_box_details").find('span:eq(1)').html(`$${cus_price}`);
    // $(".size_box[data-fs='surprized'] .size_box_details").find('span:eq(1)').html(`$${(box_width*box_height)*price}`);
    $(".size_box[data-fs='surprized'] .size_box_area .box_length").html(`${box_width}"`);
    $(".size_box[data-fs='surprized'] .size_box_area .box_height").html(
      `${box_height}" - ${box_height + 2}"`
    );
  }

  $('#orderText').keyup(function () {
    text = $(this).val();
    text = text.replace(/\r|\n/, '<br>');
    displayText.html(text);

    $(document).ready(function () {
      setTimeout(function () {
        downloadImage();
      }, 500);
    });

    let text2 = text.replace('<br>', ' \n ');
    displayText.attr('title', text2);

    if (text2.length == 0) {
      text2 = 'a';
    }
    if (text.length > 50) {
      alert('Maximum limit of 50 character exceeded');
      text = 'your text';
      displayText.html(text2);
      $('#orderText').val(text2);
    }
    calculateFontPrice(fontStyle, text2);
    update_total();
  });

  $('.size_box').click(function () {
    $('.size_box').removeClass('active');
    $(this).addClass('active');
    size = $('.size_box.active').attr('data-fs');
    text_classes = $('.showText').attr('class');
    color_back = $('.color_picker .active').attr('id');
    if (size == 'Small') {
      $('.showText.box').attr('class', 'showText box small_text');
    } else if (size == 'Medium') {
      $('.showText.box').attr('class', 'showText box medium_text');
    } else if (size == 'Large') {
      $('.showText.box').attr('class', 'showText box large_text');
    } else if (size == 'X Large') {
      $('.showText.box').attr('class', 'showText box xlarge_text');
    } else if (size == 'XX Large') {
      $('.showText.box').attr('class', 'showText box xxlarge_text');
    } else if (size == 'Surprized') {
      $('.showText.box').attr('class', 'showText box surprize_text');
    } else if (size == 'Shadow Box') {
      $('.showText.box').attr('class', 'showText box xxlarge_text');
    }
    $('.showText.box').addClass(`${color_back}`);

    fontSize = $(this).data('fs');

    sb1 = $(this).data('sb_1');
    sb2 = $(this).data('sb_2');
    sb3 = $(this).data('sb_3');
    sb4 = $(this).data('sb_4');
    sb5 = $(this).data('sb_5');

    $('.sb_1').attr('data-price', sb1);
    $('.sb_2').attr('data-price', sb2);
    $('.sb_3').attr('data-price', sb3);
    $('.sb_4').attr('data-price', sb4);
    $('.sb_5').attr('data-price', sb5);
    $('.sb_1 span:eq(1)').html('FREE');
    $('.sb_2 span:eq(1)').html('FREE');
    $('.sb_3 span:eq(1)').html('+' + sb3);
    $('.sb_4 span:eq(1)').html('+' + sb4);
    $('.sb_5 span:eq(1)').html('+' + sb5);
    update_total();
  });

  $('.font_box').click(function () {
    $('.font_box').removeClass('active');
    $(this).addClass('active');
    fontStyle = $(this).css('font-family');
    displayText.css('font-family', fontStyle);
    text = $('#orderText').val();
    calculateFontPrice(fontStyle, text);
    update_total();
  });
  let defaultColor = '';
  let iconColor = 'rgb(255, 42, 77)';
  let activeColor = '';
  let neonOn = '';
  let neonOff = '';
  $('.color_box').mouseover(function () {
    if (!$(this).hasClass('active')) {
      let icon = $(this).find('i');
      iconColor = icon.css('color');
      defaultColor = iconColor;
      icon.css({
        'color': '#fff',
        'text-shadow': `rgb(255 255 255) 0px 0px 2px, rgb(255 255 255) 0px 0px 4px, ${iconColor} 0px 0px 8px, ${iconColor} 0px 0px 12px, ${iconColor} 0px 0px 16px, ${iconColor} 0px 0px 22px, ${iconColor} 0px 0px 30px`,
      });
    }
  });
  $('.color_box').mouseout(function () {
    let icon = $(this).find('i');

    if ($(this).hasClass('active')) {
      icon.css({
        'color': '#fff',
        'text-shadow': `rgb(255 255 255) 0px 0px 2px, rgb(255 255 255) 0px 0px 4px, ${activeColor} 0px 0px 8px, ${activeColor} 0px 0px 12px, ${activeColor} 0px 0px 16px, ${activeColor} 0px 0px 22px, ${activeColor} 0px 0px 30px`,
      });
    } else {
      icon.css({
        'color': defaultColor,
        'text-shadow': `none`,
      });
    }
  });
  $('.color_box').click(function () {
    $('.demo_on_off').removeClass('offswitch');
    $('.demo_on_off').addClass('onswitch');
    // $('.showText.box').removeClass('neon_off');
    $('.color_box').each(function () {
      if ($(this).data('color')) {
        $(this)
          .find('i')
          .css({
            'color': $(this).data('color'),
            'text-shadow': `none`,
          });
      }
    });
    $('.color_box').removeClass('active');
    $(this).addClass('active');
    $('.color_box.active')
      .find('i')
      .css({
        'color': '#fff',
        'text-shadow': `rgb(255 255 255) 0px 0px 2px, rgb(255 255 255) 0px 0px 4px, ${iconColor} 0px 0px 8px, ${iconColor} 0px 0px 12px, ${iconColor} 0px 0px 16px, ${iconColor} 0px 0px 22px, ${iconColor} 0px 0px 30px`,
      });
    $(this).attr('data-color', iconColor);
    activeColor = iconColor;
    displayText.css({
      'color': '#f4f4f4',
      'text-shadow': `rgb(255 255 255) 0px 0px 5px, rgb(255 255 255) 0px 0px 10px, ${iconColor} 0px 0px 20px, ${iconColor} 0px 0px 30px, ${iconColor} 0px 0px 40px, ${iconColor} 0px 0px 55px, ${iconColor} 0px 0px 75px`,
    });
    neonOn = activeColor;
    neonOff = $(this).find('i').data('color_off');
  });
  $('.color-box2').mouseover(function () {
    if (!$(this).hasClass('active')) {
      let icon = $(this).find('i');
      iconColor = icon.attr('data-color_on');
      defaultColor = iconColor;
      icon.css({
        'color': iconColor,
        'text-shadow': `none`,
      });
    }
  });
  $('.color-box2').mouseout(function () {
    let icon = $(this).find('i');

    if ($(this).hasClass('active')) {
      icon.css({
        'color': iconColor,
        'text-shadow': `none`,
      });
    } else {
      icon.css({
        'color': iconColor,
        'text-shadow': `none`,
      });
    }
  });
  $('.color-box2').click(function () {
    $('.color_box').each(function () {
      if ($(this).data('color')) {
        $(this)
          .find('i')
          .css({
            'color': $(this).data('color'),
            'text-shadow': `none`,
          });
      }
    });
    $('.color_box').removeClass('active');
    $(this).addClass('active');
    $('.color_box.active').find('i').css({
      'color': iconColor,
      'text-shadow': `none`,
    });
    $(this).attr('data-color', iconColor);
    activeColor = iconColor;
    displayText.css({
      // 'color': '#f4f4f4',
      'text-shadow': `none`,
      'color': iconColor,
    });
    neonOn = activeColor;
    neonOff = $(this).find('i').data('color_off');
  });
  $('.color_table .color_box:eq(1)').click();
  // Demo Button
  $('.demo_on_off').click(function () {
    $(this).toggleClass('onswitch');
    $(this).toggleClass('offswitch');
    check_switch();
  });
  if (displayText.hasClass('neon_off')) {
    // OFF
    if (neonOff == '#ff2a4d') {
      displayText.css({
        'color': neonOn,
        'text-shadow': `rgb(219 20 56) 0px 1px 0px, rgb(188 8 40) 0px 2px 0px, rgb(160 0 29) 0px 3px 0px, rgb(121 0 22) 0px 4px 0px, rgb(0 0 0 / 23%) 0px 0px 5px, rgb(0 0 0 / 43%) 0px 1px 3px, rgb(0 0 0 / 40%) 1px 4px 6px, rgb(0 0 0 / 38%) 0px 5px 10px, rgb(0 0 0 / 25%) 3px 7px 12px`,
      });
    } else if (neonOff == '#ffd62e') {
      displayText.css({
        'color': neonOn,
        'text-shadow': `rgb(223 185 31) 0px 1px 0px, rgb(205 169 22) 0px 2px 0px, rgb(186 153 18) 0px 3px 0px, rgb(164 132 1) 0px 4px 0px, rgb(0 0 0 / 23%) 0px 0px 5px, rgb(0 0 0 / 43%) 0px 1px 3px, rgb(0 0 0 / 40%) 1px 4px 6px, rgb(0 0 0 / 38%) 0px 5px 10px, rgb(0 0 0 / 25%) 3px 7px 12px`,
      });
    } else if (neonOff == '#e73dcd') {
      displayText.css({
        'color': neonOn,
        'text-shadow': `rgb(231 61 205) 0px 1px 0px, rgb(210 47 186) 0px 2px 0px, rgb(196 42 173) 0px 3px 0px, rgb(181 33 159) 0px 4px 0px, rgb(0 0 0 / 23%) 0px 0px 5px, rgb(0 0 0 / 43%) 0px 1px 3px, rgb(0 0 0 / 40%) 1px 4px 6px, rgb(0 0 0 / 38%) 0px 5px 10px, rgb(0 0 0 / 25%) 3px 7px 12px`,
      });
    } else if (neonOff == '#90dcff') {
      displayText.css({
        'color': neonOn,
        'text-shadow': `rgb(144 220 255) 0px 1px 0px, rgb(144 220 255) 0px 2px 0px, rgb(0 73 107) 0px 3px 0px, rgb(0 58 84) 0px 4px 0px, rgb(0 0 0 / 23%) 0px 0px 5px, rgb(0 0 0 / 43%) 0px 1px 3px, rgb(0 0 0 / 40%) 1px 4px 6px, rgb(0 0 0 / 38%) 0px 5px 10px, rgb(0 0 0 / 25%) 3px 7px 12px`,
      });
    } else if (neonOff == '#85ffaa') {
      displayText.css({
        'color': neonOn,
        'text-shadow': `rgb(0 184 55) 0px 1px 0px, rgb(0 155 47) 0px 2px 0px, rgb(0 134 40) 0px 3px 0px, rgb(0 114 34) 0px 4px 0px, rgb(0 0 0 / 23%) 0px 0px 5px, rgb(0 0 0 / 43%) 0px 1px 3px, rgb(0 0 0 / 40%) 1px 4px 6px, rgb(0 0 0 / 38%) 0px 5px 10px, rgb(0 0 0 / 25%) 3px 7px 12px`,
      });
    } else if (neonOff == '#0274fc') {
      displayText.css({
        'color': neonOn,
        'text-shadow': `rgb(0 95 208) 0px 1px 0px, rgb(0 98 214) 0px 2px 0px, rgb(0 72 158) 0px 3px 0px, rgb(0 61 133) 0px 4px 0px, rgb(0 0 0 / 23%) 0px 0px 5px, rgb(0 0 0 / 43%) 0px 1px 3px, rgb(0 0 0 / 40%) 1px 4px 6px, rgb(0 0 0 / 38%) 0px 5px 10px, rgb(0 0 0 / 25%) 3px 7px 12px`,
      });
    } else if (neonOff == '#eaa4ff') {
      displayText.css({
        'color': neonOn,
        'text-shadow': `rgb(140 89 255) 0px 1px 0px, rgb(140 89 255) 0px 2px 0px, rgb(140 89 255) 0px 3px 0px, rgb(37 4 111) 0px 4px 0px, rgb(0 0 0 / 23%) 0px 0px 5px, rgb(0 0 0 / 43%) 0px 1px 3px, rgb(0 0 0 / 40%) 1px 4px 6px, rgb(0 0 0 / 38%) 0px 5px 10px, rgb(0 0 0 / 25%) 3px 7px 12px`,
      });
    } else if (neonOff == '#ff8d02') {
      displayText.css({
        'color': neonOn,
        'text-shadow': `rgb(217 123 0) 0px 1px 0px, rgb(231 127 0) 0px 2px 0px, rgb(191 108 1) 0px 3px 0px, rgb(168 95 0) 0px 4px 0px, rgb(0 0 0 / 23%) 0px 0px 5px, rgb(0 0 0 / 43%) 0px 1px 3px, rgb(0 0 0 / 40%) 1px 4px 6px, rgb(0 0 0 / 38%) 0px 5px 10px, rgb(0 0 0 / 25%) 3px 7px 12px`,
      });
    } else if (neonOff == '#fff97c') {
      displayText.css({
        'color': neonOn,
        'text-shadow': `rgb(233 227 106) 0px 1px 0px, rgb(218 212 80) 0px 2px 0px, rgb(199 193 68) 0px 3px 0px, rgb(170 165 53) 0px 4px 0px, rgb(0 0 0 / 23%) 0px 0px 5px, rgb(0 0 0 / 43%) 0px 1px 3px, rgb(0 0 0 / 40%) 1px 4px 6px, rgb(0 0 0 / 38%) 0px 5px 10px, rgb(0 0 0 / 25%) 3px 7px 12px`,
      });
    } else {
      displayText.css({
        'color': '#f4f4f4',
        'text-shadow':
          'rgb(181 181 181) 0px 1px 0px, rgb(169 169 169) 0px 2px 0px, rgb(148 148 148) 0px 3px 0px, rgb(125 125 125) 0px 4px 0px, rgb(0 0 0 / 23%) 0px 0px 5px, rgb(0 0 0 / 43%) 0px 1px 3px, rgb(0 0 0 / 40%) 1px 4px 6px, rgb(0 0 0 / 38%) 0px 5px 10px, rgb(0 0 0 / 25%) 3px 7px 12px',
      });
    }
  } else {
    // ON
    displayText.css({
      'color': '#f4f4f4',
      'text-shadow': `rgb(255 255 255) 0px 0px 5px, rgb(255 255 255) 0px 0px 10px, ${neonOn} 0px 0px 20px, ${neonOn} 0px 0px 30px, ${neonOn} 0px 0px 40px, ${neonOn} 0px 0px 55px, ${neonOn} 0px 0px 75px`,
    });
  }

  function check_switch() {
    displayText.toggleClass('neon_off');
    if (displayText.hasClass('neon_off')) {
      // OFF
      if (neonOff == '#ff2a4d') {
        displayText.css({
          'color': neonOn,
          'text-shadow': `rgb(219 20 56) 0px 1px 0px, rgb(188 8 40) 0px 2px 0px, rgb(160 0 29) 0px 3px 0px, rgb(121 0 22) 0px 4px 0px, rgb(0 0 0 / 23%) 0px 0px 5px, rgb(0 0 0 / 43%) 0px 1px 3px, rgb(0 0 0 / 40%) 1px 4px 6px, rgb(0 0 0 / 38%) 0px 5px 10px, rgb(0 0 0 / 25%) 3px 7px 12px`,
        });
      } else if (neonOff == '#ffd62e') {
        displayText.css({
          'color': neonOn,
          'text-shadow': `rgb(223 185 31) 0px 1px 0px, rgb(205 169 22) 0px 2px 0px, rgb(186 153 18) 0px 3px 0px, rgb(164 132 1) 0px 4px 0px, rgb(0 0 0 / 23%) 0px 0px 5px, rgb(0 0 0 / 43%) 0px 1px 3px, rgb(0 0 0 / 40%) 1px 4px 6px, rgb(0 0 0 / 38%) 0px 5px 10px, rgb(0 0 0 / 25%) 3px 7px 12px`,
        });
      } else if (neonOff == '#e73dcd') {
        displayText.css({
          'color': neonOn,
          'text-shadow': `rgb(231 61 205) 0px 1px 0px, rgb(210 47 186) 0px 2px 0px, rgb(196 42 173) 0px 3px 0px, rgb(181 33 159) 0px 4px 0px, rgb(0 0 0 / 23%) 0px 0px 5px, rgb(0 0 0 / 43%) 0px 1px 3px, rgb(0 0 0 / 40%) 1px 4px 6px, rgb(0 0 0 / 38%) 0px 5px 10px, rgb(0 0 0 / 25%) 3px 7px 12px`,
        });
      } else if (neonOff == '#90dcff') {
        displayText.css({
          'color': neonOn,
          'text-shadow': `rgb(144 220 255) 0px 1px 0px, rgb(144 220 255) 0px 2px 0px, rgb(0 73 107) 0px 3px 0px, rgb(0 58 84) 0px 4px 0px, rgb(0 0 0 / 23%) 0px 0px 5px, rgb(0 0 0 / 43%) 0px 1px 3px, rgb(0 0 0 / 40%) 1px 4px 6px, rgb(0 0 0 / 38%) 0px 5px 10px, rgb(0 0 0 / 25%) 3px 7px 12px`,
        });
      } else if (neonOff == '#85ffaa') {
        displayText.css({
          'color': neonOn,
          'text-shadow': `rgb(0 184 55) 0px 1px 0px, rgb(0 155 47) 0px 2px 0px, rgb(0 134 40) 0px 3px 0px, rgb(0 114 34) 0px 4px 0px, rgb(0 0 0 / 23%) 0px 0px 5px, rgb(0 0 0 / 43%) 0px 1px 3px, rgb(0 0 0 / 40%) 1px 4px 6px, rgb(0 0 0 / 38%) 0px 5px 10px, rgb(0 0 0 / 25%) 3px 7px 12px`,
        });
      } else if (neonOff == '#0274fc') {
        displayText.css({
          'color': neonOn,
          'text-shadow': `rgb(0 95 208) 0px 1px 0px, rgb(0 98 214) 0px 2px 0px, rgb(0 72 158) 0px 3px 0px, rgb(0 61 133) 0px 4px 0px, rgb(0 0 0 / 23%) 0px 0px 5px, rgb(0 0 0 / 43%) 0px 1px 3px, rgb(0 0 0 / 40%) 1px 4px 6px, rgb(0 0 0 / 38%) 0px 5px 10px, rgb(0 0 0 / 25%) 3px 7px 12px`,
        });
      } else if (neonOff == '#eaa4ff') {
        displayText.css({
          'color': neonOn,
          'text-shadow': `rgb(140 89 255) 0px 1px 0px, rgb(140 89 255) 0px 2px 0px, rgb(140 89 255) 0px 3px 0px, rgb(37 4 111) 0px 4px 0px, rgb(0 0 0 / 23%) 0px 0px 5px, rgb(0 0 0 / 43%) 0px 1px 3px, rgb(0 0 0 / 40%) 1px 4px 6px, rgb(0 0 0 / 38%) 0px 5px 10px, rgb(0 0 0 / 25%) 3px 7px 12px`,
        });
      } else if (neonOff == '#ff8d02') {
        displayText.css({
          'color': neonOn,
          'text-shadow': `rgb(217 123 0) 0px 1px 0px, rgb(231 127 0) 0px 2px 0px, rgb(191 108 1) 0px 3px 0px, rgb(168 95 0) 0px 4px 0px, rgb(0 0 0 / 23%) 0px 0px 5px, rgb(0 0 0 / 43%) 0px 1px 3px, rgb(0 0 0 / 40%) 1px 4px 6px, rgb(0 0 0 / 38%) 0px 5px 10px, rgb(0 0 0 / 25%) 3px 7px 12px`,
        });
      } else if (neonOff == '#fff97c') {
        displayText.css({
          'color': neonOn,
          'text-shadow': `rgb(233 227 106) 0px 1px 0px, rgb(218 212 80) 0px 2px 0px, rgb(199 193 68) 0px 3px 0px, rgb(170 165 53) 0px 4px 0px, rgb(0 0 0 / 23%) 0px 0px 5px, rgb(0 0 0 / 43%) 0px 1px 3px, rgb(0 0 0 / 40%) 1px 4px 6px, rgb(0 0 0 / 38%) 0px 5px 10px, rgb(0 0 0 / 25%) 3px 7px 12px`,
        });
      } else {
        displayText.css({
          'color': '#f4f4f4',
          'text-shadow':
            'rgb(181 181 181) 0px 1px 0px, rgb(169 169 169) 0px 2px 0px, rgb(148 148 148) 0px 3px 0px, rgb(125 125 125) 0px 4px 0px, rgb(0 0 0 / 23%) 0px 0px 5px, rgb(0 0 0 / 43%) 0px 1px 3px, rgb(0 0 0 / 40%) 1px 4px 6px, rgb(0 0 0 / 38%) 0px 5px 10px, rgb(0 0 0 / 25%) 3px 7px 12px',
        });
      }
    } else {
      // ON
      displayText.css({
        'color': '#f4f4f4',
        'text-shadow': `rgb(255 255 255) 0px 0px 5px, rgb(255 255 255) 0px 0px 10px, ${neonOn} 0px 0px 20px, ${neonOn} 0px 0px 30px, ${neonOn} 0px 0px 40px, ${neonOn} 0px 0px 55px, ${neonOn} 0px 0px 75px`,
      });
    }
  }
  // $('.color_table .color_box:eq(6)').click();
  $('.color_box').click(function () {
    // $('.demo_on_off').removeClass('offswitch');
    // $('.demo_on_off').addClass('onswitch');
    // $('.showText').removeClass('neon_off');
  });
  $('.custom-neon-option div').click(function () {
    $('.custom-neon-option div').removeClass('active');
    $(this).addClass('active');
    update_total();
  });
  $('.card_main_wrapper .custom_check_box .custom-control-label').click(function () {
    update_total();
  });

  function update_total() {
    length_text = $('#orderText').val();
    str = $('.size_box.active .box_length').text();
    str = str.replaceAll(/\s/g, '');
    const allowed_length = str.split('-').pop();
    per_alph = $('.size_box.active .alphabet').text();
    length_text = length_text.replaceAll(/\s/g, '');
    length_text = length_text.length;
    $('.size_box').each(function () {
      // console.log($(this).text());
      // console.log($(this).find('.box_length').text());
      strs = $(this).find('.box_length').text();
      strs = strs.replaceAll(/\s/g, '');
      const allowed_lengths = strs.split('-').pop();
      money = $(this).find('.size_price2').text();

      color_price = $('.color-item.active').data('price');
      money = parseInt(money) + parseInt(color_price);
      console.log(allowed_lengths);
      if (length_text > allowed_lengths) {
        extra = $(this).find('.alphabet').text();
        extra = parseInt(extra);
        money = parseInt(money);

        extra_alpha = (length_text - allowed_lengths) * extra;
        extra_alpha = parseInt(extra_alpha);
        new_total_cost = extra_alpha + money;
        $(this).find('.size_price').text(new_total_cost);
      } else if (length_text <= allowed_lengths) {
        $(this).find('.size_price').text(money);
      }
    });
    let price_waterProof = 0,
      price_dimension = 0,
      price_offer = 0,
      price_sb = 0;
    price_dimension = parseInt(
      $('.size_box.active .size_box_details span:eq(1)').html().replace('$', '')
    );
    if ($('.ip67').hasClass('active')) {
      price_waterProof = parseInt($('#waterProofPrice').html());
    }
    $('.card_main_wrapper .custom_check_box .custom-control-label').each(function () {
      if ($(this).find('input').is(':checked')) {
        price_offer += parseInt($(this).find('input').data('price'));
      }
    });
    price_sb = parseInt($('.story_board .dropdown-item.active').data('price'));
    total = price_dimension + price_waterProof + price_offer + price_sb;
    if (length_text > allowed_length) {
      // additional_cost = (length_text - allowed_length) * per_alph;
      total = total;
    }
    $('.total_sel_price').html('$' + total);
  }
  update_total();

  // Story board

  let clr_name;
  $('.addtocart').click(function () {
    let n_cart_id = $(this).data('item_index');
    let fontLength = $('.size_box.active .size_box_area .box_length').html().split('"')[0];
    let fontHeight = $('.size_box.active .size_box_area .box_height').html().split('"')[0];
    clr_name = $('.color_box.active p').html();
    let n_type = $('.custom-neon-option .active').html().split('*')[0];
    let n_pwr_adp = $('.power_adapter select').val();
    let n_bb = $('.dropdown-menu .dropdown-item.active span:eq(0)').html();
    let n_bb_price = $('.dropdown-menu .dropdown-item.active span:eq(1)').html();
    let n_bb_img = $('#dropdownMenuButton img').attr('src');
    let kits = [];
    $('.card_main_wrapper .custom_check_box label').each(function () {
      if ($(this).find('input[type="checkbox"]').is(':checked')) {
        let z = $(this).find('input[type="checkbox"]').data('name');
        kits.push(z);
      }
    });
    $.ajax({
      url: 'server/addToCart.php',
      type: 'POST',
      data: {
        addToCart: 'inCart',
        n_cart_id: n_cart_id,
        n_txt: text,
        n_txt_size: fontSize,
        n_txt_length: fontLength,
        n_txt_height: fontHeight,
        n_txt_clr: clr_name,
        n_txt_font: fontStyle,
        n_type: n_type,
        n_pwr_adp: n_pwr_adp,
        n_bb: n_bb,
        n_bb_price: n_bb_price,
        n_bb_img: n_bb_img,
        n_kit: kits,
        n_total: total,
      },
      success: function (res) {
        // console.log(res);
        window.location.href = `design_proof.php?cart_item=${res}`;
      },
    });
  });
  $('.proceed_to_cart').click(function () {
    let cart_item = $(this).data('cart_item');
    let approve = '';
    $('.design_proof_display .custom_check_box label').each(function () {
      if ($(this).find('input[type="radio"]').is(':checked')) {
        approve = $(this).find('input[type="radio"]').data('approve');
      }
    });
    $.ajax({
      url: 'server/addToCart.php',
      type: 'POST',
      data: {
        updateCart: 'updateCart',
        n_cart_id: cart_item,
        n_approve: approve,
      },
      success: function (res) {
        window.location.href = `cart.php`;
      },
    });
  });

  $('.delete_item').click(function () {
    let id = $(this).data('cart_item');

    $.ajax({
      url: 'server/addToCart.php',
      type: 'POST',
      data: {
        delete_item: 'delete_item',
        cart_id: id,
      },
      success: function (res) {
        location.reload();
      },
    });
  });

  $('.update_cart_qty').change(function () {
    let index = $(this).data('cart_id');
    let qty = $(this).val();
    $.ajax({
      url: 'server/addToCart.php',
      type: 'POST',
      data: {
        updateQty: 'updateQty',
        index: index,
        qty: qty,
      },
      success: function (res) {
        location.reload();
      },
    });
  });

  $('.proceed_to_checkout').click(function () {
    window.location.href = 'checkout.php';
  });
  $('.payment_method').change(function () {
    $('#order_process_form_stripe').css('display', 'none');
    $('#afterpay_btn').css('display', 'none');

    if ($(this).data('pm') == 'stripe') {
      $('#order_process_form_stripe').css('display', 'block');
      // $('.checkout_form').attr('id','checkout_form');
    }
    if ($(this).data('pm') == 'paypal') {
      $('#afterpay_btn').css('display', 'block');
      // $('.checkout_form').attr('id','afterpay_form');
    }

    let a = 'empty';
    let x = $('#email').val() != '' ? $('#email').val() : '';
    console.log(x);
  });

  //
  $('.minus').click(function () {
    var $input = $(this).parent().find('input');
    var count = parseInt($input.val()) - 1;
    count = count < 1 ? 1 : count;
    $input.val(count);
    return false;
  });
  $('.plus').click(function () {
    var $input = $(this).parent().find('input');
    $input.val(parseInt($input.val()) + 1);
    return false;
  });

  $('.like_product').owlCarousel({
    loop: false,
    margin: 10,
    nav: false,
    autoplay: false,
    dots: false,
    responsive: {
      0: {
        items: 2,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 4,
      },
    },
  });

  /**** custom****** */

  let single_name = '',
    single_size = '',
    single_price = '',
    single_color_name = 'red',
    offers = '',
    s_p_id = '',
    single_title = '',
    s_p_qty = 1;

  $('.price_label').on('click', function () {
    $('.price_label').removeClass('active');
    $(this).addClass('active');
    single_name = $(this).find('.box_name').html();
    single_size = $(this).find('.box_size').html();
    single_price = $(this).find('.box_price').html();
    $('.size_name').html(single_name + ' ' + single_size);
    $('.price').html(single_price);
  });
  $('.color_box').click(function () {
    single_color_name = $(this).find('p').html();
    $('.single_color_name').html(single_color_name);
  });

  $('.btn_addtocart').click(function (e) {
    var val = [];
    $(':checkbox:checked').each(function (i) {
      val[i] = $(this).val();
    });
  });

  $('.btn_addtocart').click(function (e) {
    e.preventDefault();
    offers = $('.check_single_mark:checked')
      .map(function () {
        return this.value;
      })
      .get();
    single_title = $('.product_info_main .product_name').html();
    single_name = $('.price_label.active .size_card .box_name').html();
    single_size = $('.price_label.active .size_card .box_size').html();
    single_price = $('.price_label.active .size_card .box_price').html();
    s_p_qty = $('.single_cart_qty').val();
    s_p_id = $(this).data('p_id');
    let single_image = $('.product_detail_information img').data('prod_image');

    console.log(
      `Title: ${single_title} :: Size Name: ${single_name} :: Size: ${single_size} :: Price: ${single_price} :: Color: ${single_color_name} :: Offer: ${offers} :: Quantity: ${s_p_qty} :: ProductId: ${s_p_id} :: Image: ${single_image}`
    );

    $.ajax({
      url: 'server/addToCart.php',
      type: 'POST',
      data: {
        addToCart_single: 'addToCart_single',
        n_cart_id: s_p_id,
        n_cart_title: single_title,
        n_cart_image: single_image,
        n_cart_size: single_size,
        n_cart_size_name: single_name,
        n_cart_color: single_color_name,
        n_cart_price: single_price,
        n_cart_offers: offers,
        n_qty: s_p_qty,
      },
      success: function (res) {
        if (res == 'success') {
          window.location.href = 'cart.php';
        }
        console.log(res);
      },
    });
  });
  $.fn.picZoomer = function (options) {
    $.extend({}, $.fn.picZoomer.defaults, options);
  };
  $.fn.picZoomer.defaults = {
    picHeight: 460,
    scale: 2.5,
    zoomerPosition: { top: '0', left: '380px' },
    zoomWidth: 400,
    zoomHeight: 460,
  };
  $('.picZoomer').picZoomer();

  var $fileInput = $('.file-input');
  var $droparea = $('.file-drop-area');

  // highlight drag area
  $fileInput.on('dragenter focus click', function () {
    $droparea.addClass('is-active');
  });

  // back to normal state
  $fileInput.on('dragleave blur drop', function () {
    $droparea.removeClass('is-active');
  });

  // change inner text
  $fileInput.on('change', function () {
    var filesCount = $(this)[0].files.length;
    var $textContainer = $(this).prev();

    if (filesCount === 1) {
      // if single file is selected, show file name
      var fileName = $(this).val().split('\\').pop();
      $textContainer.text(fileName);
    } else {
      // otherwise show number of files
      $textContainer.text(filesCount + ' files selected');
    }
  });

  jQuery(window).scroll(function () {
    var $sections = $('.page-section');
    $sections.each(function (i, el) {
      var top = $(el).offset().top - 100;
      var bottom = top + $(el).height();
      var scroll = $(window).scrollTop();
      var id = $(el).attr('id');
      if (scroll > top && scroll < bottom) {
        $('a.active').removeClass('active');
        $('a[href="#' + id + '"]').addClass('active');
      }
    });
  });
});
