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