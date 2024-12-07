<?php

/***
 * Template Name: News Events
 *
 ***/ ?>
<?php get_header();
$subtitle_text = get_field('subtitle_text');

$search_form = get_field('search_form');
?>
<div id="content">
  <div class="container news-events">
    <?php if (is_page('whats-on') || is_page('events')) { ?>
      <h1><?php echo get_the_title(); ?></h1>

      <?php if ($subtitle_text) { ?>
        <h2><?php echo $subtitle_text; ?></h2>
      <?php } ?>

      <?php if (is_page('whats-on') || is_page('events') && !empty($search_form)) { ?>
        <div class="filters">
          <?php echo do_shortcode('[searchandfilter id="' . $search_form . '"]'); ?>
        </div>
        <div class="results">
          <?php echo do_shortcode('[searchandfilter id="' . $search_form . '" show="results"]'); ?>
        </div>
      <?php } ?>


      <div class="item-grid">
        <?php
        // WP_Query arguments
        $args = array(
          'post_type'              => array('event-off'),
          'nopaging'               => false,
          'posts_per_page'         => '100',
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
            $alt = get_post_meta($id, '_wp_attachment_image_alt', true);

            $event_date       = get_field('event_date');
            $event_time       = get_field('event_time');
            $event_location   = get_field('event_location'); ?>

            <div class="item">
              <figure>
                <img loading="lazy" width="300" height="230" src="<?php echo esc_attr($src); ?>" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" alt="<?php echo esc_attr($alt); ?>" />
              </figure>

              <p class="title"><?php echo get_the_title(); ?></p>

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


    <?php } ?>



    <?php if (is_page('news')) { ?>
      <h1><?php echo get_the_title(); ?></h1>

      <?php if (is_page('news') && !empty($search_form)) { ?>
        <div class="filters">
          <?php echo do_shortcode('[searchandfilter id="' . $search_form . '"]'); ?>
        </div>
        <div class="results">
          <?php echo do_shortcode('[searchandfilter id="' . $search_form . '" show="results"]'); ?>
        </div>
      <?php } ?>

      <div class="item-grid">

        <?php
        // WP_Query arguments
        $args = array(
          'post_type'              => array('post-off'),
          'nopaging'               => false,
          'posts_per_page'         => '100',
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


    <?php } ?>

    <?php the_content(); ?>
  </div>
</div>
<?php get_footer(); ?>