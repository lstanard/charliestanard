<?php

/*------------------------------------*\
	Theme Settings
\*------------------------------------*/

if (function_exists('add_theme_support')) {

	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	));
	add_editor_style(get_template_directory_uri() . '/css/editor-style.css');
	add_theme_support('title-tag');
	add_image_size('project-thumb', 800, 571, false);

}

/*------------------------------------*\
	Enqueue Scripts & Styles
\*------------------------------------*/

function include_theme_scripts_styles() {

	wp_enqueue_style(
		'site',
		get_template_directory_uri() . '/css/main.css'
	);

	wp_enqueue_script(
		'custom-site-scripts',
		get_template_directory_uri() . '/js/site.js',
		array( 'jquery' ),
		false,
		true
	);

	if( preg_match('/(?i)msie [1-8]/', $_SERVER['HTTP_USER_AGENT']) ) {
		wp_enqueue_script(
			'respond-js',
			get_template_directory_uri() . '/js/lib/respond.min.js'
		);
	}

}

add_action( 'wp_enqueue_scripts', 'include_theme_scripts_styles', 5 );

/*------------------------------------*\
	Register Menus
\*------------------------------------*/

function custom_navigation_menus() {

	$locations = array(
		'Primary Navigation' => __( 'Primary site navigation' ),
	);

	register_nav_menus($locations);
}

add_action('init', 'custom_navigation_menus');

/*------------------------------------*\
	Debug
	Codex: https://codex.wordpress.org/Debugging_in_WordPress

	Useful debugging trace function, requires the following in wp-config.php:
	define('WP_DEBUG', true);
	define('WP_DEBUG_DISPLAY', false);
	define('WP_DEBUG_LOG', true);
\*------------------------------------*/

if (!function_exists('debug_log')) {
	function debug_log ( $log ) {
		if ( true === WP_DEBUG ) {
			if ( is_array( $log ) || is_object( $log ) ) {
				error_log( print_r( $log, true ) );
			} else {
				error_log( $log . PHP_EOL);
			}
		}
	}
}

/*------------------------------------*\
	Includes
\*------------------------------------*/

require_once('inc/utility.php');
require_once('inc/mce.php');
require_once('inc/post-types.php');
require_once('inc/admin/theme-settings.php');
require_once('inc/shortcodes.php');

?>