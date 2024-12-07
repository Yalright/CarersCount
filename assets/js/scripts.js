
"use strict";
jQuery(document).ready(function ($) {
  $(".single-item .question").on("click", function () {

    if ($(this).hasClass("active")) {
      $(this).next(".answer").removeClass("active");
      $(this).removeClass("active");
    } else {
      $(this).next(".answer").addClass("active");
      $(this).addClass("active");
    }
    console.log("clicked");
  });
});
// window.addEventListener('DOMContentLoaded', () => {

//   // INTERSECTION OBSERVER API

// const observerOptions = {
//   root: null, // Null = based on viewport
//   rootMargin: "0px", // Margin for root if desired
//   threshold: 0.5 // Percentage of visibility needed to execute function
// };

// function observerCallback(entries, observer) {
//   entries.forEach(entry => {
//     if (entry.isIntersecting) {
//       // Fade in observed elements that are in view
//       entry.target.classList.add('fadeIn');
//     }
//     // else {
//     //   // Fade out observed elements that are not in view
//     //   entry.target.classList.replace('fadeIn', 'fadeOut');
//     // }
//   });
// }

// // Grab all relevant elements from DOM
// const animateOne = document.querySelectorAll('.guten-block');
// const animateTwo = document.querySelectorAll('header, footer');

// // Call function for each element
// const observer = new IntersectionObserver(observerCallback, observerOptions);
// animateOne.forEach(el => observer.observe(el));
// animateTwo.forEach(el => observer.observe(el));



// });
"use strict";
jQuery(document).ready(function ($) {
  $(".download-item .more-info").click(function () {});

  $('body').on('click', '.download-item a.download-link', function () {
    var downloadSingle = $(this).data("tab");
    $(".download-single-item .single-item").removeClass("active");
    $("#" + downloadSingle).addClass("active");

    var downloadAreaOffset = $("#download-area").offset().top;
    $('html, body').animate({
      scrollTop: downloadAreaOffset
    }, 400);
  });

  $('body').on('click', '.single-item a.close-icon', function (e) {
    e.preventDefault();
    $(this).parent().parent().removeClass("active");

    var downloadsOffset = $("#downloads").offset().top;
    $('html, body').animate({
      scrollTop: downloadsOffset
    }, 400, function () {
      if (window.location.hash) {
        history.replaceState(null, null, window.location.pathname);
      }
    });
  });

  if (window.location.hash !== "#downloads" && window.location.href.indexOf('/#downloads') === -1) {
    if ($(".block-downloads").length) {
      if (window.location.hash) {
        var anchorId = window.location.hash.substring(1);
        var targetElement = $("#" + anchorId).find("a.download-link");
  
        if (targetElement.length) {
          targetElement.trigger("click");
  
          $('html, body').animate({
            scrollTop: $("#download-area").offset().top
          }, 400);
        }
      }
    }
  } else {
    // If the URL contains #downloads, scroll to the #downloads section
    $('html, body').animate({
      scrollTop: $("#downloads").offset().top
    }, 400);
  }
  
  
});

"use strict";
jQuery(document).ready(function ($) {
  $(window).on('scroll', function () {
    var scrollPosition = $(this).scrollTop();
    if (scrollPosition >= 500) {
      $("a.back-to-top").addClass("active");
    } else {
      $("a.back-to-top").removeClass("active");
    }
  });

  $('p.column--title > a').hover(
    function () { $(this).parent().addClass('active') },
    function () { $(this).parent().removeClass('active') }
  )

  $('img.svg-inline').each(function () {
    var $img = $(this);
    var imgURL = $img.attr('src');

    $.get(imgURL, function (data) {
      // Get the SVG tag, ignore the rest
      var $svg = $(data).find('svg');

      // Remove any invalid XML tags
      $svg = $svg.removeAttr('xmlns:a');

      // Copy all the img attributes to the SVG
      $.each($img.prop("attributes"), function () {
        $svg.attr(this.name, this.value);
      });

      // Replace the img with the SVG
      $img.replaceWith($svg);
    }, 'xml');
  });
});



"use strict";
jQuery(document).ready(function ($) {
  $("header button.mobile-menu-toggle").on("click", function () {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(".mobile-menu").removeClass("active");
      $(this).attr("aria-expanded", "false");
      // $("body").removeClass("mobileMenu-active");
    } else {
      $(this).addClass("active");
      $(".mobile-menu").addClass("active");
      $(this).attr("aria-expanded", "true")
      // $("body").addClass("mobileMenu-active");
    }
  });

  $("header .mobile-menu .menu-item-has-children > a").on("click", function () {
    if ($(this).hasClass("active")) {
      $(this).parent().removeClass("active");
      $(this).parent().attr("aria-expanded", "false");
    } else {
      $(this).parent().addClass("active");
      $(this).parent().attr("aria-expanded", "true")
    }
  });

  $("header .mobile-menu .menu-item-has-children > a").on("click", function (e) {
    e.preventDefault();

  });


    $("nav.nav-row ul > li.contact-link a").hover(
      function () {
        $(this).addClass("hover");
        $("nav.cta-row li.contact a.cta--contact").addClass("hover");
      },
      function () {
        $(this).removeClass("hover");
        $("nav.cta-row li.contact a.cta--contact").removeClass("hover");
      }
    );

    $("nav.cta-row li.contact a.cta--contact").hover(
      function () {
        $(this).addClass("hover");
        $("nav.nav-row ul > li.contact-link a").addClass("hover");
      },
      function () {
        $(this).removeClass("hover");
        $("nav.nav-row ul > li.contact-link a").removeClass("hover");
      }
    );


  // $( "nav.nav-row ul > li > a" ).hover(function() {
  //   // $( this ).toggleClass("active");
  //   // $( this ).parent().toggleClass("active");

  //   $("nav.nav-row ul > li > a").hover(
  //     function () {
  //       $(this).addClass("active");
  //     },
  //     function () {
  //       $(this).removeClass("active").delay(500);
  //     }
  //   );
  // });




  // $("nav.nav-row ul > li > a").hover(
  //   function () {
  //     $(this).addClass("active");
  //     $(this).parent().addClass("active");
  //     // console.log("enter");
  //   },
  //   function () {
  //     setTimeout(() => {
  //       $(this).removeClass("active");
  //       $(this).parent().removeClass("active");

  //       // console.log("left");
  //     }, 800)
  //   });
});

jQuery(document).ready(function($) {
    // Create the new <li> element after .sf-field-category
    $('.sf-field-category').after('<li class="results-counter"></li>');

    // Move the #sf-results-count span into the newly created <li>
    $('.results-counter').append($('#sf-results-count'));

    function setSfClass() {
        if ($('.news-events.search').length > 0) {
            var sf_class = "item-list";
        } else {
            var sf_class = "item-grid";
        }
        $('.news-events > .item-types').removeClass('item-list item-grid').addClass(sf_class);
    }

    // Run on page load
    setSfClass();

    // Run setSfClass after each AJAX reload
    $(document).ajaxComplete(function() {
        setSfClass();
    });
  });
"use strict";
jQuery(document).ready(function ($) {
  $('.testimonial-container-images').slick({
    dots: false,
    arrows: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          autoplay: true,
          infinite: true,
        }
      },
      {
        breakpoint: 768,
        settings: {
          autoplay: true,
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
});