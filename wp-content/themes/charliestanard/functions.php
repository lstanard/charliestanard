<?php

/*------------------------------------*\
	Theme Settings
\*------------------------------------*/

if (function_exists('add_theme_support')) {

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	// Enable support for post thumbnail (featured images) on posts and pages
	add_theme_support('post-thumbnails');

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support('html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	));

	// Add custom styles to MCE on post/page editor
	add_editor_style(get_template_directory_uri() . '/css/editor-style.css');

	// Allow WordPress to handle generating the <title> tag
	add_theme_support('title-tag');

	// Codex: http://codex.wordpress.org/Post_Thumbnails
	add_image_size('project-thumb', 800, 571, false);
}

/*------------------------------------*\
	Enqueue Scripts & Styles
\*------------------------------------*/

function include_theme_scripts_styles() {

	// Load primary theme stylesheet
	wp_enqueue_style(
		'site',
		get_template_directory_uri() . '/css/site.css'
	);

	// Load jQuery dependent vendor scripts
	wp_enqueue_script(
		'custom-vendor-scripts',
		get_template_directory_uri() . '/js/vendor-build.min.js',
		array( 'jquery' ),
		false,
		true
	);

	// Load jQuery dependent custom site scripts
	wp_enqueue_script(
		'custom-site-scripts',
		get_template_directory_uri() . '/js/site.js',
		array( 'jquery' ),
		false,
		true
	);

	// Load respond.js only in Internet Explorer 8 and below
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
	Register Sidebars
\*------------------------------------*/

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Widget Area 1',
		'description' => 'Description for this widget-area...',
		'id' => 'widget-area-1',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => 'Widget Area 2',
		'description' => 'Description for this widget-area...',
		'id' => 'widget-area-2',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

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

// Plugins

// The following file provides advanced support for managing the admin menu items. For reference see http://wordpress.stackexchange.com/questions/1216/changing-the-order-of-admin-menu-sections and https://gist.github.com/mikeschinkel/792b7aa5b695d1092520
require_once('inc/wp-admin-menu-classes.php');

// Misc. utility functions, actions and filters
require_once('inc/utility.php');

// Custom MCE buttons
require_once('inc/mce.php');

// Custom widgets
require_once('inc/widgets.php');

// Custom shortcodes
require_once('inc/shortcodes.php');

// Custom post type and taxonomies
require_once('inc/post-types.php');

// Custom fields
require_once('inc/custom-fields.php');

// Theme customizer options
require_once('inc/customizer.php');

require_once('inc/admin/theme-settings.php');

require_once('inc/work.php');

?>