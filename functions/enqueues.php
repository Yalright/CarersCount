<?php
function site_scripts()
{
	global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

	// Adding scripts file in the footer
	// wp_enqueue_script('matchheight-js', '//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js', array('jquery'), true);
	// wp_enqueue_script('init-js', get_template_directory_uri() . '/assets/js/init.js', array('jquery'), '1.0', false);
	
	// Enqueue slick slider with consistent HTTPS URLs
	wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '1.8.1', true);
	wp_enqueue_script('site-js', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery', 'slick-js'), '2.0', true);
	// wp_enqueue_script('jqueryui-js', 'https://code.jquery.com/ui/1.13.0/jquery-ui.min.js', array('jquery'), true);

	// Register main stylesheet
	wp_enqueue_style('site-css', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0');
	// wp_enqueue_style('fontawesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), 'all');
	wp_enqueue_style('fontawesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', array(), 'all');
	wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), '1.8.1');

	// Comment reply script for threaded comments
	// if (is_singular() and comments_open() and (get_option('thread_comments') == 1)) {
	// 	wp_enqueue_script('comment-reply');
	// }

	// if (has_block('acf/hero-banner')) {
	// 	wp_enqueue_script('inline-svg-js', 'https://cdn.jsdelivr.net/gh/jonnyhaynes/inline-svg/dist/inlineSVG.min.js',  true, '1.0');
	// }
	// if (has_block('acf/text-media')) {
	// 	wp_enqueue_script('lottie-js', 'https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js',  true, '1.0');
	// }
}

// Reverted priority back to 999 as it was originally
add_action('wp_enqueue_scripts', 'site_scripts', 999);

// Completely disable wp-i18n to prevent "wp is not defined" errors
function disable_wp_i18n() {
	// Deregister wp-i18n script
	wp_deregister_script('wp-i18n');
	
	// Remove wp-i18n from any script dependencies
	global $wp_scripts;
	if (isset($wp_scripts->registered)) {
		foreach ($wp_scripts->registered as $handle => $script) {
			if (isset($script->deps) && is_array($script->deps)) {
				$script->deps = array_diff($script->deps, array('wp-i18n'));
			}
		}
	}
}
add_action('wp_enqueue_scripts', 'disable_wp_i18n', 1);

// Remove wp-i18n inline scripts by filtering the output
function remove_wp_i18n_inline_scripts($data) {
	// Remove wp.i18n.setLocaleData calls from inline scripts
	$data = preg_replace('/wp\.i18n\.setLocaleData\([^)]+\);/', '', $data);
	return $data;
}
add_filter('wp_print_scripts', 'remove_wp_i18n_inline_scripts');
add_filter('wp_print_footer_scripts', 'remove_wp_i18n_inline_scripts');

/**
 * Enqueue CSS for block previews inside the iframe editor.
 */
function my_block_plugin_editor_scripts()
{
	if (is_admin()) {
		wp_enqueue_style('site-css-admin', get_template_directory_uri() . '/assets/css/main-admin.css', array(), '1');
	}
}

// enqueue_block_assets loads styles into the iframe editor correctly.
add_action('enqueue_block_assets', 'my_block_plugin_editor_scripts');

/**
 * Ensure the classic editor dependencies ACF WYSIWYG fields need are available
 * before ACF initializes block fields in the block editor.
 */
function carerscount_enqueue_block_editor_dependencies()
{
	if (function_exists('wp_enqueue_editor')) {
		wp_enqueue_editor();
	}
}
add_action('enqueue_block_editor_assets', 'carerscount_enqueue_block_editor_dependencies');
