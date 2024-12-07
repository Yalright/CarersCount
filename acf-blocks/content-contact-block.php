<?php

/***
 * Block - Content Media Block
 *
 ***/ ?>
<?php
$content_size = 'half';
$form_id = get_field('form_id');
$code = get_field('code');

$block_id = get_field('block_id');


?>

<section class="guten-block block-contact-block" id="<?php echo $block_id; ?>">
  <div class="container <?php echo $content_size; ?>">
    <div class="content">

      <div class="contact-details">
        <span class="title">Phone:</span><span class="content"><?php echo get_field('phone', 'option'); ?></span>
        <span class="title">Email:</span><span class="content"><a href="mailto:<?php echo get_field('email', 'option'); ?>"><?php echo get_field('email', 'option'); ?></a></span>
        <span class="title">Address:</span><span class="content"><?php echo get_field('address', 'option'); ?></span>
      </div>

      <div class="form-wrapper">
        <?php echo do_shortcode('[contact-form-7 id="' . $block_id . '" title="Contact Form Main"]'); ?>
      </div>


    </div>
    <div class="media">
      <?php echo $code; ?>
    </div>
  </div>
</section>