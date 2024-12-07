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