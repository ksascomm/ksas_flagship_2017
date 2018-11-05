<?php
/*
Template Name: Parent Page
*/
get_header(); ?>
<?php get_template_part( 'template-parts/featured-image' ); ?>
<div class="main-wrap full-width parent" role="main">
	<?php do_action( 'foundationpress_before_content' ); ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
		<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
		<div class="entry-content">
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
    'sort_order' => 'asc',
	);
	$pages = get_pages($args); ?>
	<?php if (is_page(array('About','Academics')) ) : ?>
		<div class="row small-up-1 medium-up-5" id="parent-menu">	
	<?php elseif (is_page('Giving') ) : ?>
		<div class="row small-up-1 medium-up-4" id="parent-menu">		
	<?php endif; ?>
	<?php foreach ( $pages as $page ) { ?>
		<div class="column">
			<div class="card">
				<?php echo get_the_post_thumbnail($page->ID, 'child-bucket'); ?>
				<div class="card-section">
					<h1>
						<a href="<?php echo  get_permalink($page->ID); ?>" rel="bookmark" title="<?php echo $page->post_title; ?>">
						<?php echo $page->post_title; ?>
						</a>
					</h1>	
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<?php if (is_page('Apply') ) : ?>
		<?php echo get_post_meta($post->ID, 'ecpt_content', true); ?>
	<?php endif;?>
<?php get_footer();