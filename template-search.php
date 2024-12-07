<?php

/***
 * Template Name: Search
 *
 ***/ ?>
<?php get_header();
$search_form = get_field('search_form');
?>
<div id="content">
  <div class="container news-events search">
    <h1><?php echo get_the_title(); ?></h1>

    <div class="searchfilter">
      <?php echo do_shortcode('[searchandfilter id="' . $search_form . '"]'); ?>
    </div>

    <div class="searchresults">
      <?php echo do_shortcode('[searchandfilter id="' . $search_form . '" show="results"]'); ?>
    </div>

    <?php the_content(); ?>
  </div>
</div>
<script>
  
</script>
<?php get_footer(); ?>