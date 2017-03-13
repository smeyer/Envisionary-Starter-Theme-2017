<?php $banner_content = env_field('header_text', true);
$header_type = get_field('header_type', $post->ID);
if (((env_field('add_page_title', true, true) === "yes"  && $header_type === "default") || env_field('add_page_title', true) === "yes") && $header_type !== "none") {
	$banner_h1 = 0;
}
else { $banner_h1 = strpos($banner_content, '<h1'); } ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
						
	<?php if (!is_page_template('template-browser-width.php') && $banner_h1 !== 0) { ?>
	<header class="article_header" itemprop="headline">
		<?php if (is_front_page()) { ?><h1 id="page-title"><?php env_field('header_text'); ?></h1>
		<?php } else if ($banner_h1 !== 0) { ?><h1 id="page-title"><?php the_title(); ?></h1>
		<?php } ?>
	</header> <!-- end article header -->
	<?php } ?>
					
	<section class="entry-content" itemprop="mainContentOfPage">
	    <?php the_content(); ?>
	</section> <!-- end article section -->
					
</article> <!-- end article -->