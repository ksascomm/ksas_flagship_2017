<?php
/*
Template Name: Fields of Study
*/
?>
<?php get_header(); ?>

<div id="page-sidebar-left" role="main">

	<?php do_action( 'foundationpress_before_content' ); ?>
	<section class="main-content">
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

		<ul id="filters">
	    <li><a href="#" data-filter="*" class="selected">Everything</a></li>
		 <?php 
		 $terms = get_terms("program_type"); // get all categories, but you can use any taxonomy
		 $count = count($terms); //How many are they?
		 if ( $count > 0 ){  //If there are more than 0 terms
		 foreach ( $terms as $term ) {  //for each term:
		 echo "<li><a href='#' data-filter='.".$term->slug."'>" . $term->name . "</a></li>\n";
		 //create a list item with the current term slug for sorting, and name for label
		 }
		 } 
		 ?>
		</ul>
		<div class="row">
			<label for="id_search">
				<h5>Search by keyword:</h5>
			</label>		
			<button class="submit" type="submit" aria-label="submit"/>
				<span class="fa fa-search"></span>
			</button>
			<input type="text" name="search" value="<?php if (isset($_POST['home_search'])) { echo($_POST['home_search']); } ?>" id="id_search" aria-label="Search Fields of Study" placeholder="Enter major/minor, area of study, or description keyword"  /> 
				<label for="id_search" class="screen-reader-text">
					Search Fields of Study
				</label>
		</div>
		<?php $the_query = new WP_Query(array(
							'post_type' => 'studyfields',
							'orderby' => 'title',
							'order' => 'ASC',
							'posts_per_page' => '-1')); //Check the WP_Query docs to see how you can limit which posts to display ?>
		<?php if ( $the_query->have_posts() ) : ?>
		    <div id="isotope-list">
		    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
		 $termsArray = get_the_terms( $post->ID, "program_type" );  //Get the terms for this particular item
		 $termsString = ""; //initialize the string that will contain the terms
		 foreach ( $termsArray as $term ) { // for each term 
		 $termsString .= $term->slug.' '; //create a string that has all the slugs 
		 }
		 ?> 
		 <div class="medium-6 large-4 columns <?php echo $termsString; ?> item"> <?php // 'item' is used as an identifier (see Setp 5, line 6) ?>
		 	<h3><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>" onclick="ga('send','event','Outgoing Links','<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>')"><?php the_title(); ?></a></h3>
				<div class="row hide-for-small">
					<div class="small-12 columns">
						<p class="contact">
							<?php echo get_post_meta($post->ID, 'ecpt_phonenumber', true); ?>
							<span class="floatright">
								<a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true); ?>">
									<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true); ?>
								</a>
							</span>
						</p>
						<ul class="fields-of-study">
							<?php if (get_post_meta($post->ID, 'ecpt_majors', true)) : ?>
								<li><strong>Majors:</strong>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_majors', true); ?>
								</li>
							<?php endif; ?>
							<?php if (get_post_meta($post->ID, 'ecpt_minors', true)) : ?>
								<li><strong>Minors:</strong>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_minors', true); ?></li>
							<?php endif; ?>
							<?php if (get_post_meta($post->ID, 'ecpt_degreesoffered', true)) : ?>
								<li><strong>Degrees Offered:</strong>&nbsp;<?php echo get_post_meta($post->ID, 'ecpt_degreesoffered', true); ?></li>
							<?php endif; ?>
							<?php if (get_post_meta($post->ID, 'ecpt_pcitext', true)) : ?>
								<p><?php echo get_post_meta($post->ID, 'ecpt_pcitext', true); ?></p>
							<?php endif; ?>
						</ul>
					</div>	
				</div>
				<span class="hide"><?php echo get_post_meta($post->ID, 'ecpt_keywords', true); ?></span>
							
		 </div> <!-- end item -->
		    <?php endwhile;  ?>
		</div> <!-- end isotope-list -->
		<?php endif; ?>
		
		<div class="row" id="noresults">
			<div class="small-4 columns centered">
				<h3> No matching results</h3>
			</div>
		</div>
	
	</section>
	<?php do_action( 'foundationpress_after_content' ); ?>
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>