<?php

class TestExample extends WP_UnitTestCase {

	public function test_it_works() {
		$this->assertTrue( function_exists( 'do_action' ) );
	}

	public function test_wp_phpunit_is_loaded_via_composer() {
		$this->assertStringStartsWith(
			dirname( __DIR__, 2 ) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR,
			getenv( 'WP_PHPUNIT__DIR' )
		);

		$this->assertStringStartsWith(
			dirname( __DIR__, 2 ) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR,
			( new ReflectionClass( 'WP_UnitTestCase' ) )->getFileName()
		);
	}
}
