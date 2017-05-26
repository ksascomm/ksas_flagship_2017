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

<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
	<div class="row">
		<?php the_content(); ?>
		<h1><?php echo get_the_category( $id )[0]->name; ?></h1>
		<p><?php the_excerpt();?></p>
		<hr>
		<p>Watch more videos on our <a href="https://www.youtube.com/user/jhuksas" title="YouTube"><strong>Youtube Channel</strong></a>.</p>
	</div>
</article>