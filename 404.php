<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

 <div class="main-wrap sidebar-left" role="main">
	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
		<header>
			<h1 class="entry-title"><?php _e( 'Not Found', 'foundationpress' ); ?></h1>
		</header>
		<div class="entry-content">
			<div class="error">
				<p class="bottom"><?php _e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'foundationpress' ); ?></p>
			</div>
			<p><?php _e( 'Please try the following:', 'foundationpress' ); ?></p>
			<ul>
				<li><?php _e( 'Check your spelling', 'foundationpress' ); ?></li>
				<li>
					<?php
						/* translators: %s: home page url */
						printf( __(
							'Return to the <a href="%s">home page</a>', 'foundationpress' ),
							home_url()
						);
					?>
				</li>
				<li><?php _e( 'Click the <a href="javascript:history.back()">Back</a> button', 'foundationpress' ); ?></li>
				<li>Try Searching: 
				<ul class="search-404">
					<li>
						<form method="GET" action="<?php echo site_url('/search'); ?>" role="search">
							<div class="input-group">
								<input type="text" value="<?php echo get_search_query(); ?>" name="q" id="s" placeholder="Search this site" aria-label="search"/>
								<div class="input-group-button">
					    			<input type="submit" class="button" value="&#xf002;">
					  			</div>	
								<label for="s" class="screen-reader-text">
					                Search This Website
					            </label>
							</div>
						</form>
					</li>
				</ul>
				</li>
			</ul>
		</div>
	</article>

 <?php get_sidebar(); ?>

</div>

<?php get_footer();