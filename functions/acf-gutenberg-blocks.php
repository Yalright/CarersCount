<?php
// Add ACF options page
if (function_exists('acf_add_options_page')) {

  acf_add_options_page(array(
    'page_title'   => 'Theme Settings',
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));
}

add_action('acf/init', 'my_acf_init');
function my_acf_init()
{

  // // check function exists
  if (function_exists('acf_register_block')) {


    // Hero Title
    acf_register_block(array(
      'name'        => 'hero-banner',
      'title'        => __('Hero Banner'),
      'description'    => __('Displays hero banner'),
      'render_callback'  => 'my_acf_block_render_callback',
      'category'      => 'custom-blocks',
      'icon'        => 'cover-image',
      'keywords'      => array('header', 'image'),
    ));

    // Hero Title
    acf_register_block(array(
      'name'        => 'link-columns',
      'title'        => __('Link Columns'),
      'description'    => __('Displays Link Columns'),
      'render_callback'  => 'my_acf_block_render_callback',
      'category'      => 'custom-blocks',
      'icon'        => 'cover-image',
      'keywords'      => array('links', 'columns'),
    ));

    // Hero Title
    acf_register_block(array(
      'name'        => 'testimonial-carousel',
      'title'        => __('Testimonial Carousel'),
      'description'    => __('Displays Testimonials'),
      'render_callback'  => 'my_acf_block_render_callback',
      'category'      => 'custom-blocks',
      'icon'        => 'cover-image',
      'keywords'      => array('testimonial', 'carousel'),
    ));

    // Hero Title
    acf_register_block(array(
      'name'        => 'newsletter',
      'title'        => __('Newsletter'),
      'description'    => __('Newsletter'),
      'render_callback'  => 'my_acf_block_render_callback',
      'category'      => 'custom-blocks',
      'icon'        => 'cover-image',
      'keywords'      => array('newsletter'),
    ));

    // Hero Title
    acf_register_block(array(
      'name'        => 'info-contact',
      'title'        => __('Info & Contact'),
      'description'    => __('Information block with contact form'),
      'render_callback'  => 'my_acf_block_render_callback',
      'category'      => 'custom-blocks',
      'icon'        => 'cover-image',
      'keywords'      => array('information', 'contact', 'form'),
    ));


    acf_register_block(array(
      'name'        => 'downloads',
      'title'        => __('Downloads'),
      'description'    => __(''),
      'render_callback'  => 'my_acf_block_render_callback',
      'category'      => 'custom-blocks',
      'icon'        => 'cover-image',
      'keywords'      => array('downloads'),
    ));

    acf_register_block(array(
      'name'        => 'content-media',
      'title'        => __('Content + Media'),
      'description'    => __(''),
      'render_callback'  => 'my_acf_block_render_callback',
      'category'      => 'custom-blocks',
      'icon'        => 'cover-image',
      'keywords'      => array('content', 'media'),
    ));

    acf_register_block(array(
      'name'        => 'contact-block',
      'title'        => __('Contact Block'),
      'description'    => __(''),
      'render_callback'  => 'my_acf_block_render_callback',
      'category'      => 'custom-blocks',
      'icon'        => 'cover-image',
      'keywords'      => array('contact', 'form'),
    ));
  }
}

function custom_gutenberg_category($categories, $post)
{
  return array_merge(
    $categories,
    array(
      array(
        'slug' => 'custom-blocks',
        'title' => __('Cloverleaf Advocacy Blocks', 'custom-blocks'),
      ),
    )
  );
}
add_filter('block_categories', 'custom_gutenberg_category', 10, 2);


function my_acf_block_render_callback($block)
{

  // convert name ("acf/testimonial") into path friendly slug ("testimonial")
  $slug = str_replace('acf/', '', $block['name']);

  // include a template part from within the "template-parts/block" folder
  if (file_exists(get_theme_file_path("/acf-blocks/content-{$slug}.php"))) {
    include(get_theme_file_path("/acf-blocks/content-{$slug}.php"));
  }
}
