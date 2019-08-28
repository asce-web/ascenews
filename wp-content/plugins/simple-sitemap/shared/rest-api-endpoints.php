<?php
/*
 * Register custom REST API endpoints
*/

class WPGO_Custom_Sitemap_Endpoints {

	protected $module_roots;

	/* Main class constructor. */
	public function __construct($module_roots) {

		$this->module_roots = $module_roots;

		add_action( 'rest_api_init', array( &$this, 'register_endpoints' ) );
	}

	/**
	 * Register REST API
	 */
	public function register_endpoints() {

		// get public CPT
		register_rest_route(
			'simple-sitemap/v1',
			'/post-types',
			array(
				'methods'             => 'GET',
				'callback'            => array( &$this, 'get_post_types' ),
				'permission_callback' => function () {
					return ''; //current_user_can( 'edit_posts' );
				},
			)
		);

		// get registered taxonomies for specified post type
		register_rest_route(
			'simple-sitemap/v1',
			'/post-type-taxonomies/(?P<type>[a-zA-Z0-9-_]+)', // allowed chars [a-z] [A-Z] [0-9] [-_]
			array(
				'methods'             => 'GET',
				'callback'            => array( &$this, 'get_post_type_taxonomies' ),
				'permission_callback' => function () {
					return ''; //current_user_can( 'edit_posts' );
				},
			)
		);
	}

	/**
	 * Get public post types
	 *
	 */
	public function get_post_types() {
	
		$post_type_args = array(
			'public'   => true
		);
		$registered_post_types = get_post_types($post_type_args);

		// remove 'attachment' (media) from list of post types
		if( in_array('attachment', $registered_post_types) ) {
			unset($registered_post_types['attachment']);
		}

		$sitemap_post_types = array();
		foreach( $registered_post_types as $key => $value ) {
			$sitemap_post_types[$key] = get_post_type_object( $key )->label;
		}

		return $sitemap_post_types;
	}

	/**
	 * Get taxonomies for specific post type
	 *
	 */
	public function get_post_type_taxonomies(WP_REST_Request $request) {
	
		$post_type = $request->get_param( 'type' );
		$post_type_taxonomies = get_object_taxonomies( $post_type );

		// if empty array no taxonomies return empty
		if( empty($post_type_taxonomies) ) {
			return array();
		}
		
		// remove 'post_format' from list of taxonomies
		if (($key = array_search('post_format', $post_type_taxonomies)) !== false) {
			unset($post_type_taxonomies[$key]);
		}

		// format into array
		$taxonomies = array();
		foreach($post_type_taxonomies as $post_type_taxonomy) {
			$tax = get_taxonomy($post_type_taxonomy);
				$taxonomies[$tax->name] = $tax->label;
		}

		return $taxonomies;
	}
	
} /* End class definition */
