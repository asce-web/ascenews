<?php
/*
 *	Main WordPress plugin index page links and admin notices
*/

class WPGO_Simple_Sitemap_Links {

	protected $module_roots;

	/* Main class constructor. */
	public function __construct($module_roots) {

		$this->module_roots = $module_roots;

		add_filter( 'plugin_row_meta', array( &$this, 'plugin_action_links' ), 10, 2 );
		add_filter( 'plugin_action_links', array( &$this, 'plugin_settings_link' ), 10, 2 );
	}

//			update_option('ss_plugin_version', $current_version);

	// Display a Settings link on the main Plugins page
	public function plugin_action_links( $links, $file ) {

		//if ( $file == plugin_basename( __FILE__ ) ) {
		// add a link to pro plugin
		//$links[] = '<a style="color:limegreen;" href="https://wpgoplugins.com/plugins/simple-sitemap-pro/" target="_blank" title="Upgrade to Pro - 100% money back guarantee"><span class="dashicons dashicons-awards"></span></a>';
		//}

		if ( $file == 'simple-sitemap/simple-sitemap.php') {
			$pccf_links = '<a href="https://wpgoplugins.com/plugins/simple-sitemap-pro/" target="_blank" title="More sitemap features"><b>More features</b></a>';
			array_push( $links, $pccf_links );
		}

		return $links;
	}

	// Display a Settings link on the main Plugins page
	public function plugin_settings_link( $links, $file ) {

		if ( $file == 'simple-sitemap/simple-sitemap.php') {
			$pccf_links = '<a href="' . get_admin_url() . 'options-general.php?page=simple-sitemap/classes/simple-sitemap-settings.php">' . __( 'Get Started' ) . '</a>';
			array_unshift( $links, $pccf_links );
		}

		return $links;
	}

} /* End class definition */