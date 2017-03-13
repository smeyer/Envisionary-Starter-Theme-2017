					</main> <!-- end main -->
					<?php if(env_field('page_footer_type', true) !== "none" && !is_search()) { get_template_part( 'parts/content', 'page-footer' ); } ?>
					<footer id="footer" role="contentinfo">
						<div id="inner-footer" class="row">
							<?php if ( is_active_sidebar( 'footer' ) ) : ?>
							<div class="small-12 columns">
								<?php dynamic_sidebar( 'footer' ); ?>
							</div>
							<?php endif ?>
							<div class="large-6 medium-6 small-12 columns">
								<?php get_template_part( 'parts/socialmedia' ); ?>
								<p class="copy">&copy; <?php $year=date(Y); echo $year; ?> <?php bloginfo('name'); ?>. <?php _e("All Rights Reserved", "env"); ?>.</p>
								<p class="cred"><a href="http://www.envision-creative.com"><?php _e("Website by Envision Creative Group", "env"); ?></a></p>
		    				</div>
							<div class="large-6 medium-6 small-12 columns right_col">
								<?php if(env_field('address', true, true)) { ?><span class="address"><?php env_field('address', false, true); ?></span><?php } ?>
								<?php if(env_field('email', true, true) || env_field('phone_num', true, true)) { ?><p class="contact"><?php if(env_field('email', true, true)) { ?><a href="mailto:<?php env_field('email', false, true); ?>"><?php env_field('email', false, true); ?></a><br /><?php } ?>
								<?php if(env_field('phone_num', true, true)) { env_field('phone_num', false, true); } ?></p><?php } ?>
							</div>
						</div> <!-- end #inner-footer -->
					</footer> <!-- end .footer -->
				</div>  <!-- end .off-canvas-content -->
			</div> <!-- end .off-canvas-wrapper-inner -->
		</div> <!-- end .off-canvas-wrapper -->
		<!-- start wp_footer -->
		<?php wp_footer(); ?>
		<!-- end wp_footer -->
	</body> <!-- end body -->
</html> <!-- end page -->
