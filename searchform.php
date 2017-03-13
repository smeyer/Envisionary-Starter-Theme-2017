<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<div class="input-group">
		<label for="search-field" class="screen-reader-text input-group-label"><?php echo _e( 'Search for:', 'label', 'env' ) ?></label>
		<input type="search" id="search-field" class="input-group-field" placeholder="<?php _e( 'Search...', 'env' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php _e( 'Search for:', 'env' ) ?>" />
		<div class="input-group-button">
			<input type="submit" class="search-submit button" value="<?php _e( 'Search', 'env' ) ?>" />
		</div>
	</div>
</form>
