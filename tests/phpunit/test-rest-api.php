<?php
class Test_Candidates_REST_Endpoint extends WP_Test_REST_TestCase {
	protected static $json_fixtures;

	public static function wpSetUpBeforeClass() {
		self::$json_fixtures = array(); // TODO: Inefficient. Perhaps create a custom factory?
	}

	public function test_route_is_registered() {
		$routes = rest_get_server()->get_routes();
		$this->assertArrayHasKey( '/wp/v2/posts', $routes );
	}

	public function test_editor_can_get_a_list_of_posts() {
		$user_id = $this->factory->user->create(
			array(
				'role' => 'editor',
			)
		);
		$post_id = $this->factory->post->create(
			array(
				'post_title' => 'Hello World!',
				'post_type'  => 'post',
			)
		);

		$request  = new WP_REST_Request( 'GET', '/wp/v2/posts' );
		$response = rest_get_server()->dispatch( $request );
		$data     = $response->get_data();

		$this->assertEquals( 1, count( $data ), 'Post not found.' );
	}
}
