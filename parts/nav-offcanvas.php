<div class="top-bar" id="top-bar-menu">
	<div class="top-bar-left">
			<?php if( is_front_page()){
				$h = 'h1';
			} else {
				$h = 'h2';
			}
			echo '<a href="' . esc_url(get_bloginfo('url')) . '" rel="home" id="logo"><'. $h .'><img alt="' . esc_url(get_bloginfo('name')) . '" src="' . get_template_directory_uri() . '/assets/images/logo.svg" /></'. $h .'></a>';
			?>
		</div>
	<div class="top-bar-right menu-toggle">
		<ul class="menu toggle-icon">
			<li><a href="#" data-toggle="off-canvas"><button class="menu-icon"></button></a></li>
		</ul>
	</div>
</div>