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
