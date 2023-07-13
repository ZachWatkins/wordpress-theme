<?php
/**
 * Class SampleTest
 *
 * @package Wordpress_Theme
 */

/**
 * Sample test case.
 */
class SampleTest extends WP_UnitTestCase {

	/**
	 * A single example test.
	 */
	public function test_sample() {
		// Replace this with some actual testing code.
		$this->assertTrue( true );
		// Test if the theme is active.
		$this->assertTrue( 'Wordpress_Theme' === wp_get_theme()->get( 'Name' ) );
	}
}
