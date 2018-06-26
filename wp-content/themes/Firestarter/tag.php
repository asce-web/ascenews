<?php get_header(); ?>



<?php
$theme_options = get_option('option_tree');

?>


<?php $posts=query_posts($query_string .'&paged='.$paged);?>
<?php
$category_ID =  $wp_query->get_queried_object_id();
$saved_data = get_tax_meta($category_ID,'color_field_id');
$catlink = get_category_link($category[0]->term_id);
$tf_uniformcolor = get_option_tree('tf_uniformcolor', $theme_options, false);
?>



<div class="tagswrapper">
<div class="homecategorytitle" style="background-color:<?php echo $tf_uniformcolor;?>;">
<a href="<?php echo $catlink ;?>"><?php _e('Browsing the topic: ', 'TF_EN');?><?php single_tag_title(); ?></a>
</div><!-- /homecategorytitle -->
<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>

<div class="homeregularpost">

<?php if ( has_post_thumbnail() ) { ?>
<div class="homeregularimg">
<div class="homeregularimgfirst"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('homeregularthumb');} ?></div><!-- /homeregularimgfirst -->

</div><!-- /homeregularimg -->
<?php  } ?>


<div class="homeregulartitle">
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
</div><!-- /homeregulartitle -->
<div class="homepostsmeta"><?php the_time(get_option('date_format')); ?></div><!-- /homepostsmeta -->
<div class="homeregularexcerpt"><p><?php echo get_excerpt(200); ?></p></div><!-- /homeregularexcerpt -->
<div class="homepostsauthormeta">BY&nbsp;<?php the_author_posts_link(); ?></div><!-- /homepostsauthormeta -->
<div class="sharing">
	<div class="addtitle">Share</div>
	<?php do_action( 'addthis_widget', get_permalink(), get_the_title(), array(
    'size' => '16', // size of the icons.  Either 16 or 32
    'services' => 'facebook,twitter,google_plusone_share,linkedin,pinterest_share,email', // the services you want to always appear
    'preferred' => '0', // the number of auto personalized services
    'more' => false // if you want to have a more button at the end
    ));
?>
</div>
</div><!-- /homeregularpost -->

<?php endwhile; ?>
<?php if(function_exists('wp_paginate')) {
    wp_paginate();
} ?>


<?php else : ?>



<div class="noresult"><?php _e('Unfortunately, we have no results for:', 'TF_EN');?> "<?php the_search_query(); ?>"</div>

<?php endif; ?>




</div><!-- /tagswrapper -->




<div id="sidebar">
<?php if ( ! dynamic_sidebar( 'Homepage Right Sidebar' ) ) :  endif; ?>
</div><!-- /sidebar -->



<?php get_footer(); ?>