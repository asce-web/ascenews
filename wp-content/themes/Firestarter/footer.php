<?php 
$theme_options = get_option('option_tree');
$tf_google_analytics = get_option_tree('tf_google_analytics', $theme_options, false);
$tf_footertext = get_option_tree('tf_footertext', $theme_options, false);
?>
	</div><!--contentwrapper-->
</div><!--innerwrapper-->

<div id="footer">
  <div class="social">
    <ul class="social-menu">
      <li class="social-item"><a href="https://www.facebook.com/ASCE.org" class="facebook" target="_blank">Facebook</a></li>
      <li class="social-item"><a href="https://twitter.com/ascetweets" class="twitter" target="_blank">Twitter</a></li>
      <li class="social-item"><a href="https://www.linkedin.com/company/american-society-of-civil-engineers/" class="linkedin" target="_blank">LinkedIn</a></li>
      <li class="social-item"><a href="http://www.youtube.com/user/AmerSocCivilEng" class="youtube" target="_blank">YouTube</a></li>
    </ul>
  </div>
  <div class="separator"></div>
	<div class="mission">
		Founded in 1852, the American Society of Civil Engineers (ASCE) represents more than 150,000 members worldwide and is America's oldest national engineering society.
	</div>
	<div class="ftmenu">
		<?php wp_nav_menu(array('theme_location' => 'footernav', 'container' => '')); ?>
		<div class="copyyear">&nbsp;&copy; <?php echo date("Y") ?></div>
	</div>
</div>
</div><!-- /wrapper -->
</div><!-- /theme -->
<?php wp_footer(); ?>
</body>  
</html>  
