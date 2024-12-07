<?php
if (!defined('ABSPATH')) {
    exit;
}

require get_template_directory() . '/functions/PUC.php';
require get_template_directory() . '/functions/enqueues.php';
require get_template_directory() . '/functions/menus.php';
require get_template_directory() . '/functions/custom-post-types.php';
require get_template_directory() . '/functions/acf-gutenberg-blocks.php';
require get_template_directory() . '/functions/media.php';
require get_template_directory() . '/functions/user-roles.php';
require get_template_directory() . '/functions/theme-support.php';
require get_template_directory() . '/functions/allowed-blocks.php';
// require get_template_directory() . '/functions/patterns.php';

//Page Slug Body Class
function add_slug_body_class($classes)
{
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter('body_class', 'add_slug_body_class');

// Generalise WP Login errors on WordPress
function no_wordpress_errors()
{
    return 'Something is wrong!';
}
add_filter('login_errors', 'no_wordpress_errors');

// Rest Authentication Errors
// add_filter('rest_authentication_errors', function ($result) {
//     if (!empty($result)) {
//         return $result;
//     }
//     if (!is_user_logged_in()) {
//         return new WP_Error('rest_not_logged_in', 'You are not currently logged in.', array('status' => 401));
//     }
//     return $result;
// });

add_filter('wp_title', 'wpdocs_hack_wp_title_for_home');
function wpdocs_hack_wp_title_for_home($title)
{
    if (empty($title) && (is_home() || is_front_page())) {
        $title = __('Home', 'textdomain') . ' | ' . get_bloginfo('description');
    }
    return $title;
}
