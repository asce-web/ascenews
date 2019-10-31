<?php
/**
 * Plugin Name: Homepage 728x90 Ad Box
 */

add_action( 'widgets_init', 'fs_728ad_load' );

function fs_728ad_load() {
	register_widget( 'fs_728ad_widget' );
}

class fs_728ad_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
    function fs_728ad_widget()
    {
        parent::__construct(
            false, // Base ID
            'Firestarter Homepage 728x90 Ad Box', // Name
            array('description' => 'This widget shows an ad box with a size of 728x90, built for Header Ad Area.',) // Args
        );
    }

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$adcode = $instance['adcode'];

		/* Display the widget title if one was input (before and after defined by themes). */

		?>


<div id="adlogo">

<?php echo $adcode; ?>

</div><!--adlogo-->


		<?php

	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['adcode'] = $new_instance['adcode'];


		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Ad Code -->
		<p>
			<label for="<?php echo $this->get_field_id( 'adcode' ); ?>">Ad Code:</label>
			<textarea id="<?php echo $this->get_field_id( 'adcode' ); ?>" name="<?php echo $this->get_field_name( 'adcode' ); ?>" style="width:95%;" rows="7"><?php echo $instance['adcode']; ?></textarea>
		</p>


	<?php
	}
}

?>