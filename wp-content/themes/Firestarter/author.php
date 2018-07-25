<?php get_header(); ?>

<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>

<?php
$theme_options = get_option('option_tree');



$colauthor1 = get_option_tree('colauthor1', $theme_options, false);
$colauthor2 = get_option_tree('colauthor2', $theme_options, false);
$colauthor3 = get_option_tree('colauthor3', $theme_options, false);
$colauthor4 = get_option_tree('colauthor4', $theme_options, false);


$tf_enable_columnists = get_option_tree('tf_enable_columnists', $theme_options, false);
$adleft1 = get_option_tree('adleft1', $theme_options, false);
$adleft2 = get_option_tree('adleft2', $theme_options, false);
$adleft3 = get_option_tree('adleft3', $theme_options, false);


?>







<div class="author-posts-wrapper">

<div class="middlewrapper">
<div id="authorpagebioname">
<?php echo $curauth->display_name; ?>
</div>

<div id="authorpagebox">

<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>

<?php $authorID = $curauth->ID; ?>



<div id="authorpageimg">
<?php  echo get_wp_user_avatar( get_the_author_meta( 'user_email', $authorID ), apply_filters( 'twentyten_author_bio_avatar_size', 80 ) );

?>
</div>



<div id="authorpagebio">
<p><?php echo $curauth->user_description; ?></p>
</div>



</div><!--/authorpagebox-->







<div class="author-posts-by">
Posts by this contributor
</div><!-- /authorposts -->

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<?php
#foreach((get_the_category()) as $category) {
#   //echo $category->cat_name . ' ';
#	$categoryname = $category->cat_name;
#}
?>
<?php
#$category = get_the_category();

#$category_ID =  $category[0]->cat_ID;

#$saved_data = get_tax_meta($category_ID,'color_field_id');

#$catlink = get_category_link($category[0]->term_id);

?>
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

<div class="homeregularpost">
<div class="homecategorytitle" style="background-color:<?php echo $saved_data;?>;"><h1><?php echo $categoryname; ?></h1></div>

<?php if ( has_post_thumbnail() ) { ?>
<div class="homeregularimg">
<div class="homeregularimgfirst"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('channelthumb');} ?></div><!-- /homeregularimgfirst -->
</div><!-- /homeregularimg -->
<?php  } ?>
<div class="homeregulartitle">
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
</div><!-- /homeregularpost -->

<?php endwhile; ?>


<?php if(function_exists('wp_paginate')) {
    wp_paginate();
} ?>
<?php endif; ?>
</div><!-- /middlewrapper -->

</div>


<div id="sidebar">
<?php if ( ! dynamic_sidebar( 'Homepage Right Sidebar' ) ) :  endif; ?>
</div><!-- /sidebar -->



<?php get_footer(); ?>
