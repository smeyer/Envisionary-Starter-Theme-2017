<?php 
// Adjust the amount of rows in the grid
$grid_columns = 3; ?>

<?php if( 0 === ( $wp_query->current_post  )  % $grid_columns ): ?>

    <div class="row archive-grid"> <!--Begin Row:--> 

<?php endif; ?> 

		<!--Item: -->
		<div class="columns flexcolumns small-12 panel"> <!-- Styles are in _custom.scss --> 
			
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix postfeed'); ?> role="article" itemprop="blogPost">
			
				<?php if (has_post_thumbnail()) { ?><div class="post-featured-image"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail('large'); ?></a></div><?php } ?>
			
				<header class="article-header" itemprop="headline">
					<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<?php get_template_part( 'parts/content', 'byline' ); ?>
				</header> <!-- end article header -->
								
				<section class="entry-content" itemprop="articleBody">
					<?php the_excerpt(); ?>
				</section> <!-- end article section -->
				
				<?php $postcategories = get_the_category();
				$posttags = get_the_tags();
				if ( ! empty( $postcategories ) && ! empty( $posttags ) ) { ?>					
				<footer class="article-footer" itemprop="keywords">
					<p class="tags"><?php if ( ! empty( $postcategories ) ) { ?><span class="cats-title">Categories:</span> <?php the_category(', '); echo '<br />'; } if ( ! empty( $posttags ) ) { the_tags('<span class="tags-title">' . __('Tags:', 'envision') . '</span> ', ', ', ''); } ?></p>
				</footer> <!-- end article footer -->
				<?php } ?>
				
			</article> <!-- end article -->
			
		</div>

<?php if( 0 === ( $wp_query->current_post + 1 )  % $grid_columns ||  ( $wp_query->current_post + 1 ) ===  $wp_query->post_count ): ?>

   </div>  <!--End Row: --> 

<?php endif; ?>

