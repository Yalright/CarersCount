<?php
add_filter('allowed_block_types_all', 'rt_allowed_block_types', 25, 2);

function rt_allowed_block_types($allowed_blocks, $editor_context)
{
  if ('page' === $editor_context->post->post_type) {
    $allowed_blocks = array(
      'acf/hero-banner',
      'acf/link-columns',
      'acf/testimonial-carousel',
      'acf/newsletter',
      'acf/info-contact',
      'acf/downloads',
      'acf/content-media',
      'acf/contact-block'
    );
    return $allowed_blocks;
  } else {
    return;
  }
}
