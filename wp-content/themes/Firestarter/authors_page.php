<?php get_header(); ?>

<?php

/*

Template Name: All Authors

*/

?>


<?php

$theme_options = get_option('option_tree');

$author1 = get_option_tree('author1', $theme_options, false);

$author2 = get_option_tree('author2', $theme_options, false);

$author3 = get_option_tree('author3', $theme_options, false);

$author4 = get_option_tree('author4', $theme_options, false);

$author5 = get_option_tree('author5', $theme_options, false);

$author6 = get_option_tree('author6', $theme_options, false);

$author7 = get_option_tree('author7', $theme_options, false);

$author8 = get_option_tree('author8', $theme_options, false);

$author9 = get_option_tree('author9', $theme_options, false);

$author10 = get_option_tree('author10', $theme_options, false);

$author11 = get_option_tree('author11', $theme_options, false);

$author12 = get_option_tree('author12', $theme_options, false);

$author13 = get_option_tree('author13', $theme_options, false);

$author14 = get_option_tree('author14', $theme_options, false);

$author15 = get_option_tree('author15', $theme_options, false);

$author16 = get_option_tree('author16', $theme_options, false);

$author17 = get_option_tree('author17', $theme_options, false);

$author18 = get_option_tree('author18', $theme_options, false);

$author19 = get_option_tree('author19', $theme_options, false);

$author20 = get_option_tree('author20', $theme_options, false);

$author21 = get_option_tree('author21', $theme_options, false);

$author22 = get_option_tree('author22', $theme_options, false);

$author23 = get_option_tree('author23', $theme_options, false);

$author24 = get_option_tree('author24', $theme_options, false);

$staffgroup1title = get_option_tree('staffgroup1title', $theme_options, false);
$staffgroup2title = get_option_tree('staffgroup2title', $theme_options, false);
$staffgroup3title = get_option_tree('staffgroup3title', $theme_options, false);

$latestnewscategory = get_option_tree('latestnewscategory', $theme_options, false);
$latestnewsbreaking = "cat=$latestnewscategory";

$colauthor1 = get_option_tree('colauthor1', $theme_options, false);
$colauthor2 = get_option_tree('colauthor2', $theme_options, false);
$colauthor3 = get_option_tree('colauthor3', $theme_options, false);
$colauthor4 = get_option_tree('colauthor4', $theme_options, false);

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

$newsthumb1cat = get_option_tree('newsthumb1cat', $theme_options, false);
$newsthumb2cat = get_option_tree('newsthumb2cat', $theme_options, false);
$tf_enable_columnists = get_option_tree('tf_enable_columnists', $theme_options, false);
$adleft1 = get_option_tree('adleft1', $theme_options, false);
$adleft2 = get_option_tree('adleft2', $theme_options, false);
$adleft3 = get_option_tree('adleft3', $theme_options, false);
$tf_enable_feedblock = get_option_tree('tf_enable_feedblock', $theme_options, false);

?>


<div id="homecolumn">
<?php if ( ! dynamic_sidebar( 'Homepage Left Sidebar' ) ) :  endif; ?>
</div><!-- /homecolumn -->



<div id="authormiddlesection">


<?php if ($staffgroup1title !== NULL) { ?>
<div class="staffgroup">
<div class="stafftitlewrapper"><div class="stafftitle"><?php echo $staffgroup1title; ?></div></div>

<?php if ($author1 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author1 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author1 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author1 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>


<?php if ($author2 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author2 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author2 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author2 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>


<?php if ($author3 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author3 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author3 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author3 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>

<?php if ($author4 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author4 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author4 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author4 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>

<?php if ($author5 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author5 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author5 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author5 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>


<?php if ($author6 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author6 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author6 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author6 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>

<?php if ($author7 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author7 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author7 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author7 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>

<?php if ($author8 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author8 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author8 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author8 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>




<?php if ($author9 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author9 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author9 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author9 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>


<?php if ($author10 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author10 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author10 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author10 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>

<?php if ($author11 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author11 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author11 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author11 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>

<?php if ($author12 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author12 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author12 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author12 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>

<?php if ($author13 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author13 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author13 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author13 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>

<?php if ($author14 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author14 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author14 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author14 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>

<?php if ($author15 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author15 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author15 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author15 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>

<?php if ($author16 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author16 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author16 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author16 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>



</div><!-- /staffgroup -->
<?php } ?>


<?php if ($staffgroup2title !== NULL) { ?>
<div class="staffgroup">
<div class="stafftitlewrapper"><div class="stafftitle"><?php echo $staffgroup2title; ?></div></div>


<?php if ($author17 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author17 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author17 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author17 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>


<?php if ($author18 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author18 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author18 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author18 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>

<?php if ($author19 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author19 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author19 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author19 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>

<?php if ($author20 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author20 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author20 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author20 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>

<?php if ($author21 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author21 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author21 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author21 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>

<?php if ($author22 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author22 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author22 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author22 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>

<?php if ($author23 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author23 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author23 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author23 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>

<?php if ($author24 !== NULL) { ?>
<?php $name = get_the_author_meta( 'display_name', $author24 ); ?>
<div class="authormugshot">
<a href="<?php echo get_author_posts_url( $author24 ); ?>"><?php echo get_wp_user_avatar( get_the_author_meta( 'user_email', $author24 ), apply_filters( 'twentyten_author_bio_avatar_size', 117 ) ); ?>
<?php echo $name; ?></a>
</div><!-- /authormugshot -->
<?php } ?>



</div><!-- /staffgroup -->
<?php } ?>


</div><!-- /authormiddlesection -->



<div id="sidebar">
<?php if ( ! dynamic_sidebar( 'Homepage Right Sidebar' ) ) :  endif; ?>
</div><!-- /sidebar -->

<?php if ($tf_enable_feedblock !== NULL) { ?>
<?php get_template_part( 'feedblock' ); ?>
<?php } ?>

<?php get_footer(); ?>