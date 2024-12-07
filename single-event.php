<?php

/***
 * Default Single Event Post Layout.
 *
 ***/ ?>
<?php
get_header();

$event_date       = get_field('event_date');
$event_time       = get_field('event_time');
$event_location   = get_field('event_location');

?>

<div id="content" class="template-post single-event news-events">

  <div class="container">

    <h1>What's On</h1>


    <div class="item-grid">

      <?php
      // WP_Query arguments
      $args = array(
        'post_type'              => array('event-disabled'),
        'nopaging'               => false,
        'posts_per_page'         => '3',
      );

      // The Query
      $query = new WP_Query($args);

      // The Loop
      if ($query->have_posts()) {
        while ($query->have_posts()) {
          $query->the_post();

          $id = get_post_thumbnail_id();
          $src = wp_get_attachment_image_src($id, 'full')[0];
          $srcset = wp_get_attachment_image_srcset($id, 'full');
          $sizes = wp_get_attachment_image_sizes($id, 'full');
          $alt = get_post_meta($id, '_wp_attachment_image_alt', true); ?>

          <div class="item">
            <figure>
              <img loading="lazy" width="300" height="230" src="<?php echo esc_attr($src); ?>" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" alt="<?php echo esc_attr($alt); ?>" />

            </figure>
            <p class="title"><?php echo get_the_title(); ?></p>
            <p class="description"><?php echo get_the_excerpt(); ?></p>
            <p class="read-more"><a href="<?php echo get_the_permalink(); ?>">+ Read more</a></p>
          </div>

      <?php }
      } else {
        // no posts found
      }

      // Restore original Post Data
      wp_reset_postdata();
      ?>

    </div>

    <div class="main-event">
      <h1><?php echo get_the_title(); ?></h1>

      <div class="single-item" id="<?php echo $row_id; ?>">
        <div class="content">

          <ul class="event-info">
            <?php if (!empty($event_date)) { ?>
              <li class="event-date"><?php echo $event_date; ?></li>
            <?php } ?>

            <?php if (!empty($event_time)) { ?>
              <li class="event-time"><?php echo $event_time; ?></li>
            <?php } ?>

            <?php if (!empty($event_location)) { ?>
              <li class="event-location"><?php echo $event_location; ?></li>
            <?php } ?>
          </ul>

          <p class="description"><?php the_content(); ?></p>

          <?php if (have_rows('useful_links')) { ?>
            <p class="useful-links-title">+ Useful links</p>
            <ul class="useful-links">
              <?php while (have_rows('useful_links')) : the_row();
                $link = get_sub_field('link');
                if ($link) {
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self';
                }
              ?>

                <li><a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"><?php echo $link_title; ?></a></li>

              <?php endwhile; ?>
            </ul>
          <?php } ?>

        </div>

        <?php
        $id = get_post_thumbnail_id();
        $src = wp_get_attachment_image_src($id, 'full')[0];
        $srcset = wp_get_attachment_image_srcset($id, 'full');
        $sizes = wp_get_attachment_image_sizes($id, 'full');
        $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
        ?>
        <div class="image">
          <figure>
            <img loading="lazy" width="300" height="230" src="<?php echo esc_attr($src); ?>" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" alt="<?php echo esc_attr($alt); ?>" />
          </figure>
        </div>
      </div>
    </div>

    <a href="/events/" class="back-to-events">Back to events</a>

  </div>

</div>
<?php
get_footer();
?>