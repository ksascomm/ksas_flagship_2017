<?php
/*
Template Name: COVID Updates
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>

<div class="main-wrap sidebar-left" role="main">

<?php do_action( 'foundationpress_before_content' ); ?>
<?php foundationpress_breadcrumb();?>
<?php while ( have_posts() ) : the_post(); ?>
  <article <?php post_class('main-content covid') ?> id="post-<?php the_ID(); ?>">
      <header aria-label="<?php the_title(); ?>">
          <h1 class="entry-title"><?php the_title(); ?></h1>
          <div class="callout warning">
		   		<p>Page last modified: <strong><?php the_modified_time('F j, Y'); ?> at <?php the_modified_time('g:i a'); ?></strong></p>
		   	</div>	
      </header>
      <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
      <div class="entry-content">
          <?php the_content(); ?>
      </div>
  </article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>
<aside class="sidebar">
	<div id="sidebar_header">
		<?php $parent_page = get_post($post->post_parent);
			$parent_url  = get_permalink($post->post_parent);
			$parent_name = $parent_page->post_title;?>
			<h4>Also in <?php echo $parent_name ?></h4>
		</div>
		<?php
		wp_nav_menu( array(
		'menu' => 'Covid',
		'menu_class' => 'nav',
		'items_wrap' => '<ul class="%2$s" role="menu" aria-label="Sidebar Menu">%3$s</ul>',
		'depth' => 0,
		));?>
	<?php do_action( 'foundationpress_before_sidebar' ); ?>
		<!-- Page Specific Sidebar -->
		<?php if ( is_page() && get_post_meta($post->ID, 'ecpt_page_sidebar', true) ) : ?>
			<div class="ecpt-page-sidebar">
				<?php wp_reset_postdata();
				echo apply_filters('the_content', get_post_meta($post->ID, 'ecpt_page_sidebar', true)); ?>
			</div>
		<?php endif; ?>

	<?php dynamic_sidebar( 'sidebar-widgets' ); ?>
	<?php do_action( 'foundationpress_after_sidebar' ); ?>
</aside>

</div>

<?php get_footer();
