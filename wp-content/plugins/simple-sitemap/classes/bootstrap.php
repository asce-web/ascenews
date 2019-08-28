<?php
/*
 *	Bootstrap plugin
*/

class WPGO_Simple_Sitemap_BootStrap {

	protected $module_roots;

	/* Main class constructor. */
	public function __construct($module_roots) {

		$this->module_roots = $module_roots;
		$this->load_supported_features();
	}

	/* Load plugin features. */
	public function load_supported_features() {

		$root = $this->module_roots['dir'];

		// enqueue plugin scripts
		require_once( $root . 'classes/enqueue-scripts.php' );
		new WPGO_Simple_Sitemap_Enqueue_Scripts($this->module_roots);

		// plugin docs/settings page
		require_once( $root . 'classes/settings.php' );
		new WPGO_Simple_Sitemap_Settings($this->module_roots);
		
		// sitemap shortcodes
		require_once( $root . 'classes/shortcodes/shortcodes.php' );
		new WPGO_Simple_Sitemap_Shortcodes($this->module_roots);
		
		// localize plugin
		require_once( $root . 'shared/localize.php' );
		new WPGO_Simple_Sitemap_Localize($this->module_roots);

		// links on the main plugin index page
		require_once( $root . 'shared/links.php' );
		new WPGO_Simple_Sitemap_Links($this->module_roots);

		// register endpoints
		require_once( $root . 'shared/rest-api-endpoints.php' );
		new WPGO_Custom_Sitemap_Endpoints($this->module_roots);

		// plugin hooks
		require_once( $root . 'shared/hooks.php' );

		// walker class to render hierarchical pages
		require_once( $root . 'shared/class-wpgo-walker-page.php' );
	}

} /* End class definition */