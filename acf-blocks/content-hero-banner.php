<?php

/***
 * Block - WYSIWYG
 *
 ***/ ?>
<?php
$title = get_field('title');
$image = get_field('image');
$content = get_field('content');
?>

<section class="guten-block block-hero-banner">
  <div class="container">
    <div class="text-container">
      <?php if (!empty($title)) { ?>
        <h1><?php echo $title; ?></h1>
      <?php } ?>
      <?php if (!empty($content)) { ?>
        <p><?php echo $content; ?></p>
      <?php } ?>
    </div>
    <div class="image-container">
      <?php if (!empty($image)) { ?>
        <figure>
          <img src="<?php echo $image['url']; ?>" alt="Am I a Carer?" width="466" height="352" />
        </figure>
      <?php } ?>
    </div>
  </div>
</section>