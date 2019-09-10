<?php
/*
Template Name: Dean's Directory
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<?php
		$flagship_leadership_query = new WP_Query(array(
			'post_type' => 'people',
			'role' => 'leadership',
			'meta_key' => 'ecpt_people_alpha',
			'orderby' => 'meta_value',
			'order' => 'ASC',
			'posts_per_page' => -1,
			));
		?> 


<div class="main-wrap sidebar-left" role="main">
	<?php foundationpress_breadcrumb();?>

	<div class="main-content">
		<?php do_action( 'foundationpress_before_content' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>

		  <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		      <header aria-label="<?php the_title(); ?>">
		          <h1 class="entry-title"><?php the_title(); ?></h1>
		      </header>
		      <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
		      <div class="entry-content">
		          <?php the_content(); ?>
		      </div>
		  </article>

		<?php endwhile;?>
		<div class="row">
			<ul class="directory">
				<?php while ($flagship_leadership_query->have_posts() ) : $flagship_leadership_query->the_post(); ?>
					<li class="item person">
						<div class="media-object">
							<?php if ( has_post_thumbnail() ) { ?> 
								<div class="media-object-section">
									<a href="<?php the_permalink();?>"><?php the_post_thumbnail('directory'); ?>
									</a>							
								</div>
							<?php } ?>	
							<div class="media-object-section">
								<h2 class="no-margin">
									<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
								</h2>
								<?php if ( get_post_meta($post->ID, 'ecpt_position', true) ) : ?>
									<h3 class="no-margin"><?php echo get_post_meta($post->ID, 'ecpt_position', true); ?></h3>
								<?php endif; ?>
								<ul class="contact">
									<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?>
										<li><span class="fa fa-phone-square"></span> <?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?></li>
									<?php endif; ?>
									<?php if ( get_post_meta($post->ID, 'ecpt_fax', true) ) : ?>
										<li><span class="fa fa-fax"></span> <?php echo get_post_meta($post->ID, 'ecpt_fax', true); ?></li>
									<?php endif; ?>
									<?php if ( get_post_meta($post->ID, 'ecpt_email', true) ) : ?>
										<li><span class="fa fa-envelope"></span> <a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_email', true); ?>"> <?php echo get_post_meta($post->ID, 'ecpt_email', true); ?></a></li>
									<?php endif; ?>
									<?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?>
										<li><span class="fa fa-map-marker"></span> <?php echo get_post_meta($post->ID, 'ecpt_office', true); ?></li>
									<?php endif; ?>
								</ul>
							</div>
						</div>
					</li>		
				<?php endwhile; ?>
			</ul>
		</div>
	</div>		
	<?php do_action( 'foundationpress_after_content' ); ?>
	<?php get_sidebar(); ?>

</div>

<?php get_footer();
