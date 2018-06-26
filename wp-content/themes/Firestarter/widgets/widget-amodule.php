<?php

/**

 * Plugin Name: Homepage Module-A

 */



add_action( 'widgets_init', 'fs_amodule_load' );



function fs_amodule_load() {

	register_widget( 'fs_amodule_widget' );

}



class fs_amodule_widget extends WP_Widget {



	/**

	 * Widget setup.

	 */

	function fs_amodule_widget() {

		/* Widget settings. */

		$widget_ops = array( 'classname' => 'fs_amodule_widget', 'description' => __('This widget shows the latest posts from a selected category, built for Homepage Middle Section.', 'fs_amodule_widget') );




		/* Create the widget. */

		$this->WP_Widget( 'fs_amodule_widget', __('Firestarter Homepage Module-A', 'fs_amodule_widget'), $widget_ops );

	}



	/**

	 * How to display the widget on the screen.

	 */

	function widget( $args, $instance ) {

		extract( $args );



		/* Our variables from the widget settings. */

		$module1cat= $instance['categories'];



		/* Before widget (defined by themes). */

                echo $before_widget;



		?>

                
                
                
                
                
                
                
                

<?php $module1catbreaking = "cat=$module1cat"; ?>
<?php query_posts('showposts=1&' . $module1catbreaking ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<?php 
$category_ID =  $module1cat;
$categoryname = get_the_category_by_ID($category_ID);
$saved_data = get_tax_meta($category_ID,'color_field_id');
$catlink = get_category_link($category_ID);
?>

<div class="homecategorytitle" style="background-color:<?php echo $saved_data;?>;">
<a href="<?php echo $catlink ;?>"><?php echo $categoryname ;?></a>
</div><!-- /homecategorytitle -->


<div class="middlewrapper">


<div id="homedoubleleft">




<div class="homedoubleimg">


<div class="homedoubleimgfirst"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('homedoublethumb');} ?></div><!-- /homedoubleimgfirst -->

<div class="homedoubleimgsecond"><?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'homedoublethumb'); endif; ?></div><!-- /homedoubleimgsecond -->


<a href="<?php the_permalink() ?>"><?php if ( has_post_format( 'quote' )) {
echo '<img src="' . get_template_directory_uri() . '/images/quotebig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'gallery' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/gallerybig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'video' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/videobig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'audio' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/audiobig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
else {
  echo '<img src="' . get_template_directory_uri() . '/images/articlebig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; } ?></a>


<?php
$tf_review_enable =  get_post_meta(get_the_ID(), 'tf_review_enable', true);
$tf_final_score =  get_post_meta(get_the_ID(), 'tf_final_score', true);
$tf_final_percentage = $tf_final_score * 20; ?>

<?php if ($tf_review_enable == 1) { ?>
<div class="thumbstarswrapper"><span class="thumbstarunder"><span class="thumbstartop" style="width:<?php echo $tf_final_percentage;?>%"></span></span></div>	
			<?php } else { ?>					
			<?php } ?>


</div><!-- /homedoubleimg -->


<div class="homedoubletitle">
<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
</div><!-- /homedoubletitle -->



<div class="homepostexcerpt"><p><?php echo strip_tags(excerpt(8)); ?></p></div><!-- /homepostexcerpt -->







<div class="homepostsinfo">

<div class="homepostsmeta"><?php the_time(get_option('date_format')); ?> | by&nbsp;</div><!-- /homepostsmeta -->

<div class="homepostsauthormeta"><?php the_author_posts_link(); ?></div><!-- /homepostsauthormeta -->

<div class="comment-bubble">
   <a href="<?php comments_link(); ?>">
      <?php comments_number( '+', '1', '%' ); ?>
   </a>
</div>

</div><!-- /homepostsinfo -->




<?php endwhile; ?>
<?php endif; ?>

</div><!-- /homedoubleleft -->



<div id="homedoubleright">

<?php query_posts( $module1catbreaking . '&posts_per_page=1&offset=1' ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>



<div class="homedoubleimg">

<div class="homedoubleimgfirst"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('homedoublethumb');} ?></div><!-- /homedoubleimgfirst -->

<div class="homedoubleimgsecond"><?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'homedoublethumb'); endif; ?></div><!-- /homedoubleimgsecond -->


<a href="<?php the_permalink() ?>"><?php if ( has_post_format( 'quote' )) {
echo '<img src="' . get_template_directory_uri() . '/images/quotebig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'gallery' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/gallerybig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'video' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/videobig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'audio' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/audiobig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
else {
  echo '<img src="' . get_template_directory_uri() . '/images/articlebig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; } ?></a>


<?php
$tf_review_enable =  get_post_meta(get_the_ID(), 'tf_review_enable', true);
$tf_final_score =  get_post_meta(get_the_ID(), 'tf_final_score', true);
$tf_final_percentage = $tf_final_score * 20; ?>

<?php if ($tf_review_enable == 1) { ?>
<div class="thumbstarswrapper"><span class="thumbstarunder"><span class="thumbstartop" style="width:<?php echo $tf_final_percentage;?>%"></span></span></div>	
			<?php } else { ?>					
			<?php } ?>


</div><!-- /homedoubleimg -->






<div class="homedoubletitle">
<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
</div><!-- /homedoubletitle -->

<div class="homepostexcerpt"><p><?php echo strip_tags(excerpt(8)); ?></p></div><!-- /homepostexcerpt -->






<div class="homepostsinfo">

<div class="homepostsmeta"><?php the_time(get_option('date_format')); ?> | by&nbsp;</div><!-- /homepostsmeta -->

<div class="homepostsauthormeta"><?php the_author_posts_link(); ?></div><!-- /homepostsauthormeta -->

<div class="comment-bubble">
   <a href="<?php comments_link(); ?>">
      <?php comments_number( '+', '1', '%' ); ?>
   </a>
</div>

</div><!-- /homepostsinfo -->




<?php endwhile; ?>
<?php endif; ?>


</div><!-- /homedoubleright -->




<div id="homedoublesmalls">

<?php query_posts( $module1catbreaking . '&posts_per_page=3&offset=2' ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="homedoublesmall">

<div class="homedoublesmallimg"><a href="<?php the_permalink() ?>"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('homedoublesmallthumb');} ?></a>

</div><!-- /homedoublesmallimg -->



<div class="homedoublesmalltextwrapper">

<div class="homedoublesmalltitle">
<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
</div><!-- /homedoublesmalltitle -->



<?php 
$category = get_the_category(); 
$category_ID =  $category[0]->cat_ID;
$saved_data = get_tax_meta($category_ID,'color_field_id');
$catlink = get_category_link($category[0]->term_id);
?>

<div class="homedoublesmallcatname" style="background-color:<?php echo $saved_data;?>;">
<a href="<?php echo $catlink ;?>"><?php echo $category[0]->cat_name;?></a>
</div><!-- /homedoublesmallcatname -->





<div class="homepostsinfo">

<div class="homepostsmeta"><?php the_time(get_option('date_format')); ?> | by&nbsp;</div><!-- /homepostsmeta -->

<div class="homepostsauthormeta"><?php the_author_posts_link(); ?></div><!-- /homepostsauthormeta -->



</div><!-- /homepostsinfo -->



</div><!-- /homedoublesmalltextwrapper -->


</div><!-- /homedoublesmall -->

<?php endwhile; ?>
<?php endif; ?>


</div><!-- /homedoublesmalls -->

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