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
		      <header>
		          <h1 class="entry-title"><?php the_title(); ?></h1>
		      </header>
		      <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
		      <div class="entry-content">
		          <?php the_content(); ?>
		      </div>

		  </article>
		<?php endwhile;?>

		<div class="study-fields callout primary" role="region" aria-label="Filters">
			<ul class="menu" id="filters">
			    <li><a class="button" href="javascript:void(0)" data-filter="*" class="selected">View All</a></li>
				<li><a class="undergrad_program button" href="javascript:void(0)" data-filter=".undergrad_program" class="selected">Undergraduate</a></li>
				<li><a class="full_time_program button" href="javascript:void(0)" data-filter=".full_time_program" class="selected">Full-Time Masters & Doctorates</a></li>
				<li><a class="part_time_program button" href="javascript:void(0)" data-filter=".part_time_program" class="selected">Part-Time Online Masters & Certificates</a></li>
			</ul>

			<div class="row">
				<div class="small-12 columns">
					<label for="id_search">
						<h4>Search our Fields of Study by keyword:</h4>
					</label>	
					<div class="input-group">
						<span class="input-group-label">
							<span class="fa fa-search"></span>
						</span>
							<input class="quicksearch input-group-field" type="text" name="search" id="id_search" aria-label="Search Fields of Study" placeholder="Enter major/minor, area of study, or description keyword"  /> 
							<label for="id_search" class="screen-reader-text">
								Search Fields of Study
							</label>
					</div>
				</div>
			</div>
		</div>

		<?php $the_query = new WP_Query(array(
			'post_type' => 'studyfields',
			'orderby' => 'title',
			'order' => 'ASC',
			'posts_per_page' =>'-1',)); // Check the WP_Query docs to see how you can limit which posts to display ?>
		<?php if ( $the_query->have_posts() ) : ?>
		    

		    <div id="isotope-list" role="region" aria-label="Results">
		    <?php while ( $the_query->have_posts() ) : $the_query->the_post();
				 $termsArray = get_the_terms( $post->ID, 'program_type' );  // Get the terms for this particular item
				 $termsString = ''; // initialize the string that will contain the terms
				 foreach ( $termsArray as $term ) { // for each term
							   $termsString .= $term->slug . ' '; // create a string that has all the slugs
				 }
			?> 


		 <div class="small-12 medium-6 large-4 columns item <?php echo $termsString; ?>" role="listitem" aria-label="<?php echo the_title();?>"> 
		 <?php // 'item' is used as an identifier (see Step 5, line 6) ?>
		 	<div class="small-12 columns field border-<?php echo $termsString; ?>">
		 					<!-- Display ribbons for discipline taxonomy -->
						<div class="row">	
							<div class="small-12 columns disciplines">
							</div>
						</div>
		 			<h3><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>" onclick="ga('send','event','Outgoing Links','<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>')"><?php the_title(); ?></a></h3>
						<p class="contact">
							<span class="fa fa-envelope"></span>
								<a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true); ?>">
									<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true); ?>
								</a>
							
						</p>
					<div class="button-group">
						<?php if (get_post_meta($post->ID, 'ecpt_majors', true) ) : ?>
							<button type="button" class="button major">Major</button>
						<?php endif; ?>
						<?php if (get_post_meta($post->ID, 'ecpt_minors', true) ) : ?>
							<button type="button" class="button minor">Minor</button>
						<?php endif; ?>
						<?php if (get_post_meta($post->ID, 'ecpt_degreesoffered', true) ) : ?>
							<button type="button" class="button degrees"><?php echo get_post_meta($post->ID, 'ecpt_degreesoffered', true); ?></button>
						<?php endif; ?>
						<?php if (get_post_meta($post->ID, 'ecpt_pcitext', true) ) : ?>
							<p><?php echo get_post_meta($post->ID, 'ecpt_pcitext', true); ?></p>
						<?php endif; ?>
					</div>
				<span class="hide"><?php echo get_post_meta($post->ID, 'ecpt_keywords', true); ?></span>
			</div>				
		 </div> <!-- end item -->
		    <?php endwhile;  ?>
		</div> <!-- end isotope-list -->
		<?php endif; ?>
	
		<div id="noResult">
			<div class="small-12 small-centered medium-6 columns end">	
				<div class="callout warning">
				  <h5>Sorry, No Results Found</h5>
				  <p>Try changing your search terms, or explore <a href="https://www.jhu.edu/academics/">all of JHU's academic programs</a></p>
				</div>
			</div>
		</div>

	</div>
	<?php do_action( 'foundationpress_after_content' ); ?>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>