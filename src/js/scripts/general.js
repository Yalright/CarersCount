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


