<aside id="sidebar" class="sidebar columns small-12 medium-5 large-4 <?php if(is_page_template("template-sidebar-left.php")) { echo "medium-pull-8"; } ?>" role="complementary">
<?php 
wp_reset_query();

if(is_page_template( 'template-display-resources.php' ) || is_singular('resources')){ ?>
	<div class="resource-center-sidebar">
		<div class="categories-dropdown-holder resource-side"><?php create_cat_dropdown(); ?></div>
		<div class="content-type-holder resource-side"><?php build_out_nav(); ?></div>
		<div class="resource-search resource-side"><?php resource_search(); ?></div>
	</div>	<?php
	if ( is_active_sidebar( 'resource' ) ) {
		dynamic_sidebar( 'resource' );
	}
}
if(is_page_template( 'template-display-news.php' ) || is_singular('news')){ 
	if ( is_active_sidebar( 'news' ) ) {
		dynamic_sidebar( 'news' );
	}
}
if(is_page_template( 'template-display-staff.php' ) || is_singular('staff')){ 
	if ( is_active_sidebar( 'staff' ) ) {
		dynamic_sidebar( 'staff' );
	}
}
if(is_page_template( 'template-display-events.php' ) || is_singular('events')){ 
	if ( is_active_sidebar( 'events' ) ) {
		dynamic_sidebar( 'events' );
	}
}
if(is_page()) {
	//env_display_subpages();
	if ( is_active_sidebar( 'page_sidebar' ) ) {
		dynamic_sidebar( 'page_sidebar' );
	}
}
if(is_home() || is_singular('post')) { 
	if ( is_active_sidebar( 'post_sidebar' ) ) {
		dynamic_sidebar( 'post_sidebar' );
	}
}

?>
</aside>