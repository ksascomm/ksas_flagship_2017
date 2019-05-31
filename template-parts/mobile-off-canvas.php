<?php
/**
 * Template part for off canvas menu
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<nav class="mobile-off-canvas-menu off-canvas position-right" id="<?php foundationpress_mobile_menu_id(); ?>" data-off-canvas data-auto-focus="false" aria-label="Mobile Menu" aria-hidden="true">
	<div class="row">
		<div class="small-12 columns">
			<form method="GET" action="<?php echo site_url('/search'); ?>" role="search" aria-label="Mobile Menu Search">
				<div class="input-group">
					<input type="text" value="<?php echo get_search_query(); ?>" name="q" id="mobile-search" placeholder="Search this site" aria-label="search"/>
					<label for="mobile-search" class="screen-reader-text">
		                Search This Website
		            </label>
		            <div class="input-group-button">
		    			<button type="submit" class="button" aria-label="search">Search <span class="fas fa-search"></span></button>
		  			</div>	
				</div>
			</form>
		</div>	
	</div>
  <?php foundationpress_mobile_nav(); ?>
</nav>

<div class="off-canvas-content" data-off-canvas-content>