<?php
/*
Template Name: Homepage 
*/
?>

<?php get_header(); ?>

	    <div id="content" class="row">
	    
			<div id="inner-content" class="columns">
							
				   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<?php get_template_part( 'parts/loop', 'page' ); ?>
						    
				    <?php endwhile; else : ?>
														    
						<?php get_template_part( 'parts/content', 'missing' ); ?>
							    
				    <?php endif; ?>							
							
			</div> <!-- end #inner-content -->
			
	    </div> <!-- end #content -->

<?php get_footer(); ?>