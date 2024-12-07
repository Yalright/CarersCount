<?php

/***
 * Block - WYSIWYG
 *
 ***/ ?>
<?php
$code = get_field('code');


// Spacing options
$padding_top = 'pt-' . get_field('padding_top');
$padding_bottom = 'pb-' . get_field('padding_bottom');
$margin_top = 'mt-' . get_field('margin_top');
$margin_bottom = 'mb-' . get_field('margin_bottom');
$spacing_options = $padding_top . " " . $padding_bottom . " " . $margin_top . " " . $margin_bottom;

?>

<section class="guten-block block-code <?php echo $spacing_options; ?>">
  <div class="container">
    <?php if (!empty($code)) {
      echo $code;
    } ?>
  </div>
</section>