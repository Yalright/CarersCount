<?php

/***
 * Template Name: Landing Page
 *
 ***/

$content = get_field('content');

?>
<?php get_header('plain'); ?>
<div id="content" class="page-landing">
  <?php // the_content(); 
  ?>
  <div class="container">
    <?php if (!empty($content)) { ?>
      <div class="guten-block block-wysiwyg">
        <?php echo $content; ?>
      </div>
    <?php } ?>

    <?php // Check rows exists.
    if (have_rows('maps')) { ?>
      <div class="landing-maps">
        <?php while (have_rows('maps')) : the_row();

          // Load sub field value.
          $name = get_sub_field('name');
          $url = get_sub_field('url');
          $image = get_sub_field('image'); ?>

          <?php if (!empty($name) && !empty($url) && !empty($image)) { ?>
            <div class="map-item">
              <a href="<?php echo $url; ?>"><?php echo $name; ?></a>
              <picture>
                <img class="svg-inline" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="400" height="400" />
              </picture>
            </div>
          <?php } ?>

        <?php endwhile; ?>
      </div>
    <?php } ?>
  </div>
</div>
<?php get_footer('plain'); ?>