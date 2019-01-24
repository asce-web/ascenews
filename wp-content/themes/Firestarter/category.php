<?php get_header(); ?>






<?php

$current_category = single_cat_title("", false);

$theme_options = get_option('option_tree');

$category = get_the_category();

$category_ID =  $category[0]->cat_ID;

$saved_data = get_tax_meta($category_ID,'color_field_id');

$displaySeriesImage = get_post_meta($post->ID, 'series_image', true);

foreach((get_the_category()) as $category) { 
   //echo $category->cat_name . ' '; 
    if($category->parent == 0) {//this makes sure to display the parent category name if post is tagged to parent and child category like ASCE News
    $categoryname = $category->cat_name;
    }
}

?>
<?php if (is_subcategory()) : ?>

	<div class="category-title"><?php single_tag_title(); ?></div>
<?php endif; ?>


<div class="cat-main-content">
	
<div class="cat-wrapper">

<div class="category-header">
        <a href="/category/<?php echo get_category(get_query_var('cat'))->slug; ?>"><?php print $current_category; ?></a>

            <?php
            #foreach((get_the_category()) as $childcat) 
            #{
            #$parentcat = $childcat->category_parent;
            #if( $parentcat != 0 ) echo '<a class="category-title-link" href="' . get_category_link($parentcat) .'">' .get_cat_name($parentcat) .'</a>';
            
            #}
            ?>
</div>
<div class="mobile-header" style="background-color:#015DAA;"><?php echo '<h1>'.$current_category.'</h1>'; ?></div>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="category-post">

<?#php if ( has_post_thumbnail() ) { ?>
<div class="homeregularimg">

<div class="homeregularimgfirst">
    <?php
//if custom field isn't blank
if ($displaySeriesImage !== '' ) { ?>
<div class="cf-image"><img src="<?php echo $displaySeriesImage; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></div>
<?php } else if (has_post_thumbnail()) { ?>
<?php
//show featured image
the_post_thumbnail('channelthumb');
?>
<?php } ?>
</div><!-- /homeregularimgfirst -->




</div><!-- /homeregularimg -->
<?#php  } ?>
<div class="homeregulartitle">
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
</div><!-- /homeregulartitle -->
<div class="homepostsmeta"><?php the_time(get_option('date_format')); ?></div><!-- /homepostsmeta -->

<div class="homeregularexcerpt"><p><?php the_excerpt(); ?></p></div><!-- /homeregularexcerpt -->
<!-- <div class="homepostsauthormeta">BY&nbsp; <?php the_author_posts_link(); ?></div> --> <!-- /homepostsauthormeta -->

<?php $author = get_post_meta($post->ID, 'Author', true);
if($author){ ?>
    <div class="homepostauthormeta">BY&nbsp;<?php echo $author;?></div><?php }
else{ ?>
    <div class="homepostauthormeta">BY&nbsp;<?php the_author_posts_link(); ?></div> <?php } ?>
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