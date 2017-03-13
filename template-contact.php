<?php
/*
Template Name: Contact Page 
*/
?>

<?php get_header(); ?>
			
<main role="main">
    
    <?php get_template_part( 'parts/content', 'page-header' ); ?>
    
    <div id="content" class="row">

	<div id="inner-content" class="large-12 medium-12 columns">
	    
	    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php get_template_part( 'parts/loop', 'page' ); ?>
		    
	    <?php endwhile; else : ?>
										    
		<?php get_template_part( 'parts/content', 'missing' ); ?>
			    
	    <?php endif; ?>							

	</div> <!-- end #main -->
	
    </div> <!-- end #content -->

</main> <!-- end main -->

<?php get_footer(); ?>
