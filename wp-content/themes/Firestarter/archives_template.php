<?php

/*
Template Name: Archive Template
*/

get_header(); ?>

<?php
add_filter( 'getarchives_where', 'customarchives_where' );

function customarchives_where( $x ) {

	global $wpdb;

	$s = $x;

	$s =  $s . " AND $wpdb->posts.ID IN ";

	$s = $s . "(";
	$s = $s . "SELECT $wpdb->posts.ID FROM $wpdb->posts INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) INNER JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id) WHERE $wpdb->term_taxonomy.taxonomy = 'category'";

	$exclude = '3955,3956,28,29'; // category id or list of id's to exclude

	$s = $s . " AND $wpdb->term_taxonomy.term_id NOT IN ($exclude)";
	$s = $s . ")";

	return $s;

}
 ?>


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
<?php
$category = get_the_category();

$category_ID =  $category[0]->cat_ID;

$saved_data = get_tax_meta($category_ID,'color_field_id');

$tf_uniformcolor = get_option_tree('tf_uniformcolor', $theme_options, false);

$catlink = get_category_link($category[0]->term_id);

?>

<div id="archive-container">
	<div id="archive-content" role="main">

		<div class="category-header"><a href="/site-archives/">Archives</a></div>

		<select class="archive-dropdown" name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
  		<option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option>
 		<?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
		</select>

			<?php $args = array(
				'type'            => 'postbypost',
				'limit'           => '',
				'format'          => 'html',
				'before'          => '',
				'after'           => '',
				'show_post_count' => false,
				'echo'            => 1,
				'order'           => 'DESC'
			); ?>


		<ul class="archive-listing">
		<?php wp_get_archives( $args ); ?>
		</ul>
	</div>
</div><!-- #content -->
	<div id="sidebar">
	<?php if ( ! dynamic_sidebar( 'Homepage Right Sidebar' ) ) :  endif; ?>
	</div><!-- /sidebar -->
</div><!-- #container -->




<?php get_footer(); ?>
