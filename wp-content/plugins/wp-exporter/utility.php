<?php
/*
    WP Export Utility Class
	@since 0.0.5
    
	Copyright 2017 zourbuth.com (email: zourbuth@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class WP_Export_Utility {


	/**
	 * Class constructor
	 * 
	 * @since 0.0.5
	 */
	function __construct() {
		add_action( 'admin_bar_menu', array( &$this, 'admin_bar_menu' ) );
		add_action( 'admin_enqueue_scripts', array( &$this, 'admin_enqueue' ) );
		add_action( 'the_post', array( &$this, 'the_post' ), 1, 2 );
	}


	/**
	 * Create admin bar export menu, before user profile menu
	 * Put define('WP_EXPORTER_ADMIN_BAR', true); in wp-config.php or theme functions.php to enable
	 * 
	 * @param $wp_admin_bar (object) WP_Admin_Bar
	 * @since 0.0.5
	 */
	function admin_bar_menu( $wp_admin_bar ) {
		if ( ! defined( 'WP_EXPORTER_ADMIN_BAR' ) || true !== WP_EXPORTER_ADMIN_BAR )
			return;
		
		global $pagenow;

		if ( ! is_admin() || 'post.php' !== $pagenow || ! defined( 'WP_EXPORTER_ADMIN_BAR' ) )
			return;
		
		$args = array(
			'id'    	=> 'wp-export',
			'parent'	=> 'top-secondary',
			'title' 	=> '<span class="ab-icon dashicons-before dashicons-migrate"></span>'. 
							__( 'Export', 'wp-exporter' ),
			'href'  	=> $this->export_url(),
			'meta'  	=> array( 
				'class' => 'wp-export',
				'target' => '_blank',
			)
		);
		$wp_admin_bar->add_node( $args );			
		return $wp_admin_bar;
	}
	

	/**
	 * Create admin bar export menu, before user profile menu
	 * 
	 * @param $wp_admin_bar (object) WP_Admin_Bar
	 * @since 0.0.5
	 */
	public static function export_url() {
		global $post;
		
		$params = array(
			'download' 		=> 'true',
			'content' 		=> 'advanced',
			'content' 		=> 'advanced',
			'query' 		=> $post->post_type,
			'post_ids[]' 	=> $post->ID,
		);
		
		return admin_url( "export.php?" ) . http_build_query($params);
	}
	
	
	/**
	 * Custom styles for export admin bar menu
	 * 
	 * @param $hook (string) current admin file name
	 * @since 0.0.5
	 */
	function admin_enqueue( $hook ) {
		if ( ! in_array( $hook, array( 'post.php', 'post-new.php' ) ) )
			return;

		echo '<style type="text/css">
				#wpadminbar .wp-export :before { line-height: 24px;}
			</style>';
	}
	
	
	/**
	 * Export action using custom query
	 * Modify post object while 'get_post' inside 'setup_postdata'
	 * Put define('WP_EXPORTER_POST_STATUS', 'draft'); in wp-config.php or theme functions.php
	 * 
	 * @param $post (array) The array of retrieved post.
	 * @param $wp_query The current Query object (passed by reference).
	 * @since 0.0.5
	 */	
	function the_post( $post, $wp_query ) {	
		if ( isset( $wp_query->wp_exporter ) && $wp_query->wp_exporter && defined('WP_EXPORTER_POST_STATUS') && isset( $GLOBALS['post'] ) ) {
			$GLOBALS['post']->post_status = WP_EXPORTER_POST_STATUS;	
			return $GLOBALS['post'];
		}
	}	

} new WP_Export_Utility();


/**
 * Debugging purpose
 * @params $arr array()
 * @since 0.0.5
 */	
function _wp_exporter_debugr( $arr ) {
	echo '<pre style="font-size:10px;line-height:10px;">'. print_r( $arr, true ) . '</pre>'; 
}