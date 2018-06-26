<?php 
 /*Template Name: ASCE News Template Redux
 */
get_header(); ?>

<?php
foreach((get_the_category()) as $category) { 
   //echo $category->cat_name . ' '; 
    if($category->parent == 0) {//this makes sure to display the parent category name if post is tagged to parent and child category like ASCE News
	$categoryname = $category->cat_name;
    }
} 
?>
<?php 
$category = get_the_category();

$category_ID =  $category[0]->cat_ID;

$saved_data = get_tax_meta($category_ID,'color_field_id');

$catlink = get_category_link($category[0]->term_id); 

?>

<div class="asce-news-wrapper">
<div class="category-title">Featured Articles<?php# single_tag_title(); ?></div>
<div class="cat-main-content">
<div class="cat-wrapper">	
<?php
if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }
query_posts(array('category__in' => array($cat),'paged' => $paged));
while (have_posts()) : the_post(); ?>

<div class="category-post">

<?php if ( has_post_thumbnail() ) { ?>
<div class="homeregularimg">

<div class="homeregularimgfirst"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('channelthumb');} ?></div><!-- /homeregularimgfirst -->




</div><!-- /homeregularimg -->
<?php  } ?>
<div class="homeregulartitle">
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
</div><!-- /homeregulartitle -->
<div class="homepostsmeta"><?php the_time(get_option('date_format')); ?></div><!-- /homepostsmeta -->

<div class="homeregularexcerpt"><p><?php the_excerpt(); ?></p></div><!-- /homeregularexcerpt -->
<div class="homepostsauthormeta">BY&nbsp; <?php the_author_posts_link(); ?></div><!-- /homepostsauthormeta -->

<div id="posttags">
<?php the_tags( '<p>','','</p>'); ?>
</div>
<div class="sharing">
	<div class="sharing-header">Share</div>
	<?php /*do_action( 'addthis_widget', get_permalink(), get_the_title(), array(
    'size' => '16', // size of the icons.  Either 16 or 32
    'services' => 'facebook,twitter,google_plusone_share,linkedin,pinterest_share,email', // the services you want to always appear
    'preferred' => '0', // the number of auto personalized services
    'more' => false // if you want to have a more button at the end
    ));*/
    ?>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <div class="addthis_sharing_toolbox" data-url="<?php the_permalink(); ?>" data-title="<?php the_title_attribute(); ?>"></div>
</div>
</div>




<?php endwhile; ?>
<?php if(function_exists('wp_paginate')) {
    wp_paginate();
} ?>
</div>
</div>
</div>

<div id="sidebar">
<?php if ( ! dynamic_sidebar( 'Homepage Right Sidebar' ) ) :  endif; ?>
</div><!-- /sidebar -->



<?php get_footer(); ?>

