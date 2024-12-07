<?php

// Theme Colours
function theme_colour_setup()
{
    // Disable Custom Colors
    add_theme_support('disable-custom-colors');

    // Editor Color Palette
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => __('White', 'cloveleafadvocacy'),
            'slug'  => 'white',
            'color'  => '#ffffff',
        ),
        array(
            'name'  => __('Black', 'cloveleafadvocacy'),
            'slug'  => 'black',
            'color'  => '#000000',
        ),
        array(
            'name'  => __('Laser Green', 'cloveleafadvocacy'),
            'slug'  => 'lasergreen',
            'color'  => '#B9EE00',
        ),
        array(
            'name'  => __('Data Blue', 'cloveleafadvocacy'),
            'slug'  => 'datablue',
            'color'  => '#0000FF',
        ),
        array(
            'name'  => __('Stone', 'cloveleafadvocacy'),
            'slug'  => 'stone',
            'color'  => '#A7C0C4',
        ),
        array(
            'name'  => __('Sand', 'cloveleafadvocacy'),
            'slug'  => 'sand',
            'color'  => '#DFDBC7',
        ),
        array(
            'name'  => __('Off White', 'cloveleafadvocacy'),
            'slug'  => 'offwhite',
            'color'  => '#F7F7F7',
        ),
        array(
            'name'  => __('UI Text', 'cloveleafadvocacy'),
            'slug'  => 'uitext',
            'color'  => '#1D1D1B',
        ),
    ));
}
add_action('after_setup_theme', 'theme_colour_setup');



function my_mce_buttons_2($buttons)
{
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'my_mce_buttons_2');



function my_tiny_mce_before_init($mceInit)
{
    $style_formats = array(
        array(
            'title' => 'Paragraph styles',
            'items' => array(
                array(
                    'title' => 'Bold Header',
                    'block' => 'p',
                    'classes' => 'useful-links-title',
                    'wrapper' => false,
                )
            )
        )
    );

    $mceInit['style_formats'] = json_encode($style_formats);

    return $mceInit;
}
add_filter('tiny_mce_before_init', 'my_tiny_mce_before_init');



function gb_gutenberg_admin_styles()
{
    echo '
        <style>
            /* Main column width */
            .wp-block {
                max-width: 100%;
            }
        </style>
    ';
}
add_action('admin_head', 'gb_gutenberg_admin_styles');




// function disable_block_editor_for_page_ids($use_block_editor, $post)
// {

//     $page_for_posts = get_option('page_for_posts');
//     $excluded_ids = array($page_for_posts);
//     if (in_array($post->ID, $excluded_ids)) {
//         return false;
//     }
//     return $use_block_editor;
// }
// add_filter('use_block_editor_for_post', 'disable_block_editor_for_page_ids', 10, 2);
