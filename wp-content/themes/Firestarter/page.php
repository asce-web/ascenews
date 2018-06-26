<?php get_header(); ?>



<?php

$theme_options = get_option('option_tree');



$latestnewscategory = get_option_tree('latestnewscategory', $theme_options, false);

$latestnewsbreaking = "cat=$latestnewscategory";



$promotedpost1id = get_option_tree('promotedpost1', $theme_options, false);



$promotedpost2id = get_option_tree('promotedpost2', $theme_options, false);



$colname1 = get_option_tree('colname1', $theme_options, false);

$colname2 = get_option_tree('colname2', $theme_options, false);

$colname3 = get_option_tree('colname3', $theme_options, false);



$colauthor1 = get_option_tree('colauthor1', $theme_options, false);

$colauthor2 = get_option_tree('colauthor2', $theme_options, false);

$colauthor3 = get_option_tree('colauthor3', $theme_options, false);



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





?>



















	









<div id="homewrapper">



<div id="postpagecontent">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



















<div id="postpagetitle"><?php the_title(); ?></div>



























<div id="postpagetext">







<?php the_content('<p class="serif">Read More &raquo;</p>'); ?>	



<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>



<?php if(function_exists('wp_print')) { print_link(); } ?>



</div>

</div>











<?php endwhile; else: ?>

<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

</div>



<?php $sidebar = get_post_meta($post->ID, "sidebar", true); ?>
<?php if (!empty($sidebar)) { ?>
<div id="sidebar">
<?php if ( ! dynamic_sidebar( $sidebar ) ) :  endif; ?>
</div><!-- /sidebar -->
<?php } else { ?>
<div id="sidebar">
<?php if ( ! dynamic_sidebar( 'Homepage Right Sidebar' ) ) :  endif; ?>
</div><!-- /sidebar -->
<?php  } ?>
</div>


<?php get_footer(); ?>