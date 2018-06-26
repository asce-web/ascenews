<?php get_header(); ?>

<?php
$theme_options = get_option('option_tree');

$latestnewscategory = get_option_tree('latestnewscategory', $theme_options, false);
$latestnewsbreaking = "cat=$latestnewscategory";

$colauthor1 = get_option_tree('colauthor1', $theme_options, false);
$colauthor2 = get_option_tree('colauthor2', $theme_options, false);
$colauthor3 = get_option_tree('colauthor3', $theme_options, false);
$colauthor4 = get_option_tree('colauthor4', $theme_options, false);

$feedboxcat1 = get_option_tree('feedboxcat1', $theme_options, false);
$feedbox1breaking = "cat=$feedboxcat1";

$feedboxcat2 = get_option_tree('feedboxcat2', $theme_options, false);
$feedbox2breaking = "cat=$feedboxcat2";

$feedboxcat3 = get_option_tree('feedboxcat3', $theme_options, false);
$feedbox3breaking = "cat=$feedboxcat3";

$feedboxcat4 = get_option_tree('feedboxcat4', $theme_options, false);
$feedbox4breaking = "cat=$feedboxcat4";

$feedboxcat5 = get_option_tree('feedboxcat5', $theme_options, false);
$feedbox5breaking = "cat=$feedboxcat5";

$feedboxcat6 = get_option_tree('feedboxcat6', $theme_options, false);
$feedbox6breaking = "cat=$feedboxcat6";

$tf_featuredcat = get_option_tree('tf_featuredcat', $theme_options, false);
$tf_featuredcatbreaking = "cat=$tf_featuredcat";

$newsthumb1cat = get_option_tree('newsthumb1cat', $theme_options, false);
$newsthumb2cat = get_option_tree('newsthumb2cat', $theme_options, false);
$tf_enable_columnists = get_option_tree('tf_enable_columnists', $theme_options, false);
$adleft1 = get_option_tree('adleft1', $theme_options, false);
$adleft2 = get_option_tree('adleft2', $theme_options, false);
$adleft3 = get_option_tree('adleft3', $theme_options, false);
$module1cat = get_option_tree('module1cat', $theme_options, false);
$module1catbreaking = "cat=$module1cat";
$module2cat = get_option_tree('module2cat', $theme_options, false);
$module2catbreaking = "cat=$module2cat";
$module3cat = get_option_tree('module3cat', $theme_options, false);
$module3catbreaking = "cat=$module3cat";
$module4cat = get_option_tree('module4cat', $theme_options, false);
$module4catbreaking = "cat=$module4cat";
$tf_enable_feedblock = get_option_tree('tf_enable_feedblock', $theme_options, false);

?>


<div id="blogmiddlesection">









<div id="blogposts"> 



<div id="blogregular"> 



<?php

$category_ID =  $wp_query->get_queried_object_id();

$saved_data = get_tax_meta($category_ID,'color_field_id');



?>



<div id="blogcategorytitle" class="homecategorytitle" style="background-color:<?php echo $saved_data;?>;">

<a>Blog Posts</a>

</div><!-- /homecategorytitle -->





<div id="blogwrapper" class="middlewrapper">



<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>





<div id="blogregularpost" class="homeregularpost">




<?php if ( has_post_thumbnail() ) { ?>
<div class="homeregularimg">
<div class="homeregularimgfirst"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('homeregularthumb');} ?></div><!-- /homeregularimgfirst -->
<div class="homeregularimgsecond"><a href="<?php the_permalink() ?>"><?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'homeregularthumb'); endif; ?></div><!-- /homeregularimgsecond -->
<?php if ( has_post_format( 'quote' )) {
echo '<img src="' . get_template_directory_uri() . '/images/quotebig.png" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'gallery' )) {
echo '<img src="' . get_template_directory_uri() . '/images/gallerybig.png" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'video' )) {
echo '<img src="' . get_template_directory_uri() . '/images/videobig.png" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'audio' )) {
echo '<img src="' . get_template_directory_uri() . '/images/audiobig.png" class="watermark" height="64px" width="64px" />'; }
else {
echo '<img src="' . get_template_directory_uri() . '/images/articlebig.png" class="watermark" height="64px" width="64px" />'; } ?>
</a>
</div><!-- /homeregularimg -->
<?php  } ?>



<div id="blogregulartitle" class="homeregulartitle">
<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
</div><!-- /homeregulartitle -->

<div id="blogregularexcerpt" class="homeregularexcerpt"><p><?php echo strip_tags(excerpt(28)); ?></p></div><!-- /homeregularexcerpt -->


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

<!--<div class="comment-bubble">
   <a href="<?php comments_link(); ?>">
      <?php comments_number( '+', '1', '%' ); ?>
   </a>
</div>-->

</div><!-- /homepostsinfo -->



</div><!-- /homeregularpost -->



<?php endwhile; ?>

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





</div><!-- /blogregular -->





















</div><!-- /blogposts -->





</div><!-- /blogmiddlesection -->

<div id="sidebar">
<?php if ( ! dynamic_sidebar( 'Homepage Right Sidebar' ) ) :  endif; ?>
</div><!-- /sidebar -->

<?php get_footer(); ?>  