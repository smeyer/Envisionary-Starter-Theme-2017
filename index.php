<?php get_header(); ?>

	<div id="content" class="row">
		
		<div id="blog_top" class="columns medium-12 large-12">
			<?php if ( is_active_sidebar( 'blog' ) ) {
				dynamic_sidebar( 'blog' );
			} ?>
		</div>

		<div id="inner-content" class="columns small-12 medium-7 large-8">
	    
		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
				<!-- To see additional archive styles, visit the /parts directory -->
				<?php get_template_part( 'parts/loop', 'archive-grid' ); ?>
			    
			<?php endwhile; ?>	

			<?php if(function_exists("env_page_navi")) { env_page_navi(); } else { echo paginate_links(); } ?>
				
			<?php else : ?>
										
				<?php get_template_part( 'parts/content', 'missing' ); ?>
					
			<?php endif; ?>
																							
		</div> <!-- end #main -->
	    
		<?php get_sidebar(); ?>

	</div> <!-- end #content -->

<?php get_footer(); ?>