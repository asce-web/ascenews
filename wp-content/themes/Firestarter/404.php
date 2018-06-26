<?php get_header(); ?>
<div id="blogmiddlesection">









<div id="blogposts"> 



<div id="blogregular"> 



<?php

$category_ID =  $wp_query->get_queried_object_id();

$saved_data = get_tax_meta($category_ID,'color_field_id');



?>



<div id="blogcategorytitle" class="homecategorytitle" style="background-color:<?php echo $saved_data;?>;">

<h1>Error 404</h1>

</div><!-- /homecategorytitle -->





<div id="blogwrapper" class="middlewrapper">



<div class="error-msg">
	<p>We're sorry that URL doesn't work. Maybe one of these links will help you find what you're looking for:</p>
	<ul>
		<li><a href="/">ASCE News home</a></li>
		<li><a href="/category/society-news/">Society News</a> - news about ASCE and its members</li>
		<li><a href="/category/perspectives/">Perspectives</a> - thoughts from ASCE Presidents</li>
		<li><a href="/category/promote-the-profession/">Promote the Profession</a> - getting word out about civil engineers and civil engineering</li>
		<li><a href="http://www.infrastructurereportcard.org/save-americas-infrastructure/">Save America's Infrastructure</a> - calling attention to the importance of infrastructure</li>
		<li><a href="/category/sustainable-engineering/">Sustainable Engineering</a> - highlighting sustainable civil engineering projects and innovations</li>
		<!-- <li><a href="http://blogs.asce.org/category/the-emerging-engineer/">The Emerging Engineer</a> - a glimpse into the early career experiences of civil engineers</li>
		<li><a href="http://blogs.asce.org/category/the-leadership-imperative/">The Leadership Imperative</a> - why it's important for engineers to be leaders</li> -->
	</ul>
</div>









</div><!-- /middlewrapper -->





</div><!-- /blogregular -->





















</div><!-- /blogposts -->





</div><!-- /blogmiddlesection -->

<div id="sidebar">
<?php if ( ! dynamic_sidebar( 'Homepage Right Sidebar' ) ) :  endif; ?>
</div><!-- /sidebar -->

<?php get_footer(); ?>