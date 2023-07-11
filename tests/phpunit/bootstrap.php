<?php
/**
 * PHPUnit bootstrap file
 *
 * @package WordPress Theme
 */

// Require composer dependencies.
require_once dirname( __DIR__ ) . '/vendor/autoload.php';

$_tests_dir = getenv( 'WP_TESTS_DIR' );

// Try the `wp-phpunit` composer package.
if ( ! $_tests_dir ) {
	$_tests_dir = getenv( 'WP_PHPUNIT__DIR' );
}

if ( ! $_tests_dir ) {
	$_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}

if ( ! file_exists( $_tests_dir . '/includes/functions.php' ) ) {
	echo "Could not find $_tests_dir/includes/functions.php" . PHP_EOL; // WPCS: XSS ok.
	exit( 1 );
}

// Give access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';

// Load the PHPUnit Polyfills library.
$_phpunit_polyfills_lib = dirname( __DIR__ ) . '/vendor/yoast/phpunit-polyfills/phpunitpolyfills-autoload.php';
if ( ! file_exists( $_phpunit_polyfills_lib ) ) {
	echo "Could not find $_phpunit_polyfills_lib, have you run `docker-compose up` in order to install Composer packages?" . PHP_EOL; // WPCS: XSS ok.
	exit( 1 );
}
require_once $_phpunit_polyfills_lib;

/**
 * Registers theme.
 */
function _register_theme() {
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
tests_add_filter( 'muplugins_loaded', '_register_theme' );

// Start up the WP testing environment.
require $_tests_dir . '/includes/bootstrap.php';
