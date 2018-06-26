<?php

/**

 * Plugin Name: Homepage Module-D

 */



add_action( 'widgets_init', 'fs_dmodule_load' );



function fs_dmodule_load() {

	register_widget( 'fs_dmodule_widget' );

}



class fs_dmodule_widget extends WP_Widget {



	/**

	 * Widget setup.

	 */

	function fs_dmodule_widget() {

		/* Widget settings. */

		$widget_ops = array( 'classname' => 'fs_dmodule_widget', 'description' => __('This widget shows the latest posts from a selected category, built for Homepage Middle Section.', 'fs_dmodule_widget') );




		/* Create the widget. */

		$this->WP_Widget( 'fs_dmodule_widget', __('Firestarter Homepage Module-D', 'fs_dmodule_widget'), $widget_ops );

	}



	/**

	 * How to display the widget on the screen.

	 */

	function widget( $args, $instance ) {

		extract( $args );



		/* Our variables from the widget settings. */

		$module4cat= $instance['categories'];



		/* Before widget (defined by themes). */

                echo $before_widget;



		?>

                
                
                
                
                
                
                
                

<?php $module4catbreaking = "cat=$module4cat"; ?>

<?php 
$category_ID =  $module4cat;
$categoryname = get_the_category_by_ID($category_ID);
$saved_data = get_tax_meta($category_ID,'color_field_id');
$catlink = get_category_link($category_ID);
?>

<!--<div class="homecategorytitle" style="background-color:<?php #echo $saved_data;?>;">
<a href="<?php #echo $catlink ;?>"><?php #echo $categoryname ;?></a>
</div><!-- /homecategorytitle -->


<div class="middlewrapper">

<?php query_posts('showposts=2&' . $module4catbreaking ); ?> <!--original value is 4& -->
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>


<div class="homeregularpost">

<?php if ( has_post_thumbnail() ) { ?>
<div class="homeregularimg">

<div class="homeregularimgfirst"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('channelthumb');} ?></div><!-- /homeregularimgfirst -->




</div><!-- /homeregularimg -->
<?php  } ?>



<div class="homeregulartitle">
<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
</div><!-- /homeregulartitle -->

<div class="homepostsmeta"><?php the_time(get_option('date_format')); ?></div><!-- /homepostsmeta -->

<div class="homeregularexcerpt"><p><?php echo get_excerpt(200); ?></p></div><!-- /homeregularexcerpt -->









<div class="homepostsauthormeta">BY&nbsp; <?php the_author_posts_link(); ?></div><!-- /homepostsauthormeta -->

<div id="posttags">
<?php the_tags( '<p>','','</p>'); ?>


<!-- /homepostsinfo -->

</div>



</div><!-- /homeregularpost -->

<?php endwhile; ?>
<?php endif; ?>




</div><!-- /middlewrapper -->






		<?php



		/* After widget (defined by themes). */

		echo $after_widget;

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