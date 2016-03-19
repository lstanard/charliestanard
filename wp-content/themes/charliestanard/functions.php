<?php

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
require_once('inc/setup.php');

?>