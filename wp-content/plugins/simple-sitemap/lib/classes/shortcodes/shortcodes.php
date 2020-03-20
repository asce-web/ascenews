<?php
/*
 *	Bootstrap class for the sitemap shortcodes
*/

class WPGO_Simple_Sitemap_Shortcodes {

	protected $module_roots;

	/* Main class constructor. */
	public function __construct($module_roots) {

		$this->module_roots = $module_roots;
		$this->load_shortcodes();

		// Allow shortcodes to be used in widgets (the callbacks are WordPress core functions)
		add_filter( 'widget_text', 'shortcode_unautop' );
		add_filter( 'widget_text', 'do_shortcode' );
	}

	/* Load shortcodes. */
	public function load_shortcodes() {

		$root = $this->module_roots['dir'];

		require_once( $root . 'shared/shortcodes_utility.php' );		

		// [simple-sitemap] shortcode
		require_once( $root . 'lib/classes/shortcodes/simple-sitemap-shortcode.php' );
		new WPGO_Simple_Sitemap_Shortcode($this->module_roots);

		// [simple-sitemap-group] shortcode
		require_once( $root . 'lib/classes/shortcodes/simple-sitemap-group-shortcode.php' );
		new WPGO_Simple_Sitemap_Group_Shortcode($this->module_roots);
	}

} /* End class definition */