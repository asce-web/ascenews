<?php
/*
 *	Enqueue plugin scripts
*/

class WPGO_Simple_Sitemap_Enqueue_Scripts {

	protected $module_roots;

	/* Main class constructor. */
	public function __construct($module_roots) {

		$this->module_roots = $module_roots;

		// scripts for plugin settings page
		add_action( 'admin_enqueue_scripts', array( &$this, 'enqueue_admin_scripts' ) );

		// register blocks via PHP
		add_action( 'init', array( &$this, 'block_init' ) );

		// enqueue frontend/editor scripts
		add_action( 'enqueue_block_assets', array( &$this, 'enqueue_assets' ) );
	}

	/**
	 * Enqueue front end and editor JavaScript and CSS assets.
	 */
	public function enqueue_assets() {
		
/*		if (
			has_block( 'wpgoplugins/simple-sitemap-block' ) ||
			has_block( 'wpgoplugins/simple-sitemap-group-block' )
			) {
				wp_enqueue_style( 'simple-sitemap-css', plugins_url( 'lib/assets/css/simple-sitemap.css', $this->module_roots['file'] ) );
				//wp_enqueue_script( 'simple-sitemap-js', plugins_url( 'lib/assets/js/simple-sitemap.js', $this->module_roots['file'] ), array('jquery') );
		} */

		// only enqueue scripts on pages containing sitemap blocks
		if (
			has_blocks() && (
			has_block( 'wpgoplugins/simple-sitemap-block' ) ||
			has_block( 'wpgoplugins/simple-sitemap-group-block' )
			) ) {
			wp_enqueue_style( 'simple-sitemap-css', plugins_url( 'lib/assets/css/simple-sitemap.css', $this->module_roots['file'] ) );
			//wp_enqueue_script( 'simple-sitemap-js', plugins_url( 'assets/js/simple-sitemap.js', $this->module_roots['file'] ), array('jquery') );
		} elseif (
			!has_blocks() ||
			!(
			has_block( 'wpgoplugins/simple-sitemap-block' ) ||
			has_block( 'wpgoplugins/simple-sitemap-group-block' )
			)	) {
			// Add scripts to the editor if no blocks, or no sitemap blocks, have been added. Otherwise when a sitemap block is added the sitemap scripts won't have been enqueued yet.
			wp_enqueue_style( 'simple-sitemap-css', plugins_url( 'lib/assets/css/simple-sitemap.css', $this->module_roots['file'] ) );
			//wp_enqueue_script( 'simple-sitemap-js', plugins_url( 'assets/js/simple-sitemap.js', $this->module_roots['file'] ), array('jquery') );
		}
	}

	/* Scripts for plugin settings page only. */
	public function enqueue_admin_scripts($hook) {

		if($hook != 'toplevel_page_simple-sitemap-menu') {
			return;
		}

		wp_enqueue_style( 'simple-sitemap-settings-css', plugins_url('lib/assets/css/simple-sitemap-admin.css', $this->module_roots['file']) );
		wp_enqueue_script( 'simple-sitemap-settings-js', plugins_url('lib/assets/js/simple-sitemap-admin.js', $this->module_roots['file']) );
	}
	
	/**
	 * Register our blocks.
	 */
	public function block_init() {

		// only register block if gutenberg enabled
		if( function_exists( 'register_block_type' ) ) {

			// Register our block editor script.
			// @todo if not used then this and all refs. can be removed
			wp_register_script(
				'simple-sitemap-block',
				plugins_url( 'lib/block_assets/js/blocks.editor.js', $this->module_roots['file'] ),
				array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor' )
			);

			// Register our block, and explicitly define the attributes we accept.
			register_block_type( 'wpgoplugins/simple-sitemap-block', array(
				'attributes' => array(
					'render_tab' => [
						'type' => 'boolean',
						'default' => 'false'
					],
					'gutenberg_block' => array(
						'type'  => 'boolean',
						'default' => true,
					),
					'orderby' => array(
						'type' => 'string',
						'default' => 'title'
					),
					'order' => array(
						'type' => 'string',
						'default' => 'asc'
					),
					'block_post_types'  => [
						'type'  => 'string',
						'default' => '[{ "value": "page", "label": "Pages" }]'
					],
					'page_depth' => [
						'type' => 'number',
						'default' => 0
					],
					'show_excerpt' => [
						'type' => 'boolean',
						'default' => false
					],
					'show_label' => [
						'type' => 'boolean',
						'default' => true
					],
					'links' => [
						'type' => 'boolean',
						'default' => true
					]
				),
				'editor_script'   => 'simple-sitemap-block', // The script name we gave in the wp_register_script() call.
				'render_callback' => array( 'WPGO_Simple_Sitemap_Shortcode', 'render' ),
			) );

			// Register our block, and explicitly define the attributes we accept.
			register_block_type( 'wpgoplugins/simple-sitemap-group-block', array(
				'attributes' => array(
					'show_excerpt' => [
						'type' => 'boolean',
						'default' => false
					],
					'show_label' => [
						'type' => 'boolean',
						'default' => true
					],
					'links' => [
						'type' => 'boolean',
						'default' => true
					],
					'orderby' => array(
						'type' => 'string',
						'default' => 'title'
					),
					'order' => array(
						'type' => 'string',
						'default' => 'asc'
					),
					'visibility' => array(
						'type' => 'boolean',
						'default' => true
					),
					'block_taxonomy'  => [
						'type'  => 'string',
						'default' => 'category'
					],
					'gutenberg_block' => array(
						'type'  => 'boolean',
						'default' => true
					)
				),
				'editor_script'   => 'simple-sitemap-block', // The script name we gave in the wp_register_script() call.
				'render_callback' => array( 'WPGO_Simple_Sitemap_Group_Shortcode', 'render' ),
			) );			

			// Register our block, and explicitly define the attributes we accept.
			// register_block_type( 'wpgoplugins/simple-sitemap-group-block', array(
			// 	'attributes' => array(
			// 		'gutenberg_block' => array(
			// 			'type'  => 'boolean',
			// 			'default' => true
			// 		)
					// 'block_taxonomy'  => [
					// 	'type'  => 'string',
					// 	'default' => 'category'
					// ],
					// 'orderby' => array(
					// 	'type' => 'string',
					// 	'default' => 'title'
					// ),
					// 'order' => array(
					// 	'type' => 'string',
					// 	'default' => 'asc'
					// ),
					// 'show_excerpt' => [
					// 	'type' => 'boolean',
					// 	'default' => false
					// ],
					// 'show_label' => [
					// 	'type' => 'boolean',
					// 	'default' => true
					// ],
					// 'links' => [
					// 	'type' => 'boolean',
					// 	'default' => true
					// ]
			// ),
			// 	'editor_script'   => 'simple-sitemap-block', // The script name we gave in the wp_register_script() call.
			// 	'render_callback' => array( 'WPGO_Simple_Sitemap_Group_Shortcode', 'render' ),
			// ) );
		}
	}

} /* End class definition */