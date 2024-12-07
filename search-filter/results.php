<?php

if (!defined('ABSPATH')) {
  exit;
}

if (is_page('search')) {
  $sf_class = "item-list";
} else {
  $sf_class = "item-grid";
}

if ($query->have_posts()) {
  if (!empty($query->query_vars['s'])) {
    echo "<span id='sf-results-count'>" . $query->found_posts . " Results for '" . $query->query_vars['s'] . "'</span>";
  }
?>
  <div id="content">
    <div class="container news-events">
      <div class="item-types">
        <?php while ($query->have_posts()) {
          $query->the_post();

          $title = get_the_title();
          $excerpt = get_the_excerpt();
          $permalink = get_permalink();
          $date = get_the_date();

          $id = get_post_thumbnail_id();
          $src = wp_get_attachment_image_src($id, 'full')[0];
          $srcset = wp_get_attachment_image_srcset($id, 'full');
          $sizes = wp_get_attachment_image_sizes($id, 'full');
          $alt = get_post_meta($id, '_wp_attachment_image_alt', true);

          $event_date       = get_field('event_date');
          $event_time       = get_field('event_time');
          $event_location   = get_field('event_location');
        ?>



          <div class="item">
            <?php if (!is_page('search')) { ?>
              <?php if ($src) { ?>
                <figure>
                  <img loading="lazy" width="300" height="230" src="<?php echo esc_attr($src); ?>" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" alt="<?php echo esc_attr($alt); ?>" />
                </figure>
              <?php } else { ?>
                <figure class="placeholder">
                  <img loading="lazy" width="300" height="230" src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.png" alt="" />
                </figure>
              <?php } ?>
            <?php } ?>
            <p class="title"><?php echo (strlen(get_the_title()) > 65) ? substr(get_the_title(), 0, 65) . '...' : get_the_title(); ?></p>

            <?php if (!is_page('search')) { ?>
              <ul class="event-info">
                <?php if (!empty($event_date)) { ?>
                  <li class="event-date"><span><?php echo $event_date; ?></span></li>
                <?php } ?>

                <?php if (!empty($event_time)) { ?>
                  <li class="event-time"><span><?php echo $event_time; ?></span></li>
                <?php } ?>

                <?php if (!empty($event_location)) { ?>
                  <li class="event-location"><span><?php echo $event_location; ?></span></li>
                <?php } ?>
              </ul>
            <?php } ?>

            <!-- <p class="description"><?php echo get_the_excerpt(); ?></p> -->
            <p class="read-more"><a href="<?php echo get_the_permalink(); ?>">+ Read more</a></p>
          </div>

        <?php } ?>
      </div>
    </div>
  </div>
<?php } else { ?>

  <div class='search-filter-results-list' data-search-filter-action='infinite-scroll-end'>
    <span>End of Results</span>
  </div>

<?php }
