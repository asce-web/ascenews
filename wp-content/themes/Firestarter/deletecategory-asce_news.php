<?php get_header(); ?>






<?php

$theme_options = get_option('option_tree');







?>
<div class="cat-main-content">
<div class="cat-wrapper">


<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="category-post">

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
</div>
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
</div>
<?php endwhile; ?>
<?php if(function_exists('wp_paginate')) {
    wp_paginate();
} ?>
<?php endif ?>

</div>
</div>
<div id="sidebar" class="cat-sidebar">
<?php if ( ! dynamic_sidebar( 'Homepage Right Sidebar' ) ) :  endif; ?>
</div><!-- /sidebar -->

<?php get_footer(); ?>