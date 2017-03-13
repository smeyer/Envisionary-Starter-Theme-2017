<?php
/*
Template Name: Left Sidebar
*/
?>

<?php get_header(); ?>
    
    <div id="content" class="row">
	
		<div id="inner-content" class="columns small-12 medium-7 large-8 medium-push-4">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
			<?php get_template_part( 'parts/loop', 'page' ); ?>
				
			<?php endwhile; else : ?>
												
			<?php get_template_part( 'parts/content', 'missing' ); ?>
					
			<?php endif; ?>							
	
		</div> <!-- end #inner-content -->
		
		<?php get_sidebar(); ?>
	
    </div> <!-- end #content -->

<?php get_footer(); ?>
