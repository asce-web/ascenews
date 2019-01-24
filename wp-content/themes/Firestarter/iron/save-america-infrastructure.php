<?php 
//if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
//elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
//else { $paged = 1; }
//query_posts(array('category__in' => array(3,4,5,6,7,27), 'posts_per_page' => 10, 'paged' => $paged)); 
//query_posts('posts_per_page=4&cat=7&paged=' . $paged);


	include_once( ABSPATH . WPINC . '/feed.php' );
	$rss = fetch_feed( 'http://infrastructurereportcard.org/feed/?post_type=asce_news_cpt' );
	$maxitems = 0;
	if ( ! is_wp_error( $rss ) ) :
		$maxitems = $rss->get_item_quantity( 4 ); 
		$rss_items = $rss->get_items( 0, $maxitems );
	endif;

?>

<?php if ( $maxitems == 0 ) : ?>
	<p><?php _e( 'No items', 'my-text-domain' ); ?></p>
<?php else : ?>

<div style="margin: 0 0 1em; padding: 0; border: 0 none;" class="recent-posts block-header">Save America's Infrastructure<a href="https://www.infrastructurereportcard.org"><img src="/wp-content/themes/Firestarter/images/asce.png" alt="Save America's Infrastructure" /></a></div>
<div class="iron-fp-posts">
<?php foreach ( $rss_items as $item ) : ?>
<?php
/*
            foreach((get_the_category()) as $category) { 
                //echo $category->cat_name . ' '; 
            if($category->cat_ID != '16' && $category->parent == 0) {
            $categoryname = $category->cat_name;
            $category_ID =  $category->cat_ID;

            $saved_data = get_tax_meta($category_ID,'color_field_id');
            }

        } */
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
<?php if ( has_post_thumbnail() ) { ?>
<div class="homeregularimg">

<div class="homeregularimgfirst"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('homeregularthumb');} ?></div><!-- /homeregularimgfirst -->




</div><!-- /homeregularimg -->
<?php  } ?>



<div class="homeregulartitle">
<h2><a target="_blank" href="<?php echo esc_url( $item->get_permalink() ); ?>"><?php echo esc_html( $item->get_title() ); ?></a></h2>
</div><!-- /homeregulartitle -->

<div class="homepostsmeta"><?php echo $item->get_date('F d, Y'); ?></div><!-- /homepostsmeta -->
<style>.iron-remove-inline-a .more-link {display:none;}</style>
<div class="homeregularexcerpt iron-remove-inline-a"><p class="excerpt"><?php echo strip_tags($item->get_description(), '<a>'); ?><p><a style="text-decoration: underline;" target="_blank" href="<?php echo esc_url( $item->get_permalink() ); ?>">Read More &gt;&gt;</a></p></div><!-- /homeregularexcerpt -->





<div class="homepostsinfo"> <!--homepostsmeta goes below originally -->



<?php /*<div class="homepostsauthormeta">BY&nbsp; <?php the_author_posts_link(); ?></div><!-- /homepostsauthormeta --> */ ?>
<?php /*
<div id="posttags">
<?php the_tags( '<p>','','</p>'); ?>
</div>
*/ ?>

<!-- /homepostsinfo -->

</div>



</div><!-- /homeregularpost -->
</div>
<?php endforeach; ?>
</div>
<?php if(function_exists('wp_paginate')) {
    //wp_paginate();
} ?>
<?php endif; ?>
<a target="_blank" class="view-all-posts-link" href="http://www.infrastructurereportcard.org/save-americas-infrastructure/" style="font-weight: bold;">All Save America's Infrastructure Posts</a>