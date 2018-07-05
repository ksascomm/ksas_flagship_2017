<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<article class="home-news" aria-label="Video Spotlight: <?php the_title(); ?>">
	<div class="row">		
		<div class="large-6 large-push-6 columns">
			<div class="home-video">
				<!--get video ID and place in data-id-->
				<div class="youtube-player" data-id="9Ivh-63QpCM"></div>
			</div>
		</div>
		<div class="large-6 large-pull-6 columns">
		  <h1><?php the_title(); ?></h1> 
		  <?php the_excerpt(); ?>
		</div>
	</div>
</article>