<?php

function add_advanced_recent_posts_widget_stylesheet() {
		$plugin_dir = 'advanced-recent-posts-widget';
	$mycss_file = get_template_directory_uri() . '/includes/advanced-recent-posts-widget/css/advanced-recent-posts-widget.css';
		
	        wp_register_style( 'wp-advanced-rp-css', $mycss_file );
	        wp_enqueue_style( 'wp-advanced-rp-css' );
	   
}
add_action('wp_print_styles', 'add_advanced_recent_posts_widget_stylesheet');



?>