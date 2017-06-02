<?php
/*
Template Name: Dean's Directory
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<?php //if ( false === ( $flagship_leadership_query = get_transient( 'flagship_leadership_query' ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$flagship_leadership_query = new WP_Query(array(
					'post_type' => 'people',
					'role' => 'leadership',
					'meta_key' => 'ecpt_people_alpha',
					'orderby' => 'meta_value',
					'order' => 'ASC',
					'posts_per_page' => '-1'));
					//set_transient( 'flagship_leadership_query', $flagship_leadership_query, 2592000 ); }
		
	//if ( false === ( $flagship_dean_staff_query = get_transient( 'flagship_dean_staff_query' ) ) ) {
				// It wasn't there, so regenerate the data and save the transient
				$flagship_dean_staff_query = new WP_Query(array(
					'post_type' => 'people',
					'role' => 'staff',
					'meta_key' => 'ecpt_people_alpha',
					'orderby' => 'meta_value',
					'order' => 'ASC',
					'posts_per_page' => '-1'));
					//set_transient( 'flagship_dean_staff_query', $flagship_dean_staff_query, 2592000 ); }		 ?> 


<div id="page-sidebar-left" role="main">
	<section class="main-content">
	<?php do_action( 'foundationpress_before_content' ); ?>
	<?php while ( have_posts() ) : the_post(); ?>
	  <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
	      <header>
	          <h1 class="entry-title"><?php the_title(); ?></h1>
	      </header>
	      <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
	      <div class="entry-content">
	          <?php the_content(); ?>
	      </div>
	  </article>
	<?php endwhile;?>

	<!--	<div class="row">
			<div class="small-12 medium-6 columns callout primary">


				<label for="id_search">
					<h4>Search the Dean's directory:</h4>
				</label>	
				<div class="input-group">
					<span class="input-group-label">
						<span class="fa fa-search"></span>
					</span>
				<input class="input-group-field" type="text" name="search" value="<?php if (isset($_POST['home_search'])) { echo($_POST['home_search']); } ?>" id="id_search" aria-label="Search the dean's directory"  /> 
					<label for="id_search" class="screen-reader-text">
						Search the dean's directory
					</label>
				</div>
			</div>
		</div>
-->
		<div class="row">
			<ul class="directory">
				<?php while ($flagship_leadership_query->have_posts()) : $flagship_leadership_query->the_post(); ?>
						<li class="item person">
							<div class="row">
								<div class="media-object">
									<div class="media-object-section">

									<?php if ( has_post_thumbnail()) { ?> 
										<a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('directory', array('class' => 'padding-five floatleft hide-for-small')); ?></a>
									<?php } ?>	
									</div>
									<div class="media-object-section">
									<h4 class="no-margin">
										<a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
									</h4>
									<?php if ( get_post_meta($post->ID, 'ecpt_position', true) ) : ?>
										<h5 class="no-margin"><?php echo get_post_meta($post->ID, 'ecpt_position', true); ?></h5>
									<?php endif; ?>
									<p class="contact">
										<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?>
											<span class="fa fa-phone-square"></span> <?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?>
										<?php endif; ?>
										<?php if ( get_post_meta($post->ID, 'ecpt_fax', true) ) : ?>
											<span class="fa fa-fax"></span> <?php echo get_post_meta($post->ID, 'ecpt_fax', true); ?>
										<?php endif; ?>
										<?php if ( get_post_meta($post->ID, 'ecpt_email', true) ) : ?>
											<span class="fa fa-envelope"></span> <a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_email', true); ?>"> <?php echo get_post_meta($post->ID, 'ecpt_email', true); ?></a>
										<?php endif; ?>
										<?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?>
											<span class="fa fa-map-marker"></span> <?php echo get_post_meta($post->ID, 'ecpt_office', true); ?>
										<?php endif; ?>
									</p>
								</div>
							</div>
						</div>
						</li>		
				<?php endwhile; ?>
				
				
				<?php while ($flagship_dean_staff_query->have_posts()) : $flagship_dean_staff_query->the_post(); ?>
						<li class="item person">
							<div class="row">
								<div class="small-12 columns">
									<h4 class="no-margin"><?php the_title(); ?></h4>
									<?php if ( get_post_meta($post->ID, 'ecpt_position', true) ) : ?>
											<h5 class="no-margin"><?php echo get_post_meta($post->ID, 'ecpt_position', true); ?></h5>
									<?php endif; ?>
									<p class="contact">
										<?php if ( get_post_meta($post->ID, 'ecpt_phone', true) ) : ?>
											<span class="fa fa-phone-square"></span> <?php echo get_post_meta($post->ID, 'ecpt_phone', true); ?>
										<?php endif; ?>
										<?php if ( get_post_meta($post->ID, 'ecpt_fax', true) ) : ?>
											<span class="fa fa-fax"></span><?php echo get_post_meta($post->ID, 'ecpt_fax', true); ?><?php endif; ?>
										<?php if ( get_post_meta($post->ID, 'ecpt_email', true) ) : ?>
											<span class="fa fa-envelope"></span> <a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_email', true); ?>"> <?php echo get_post_meta($post->ID, 'ecpt_email', true); ?></a>
										<?php endif; ?>
										<?php if ( get_post_meta($post->ID, 'ecpt_office', true) ) : ?>
											<span class="fa fa-map-marker"></span> <?php echo get_post_meta($post->ID, 'ecpt_office', true); ?>
										<?php endif; ?>
									</p>
								</div>
							</div>
						</li>		
				<?php endwhile; ?>
					<div class="row" id="noresults">
						<div class="small-12 medium-4 columns centered">
							<h3>No matching results</h3>
						</div>
					</div>
			</ul>
		</div>
	</section>		
	<?php do_action( 'foundationpress_after_content' ); ?>
	<?php get_sidebar(); ?>

</div>

<?php get_footer();
