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

<div id="post-<?php the_ID(); ?>" <?php post_class('blogpost-entry'); ?>>

	<div class="large-4 columns">
		<?php the_post_thumbnail('full', array(
			'class'	=> 'floatleft',
		)); ?>
	</div>

	<div class="large-8 columns">
		<header>
			<h2>
				<small><?php echo get_the_category( $id )[0]->name; ?></small><br>
					<?php if ( get_post_meta($post->ID, 'ecpt_location', true) ) : ?>
							<a href="<?php echo get_post_meta($post->ID, 'ecpt_location', true); ?>" target="_blank" title="<?php the_title(); ?>"><?php the_title(); ?> <span class="icon-new-tab2" aria-hidden="true"></span>
							</a>
					<?php else : ?>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<?php endif;?>
				</h2>
			<?php foundationpress_entry_meta(); ?>
		</header>
		
 		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div> <!-- end article section -->
	</div>
	<hr />
</div>
