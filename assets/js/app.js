
$(function() {

  "use strict";

  // Disable demonstrative links!
  $('a[href="#"]').on('click', function(e){
    e.preventDefault();
  });

  // Back to top
  $('#scroll-up').on( 'click', function() {
    $('html, body').animate({scrollTop : 0}, 600);
    return false;
  });

  // Smoothscroll to anchor
  $('a[href^="#"]:not([href="#"])').on('click', function(){
    var id = $(this).attr('href');
    if ($(id).size() > 0) {
      $('html, body').animate({scrollTop: $(id).offset().top}, 600);
    }
    return false;
  });
  
  //
  // Header slider
  //
  var header_slider = new Swiper('.header-slider', {
    nextButton: '.header-slider .swiper-button-next',
    prevButton: '.header-slider .swiper-button-prev',
    pagination: '.header-slider .swiper-pagination',
    paginationClickable: true,
    spaceBetween: 0,
    slidesPerView: 1
  });

  //
  // Testimonial slider
  //
  var testimonial_slider = new Swiper('.testimonial-slider', {
    nextButton: '.testimonial-button-next',
    prevButton: '.testimonial-button-prev',
    pagination: '.testimonial-pagination',
    paginationClickable: true,
    spaceBetween: 30,
    slidesPerView: 3,
    breakpoints: {
      1024: {
        slidesPerView: 3,
        spaceBetween: 30
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 20
      },
      640: {
        slidesPerView: 1,
        spaceBetween: 0
      }
    }
  });

  //
  // Services slider
  //
  var services_slider = new Swiper('.services-slider', {
    pagination: '.services-slider .swiper-pagination',
    paginationClickable: true,
    spaceBetween: 30,
    slidesPerView: 3,
    breakpoints: {
      1024: {
        slidesPerView: 3,
        spaceBetween: 30
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 20
      },
      640: {
        slidesPerView: 1,
        spaceBetween: 0
      }
    }
  });


  //
  // Speeches slider
  //
  var speeches_slider = new Swiper('.speeches-slider', {
    pagination: '.speeches-slider .swiper-pagination',
    paginationClickable: true,
    spaceBetween: 30,
    slidesPerView: 2,
    breakpoints: {
      768: {
        slidesPerView: 1,
        spaceBetween: 0
      }
    }
  });

  //
  // Add a .body-scrolled to body, when page scrolled
  //
  $(window).on('scroll', function() {
    if ($(this).scrollTop() > 20) {
      $('body').addClass('body-scrolled');
    }
    else {
      $('body').removeClass('body-scrolled');
    }
  });

  //
  // jQuery.countTo
  //
  $(window).on('scroll', function() {
    $('.counter span:not(.counted-before)').each(function(index, value) {
      if (isScrolledIntoView(this)) {
        $(this).countTo().addClass('counted-before');
      }
    });
  });

  //
  // FAQ Component
  //
  $('.faq h6').on('click', function() {
    if ($(this).parents('li').hasClass('open')) {
      return;
    }
    $(this).parents('.faq').find('.open .faq-body').slideUp(400).parent().removeClass('open');
    $(this).siblings('.faq-body').slideDown(400).parent().addClass('open');
  });


  //
  // Offcanvas
  //
  $('.navbar-toggler, .navbar-backdrop').on('click', function (e) {
    e.preventDefault();

    $('body').toggleClass('offcanvas-show');
    $(this).children().toggleClass('ti-menu ti-close');
    
    if ($('body').hasClass('offcanvas-show')) {
      $('html').css('overflow', 'hidden');
    }
    else {
      $('html').css('overflow', 'visible');
    }
    
  });

  $(window).on('resize', function(){
    if ($(window).width() > 991) {
      $('body').removeClass('offcanvas-show');
      $('html').css('overflow', 'visible');
    }
  });

  //
  // Shuffle.js
  //
  if ($('#shuffle-grid').size()) {
    var shuffle_instance = new shuffle($('#shuffle-grid'), {
      itemSelector: '.shuffle-item',
      sizer: '.shuffle-sizer',
      delimeter: ','
    });

    var setupFilters = function() {
      var $btns = $('.shuffle-filter').children();
      $btns.on('click', function() {
        var $this = $(this),
          isActive = $this.hasClass('active'),
          group = isActive ? 'all' : $this.data('group');

        // Hide current label, show current label in title
        if (!isActive) {
          $('.shuffle-filter .active').removeClass('active');
        }

        $this.toggleClass('active');

        // Filter elements
        shuffle_instance.filter(group);
      });

      $btns = null;
    }
    setupFilters();
  }


  //
  // Preloader
  //
  var interval = setInterval(function() {
    if(document.readyState === 'complete') {
      clearInterval(interval);
      $('.preloader').css('display', 'none');
    }    
  }, 100);

});


function isScrolledIntoView(elem)
{
  var $elem = $(elem);
  var $window = $(window);
  var docViewTop = $window.scrollTop();
  var docViewBottom = docViewTop + $window.height();
  var elemTop = $elem.offset().top;
  var elemBottom = elemTop + $elem.height();

  return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}


//
// Chart
//

var chartColors = {
  'primary': 'rgba(4, 35, 79, 1)',
  'blue':    'rgba(71, 177, 245, 0.9)',
  'red':     'rgba(240, 71, 71, 0.93)',
  'yellow':  'rgba(249, 191, 59, 0.93)',
  'white':   '#fff'
}

var chartOptions = {
  scales: {
    xAxes: [{
      ticks: {
        display: false
      }
    }]
  }
};

if (typeof Chart != "undefined") {
  Chart.defaults.global.responsive = true;
  Chart.defaults.global.defaultColor = "rgba(240, 71, 71, 0.93)";
  Chart.defaults.global.defaultFontFamily = "Montserrat, Helvetica Neue";
  Chart.defaults.global.defaultFontColor = "#00283b";
  Chart.defaults.global.defaultFontStyle = "bold";
  Chart.defaults.global.defaultFontSize = 14;
  
  Chart.defaults.global.elements.point.backgroundColor = "#00283b";
  Chart.defaults.global.elements.point.borderColor = "#fff";
  Chart.defaults.global.elements.point.radius = 5;
  Chart.defaults.global.elements.point.borderWidth = 3;
  Chart.defaults.global.elements.point.hoverRadius = 5;
  Chart.defaults.global.elements.point.hoverBorderWidth = 3;

  Chart.defaults.global.tooltips.backgroundColor = "rgba(4, 35, 79, 0.9)";
  Chart.defaults.global.tooltips.bodyFontStyle = "normal";

  Chart.defaults.global.legend.display = false;
}
