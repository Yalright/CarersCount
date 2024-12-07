<?php
// Register menus
function custom_menus()
{
  register_nav_menus(
    array(
      'header-nav' => __('Header Navigation'),
      'mobile-nav' => __('Mobile Navigation'),
      'footer-nav-1' => __('Footer Side Navigation 1'),
      'footer-nav-2' => __('Footer Side Navigation 2'),
      'footer-nav-3' => __('Footer Bottom Navigation'),
      'footer-nav-4' => __('Social Navigation'),
    )
  );
}
add_action('init', 'custom_menus');

// Add active class to menu
// add_filter('nav_menu_css_class', 'active_nav_class', 10, 2);
// function active_nav_class($classes, $item)
// {
//   $first_uri_part = explode("/", $_SERVER["REQUEST_URI"])[1];
//   if (!empty($first_uri_part) && strstr($item->url, $first_uri_part) > -1) {
//     $classes[] = 'active';
//   }
//   return $classes;
// }

// // Allow editors to see access the Menus page under Appearance but hide other options
// // Note that users who know the correct path to the hidden options can still access them
// function hide_menu() {
//   $user = wp_get_current_user();

//  // Check if the current user is an Editor
//  if ( in_array( 'editor', (array) $user->roles ) ) {

//    // They're an editor, so grant the edit_theme_options capability if they don't have it
//    if ( ! current_user_can( 'edit_theme_options' ) ) {
//      $role_object = get_role( 'editor' );
//      $role_object->add_cap( 'edit_theme_options' );
//    }

//    // Hide the Themes page
//      remove_submenu_page( 'themes.php', 'themes.php' );

//      // Hide the Widgets page
//      remove_submenu_page( 'themes.php', 'widgets.php' );

//      // Hide the Customize page
//      remove_submenu_page( 'themes.php', 'customize.php' );

//      // Remove Customize from the Appearance submenu
//      global $submenu;
//      unset($submenu['themes.php'][6]);
//  }
// }
// add_action('admin_menu', 'hide_menu', 10);





// ACF Custom menu
// add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

// function my_wp_nav_menu_objects($items, $args)
// {

//   // loop
//   foreach ($items as $item) {

//     // vars
//     $image = get_field('icon', $item);
//     // print_r($item);
//     // append icon
//     if ($image) {
//       $item->title .= ' <img width="24" height="25" alt="" src="' . $image['url'] . '" />';
//     }
//   }

//   // return
//   return $items;
// }
