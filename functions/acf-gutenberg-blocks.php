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

  // check function exists
  if (function_exists('acf_register_block_type')) {


    // Hero Title
    acf_register_block_type(array(
      'name'        => 'hero-banner',
      'title'        => __('Hero Banner'),
      'description'    => __('Displays hero banner'),
      'render_callback'  => 'my_acf_block_render_callback',
      'category'      => 'custom-blocks',
      'icon'        => 'cover-image',
      'keywords'      => array('header', 'image'),
      'api_version'  => 3,
      'mode'         => 'preview',
      'supports'     => array(
        'align' => false,
        'mode'  => true,
      ),
    ));

    // Hero Title
    acf_register_block_type(array(
      'name'        => 'link-columns',
      'title'        => __('Link Columns'),
      'description'    => __('Displays Link Columns'),
      'render_callback'  => 'my_acf_block_render_callback',
      'category'      => 'custom-blocks',
      'icon'        => 'cover-image',
      'keywords'      => array('links', 'columns'),
      'api_version'  => 3,
      'mode'         => 'preview',
      'supports'     => array(
        'align' => false,
        'mode'  => true,
      ),
    ));

    // Hero Title
    acf_register_block_type(array(
      'name'        => 'testimonial-carousel',
      'title'        => __('Testimonial Carousel'),
      'description'    => __('Displays Testimonials'),
      'render_callback'  => 'my_acf_block_render_callback',
      'category'      => 'custom-blocks',
      'icon'        => 'cover-image',
      'keywords'      => array('testimonial', 'carousel'),
      'api_version'  => 3,
      'mode'         => 'preview',
      'supports'     => array(
        'align' => false,
        'mode'  => true,
      ),
    ));

    // Hero Title
    acf_register_block_type(array(
      'name'        => 'newsletter',
      'title'        => __('Newsletter'),
      'description'    => __('Newsletter'),
      'render_callback'  => 'my_acf_block_render_callback',
      'category'      => 'custom-blocks',
      'icon'        => 'cover-image',
      'keywords'      => array('newsletter'),
      'api_version'  => 3,
      'mode'         => 'preview',
      'supports'     => array(
        'align' => false,
        'mode'  => true,
      ),
    ));

    // Hero Title
    acf_register_block_type(array(
      'name'        => 'info-contact',
      'title'        => __('Info & Contact'),
      'description'    => __('Information block with contact form'),
      'render_callback'  => 'my_acf_block_render_callback',
      'category'      => 'custom-blocks',
      'icon'        => 'cover-image',
      'keywords'      => array('information', 'contact', 'form'),
      'api_version'  => 3,
      'mode'         => 'preview',
      'supports'     => array(
        'align' => false,
        'mode'  => true,
      ),
    ));


    acf_register_block_type(array(
      'name'        => 'downloads',
      'title'        => __('Downloads'),
      'description'    => __(''),
      'render_callback'  => 'my_acf_block_render_callback',
      'category'      => 'custom-blocks',
      'icon'        => 'cover-image',
      'keywords'      => array('downloads'),
      'api_version'  => 3,
      'mode'         => 'preview',
      'supports'     => array(
        'align' => false,
        'mode'  => true,
      ),
    ));

    acf_register_block_type(array(
      'name'        => 'content-media',
      'title'        => __('Content + Media'),
      'description'    => __(''),
      'render_callback'  => 'my_acf_block_render_callback',
      'category'      => 'custom-blocks',
      'icon'        => 'cover-image',
      'keywords'      => array('content', 'media'),
      'api_version'  => 3,
      'mode'         => 'preview',
      'supports'     => array(
        'align' => false,
        'mode'  => true,
      ),
    ));

    acf_register_block_type(array(
      'name'        => 'contact-block',
      'title'        => __('Contact Block'),
      'description'    => __(''),
      'render_callback'  => 'my_acf_block_render_callback',
      'category'      => 'custom-blocks',
      'icon'        => 'cover-image',
      'keywords'      => array('contact', 'form'),
      'api_version'  => 3,
      'mode'         => 'preview',
      'supports'     => array(
        'align' => false,
        'mode'  => true,
      ),
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
