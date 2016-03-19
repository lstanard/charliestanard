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
	add_editor_style(get_template_directory_uri() . '/css/editor-style.min.css');
	add_theme_support('title-tag');
	add_image_size('project-thumb', 800, 571, false);

}

/*------------------------------------*\
	Enqueue Scripts & Styles
\*------------------------------------*/

function include_theme_scripts_styles() {

	wp_enqueue_style(
		'site',
		get_template_directory_uri() . '/css/main.min.css'
	);

	wp_enqueue_script(
		'custom-site-scripts',
		get_template_directory_uri() . '/js/site.min.js',
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

?>