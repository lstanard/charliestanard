<?php

/*------------------------------------*\
	MCE
\*------------------------------------*/

// Turn on "formats" button in MCE
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

// Add custom style options to TinyMCE
function my_mce_before_init( $settings ) {

	// Example:
	$style_formats = array(
		array(
			'title' => 'Button: Custom Outline Button',
			'selector' => 'a',
			'classes' => 'btn-custom-outline'
		),
		array(
			'title' => 'Text: Intro copy',
			'selector' => 'p',
			'classes' => 'intro'
		)
	);

	$settings['style_formats'] = json_encode( $style_formats );

	return $settings;
}
add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );

?>