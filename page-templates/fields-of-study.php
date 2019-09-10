<?php
/*
Template Name: Fields of Study
*/
?>
<?php get_header(); ?>

<div class="main-wrap sidebar-left" role="main">

	<?php do_action( 'foundationpress_before_content' ); ?>

	<?php foundationpress_breadcrumb();?>

	<div class="main-content">
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

		<div class="study-fields callout lightgrey" role="region" aria-label="Filters">
			<ul class="menu" id="filters">
			    <li><a class="button" href="javascript:void(0)" data-filter="*" class="selected" aria-label="View All Programs">View All</a></li>
				<li><a class="undergrad_program button" href="javascript:void(0)" data-filter=".undergrad_program" class="selected" aria-label="Sort Undergraduate Programs">Undergraduate</a></li>
				<li><a class="full_time_program button" href="javascript:void(0)" data-filter=".full_time_program" class="selected" aria-label="Sort Master & Doctorate Programs">Master's & Doctorates</a></li>
				<li><a class="part_time_program button" href="javascript:void(0)" data-filter=".part_time_program" class="selected" aria-label="Professional Master’s and Certificate Programs">Professional Master’s and Certificates (AAP)</a></li>
			</ul>

			<div class="row">
				<div class="small-12 columns">
					<h4>
						<label class="heading" for="id_search">Search our fields of study by keyword:</label>
					</h4>
					<div class="input-group">
						<span class="input-group-label">
							<span class="fa fa-search"></span>
						</span>
							<input class="quicksearch input-group-field" type="text" name="search" id="id_search" aria-label="Search Fields of Study" placeholder="Enter major/minor, area of study, or description keyword"  /> 
					</div>
				</div>
			</div>
		</div>

		<?php if ( false === ( $flagship_studyfields_query = get_transient( 'flagship_studyfields_query' ) ) ) {
			// It wasn't there, so regenerate the data and save the transient
			$flagship_studyfields_query = new WP_Query(array(
			'post_type' => 'studyfields',
			'orderby' => 'title',
			'order' => 'ASC',
			'posts_per_page' => -1,
			)); set_transient( 'flagship_studyfields_query', $flagship_studyfields_query, 2592000 ); } 

			if ( $flagship_studyfields_query->have_posts() ) : ?>
		    

		    <div id="isotope-list" class="fields-of-study loading" role="list" aria-label="Results">
			    <?php while ( $flagship_studyfields_query->have_posts() ) : $flagship_studyfields_query->the_post();
					$program_types = get_the_terms( $post->ID, 'program_type' );
						if ( $program_types && ! is_wp_error( $program_types ) ) : 
							$program_type_names = array();
								foreach ( $program_types as $program_type ) {
									$program_type_names[] = $program_type->slug;
								}
						$program_type_name = join( " ", $program_type_names );
					endif;
				?> 


				<div class="small-12 medium-6 large-4 columns item <?php echo $program_type_name; ?>" role="listitem" aria-label="<?php echo the_title();?>"> 
				 <?php // 'item' is used as an identifier (see Step 5, line 6) ?>
				 	<div class="small-12 columns field border-<?php echo $program_type_name; ?>">
			 			<h3>
			 				<?php if ($post->post_title == 'Pre-Med'):?>
			 					<a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			 				<?php else: ?>
			 				<a href="https://<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>" onclick="ga('send','event','Outgoing Links','<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>')"><?php the_title(); ?></a>
							<?php endif;?>
			 			</h3>
							<p class="contact">
								<span class="fa fa-envelope"></span>
									<a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true); ?>">
										<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true); ?>
									</a>
								
							</p>
						<div class="button-group">
							<?php if (get_post_meta($post->ID, 'ecpt_majors', true) ) : ?>
								<div class="button major">Major</div>
							<?php endif; ?>
							<?php if (get_post_meta($post->ID, 'ecpt_minors', true) ) : ?>
								<div class="button minor">Minor</div>
							<?php endif; ?>
							<?php if (get_post_meta($post->ID, 'ecpt_degreesoffered', true) ) : ?>
								<div class="button degrees"><?php echo get_post_meta($post->ID, 'ecpt_degreesoffered', true); ?></div>
							<?php endif; ?>
							<?php if (get_post_meta($post->ID, 'ecpt_pcitext', true) ) : ?>
								<p><?php echo get_post_meta($post->ID, 'ecpt_pcitext', true); ?></p>
							<?php endif; ?>
						</div>
						<span class="hide"><?php echo get_post_meta($post->ID, 'ecpt_keywords', true); ?></span>
						
						<div class="level-color">
							<div class="small-12 columns">
								<div class="color <?php echo $program_type_name; ?>"></div>
							</div>
						</div>

					</div>				
				 </div> <!-- end item -->
				    <?php endwhile;  ?>
			</div> <!-- end isotope-list -->
		<?php endif; ?>
	
		<div id="noResult">
			<div class="small-12 small-centered medium-6 columns end">	
				<div class="callout warning">
				  <h5>Sorry, No Results Found</h5>
				  <p>Try changing your search terms, or explore <a href="https://www.jhu.edu/academics/" target="_blank" rel="noopener">all of JHU's academic programs</a></p>
				</div>
			</div>
		</div>

	</div>
	<?php do_action( 'foundationpress_after_content' ); ?>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>