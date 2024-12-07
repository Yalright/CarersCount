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