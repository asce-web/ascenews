<?php
/*
 *      Class for the [simple-sitemap-group] shortcode
*/

class WPGO_Simple_Sitemap_Group_Shortcode {

	 /* Main class constructor. */
	public function __construct() {

		add_shortcode( 'simple-sitemap-group', array( &$this, 'render' ) );
		add_shortcode( 'ssg', array( &$this, 'render' ) );
	}

	/* Shortcode function. */
	public function render($attr) {

		/* Get attributes from the shortcode. */
		$args = shortcode_atts( array(
			'id' => uniqid(), // unique identifier to avoid conflicts if using multiple sitemaps on the same page. e.g. 5d026c6168954
			'type' => 'post', // post type
			'tax' => 'category', // single taxonomy that must be associated with the 'type' attribute
			'orderby' => 'title',
			'order' => 'asc',
			'show_excerpt' => 'false',
			'show_label' => 'true',
			'links' => 'true',

			// following attributes don't have block support yet

			// delete from free plugin
			'image' => 'false',
			'list_icon' => 'true',
			'nofollow' => 0,
			'visibility' => 'true',
			'include_terms' => '',
			'exclude_terms' => '',
			//'exclude' => '', // posts
			//'include' => '', // posts
			'taxonomy_links' => 'false',
			'term_orderby' => 'name',
			'term_order' => 'asc',
			'num_posts' => -1,
			'separator' => 'false',
			'title_tag' => '',
			'excerpt_tag' => 'div',
			'post_type_tag' => 'h3',
			'container_tag' => 'ul',
			'term_tag' => 'h3',
			'render' => '', // used to add css classes not tabs
			'parent_page_link' => '1', // undocumented - is this used anymore, or only plugin settings version?
			'shortcode_type' => 'group', // undocumented

			// attributes below are only relevant to sitemap block
			'gutenberg_block' => false,
			'block_post_type' => '',
			'block_taxonomy' => '',
			'post_type_label_font_size' => '1em',
			'sitemap_item_line_height' => '',
			'sitemap_container_margin' => '1em 0 0 0'
		), $attr );

		// defaults
		$args['type'] = 'post';
		$args['block_post_type'] = $args['type'];
		$args['image'] = 'false';
		$args['list_icon'] = 'true';
		$args['nofollow'] = 0;
		$args['visibility'] = 'true';
		$args['include_terms'] = '';
		$args['exclude_terms'] = '';
		//$args['exclude'] = ''; // posts
		//$args['include'] = ''; // posts
		$args['taxonomy_links'] = 'false';
		$args['term_orderby'] = 'name';
		$args['term_order'] = 'asc';
		$args['num_posts'] = -1;
		$args['separator'] = 'false';
		$args['title_tag'] = '';
		$args['excerpt_tag'] = 'div';
		$args['post_type_tag'] = 'h3';
		$args['container_tag'] = 'ul';
		$args['term_tag'] = 'h3';
		$args['render'] = ''; // used to add css classes not tabs
		$args['parent_page_link'] = '1'; // undocumented - is this used anymore, or only plugin settings version?
		$args['shortcode_type'] = 'group'; // undocumented

		// escape tag names
		$args['container_tag'] = tag_escape( $args['container_tag'] );
		$args['title_tag'] = tag_escape( $args['title_tag'] );
		$args['excerpt_tag'] = tag_escape( $args['excerpt_tag'] );
		$args['post_type_tag'] = tag_escape( $args['post_type_tag'] );
		$args['term_tag'] = tag_escape( $args['term_tag'] );

		$block_err = '';

		// Format attributes as necessary

		// if we are rendering a block then parse block attributes
		if($args['gutenberg_block'] === true) {

			if(empty($args['block_taxonomy'])) {
				$block_err = '<h5 style="line-height:1.25em;">Please select a post type that supports taxonomies.</h5>';
			} else {
				$args['type'] = $args['block_post_type'];
				$args['tax'] = $args['block_taxonomy'];
			}

			// sanitize post_type_label_font_size
			$args['post_type_label_font_size'] = sanitize_text_field($args['post_type_label_font_size']);

			// sanitize sitemap_item_line_height
			$args['sitemap_item_line_height'] = sanitize_text_field($args['sitemap_item_line_height']);

			// sanitize sitemap_container_margin
			$args['sitemap_container_margin'] = sanitize_text_field($args['sitemap_container_margin']);
		}

		// force 'ul' or 'ol' to be used as the container tag
		$allowed_container_tags = array('ul', 'ol');
		if(!in_array($args['container_tag'], $allowed_container_tags)) {
			$args['container_tag'] = 'ul';
		}

		$container_format_class = ($args['list_icon'] == "true") ? '' : ' hide-icon';
		$render_class = empty($args['render']) ? '' : ' ' . sanitize_html_class( $args['render'] );

		// check post type is valid
		$registered_post_types = get_post_types();
		if( !array_key_exists( $args['type'], $registered_post_types ) )
			return '<h5 style="line-height:1.25em;">Post type \'' . $args['type'] . '\' not recognized.</h5>';

		// ******************
		// ** OUTPUT START **
		// ******************

		// Start output caching (so that existing content in the [simple-sitemap] post doesn't get shoved to the bottom of the post
		ob_start();

		if($block_err) {
			return $block_err;
		}
		
		// output styles
		$container = '.simple-sitemap-container-' . $args['id']; // applies styles to tabbed AND normal sitemap

		echo '<style type="text/css">';
		if(!empty($args['sitemap_item_line_height']) ) {
			echo $container . ' .sitemap-item { line-height: ' . $args['sitemap_item_line_height'] . '; } ';
		}
		echo $container . ' { margin: ' . $args['sitemap_container_margin'] . '; } ';
		echo '</style>';

		$sitemap_id = ' simple-sitemap-container-' .  $args['id'];
		$container_classes = 'simple-sitemap-container' . $sitemap_id. $render_class . $container_format_class;
		echo '<div class="' . esc_attr($container_classes) . '">';

		// set opening and closing title tag
		if( !empty($args['title_tag']) ) {
			$args['title_open'] = '<' . $args['title_tag'] . '>';
			$args['title_close'] = '</' . $args['title_tag'] . '>';
		}
		else {
			$args['title_open'] = $args['title_close'] = '';
		}

		$post_type_label = WPGO_Shortcode_Utility::get_post_type_label($args['show_label'], $args['type'], $args['post_type_tag'], '');

		$list_item_wrapper_class = 'simple-sitemap-wrap' . $render_class;
		echo $post_type_label;

		$taxonomy_arr = get_object_taxonomies( $args['type'] );

		// sort via specified taxonomy
		if ( !empty($args['tax']) && in_array( $args['tax'], $taxonomy_arr ) ) {

			$term_attr = array(
				'orderby'           => $args['term_orderby'],
				'order'             => $args['term_order']
			);

			// get array of taxonomy terms to include/exclude
			if( !empty($args['exclude_terms']) ) {
				$exclude_terms = array_map('trim', explode( ',', $args['exclude_terms'] ));
			}

			if( !empty($args['include_terms']) ) {
				$include_terms = array_map('trim', explode( ',', $args['include_terms'] ));
			}

			// echo "<pre>";
			// print_r($include_terms);
			// print_r($exclude_terms);
			// echo "</pre>";

			$terms = get_terms( $args['tax'], $term_attr );
			foreach ( $terms as $term ) {

				$tmp = $term->name; //strtolower($term->name);

				if( !empty($include_terms) && !in_array($tmp, $include_terms) ) {
					continue; // skip to next loop iteration if the current term is to be included
				}

				if( !empty($exclude_terms) && in_array($tmp, $exclude_terms) ) {					
					continue; // skip to next loop iteration if the current term is to be excluded
				}

				echo '<div class="' . esc_attr($list_item_wrapper_class) . ' ' . esc_attr(strtolower($term->slug)) . '">';

				$args['tax_query'] = array(
					array(
						'taxonomy' => $args['tax'],
						'field' => 'slug',
						'terms' => $term ),
				);

				$termName = $term->name;
				if( $args['taxonomy_links'] == 'true' ) {
					$termLink = get_term_link($term->slug, $args['tax']);

					// get_term_link() returns WP_Error object if term empty
					if( !is_wp_error( $termLink ) ) {
						$termName = '<a href="' . $termLink . '">' . $term->name . '</a>';
						echo '<' . $args['term_tag'] . '>' . $termName . '</' . $args['term_tag'] . '>';
					}
				} else {
					echo '<' . $args['term_tag'] . ' class="term-tag">' . $termName . '</' . $args['term_tag'] . '>';
				}
				$query_args = WPGO_Shortcode_Utility::get_query_args($args, $args['type']);
				WPGO_Shortcode_Utility::render_list_items($args, $args['type'], $query_args);
			}
		}
		else {
			echo "No posts found.";
		}

		echo '</div>'; // .simple-sitemap-container

		// @todo check we still need this
		echo '<br style="clear: both;">'; // make sure content after the sitemap is rendered properly if taken out

		$sitemap = ob_get_contents();
		ob_end_clean();

		// ****************
		// ** OUTPUT END **
		// ****************

		return $sitemap;
	}
}