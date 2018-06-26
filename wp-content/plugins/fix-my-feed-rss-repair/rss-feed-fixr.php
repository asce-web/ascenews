<?php
/*
Plugin Name: Fix My Feed RSS Repair
Plugin URI: http://www.whereyoursolutionis.com/rss-fix/
Description: This plugin was made to fix issues with whitespace in your rss feeds.  If you get an error and have not been able to resolve your feed issues than this plugin is what you need.  RSS repair adds a new item to your wordpress tools menu. After you do a core update, apply the fix and your feed will be as good as new.   
Author: Innovative Solutions
Version:1.4
Author URI: http://www.whereyoursolutionis.com/author/scriptonite/
*/



register_activation_hook(__FILE__,'AddFixPatch'); 
register_deactivation_hook($file, 'Rsscleansweep'); 
add_action('admin_menu','add_rssFixer');






function AddFixPatch(){
		
		$file = ABSPATH.'wp-content/plugins/fix-my-feed-rss-repair/patch';
		$topatch = ABSPATH.'fix.php';

if (!copy($file, $topatch)) 
{
die('There was an error activating the plugin');

}

update_option('fix_my_feed_dismissit','show');

}


function Rsscleansweep(){
unlink( ABSPATH.'fix.php');


}





function add_rssFixer(){
 add_submenu_page('tools.php', 'Rss Feed Fix', 'Rss Feed Fix', 'manage_options', 'rss-fix-my-feed', 'almighty_rss_patch' );
 }
 
 function almighty_rss_patch(){
 
 echo '<h2>Rss Feed Fix</h2><div class="wrap">';
 
 if(!empty($_GET['ok'])=='ok') {
 
 
 update_option('fix_my_feed_dismissit','hide');
 
 }
 
 if(is_plugin_active('w3-total-cache/w3-total-cache.php') && get_option('fix_my_feed_dismissit')=="show"){
 
 echo '<div id="Message" class="error">If your feed is not fixed after applying the patch it may be because you have W3 Total Cache installed. You may need to go <a href="admin.php?page=w3tc_pgcache"> W3 Total Cache page settings</a> and uncheck the Cache feeds: site, categories, tags, comments box. <a href="tools.php?page=rss-fix-my-feed&ok=ok">Dismiss</a></div>'; 
 
 }
 
		 if (isset($_POST['fixfeed'])){
		$file = ABSPATH.'wp-content/plugins/fix-my-feed-rss-repair/fix.php';
		$newfile = ABSPATH.'index.php';

					if (!copy($file, $newfile)) {
						echo 'Patch Failed!<br /> Please try again, execute the patch manually, or contact Innovative Solutions for help';
					}else{
					echo 'Fix applied successfully. You can check it <a href="'.site_url().'/feed" target="_blank">here</a>.</br>';
					
					 if(is_plugin_active('w3-total-cache/w3-total-cache.php') ){
 
					 echo 'If your feed is not fixed after applying the patch it may be because you have W3 Total Cache installed. You may need to go <a href="admin.php?page=w3tc_pgcache"> W3 Total Cache page settings</a> and uncheck the Cache feeds: site, categories, tags, comments box.'; 
					 
					 }

					}
					?>
					<br /><br /><br />
					<table  class="widefat" style="width:20%;" >
					<thead><tr><th>Donate</th></tr></thead>
					<tr><td>
					Is your feed fixed? Consider donating $5.<br />
					
					 <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="EQREF6VLBLYRE">
					<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
					<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</form>
					
					
					
					</td></tr>
					</table>
					<br />
					
					
					
		<?php			
		 }else{
		 
		 ?>
				 Apply this fix if your rss feed stops working after a wordpress core update.<br /><br />
				
				 <form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
				 Apply fix:<input type="submit" name="fixfeed" value="Fix Feed" />
				 
				 </form>
				 <?php
				
		 
		 
		}
		?>
		<br /><br />
		<table  class="widefat" style="width:20%;" >
					<thead><tr><th>Need some code......</th></tr></thead>
					<tr><td style="padding:10px 5px 10px 5px;">
					<p>
					Scriptonite is available for hire.  If you need custom theme functions or plugins why not <a href="http://www.whereyoursolutionis.com/contact-scriptonite/">get a quote</a>?
					
				    </p>
					
					
					</td></tr>
					</table>
		
		
	<?php	
	echo '</div>';
		
 }


?>