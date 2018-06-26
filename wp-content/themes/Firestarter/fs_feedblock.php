<?php
$theme_options = get_option('option_tree');
$tf_enable_feedblock = get_option_tree('tf_enable_feedblock', $theme_options, false);
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

<div id="feedblock">



<div id="feedboxfirst">

<?php query_posts('showposts=1&' . $feedbox1breaking ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<?php 
$category_ID =  $feedboxcat1;
$categoryname = get_the_category_by_ID($category_ID);
$saved_data = get_tax_meta($category_ID,'color_field_id');
$catlink = get_category_link($category_ID);
?>


<div class="feedboximg"><a href="<?php the_permalink() ?>"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('feedthumb');} ?>

<?php if ( has_post_format( 'quote' )) {
echo '<img src="' . get_template_directory_uri() . '/images/quotebig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'gallery' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/gallerybig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'video' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/videobig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'audio' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/audiobig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
else {
  echo '<img src="' . get_template_directory_uri() . '/images/articlebig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; } ?>

</a>

<div class="homeonebigsmallcatname" style="background-color:<?php echo $saved_data;?>;">
<a href="<?php echo $catlink ;?>"><?php echo $categoryname ;?></a>
</div><!-- /homeonebigsmallcatname -->

<div class="feedposttitletop" style=" border-bottom:6px solid; border-bottom-color:<?php echo $saved_data;?>;">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div><!-- /feedposttitletop -->

</div><!-- /feedpostimg -->


<?php endwhile; ?>
<?php endif; ?>

<?php query_posts( $feedbox1breaking . '&posts_per_page=4&offset=1' ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="feedposttitle">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div><!-- /feedposttitle -->

<?php endwhile; ?>
<?php endif; ?>

<?php query_posts( $feedbox1breaking . '&posts_per_page=1&offset=5' ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="feedposttitlelast">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div><!-- /feedposttitlelast -->

<?php endwhile; ?>
<?php endif; ?>

</div><!-- /feedboxfirst -->





<div class="feedbox">

<?php query_posts('showposts=1&' . $feedbox2breaking ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<?php 
$category_ID =  $feedboxcat2;
$categoryname = get_the_category_by_ID($category_ID);
$saved_data = get_tax_meta($category_ID,'color_field_id');
$catlink = get_category_link($category_ID);
?>


<div class="feedboximg"><a href="<?php the_permalink() ?>"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('feedthumb');} ?>

<?php if ( has_post_format( 'quote' )) {
echo '<img src="' . get_template_directory_uri() . '/images/quotebig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'gallery' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/gallerybig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'video' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/videobig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'audio' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/audiobig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
else {
  echo '<img src="' . get_template_directory_uri() . '/images/articlebig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; } ?>

</a>

<div class="homeonebigsmallcatname" style="background-color:<?php echo $saved_data;?>;">
<a href="<?php echo $catlink ;?>"><?php echo $categoryname ;?></a>
</div><!-- /homeonebigsmallcatname -->


<div class="feedposttitletop" style=" border-bottom:6px solid; border-bottom-color:<?php echo $saved_data;?>;">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div><!-- /feedposttitletop -->

</div><!-- /feedpostimg -->

<?php endwhile; ?>
<?php endif; ?>

<?php query_posts( $feedbox2breaking . '&posts_per_page=4&offset=1' ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="feedposttitle">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div><!-- /feedposttitle -->

<?php endwhile; ?>
<?php endif; ?>

<?php query_posts( $feedbox2breaking . '&posts_per_page=1&offset=5' ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="feedposttitlelast">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div><!-- /feedposttitlelast -->

<?php endwhile; ?>
<?php endif; ?>

</div><!-- /feedbox -->





<div class="feedbox">

<?php query_posts('showposts=1&' . $feedbox3breaking ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<?php 
$category_ID =  $feedboxcat3;
$categoryname = get_the_category_by_ID($category_ID);
$saved_data = get_tax_meta($category_ID,'color_field_id');
$catlink = get_category_link($category_ID);
?>



<div class="feedboximg"><a href="<?php the_permalink() ?>"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('feedthumb');} ?>

<?php if ( has_post_format( 'quote' )) {
echo '<img src="' . get_template_directory_uri() . '/images/quotebig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'gallery' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/gallerybig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'video' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/videobig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'audio' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/audiobig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
else {
  echo '<img src="' . get_template_directory_uri() . '/images/articlebig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; } ?>

</a>


<div class="homeonebigsmallcatname" style="background-color:<?php echo $saved_data;?>;">
<a href="<?php echo $catlink ;?>"><?php echo $categoryname ;?></a>
</div><!-- /homeonebigsmallcatname -->

<div class="feedposttitletop" style=" border-bottom:6px solid; border-bottom-color:<?php echo $saved_data;?>;">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div><!-- /feedposttitletop -->

</div><!-- /feedpostimg -->

<?php endwhile; ?>
<?php endif; ?>

<?php query_posts( $feedbox3breaking . '&posts_per_page=4&offset=1' ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="feedposttitle">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div><!-- /feedposttitle -->

<?php endwhile; ?>
<?php endif; ?>

<?php query_posts( $feedbox3breaking . '&posts_per_page=1&offset=5' ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="feedposttitlelast">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div><!-- /feedposttitlelast -->

<?php endwhile; ?>
<?php endif; ?>

</div><!-- /feedbox -->





<div class="feedbox">

<?php query_posts('showposts=1&' . $feedbox4breaking ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<?php 
$category_ID =  $feedboxcat4;
$categoryname = get_the_category_by_ID($category_ID);
$saved_data = get_tax_meta($category_ID,'color_field_id');
$catlink = get_category_link($category_ID);
?>



<div class="feedboximg"><a href="<?php the_permalink() ?>"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('feedthumb');} ?>

<?php if ( has_post_format( 'quote' )) {
echo '<img src="' . get_template_directory_uri() . '/images/quotebig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'gallery' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/gallerybig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'video' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/videobig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'audio' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/audiobig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
else {
  echo '<img src="' . get_template_directory_uri() . '/images/articlebig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; } ?>

</a>

<div class="homeonebigsmallcatname" style="background-color:<?php echo $saved_data;?>;">
<a href="<?php echo $catlink ;?>"><?php echo $categoryname ;?></a>
</div><!-- /homeonebigsmallcatname -->


<div class="feedposttitletop" style=" border-bottom:6px solid; border-bottom-color:<?php echo $saved_data;?>;">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div><!-- /feedposttitletop -->

</div><!-- /feedpostimg -->

<?php endwhile; ?>
<?php endif; ?>

<?php query_posts( $feedbox4breaking . '&posts_per_page=4&offset=1' ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="feedposttitle">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div><!-- /feedposttitle -->

<?php endwhile; ?>
<?php endif; ?>

<?php query_posts( $feedbox4breaking . '&posts_per_page=1&offset=5' ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="feedposttitlelast">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div><!-- /feedposttitlelast -->

<?php endwhile; ?>
<?php endif; ?>

</div><!-- /feedbox -->






<div class="feedbox">

<?php query_posts('showposts=1&' . $feedbox5breaking ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<?php 
$category_ID =  $feedboxcat5;
$categoryname = get_the_category_by_ID($category_ID);
$saved_data = get_tax_meta($category_ID,'color_field_id');
$catlink = get_category_link($category_ID);
?>



<div class="feedboximg"><a href="<?php the_permalink() ?>"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('feedthumb');} ?>

<?php if ( has_post_format( 'quote' )) {
echo '<img src="' . get_template_directory_uri() . '/images/quotebig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'gallery' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/gallerybig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'video' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/videobig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'audio' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/audiobig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
else {
  echo '<img src="' . get_template_directory_uri() . '/images/articlebig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; } ?>

</a>

<div class="homeonebigsmallcatname" style="background-color:<?php echo $saved_data;?>;">
<a href="<?php echo $catlink ;?>"><?php echo $categoryname ;?></a>
</div><!-- /homeonebigsmallcatname -->


<div class="feedposttitletop" style=" border-bottom:6px solid; border-bottom-color:<?php echo $saved_data;?>;">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div><!-- /feedposttitletop -->

</div><!-- /feedpostimg -->

<?php endwhile; ?>
<?php endif; ?>

<?php query_posts( $feedbox5breaking . '&posts_per_page=4&offset=1' ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="feedposttitle">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div><!-- /feedposttitle -->

<?php endwhile; ?>
<?php endif; ?>

<?php query_posts( $feedbox5breaking . '&posts_per_page=1&offset=5' ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="feedposttitlelast">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div><!-- /feedposttitlelast -->

<?php endwhile; ?>
<?php endif; ?>

</div><!-- /feedbox -->







<div class="feedbox">

<?php query_posts('showposts=1&' . $feedbox6breaking ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<?php 
$category_ID =  $feedboxcat6;
$categoryname = get_the_category_by_ID($category_ID);
$saved_data = get_tax_meta($category_ID,'color_field_id');
$catlink = get_category_link($category_ID);
?>



<div class="feedboximg"><a href="<?php the_permalink() ?>"><?php if ( has_post_thumbnail() ) {the_post_thumbnail('feedthumb');} ?>

<?php if ( has_post_format( 'quote' )) {
echo '<img src="' . get_template_directory_uri() . '/images/quotebig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'gallery' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/gallerybig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'video' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/videobig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
elseif ( has_post_format( 'audio' )) {
  echo '<img src="' . get_template_directory_uri() . '/images/audiobig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; }
else {
  echo '<img src="' . get_template_directory_uri() . '/images/articlebig.png" alt="watermark" class="watermark" height="64px" width="64px" />'; } ?>

</a>


<div class="homeonebigsmallcatname" style="background-color:<?php echo $saved_data;?>;">
<a href="<?php echo $catlink ;?>"><?php echo $categoryname ;?></a>
</div><!-- /homeonebigsmallcatname -->

<div class="feedposttitletop" style=" border-bottom:6px solid; border-bottom-color:<?php echo $saved_data;?>;">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div><!-- /feedposttitletop -->

</div><!-- /feedpostimg -->

<?php endwhile; ?>
<?php endif; ?>

<?php query_posts( $feedbox6breaking . '&posts_per_page=4&offset=1' ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="feedposttitle">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div><!-- /feedposttitle -->

<?php endwhile; ?>
<?php endif; ?>

<?php query_posts( $feedbox6breaking . '&posts_per_page=1&offset=5' ); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="feedposttitlelast">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div><!-- /feedposttitlelast -->

<?php endwhile; ?>
<?php endif; ?>

</div><!-- /feedbox -->




</div><!-- /feedblock -->