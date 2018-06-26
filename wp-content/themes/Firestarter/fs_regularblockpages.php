<div id="homeregularpages"> 

<?php 
global $paged;
$temp = $wp_query;
                    $wp_query = null;

                    $wp_query = new WP_Query( array(
  'posts_per_page' => 5,
  'paged' => $paged
)); ?>
 

<?php
$category_ID =  $wp_query->get_queried_object_id();
$saved_data = get_tax_meta($category_ID,'color_field_id');
$catlink = get_category_link($category[0]->term_id);
$tf_uniformcolor = get_option_tree('tf_uniformcolor', $theme_options, false);
?>


<div class="homecategorytitle" style="background-color:<?php echo $tf_uniformcolor;?>;">
<a href="<?php echo $catlink ;?>">Archive Posts</a>
</div><!-- /homecategorytitle -->


<div class="middlewrapper">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="homeregularpost">

<?php if ( has_post_thumbnail() ) { ?>
<div class="homeregularimg">
<div class="homeregularimgfirst"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('homeregularthumb');} ?></div><!-- /homeregularimgfirst -->
<div class="homeregularimgsecond"><a href="<?php the_permalink() ?>"><?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'homeregularthumb'); endif; ?></div><!-- /homeregularimgsecond -->
<a href="<?php the_permalink() ?>"><?php if ( has_post_format( 'quote' )) {
echo '<img src="' . get_template_directory_uri() . '/images/quotebig.png" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'gallery' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/gallerybig.png" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'video' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/videobig.png" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'audio' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/audiobig.png" class="watermark" height="64px" width="64px" />'; }
else {
  echo '<img src="' . get_template_directory_uri() . '/images/articlebig.png" class="watermark" height="64px" width="64px" />'; } ?></a>
</div><!-- /homeregularimg -->
<?php  } ?>


<div class="homeregulartitle">
<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
</div><!-- /homeregulartitle -->

<div class="homeregularexcerpt"><p><?php echo strip_tags(excerpt(16)); ?></p></div><!-- /homeregularexcerpt -->


<?php
$tf_review_enable =  get_post_meta(get_the_ID(), 'tf_review_enable', true);
$tf_final_score =  get_post_meta(get_the_ID(), 'tf_final_score', true);
$tf_final_percentage = $tf_final_score * 20; ?>


<?php if ($tf_review_enable == 1) { ?>
				<span class="homestarsunder"><span class="homestarsover" style="width:<?php echo $tf_final_percentage; ?>%"></span></span>
			<?php } else { ?>					
			<?php } ?>


<div class="homepostsinfo">

<div class="homepostsmeta"><?php the_time(get_option('date_format')); ?> | by&nbsp;</div><!-- /homepostsmeta -->

<div class="homepostsauthormeta"><?php the_author_posts_link(); ?></div><!-- /homepostsauthormeta -->

<div class="comment-bubble">
   <a href="<?php comments_link(); ?>">
      <?php comments_number( '+', '1', '%' ); ?>
   </a>
</div>

</div><!-- /homepostsinfo -->

</div><!-- /homeregularpost -->

<?php endwhile; ?>

<?php wp_reset_query(); ?>
<div class="paginationblock">
<?php
global $wp_query;
$big = 999999999; // need an unlikely integer
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages
) );
?>
</div><!-- /paginationblock -->


<?php endif; ?>

</div><!-- /middlewrapper -->
</div><!-- /homeregularpages -->