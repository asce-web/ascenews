<?php
/*
 *	Localize plugin
*/

class WPGO_Simple_Sitemap_Localize {

	protected $module_roots;

	/* Main class constructor. */
	public function __construct($module_roots) {

		$this->module_roots = $module_roots;

		add_action( 'plugins_loaded', array( &$this, 'localize_plugin' ) );
	}

	/**
	 * Add Plugin localization support.
	 */
	public function localize_plugin() {

		load_plugin_textdomain( 'simple-sitemap', false, basename( dirname( $this->module_roots['file'] ) ) . '/languages' );
	}

} /* End class definition */