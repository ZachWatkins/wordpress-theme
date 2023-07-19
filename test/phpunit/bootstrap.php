<?php
/**
 * PHPUnit bootstrap file.
 *
 * @package WordPress Theme
 */

// Require composer dependencies.
require_once dirname( __DIR__, 2 ) . '/vendor/autoload.php';

// Give access to tests_add_filter() function.
require_once getenv( 'WP_PHPUNIT__DIR' ) . '/includes/functions.php';

/**
 * Registers theme.
 */
function wordpress_theme_register_theme() {
	$theme_dir     = dirname( __DIR__, 2 );
	$current_theme = basename( $theme_dir );
	$theme_root    = dirname( $theme_dir );

	tests_add_filter( 'theme_root', fn() => $theme_root );
	register_theme_directory( $theme_root );
	tests_add_filter( 'pre_option_template', fn() => $current_theme );
	tests_add_filter( 'pre_option_stylesheet', fn() => $current_theme );
}

tests_add_filter( 'muplugins_loaded', 'wordpress_theme_register_theme' );

// Start up the WP testing environment.
require getenv( 'WP_PHPUNIT__DIR' ) . '/includes/bootstrap.php';
