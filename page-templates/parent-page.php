<?php
/*
Template Name: Parent Page
*/
get_header(); ?>
<?php get_template_part( 'template-parts/featured-image' ); ?>
<div class="main-wrap full-width" role="main">
	<?php do_action( 'foundationpress_before_content' ); ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
		<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
		<div class="centered entry-content">
			<?php the_content(); ?>
		</div>
	</article>
	<?php endwhile;?>
	<?php do_action( 'foundationpress_after_content' ); ?>
	<?php $args = array(
	'parent' => $post->ID,
	'post_type' => 'page',
	'post_status' => 'publish',
	'sort_column' => 'menu_order', 
    'sort_order' => 'asc'
	);
	$pages = get_pages($args); ?>
	<?php if (is_page('About')) : ?>
		<div class="row small-up-1 medium-up-3 large-up-4" id="parent-menu">
	<?php elseif (is_page('Academics')) : ?>
		<div class="row small-up-1 medium-up-3" id="parent-menu">		
	<?php endif; ?>
		<?php foreach( $pages as $page ) { ?>
		<div class="column">
			<div class="card">
				<?php echo get_the_post_thumbnail($page->ID, 'small-thumb'); ?>
				<div class="card-section">
					<a href="<?php echo  get_permalink($page->ID); ?>" rel="bookmark" title="<?php echo $page->post_title; ?>">
						<h1><?php echo $page->post_title; ?></h1>
					</a>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<?php get_footer();