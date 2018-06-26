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





<div id="homemiddlesection" class="search-page">


<?php 
$category = get_the_category();

$category_ID =  $category[0]->cat_ID;

$saved_data = get_tax_meta($category_ID,'color_field_id');

$catlink = get_category_link($category[0]->term_id); 

?>
<div class="homecategorytitle" style="background-color:<?php echo $tf_uniformcolor;?>;">
<?php _e('Search results for: ', 'TF_EN');?><?php# get_search_query(); ?><?php the_search_query(); ?>
</div><!-- /homecategorytitle -->

<div class="middlewrapper">
<?php 
if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }
//query_posts(array('category__in' => array(3,4,5,6,7,27), 'posts_per_page' => 10, 'paged' => $paged)); 
query_posts($query_string . '&posts_per_page=-1&paged=' . $paged); 
?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<?php
foreach((get_the_category()) as $category) { 
   //echo $category->cat_name . ' '; 
    if($category->parent == 0) {//this makes sure to display the parent category name if post is tagged to parent and child category like ASCE News
	$categoryname = $category->cat_name;
    }
} 
?>
<div class="search-results">
<div class="homeregulartitle">
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
</div>
<div class="homepostsmeta"><?php the_time(get_option('date_format')); ?></div><!-- /homepostsmeta -->

<div class="homeregularexcerpt searchpage"><p><?php echo get_excerpt(200); ?></p></div><!-- /homeregularexcerpt -->
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
<?php wp_reset_query(); ?>
<?php else : ?>
<div class="noresult"><?php _e('Unfortunately, we have no results for:', 'TF_EN');?> "<?php the_search_query(); ?>"</div>
<?php endif; ?>
</div><!-- /middlewrapper -->

</div><!-- /homemiddlesection -->


<!-- <div id="sidebar">
<?php #if ( ! dynamic_sidebar( 'Homepage Right Sidebar' ) ) :  endif; ?>
</div>/sidebar -->



<?php get_footer(); ?>