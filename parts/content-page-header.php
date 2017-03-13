<?php
global $post;
$default_header = env_field('default_global_header', true, true); 
$header_type = get_field('header_type', $post->ID);
$banner_shortercode = env_field('header_shortcode', true);
$page_image = "no";
if (env_field('header_image', true) && $header_type === "custom") {
	$banner_imgurl =  env_field('header_image', true);
	$page_image = "yes";
} else if($default_header === "yes") {
	$banner_imgurl = env_field('page_header_default_image', true, true);
}
if (env_field('background_color', true) && $header_type === "custom") {
	$banner_bg_color = env_field('background_color', true);
	if($page_image === "no") { $color_override = "yes"; }
} else {
	$banner_bg_color = env_field('page_header_bg_color', true, true);
	$color_override = "no";
}
if (env_field('page_header_height', true) && $header_type === "custom") {
	$banner_height = env_field('header_height', true);
} else if($default_header === "yes") {
	$banner_height = env_field('page_header_height', true, true);
}
$banner_content = env_field('header_text', true);
if ((env_field('add_page_title', true, true) === "yes"  && $header_type === "default") || env_field('add_page_title', true) === "yes") {
	$banner_title = get_the_title();
	$banner_h1 = 0;
}
else { $banner_h1 = strpos($banner_content, '<h1'); }
if (env_field("page_title_color", true) && $header_type === "custom") {
	$page_title_color = 'style="color: ' . env_field("page_title_color", true). ';"'; }
else if(env_field('page_header_page_title_color', true, true) && env_field('default_global_header', true, true) === "yes") {
	$page_title_color = 'style="color: ' . env_field('page_header_page_title_color', true, true). ';"';
} 
if(!empty($banner_shortercode) && ($header_type === "shortcode")){
	echo '<div id="page_slider">';
	echo do_shortcode($banner_shortercode);
	echo '</div>';
} elseif ($default_header === "yes" || $header_type === "custom") { ?>
    <header id="page_header" role="complementary" style="<?php if($banner_imgurl && ($page_image === "yes" || $header_type === "default" || $color_override === "no") && $color_override !== "yes") { ?>background-image: url(<?php echo $banner_imgurl; ?>); <?php } if ($banner_bg_color && $page_image === "no") { ?>background-color: <?php echo $banner_bg_color . ";"; } ?>" <?php if($banner_imgurl || $banner_bg_color) { ?>class="with_bg"<?php } ?> itemprop="primaryImageOfPage">
		<div class="row">	    
			<div id="header_text" class="fadein" itemprop="headline">
				<?php if($banner_title) { echo '<h1 id="page-title" itemprop="headline" ' . $page_title_color . '>' . $banner_title . '</h1>'; $banner_title_ID="id='with_title'"; }
				if(!empty($banner_content)) { echo '<div ' . $banner_title_ID . '>' . $banner_content . '</div>'; } ?>
		    </div>
		</div>
    </header>
<?php 
} 
?>

