<?php get_header();
if (env_field('header_image', true)) { $banner_imgurl =  env_field('header_image', true); } else { $banner_imgurl = env_field('page_header_default_image', true, true); }
if (env_field('background_color', true)) { $banner_bg_color = env_field('background_color', true); } else { $banner_bg_color = env_field('page_header_bg_color', true, true); }
?>
    
	<header id="page_header" role="complementary" <?php if($banner_imgurl) { ?>style="background-image: url(<?php echo $banner_imgurl; ?>);" class="with_bg" itemprop="primaryImageOfPage" <?php } if ($banner_bg_color && !$banner_imgurl) { ?>style="background-color: <?php echo $banner_bg_color; ?>"<?php } ?>>
	    <div class="row">
			<div id="header_text" class="fadein" itemprop="headline">
				<h1 class="archive-title"><?php _e( 'Search Results for:', 'env' ); ?> <?php echo esc_attr(get_search_query()); ?></h1>
		    </div>
		</div>
    </header>
    
    <div id="content" class="row">

		<div id="inner-content" class="columns">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
				    <?php get_template_part( 'parts/loop', 'archive' ); ?>
				
			<?php endwhile; ?>	

				    <?php if(function_exists("env_page_navi")) { env_page_navi(); } else { echo paginate_links(); } ?>
			
			<?php else : ?>
												
				    <?php get_template_part( 'parts/content', 'missing' ); ?>
					
			<?php endif; ?>							
	
		</div> <!-- end #inner-content -->
	
    </div> <!-- end #content -->

<?php get_footer(); ?>
