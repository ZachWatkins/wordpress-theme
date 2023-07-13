<?php
/**
 * PHPUnit bootstrap file.
 *
 * @package Wordpress_Theme
 */

// Composer autoloader must be loaded before WP_PHPUNIT__DIR will be available.
require_once dirname( __DIR__, 2 ) . '/vendor/autoload.php';

// Give access to tests_add_filter() function.
require_once getenv( 'WP_PHPUNIT__DIR' ) . '/includes/functions.php';

/**
 * Registers theme.
 */
function wordpress_theme_register_theme() {
	$theme_dir     = dirname( __DIR__ );
	$current_theme = basename( $theme_dir );
	$theme_root    = dirname( $theme_dir );

	add_filter(
		'theme_root',
		function () use ( $theme_root ) {
			return $theme_root;
		}
	);

	register_theme_directory( $theme_root );

	add_filter(
		'pre_option_template',
		function () use ( $current_theme ) {
			return $current_theme;
		}
	);

	add_filter(
		'pre_option_stylesheet',
		function () use ( $current_theme ) {
			return $current_theme;
		}
	);
}

tests_add_filter( 'muplugins_loaded', 'wordpress_theme_register_theme' );

/**
 * Adds a wp_die handler for use during tests.
 *
 * If bootstrap.php triggers wp_die, it will not cause the script to fail. This
 * means that tests will look like they passed even though they should have
 * failed. So we throw an exception if WordPress dies during test setup. This
 * way the failure is observable.
 *
 * @param string|WP_Error $message The error message.
 *
 * @throws Exception When a `wp_die()` occurs.
 */
function wordpress_theme_fail_if_died( $message ) {
	if ( is_wp_error( $message ) ) {
		$message = $message->get_error_message();
	}

	throw new Exception( 'WordPress died: ' . $message );
}
tests_add_filter( 'wp_die_handler', 'wordpress_theme_fail_if_died' );

// Start up the WP testing environment.
require getenv( 'WP_PHPUNIT__DIR' ) . '/includes/bootstrap.php';

// Use existing behavior for wp_die during actual test execution.
remove_filter( 'wp_die_handler', 'fail_if_died' );
