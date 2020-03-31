<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header();

$home_url = home_url();
$article_title = $post->post_title;
?>

<div class="main-wrap sidebar-left" role="main">
<?php do_action( 'foundationpress_before_content' ); ?>
<ul id="breadcrumbs" class="breadcrumbs">
	<li><a href="<?php echo $home_url; ?>">Home</a></li>
	<li><a href="<?php echo $home_url; ?>/about">About</a></li>
	<li><a href="<?php echo $home_url; ?>/about/news-archive">News Archive</a></li>
	<li><?php echo $article_title; ?></li>
</ul>
<?php while ( have_posts() ) : the_post(); ?>
	<article class="main-content">
		<div id="post-<?php the_ID(); ?>" <?php post_class('blogpost-entry'); ?>>

			<?php $format = get_post_format();

				if ( false === $format ) { 'standard' === $format; }

				if ( 'standard' === $format ) :

					the_post_thumbnail('full', array(
						'class' => 'floatleft',
					));

			endif; ?>

			<header>
				<h1><small><?php echo get_the_category( $id )[0]->name; ?></small><br>
					<?php the_title(); ?>
				</h1>
			<?php foundationpress_entry_meta(); ?>	
			</header>
			
			<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
	 		<div class="entry-content">
	 			<?php if ( 'video' === $format ) : ?>
	 				<p><?php the_excerpt();?></p>
	 			<?php endif;?>
				<?php the_content(); ?>
				<?php edit_post_link( __( 'Edit', 'ksasflagship' ), '<span class="edit-link">', '</span>' ); ?>
			</div> <!-- end article section -->
		</div>
	</article>
<?php endwhile;?>

<?php do_action( 'foundationpress_after_content' ); ?>
<?php get_sidebar(); ?>
</div>
<?php get_footer();
