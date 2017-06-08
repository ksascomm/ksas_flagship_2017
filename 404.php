<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="row">
	<div class="small-12 large-8 columns" role="main">

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php _e( 'Whoops...', 'foundationpress' ); ?></h1>
			</header>
			<div class="entry-content">
				<div class="error">
					<p class="bottom"><?php _e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'foundationpress' ); ?></p>
				</div>
				<p><?php _e( 'Try Searching?', 'foundationpress' ); ?></p>
				    <form class="search-form" action="<?php echo site_url('/search'); ?>" method="get">
		                <fieldset>
		                    <input type="text" class="input-text" name="q" />
		                    <input type="submit" class="button" value="Search" />
		                </fieldset>
		   			</form>    
			</div>
		</article>

	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer();
