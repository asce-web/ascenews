<?php
	$args = array(
		'category_name' => 'featured',
		'posts_per_page' => 1
	);
	$the_query = new WP_Query( $args );
?>
<?php if ( $the_query->have_posts() ) : ?>
<div id="featured-post">
		<div class="widget-1 widget-first widget-last widget-odd featured-post">Featured Post<div>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="recent-post-item">

				<div class="post-entry">


					<div style="background-color:#015DAA;" class="featured-cat"><h1>ASCE News</h1></div>
					<?php if(has_post_thumbnail()): ?>
                    	<div class="featuredimg">
							
                   <?php the_post_thumbnail('full', array('class' => 'post-image')); ?>

                    </div><!-- /featuredimg -->
						
					<?php endif; ?>
                                            
                    					<div class="featured-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
						
						<div class="homepostsmeta"><?php echo get_the_date(); ?></div><!-- /homepostsmeta -->
						
						
		                


						


		                


						<p><?php echo get_the_excerpt(); ?></p>
						<p class="readmorelink">  <a class="more-link" href="<?php the_permalink(); ?>">Read more &gt;&gt;</a></p>

						<?php /*<div class="homepostsauthormeta">BY <a rel="author" title="Posts by Staff" href="http://dev-blogs.asce.org/author/staff/">Staff</a> </div><!-- /homepostsauthormeta -->	*/ ?>
						<div class="sharing">
                            <div class="sharing-header">Share</div>
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <div data-title="Candidates Forum: ASCE Presidential Hopefuls Answer Your Questions" data-url="/candidates-forum-asce-presidential-hopefuls-answer-your-questions/" class="addthis_sharing_toolbox"><div id="atstbx" class="at-share-tbx-element addthis_16x16_style addthis-smartlayers addthis-animated at4-show"><a class="at-share-btn at-svc-facebook"><span class="at4-icon aticon-facebook" title="Facebook"></span></a><a class="at-share-btn at-svc-twitter"><span class="at4-icon aticon-twitter" title="Twitter"></span></a><a class="at-share-btn at-svc-linkedin"><span class="at4-icon aticon-linkedin" title="LinkedIn"></span></a><a class="at-share-btn at-svc-google_plusone_share"><span class="at4-icon aticon-google_plusone_share" title="Google+"></span></a><a class="at-share-btn at-svc-pinterest_share"><span class="at4-icon aticon-pinterest_share" title="Pinterest"></span></a><a class="at-share-btn at-svc-email"><span class="at4-icon aticon-email" title="Email"></span></a></div></div>
                        </div>
                        <?php /*<div id="posttags">
						<p><a rel="tag" href="http://dev-blogs.asce.org/tag/elections/">elections</a></p>						</div>*/ ?>

                        




										</div>



				

							</div>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>


		</div>
</div>	</div>
<?php endif; ?>