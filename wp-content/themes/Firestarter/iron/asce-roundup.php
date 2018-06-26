<?php 
if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }
//query_posts(array('category__in' => array(3,4,5,6,7,27), 'posts_per_page' => 10, 'paged' => $paged)); 
query_posts('posts_per_page=6&cat=-16,-19,-20,-7&paged=' . $paged); 
?>

<?php if (have_posts()) : ?>
<?php /* <div class="recent-posts block-header" style="margin: 0 0 1em; padding: 0; border: 0 none;">ASCE Roundup</div><div class="iron-fp-posts"> */ ?>
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
<?php
#foreach((get_the_category()) as $category) { 
   //echo $category->cat_name . ' '; 
#    if($category->parent == 0) {//this makes sure to display the parent category name if post is tagged to parent and child category like ASCE News
#	$categoryname = $category->cat_name;
#    }
#} 
?>
<?php 
#$category = get_the_category();

#$category_ID =  $category[0]->cat_ID;

#$saved_data = get_tax_meta($category_ID,'color_field_id');

#$catlink = get_category_link($category[0]->term_id); 

?>

<div class="homepostwrapper">
<div class="homeregularpost">
<?php /* <div class="homecategorytitle" style="background-color:<?php echo $saved_data;?>;"><h1><?php if (has_tag('insights-podcast')) { echo $tag->name . 'Insights Podcast'; } else { echo $categoryname; }?></h1></div> */ ?>
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

<!-- /homepostsinfo -->

</div>



</div><!-- /homeregularpost -->
</div>
<?php endwhile; wp_reset_query(); ?>
</div>
<?php if(function_exists('wp_paginate')) {
    //wp_paginate();
} ?>
<?php endif; ?>
<a class="view-all-posts-link" href="/site-archives" style="font-weight: bold;">All News</a>