<?php get_header(); ?>

<?php
$theme_options = get_option('option_tree');



$colname1 = get_option_tree('colname1', $theme_options, false);
$colname2 = get_option_tree('colname2', $theme_options, false);
$colname3 = get_option_tree('colname3', $theme_options, false);

$colauthor1 = get_option_tree('colauthor1', $theme_options, false);
$colauthor2 = get_option_tree('colauthor2', $theme_options, false);
$colauthor3 = get_option_tree('colauthor3', $theme_options, false);


#$category = get_the_category();

#$category_ID =  $category[0]->cat_ID;

#$saved_data = get_tax_meta($category_ID,'color_field_id');

$classes = "no-post-header";

?>








<div id="homewrapper">

<div id="postcontent">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

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




<div id="posttitlesection">

<div id="posttitle"><h1><?php the_title(); ?></h1></div>

<!-- <div class="homepostsauthormeta">BY&nbsp; <?php the_author_posts_link(); ?></div> -->

<?php $author = get_post_meta($post->ID, 'Author', true);
if($author){ ?>
	<div class="homepostauthormeta">BY&nbsp;<?php echo $author;?></div><?php }
	else{ ?>
		<div class="homepostauthormeta">BY&nbsp;<?php the_author_posts_link(); ?></div> <?php } ?>
            
<div id="singlepostinfo">
<?php the_time(get_option('date_format')); ?> 
</div><!-- /singlepostinfo -->

<div id="posttags">
<?php the_tags( '<p>','','</p>'); ?>
</div>









</div><!-- /posttitlesection -->







<div id="posttext">



<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="single-content">
<?php if ( has_post_thumbnail() ) { ?>
<div id="postthumb">
    <?php the_post_thumbnail('pthumb'); ?>
    <div class="post-caption">
    <?php the_post_thumbnail_caption(); ?>
    </div>
</div>
<?php  } ?>    
<?php the_content('<p class="serif">Read More &raquo;</p>'); ?>
</div>

<div class="insights-callout">
<?php if (has_tag('insights-podcast')) : print '<p>Like what you heard? Subscribe to the Insights Podcast series via <a href="/tag/insights-podcast/feed/?insights-podcast=podcasts">RSS</a> or <a href="https://itunes.apple.com/podcast/insights/id307009757">iTunes</a>. Be sure to check out <a href="/insights">past episodes of Insights</a>, sponsored by the <a href="http://www.asce.org/membership-and-community/industry-leaders-council/">ASCE Industry Leaders Council</a>.'; ?>
<?php endif; ?>
</div>

<div id="posttags">
    <?php if (has_tag()): ?>
	<div class="tagtitle">Tagged as:</div>
    <?php endif; ?>
    <?php the_tags( '<div>','','</div>'); ?>
</div>
<div class="sharing">
	<div class="sharing-header">Share</div>
	<?php /*do_action( 'addthis_widget', get_permalink(), get_the_title(), array(
    'size' => '16', // size of the icons.  Either 16 or 32
    'services' => 'facebook,twitter,google_plusone_share,linkedin,pinterest_share,email', // the services you want to always appear
    'preferred' => '0', // the number of auto personalized services
    'more' => false // if you want to have a more button at the end
    ));*/
    ?>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <div class="addthis_sharing_toolbox" data-url="<?php the_permalink(); ?>" data-title="<?php the_title_attribute(); ?>"></div>
</div>
<!--<div class="cf-meta">
    <?php# echo the_meta(); ?>
</div>-->
<div class="related">
<?php zemanta_related_posts(); ?>
</div>
</div>	

<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

<?php if(function_exists('wp_print')) { print_link(); } ?>

</div>
</div>



<!--/authorbox-->

<div class="postborder" style="
background-color: <?php echo $saved_data;?>; 
background-image: url(<?php echo get_template_directory_uri();?>/images/txborder.png);"></div>

<div id="comments">
<?php comments_template( '/comments.php' ); ?>

</div>
<?php endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
</div>



<div id="sidebar">
<?php if ( ! dynamic_sidebar( 'Homepage Right Sidebar' ) ) :  endif; ?>
</div><!-- /sidebar -->


</div>

<?php if (has_tag('insights-podcast') || is_category('1') && is_single()) : ?>
    <script>
        $("div#homewrapper").attr('id','no-post-header');
    </script>
<?php endif; ?>
<?php get_footer(); ?>