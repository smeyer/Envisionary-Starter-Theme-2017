<?php
global $post;
$default_footer = env_field('default_global_footer', true, true); 
$footer_type = get_field('page_footer_type', $post->ID);
$footer_page_image = "no";
if (env_field('footer_image', true) && $footer_type === "custom") {
	$footer_banner_imgurl =  env_field('footer_image', true);
	$footer_page_image = "yes";
} else if($default_footer === "yes") {
	$footer_banner_imgurl = env_field('page_footer_default_image', true, true);
}
if (env_field('footer_background_color', true) && $footer_type === "custom") {
	$footer_banner_bg_color = env_field('footer_background_color', true);
	if($footer_page_image === "no") { $footer_color_override = "yes"; }
} else {
	$footer_banner_bg_color = env_field('page_footer_background_color', true, true);
	$footer_color_override = "no";
}
if (env_field('page_footer_height', true) && $footer_type === "custom") {
	$footer_banner_height = env_field('footer_height', true);
} else if($default_footer === "yes") {
	$footer_banner_height = env_field('page_footer_height', true, true);
}
$footer_banner_content = env_field('footer_text', true);

if ($default_footer === "yes" || $footer_type === "custom") { ?>
    <div id="page_footer" role="complementary" style="<?php if($footer_banner_imgurl && ($footer_page_image === "yes" || $footer_type === "default" || $footer_color_override === "no") && $footer_color_override !== "yes") { ?>background-image: url(<?php echo $footer_banner_imgurl; ?>); <?php } if ($footer_banner_bg_color && $footer_page_image === "no") { ?>background-color: <?php echo $footer_banner_bg_color . ";"; } ?>" <?php if($footer_banner_imgurl || $footer_banner_bg_color) { ?>class="with_bg"<?php } ?> itemprop="primaryImageOfPage">
		<div class="row">	    
			<div id="footer_text" class="fadein" itemprop="headline">
				<?php if(!empty($footer_banner_content)) { echo $footer_banner_content; } ?>
		    </div>
		</div>
    </div>
<?php 
} 
?>