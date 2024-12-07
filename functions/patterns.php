<?php

add_action('init', function () {
  remove_theme_support('core-block-patterns');
});


register_block_pattern_category(
  'custom-patterns',
  array('label' => __('Cloverleaf Advocacy', 'cloverleaf-advocacy-theme'))
);
