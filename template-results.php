<?php

/***
 * Template Name: Search Result
 *
 ***/ ?>
<?php get_header();
$search_form = get_field('global_search_form', 'option');
?>
<div id="content">
  <div class="container news-events">
    <h1><?php echo get_the_title(); ?></h1>

    <div class="searchresults">
      <?php echo do_shortcode('[searchandfilter id="' . $search_form . '" show="results"]'); ?>
    </div>

    <?php the_content(); ?>
  </div>
</div>
<?php get_footer(); ?>