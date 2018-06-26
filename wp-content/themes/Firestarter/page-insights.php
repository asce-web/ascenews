<?php get_header(); ?>

<?php

/*

Template Name: Insights Page of Posts

*/

?>

<?php
$theme_options = get_option('option_tree');



?>









<div class="main-wrapper">

<div class="into-text" span style="margin-bottom:20px;">
	<p> Welcome to <em><strong>Insights</strong></em>, a monthly podcast series with noted civil engineering industry leaders discussing their perspectives and insights into the successful practice of civil engineering. Featuring honest, straightforward viewpoints, based on unique experiences and interests, these discussions tackle a wide range of compelling issues. The series is sponsored by the <a href="http://www.asce.org/membership-and-community/industry-leaders-council/" target="_blank">ASCE Industry Leaders Council</a>.</p>

	<p>Insights is presented as a series of discrete episodes -- audio files that can be downloaded for listening anytime from portable devices such as iPods or from any personal computer.</p>
</div>	


<div id="homemiddlesection">

<?php if (! dynamic_sidebar('Homepage Middle Section')): endif; ?>


<div class="middlewrapper">

<?php 
if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }
//query_posts(array('category__in' => array(3,4,5,6,7,27), 'posts_per_page' => 10, 'paged' => $paged)); 
query_posts('posts_per_page=10&tag=insights-podcast&paged=' . $paged); 
?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<?php
            foreach((get_the_category()) as $category) { 
                //echo $category->cat_name . ' '; 
            if($category->cat_ID != '16' && $category->parent == 0) {
            $categoryname = $category->cat_name;
            $category_ID =  $category->cat_ID;

            $saved_data = get_tax_meta($category_ID,'color_field_id');
            }

        } 
        ?>

<div class="homepostwrapper">
<div class="homeregularpost">
<div class="homecategorytitle tagtitle" style="background-color:<?php echo $saved_data;?>;"><h1><?php echo $tag->name . 'Insights Podcast'; ?></h1></div>
<?php if ( has_post_thumbnail() ) { ?>
<div class="homeregularimg">

<div class="homeregularimgfirst"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('homeregularthumb');} ?></div><!-- /homeregularimgfirst -->




</div><!-- /homeregularimg -->
<?php  } ?>



<div class="homeregulartitle">
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
</div><!-- /homeregulartitle -->

<div class="homepostsmeta"><?php the_time(get_option('date_format')); ?></div><!-- /homepostsmeta -->

<div class="homeregularexcerpt"><p><?php the_excerpt(); ?></p></div><!-- /homeregularexcerpt -->





<div class="homepostsinfo"> <!--homepostsmeta goes below originally -->



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
<!-- /homepostsinfo -->

</div>



</div><!-- /homeregularpost -->
</div>

<?php endwhile; ?>
<?php if(function_exists('wp_paginate')) {
    wp_paginate();
} ?>
<?php endif; ?>




</div><!-- /middlewrapper -->


</div><!-- /homemiddlesection -->





<div id="sidebar">
<?php if ( ! dynamic_sidebar( 'Homepage Right Sidebar' ) ) :  endif; ?>
</div><!-- /sidebar -->
</div>












<?php get_footer(); ?>  