<?php

/**
 * Conent filter hooks class.
 *
 * @since 0.1.0
 */
class WPGO_Simple_Sitemap_Hooks {

	/**
	 * Allows you to filter the plugin options defaults array.
	 *
	 * @since 0.2.0
	 */
	public static function simple_sitemap_defaults( $defaults ) {
		return apply_filters( 'simple_sitemap_defaults', $defaults );
	}

	/**
	 * Allows you to filter the post title text.
	 *
	 * @since 0.2.0
	 */
	public static function simple_sitemap_title_text( $title, $id ) {
		return apply_filters( 'simple_sitemap_title_text', $title, $id );
	}

	/**
	 * Allows you to filter the post title text.
	 *
	 * @since 0.2.0
	 */
	public static function simple_sitemap_title_link_text( $title_link, $id ) {
		return apply_filters( 'simple_sitemap_title_link_text', $title_link, $id );
	}

	// example of an action hook
	/**
	 * Our version of the wp_head hook, but is placed directly after so guaranteed to run after wp_head hooked content.
	 *
	 * @since 0.1.0
	 */
	//public static function wpgo_head() {
	//	do_action( 'wpgo_head' );
	//}

}