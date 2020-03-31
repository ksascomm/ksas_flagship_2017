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
		<header aria-label="Page Not Found">
			<h1 class="entry-title"><?php _e( 'Not Found', 'ksasflagship' ); ?></h1>
		</header>
		<div class="entry-content">
			<div class="error">
				<p class="bottom"><?php _e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'ksasflagship' ); ?></p>
			</div>
			<p><?php _e( 'Please try the following:', 'ksasflagship' ); ?></p>
			<ul>
				<li><?php _e( 'Check your spelling', 'ksasflagship' ); ?></li>
				<li>
					<?php
						/* translators: %s: home page url */
						printf( __(
							'Return to the <a href="%s">home page</a>', 'ksasflagship' ),
							home_url()
						);
					?>
				</li>
				<li><?php _e( 'Click the <a href="javascript:history.back()">Back</a> button', 'ksasflagship' ); ?></li>
				<li>Try Searching: 
				<ul class="search-404">
					<li>
						<form method="GET" action="<?php echo site_url('/search'); ?>" role="search">
							<div class="input-group">
								<input type="text" value="<?php echo get_search_query(); ?>" name="q" id="s" placeholder="Search this site" aria-label="search"/>
								<div class="input-group-button">
					    			<button type="submit" class="button" aria-label="search"><span class="fas fa-search"></span></button>
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