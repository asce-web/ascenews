<?php

/**

 * Plugin Name: Homepage Columnists Section

 */



add_action( 'widgets_init', 'fs_columnists_load' );



function fs_columnists_load() {

	register_widget( 'fs_columnists_widget' );

}



class fs_columnists_widget extends WP_Widget {



	/**

	 * Widget setup.

	 */

	function fs_columnists_widget() {

		/* Widget settings. */

		$widget_ops = array( 'classname' => 'fs_columnists_widget', 'description' => __('This widget shows the latest posts of selected authors, built for Homepage Left Sidebar.', 'fs_columnists_widget') );




		/* Create the widget. */

		$this->WP_Widget( 'fs_columnists_widget', __('Firestarter Homepage Columnists Section', 'fs_columnists_widget'), $widget_ops );

	}



	/**

	 * How to display the widget on the screen.

	 */

	function widget( $args, $instance ) {

		extract( $args );



		/* Our variables from the widget settings. */

		$title = apply_filters('widget_title', $instance['title'] );

		$colauthor1 = $instance['colauthor1'];
		$colauthor2 = $instance['colauthor2'];
		$colauthor3 = $instance['colauthor3'];
		$colauthor4 = $instance['colauthor4'];



		/* Before widget (defined by themes). */

                echo $before_widget . $before_title . $title . $after_title;



		?>

                



<div class="leftwrapper">

<?php if (!empty($colauthor1)) { ?>
<div class="columnistsbox">

<?php $name = get_the_author_meta( 'display_name', $colauthor1 ); ?>
<?php query_posts( array ( 'author' => $colauthor1, 'posts_per_page' => 1 ) ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>


<div class="columnistsposttitle"><h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1></div>

<?php echo get_avatar( get_the_author_meta( 'user_email', $colauthor1 ), apply_filters( 'twentyten_author_bio_avatar_size', 50 ) ); ?>

<div class="columnistspostexcerpt"><?php echo excerpt(11); ?></div>

<?php
$tf_review_enable =  get_post_meta(get_the_ID(), 'tf_review_enable', true);
$tf_final_score =  get_post_meta(get_the_ID(), 'tf_final_score', true);
$tf_final_percentage = $tf_final_score * 20; ?>


<?php if ($tf_review_enable == 1) { ?>
				<span class="homestarsunder"><span class="homestarsover" style="width:<?php echo $tf_final_percentage; ?>%"></span></span>
			<?php } else { ?>					
			<?php } ?>

<div class="colpostsinfo">

<div class="homepostsmeta"><?php the_time(get_option('date_format')); ?> | by&nbsp;</div><!-- /homepostsmeta -->

<div class="homepostsauthormeta"><a href="<?php echo get_author_posts_url( $colauthor1 ); ?>"><?php echo $name; ?></a></div><!-- /homepostsauthormeta -->

<div class="comment-bubble">
   <a href="<?php comments_link(); ?>">
      <?php comments_number( '+', '1', '%' ); ?>
   </a>
</div>

</div><!-- /colpostsinfo -->



<?php endwhile; ?>
<?php endif; ?>

</div><!-- /columnistsbox -->
<?php } ?>



<?php if (!empty($colauthor2)) { ?>
<div class="columnistsbox">

<?php $name = get_the_author_meta( 'display_name', $colauthor2 ); ?>
<?php query_posts( array ( 'author' => $colauthor2, 'posts_per_page' => 1 ) ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>





<div class="columnistsposttitle"><h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1></div>

<?php echo get_avatar( get_the_author_meta( 'user_email', $colauthor2 ), apply_filters( 'twentyten_author_bio_avatar_size', 50 ) ); ?>

<div class="columnistspostexcerpt"><?php echo excerpt(11); ?></div>

<?php
$tf_review_enable =  get_post_meta(get_the_ID(), 'tf_review_enable', true);
$tf_final_score =  get_post_meta(get_the_ID(), 'tf_final_score', true);
$tf_final_percentage = $tf_final_score * 20; ?>


<?php if ($tf_review_enable == 1) { ?>
				<span class="homestarsunder"><span class="homestarsover" style="width:<?php echo $tf_final_percentage; ?>%"></span></span>
			<?php } else { ?>					
			<?php } ?>


<div class="colpostsinfo">

<div class="homepostsmeta"><?php the_time(get_option('date_format')); ?> | by&nbsp;</div><!-- /homepostsmeta -->

<div class="homepostsauthormeta"><a href="<?php echo get_author_posts_url( $colauthor2 ); ?>"><?php echo $name; ?></a></div><!-- /homepostsauthormeta -->

<div class="comment-bubble">
   <a href="<?php comments_link(); ?>">
      <?php comments_number( '+', '1', '%' ); ?>
   </a>
</div>

</div><!-- /colpostsinfo -->




<?php endwhile; ?>
<?php endif; ?>

</div><!-- /columnistsbox -->
<?php } ?>




<?php if (!empty($colauthor3)) { ?>
<div class="columnistsbox">

<?php $name = get_the_author_meta( 'display_name', $colauthor3 ); ?>
<?php query_posts( array ( 'author' => $colauthor3, 'posts_per_page' => 1 ) ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>


<div class="columnistsposttitle"><h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1></div>

<?php echo get_avatar( get_the_author_meta( 'user_email', $colauthor3 ), apply_filters( 'twentyten_author_bio_avatar_size', 50 ) ); ?>

<div class="columnistspostexcerpt"><?php echo excerpt(11); ?></div>

<?php
$tf_review_enable =  get_post_meta(get_the_ID(), 'tf_review_enable', true);
$tf_final_score =  get_post_meta(get_the_ID(), 'tf_final_score', true);
$tf_final_percentage = $tf_final_score * 20; ?>


<?php if ($tf_review_enable == 1) { ?>
				<span class="homestarsunder"><span class="homestarsover" style="width:<?php echo $tf_final_percentage; ?>%"></span></span>
			<?php } else { ?>					
			<?php } ?>



<div class="colpostsinfo">

<div class="homepostsmeta"><?php the_time(get_option('date_format')); ?> | by&nbsp;</div><!-- /homepostsmeta -->

<div class="homepostsauthormeta"><a href="<?php echo get_author_posts_url( $colauthor3 ); ?>"><?php echo $name; ?></a></div><!-- /homepostsauthormeta -->

<div class="comment-bubble">
   <a href="<?php comments_link(); ?>">
      <?php comments_number( '+', '1', '%' ); ?>
   </a>
</div>

</div><!-- /colpostsinfo -->



<?php endwhile; ?>
<?php endif; ?>

</div><!-- /columnistsbox -->
<?php } ?>

<?php if (!empty($colauthor4)) { ?>
<div id="columnistsboxlast">

<?php $name = get_the_author_meta( 'display_name', $colauthor4 ); ?>
<?php query_posts( array ( 'author' => $colauthor4, 'posts_per_page' => 1 ) ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>





<div class="columnistsposttitle"><h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1></div>

<?php echo get_avatar( get_the_author_meta( 'user_email', $colauthor4 ), apply_filters( 'twentyten_author_bio_avatar_size', 50 ) ); ?>

<div class="columnistspostexcerpt"><?php echo excerpt(11); ?></div>

<?php
$tf_review_enable =  get_post_meta(get_the_ID(), 'tf_review_enable', true);
$tf_final_score =  get_post_meta(get_the_ID(), 'tf_final_score', true);
$tf_final_percentage = $tf_final_score * 20; ?>


<?php if ($tf_review_enable == 1) { ?>
				<span class="homestarsunder"><span class="homestarsover" style="width:<?php echo $tf_final_percentage; ?>%"></span></span>
			<?php } else { ?>					
			<?php } ?>


<div class="colpostsinfo">

<div class="homepostsmeta"><?php the_time(get_option('date_format')); ?> | by&nbsp;</div><!-- /homepostsmeta -->

<div class="homepostsauthormeta"><a href="<?php echo get_author_posts_url( $colauthor4 ); ?>"><?php echo $name; ?></a></div><!-- /homepostsauthormeta -->

<div class="comment-bubble">
   <a href="<?php comments_link(); ?>">
      <?php comments_number( '+', '1', '%' ); ?>
   </a>
</div>

</div><!-- /colpostsinfo -->




<?php endwhile; ?>
<?php endif; ?>

</div><!-- /columnistsboxlast -->
<?php } ?>


</div><!-- /leftwrapper -->






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

		$instance['title'] = strip_tags( $new_instance['title'] );

		$instance['colauthor1'] = $new_instance['colauthor1'];
		$instance['colauthor2'] = $new_instance['colauthor2'];
		$instance['colauthor3'] = $new_instance['colauthor3'];
		$instance['colauthor4'] = $new_instance['colauthor4'];





		return $instance;

	}





	function form( $instance ) {



		/* Set up some default widget settings. */

		$defaults = array( 'title' => __('Columnists', 'TF_EN'));

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>



		<!-- Widget Title: Text Input -->

		<p>

			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>

			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />

		</p>
        
        <!-- Author 1 -->

		<p>

			<label for="<?php echo $this->get_field_id( 'colauthor1' ); ?>">1. Columnist Author ID:</label>

			<input id="<?php echo $this->get_field_id( 'colauthor1' ); ?>" name="<?php echo $this->get_field_name( 'colauthor1' ); ?>" value="<?php echo $instance['colauthor1']; ?>" style="width:90%;" />

		</p>
        
        <!-- Author 2 -->

		<p>

			<label for="<?php echo $this->get_field_id( 'colauthor2' ); ?>">2. Columnist Author ID:</label>

			<input id="<?php echo $this->get_field_id( 'colauthor2' ); ?>" name="<?php echo $this->get_field_name( 'colauthor2' ); ?>" value="<?php echo $instance['colauthor2']; ?>" style="width:90%;" />

		</p>
        
                <!-- Author 3 -->

		<p>

			<label for="<?php echo $this->get_field_id( 'colauthor3' ); ?>">3. Columnist Author ID:</label>

			<input id="<?php echo $this->get_field_id( 'colauthor3' ); ?>" name="<?php echo $this->get_field_name( 'colauthor3' ); ?>" value="<?php echo $instance['colauthor3']; ?>" style="width:90%;" />

		</p>
        
                <!-- Author 4 -->

		<p>

			<label for="<?php echo $this->get_field_id( 'colauthor4' ); ?>">4. Columnist Author ID:</label>

			<input id="<?php echo $this->get_field_id( 'colauthor4' ); ?>" name="<?php echo $this->get_field_name( 'colauthor4' ); ?>" value="<?php echo $instance['colauthor4']; ?>" style="width:90%;" />

		</p>




	<?php

	}

}



?>