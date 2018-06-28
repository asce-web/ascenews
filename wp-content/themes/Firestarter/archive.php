<?php get_header(); ?>

<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>

<?php
$theme_options = get_option('option_tree');


$colauthor1 = get_option_tree('colauthor1', $theme_options, false);
$colauthor2 = get_option_tree('colauthor2', $theme_options, false);
$colauthor3 = get_option_tree('colauthor3', $theme_options, false);
$colauthor4 = get_option_tree('colauthor4', $theme_options, false);


$adleft1 = get_option_tree('adleft1', $theme_options, false);
$adleft2 = get_option_tree('adleft2', $theme_options, false);
$adleft3 = get_option_tree('adleft3', $theme_options, false);


?>





<div class="arch-wrapper">

<!-- <h1>Posts from this month</h1> -->

<div class="arch-main-content">

<?php if (have_posts()) :  query_posts($query_string .'&cat=-3955,-3956,-29'); ?>
<?php while (have_posts()) : the_post(); ?>
<div class="arch-post">


<?php if ( has_post_thumbnail() ) { ?>
<div class="homeregularimg">

<div class="homeregularimgfirst">
	<?php if ( has_post_thumbnail() ) {the_post_thumbnail('channelthumb');} ?>
</div><!-- /homeregularimgfirst -->

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
</div>
<?php endwhile; ?>
<?php if(function_exists('wp_paginate')) {
    wp_paginate();
} ?>
<?php endif; ?>
</div><!-- /arch-main-content -->




</div>


<div id="sidebar">
<?php if ( ! dynamic_sidebar( 'Homepage Right Sidebar' ) ) :  endif; ?>
</div><!-- /sidebar -->



<?php get_footer(); ?>
