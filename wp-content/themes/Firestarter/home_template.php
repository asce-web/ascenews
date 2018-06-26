<?php get_header(); ?>

<?php

/*

Template Name: Homepage

*/

?>

<?php
$theme_options = get_option('option_tree');



?>






<?php if ( is_front_page() && !is_paged() ): ?>
	

	<div id="featured-post">
		<?php if ( ! dynamic_sidebar( 'Featured Post' ) ) :  endif; ?>
	</div>

<?php endif; ?>
<div class="recent-posts"></div>

<div class="main-wrapper">

<div id="homemiddlesection">
<?php if (! dynamic_sidebar('Homepage Middle Section')): endif; ?>


<div class="middlewrapper">


<?php get_template_part('iron/asce-roundup'); ?>
<?php get_template_part('iron/save-america-infrastructure'); ?>


</div><!-- /middlewrapper -->


</div><!-- /homemiddlesection -->





<div id="sidebar">
<?php if ( ! dynamic_sidebar( 'Homepage Right Sidebar' ) ) :  endif; ?>
</div><!-- /sidebar -->
</div>












<?php get_footer(); ?>  