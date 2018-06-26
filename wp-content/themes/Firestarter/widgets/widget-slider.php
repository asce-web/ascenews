<?php

/**

 * Plugin Name: Homepage Main Slider

 */



add_action( 'widgets_init', 'fs_slider_load' );



function fs_slider_load() {

	register_widget( 'fs_slider_widget' );

}



class fs_slider_widget extends WP_Widget {



	/**

	 * Widget setup.

	 */

	function fs_slider_widget() {

		/* Widget settings. */

		$widget_ops = array( 'classname' => 'fs_slider_widget', 'description' => __('This widget shows the main slider on homepage, built for Homepage Middle Section.', 'fs_slider_widget') );




		/* Create the widget. */

		$this->WP_Widget( 'fs_slider_widget', __('Firestarter Homepage Main Slider', 'fs_slider_widget'), $widget_ops );

	}



	/**

	 * How to display the widget on the screen.

	 */

	function widget( $args, $instance ) {

		extract( $args );



		/* Our variables from the widget settings. */

		$categories = $instance['categories'];






		?>

                
                
                
                
                
                
                
                
                
                
                




<?php $tf_featuredcatbreaking = "cat=$categories"; ?>
<?php query_posts('showposts=8&' . $tf_featuredcatbreaking ); ?>
<?php if (function_exists('rps_show')) echo rps_show(); ?>





		<?php



		

	}



	/**

	 * Update the widget settings.

	 */

	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;



		/* Strip tags for title and name to remove HTML (important for text inputs). */

		$instance['categories'] = $new_instance['categories'];





		return $instance;

	}





	function form( $instance ) {



		/* Set up some default widget settings. */

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>



		<!-- Category -->

		<p>

			<label for="<?php echo $this->get_field_id('categories'); ?>">Select Category:</label>

			<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" style="width:100%;">


				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>

				<?php foreach($categories as $category) { ?>

				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>

				<?php } ?>

			</select>

		</p>





	<?php

	}

}



?>