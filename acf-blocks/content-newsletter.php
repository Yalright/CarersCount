<?php

/***
 * Block - Newsletter
 *
 ***/ ?>
<?php
$title = get_field('title');
$newsletter_code = get_field('newsletter_code');

?>

<section class="guten-block block-newsletter">
  <div class="container">
    <?php if (!empty($title)) { ?>
      <p class="title"><?php echo $title; ?></p>
    <?php } ?>

    <figure>
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/icon-newsletter.svg" alt="" width="133" height="32" />
    </figure>

    <?php if (!empty($newsletter_code)) { ?>
      <div class="newsletter-container">
        <?php echo $newsletter_code; ?>
      </div>
    <?php } ?>
  </div>
</section>