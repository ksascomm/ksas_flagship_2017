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

<article class="home-news" id="post-<?php the_ID(); ?>">
	<div class="row">		
		<div class="small-12 large-6 columns">
			<?php the_content(); ?>
		</div>
		<div class="small-12 large-6 columns">
			<h4><?php the_title(); ?></h4>
			<?php the_excerpt(); ?>
		</div>
	</div>
</article>