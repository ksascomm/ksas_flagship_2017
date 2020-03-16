<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

 get_header(); ?>

<div class="main-wrap full-width" role="main">
 <?php do_action( 'foundationpress_before_content' ); ?>
	<div class="row">
		<div class="small-12 large-9 columns">
		<?php foundationpress_breadcrumb();?>
		 <?php while ( have_posts() ) : the_post(); ?>	
		   <article <?php post_class('main-content covid') ?> id="post-<?php the_ID(); ?>">
		       <h1 class="entry-title"><?php the_title(); ?></h1>
		       	<div class="callout warning">
		   			<p>Page last modified: <strong><?php the_modified_time('F j, Y'); ?> at <?php the_modified_time('g:i a'); ?></strong></p>
		   		</div>
				<div class="callout secondary resources">
					<h2>University Resources</h2>
					<ul>
						<li><strong><a href="https://hub.jhu.edu/novel-coronavirus-information/" target="_blank" rel="noopener noreferrer">University Novel coronavirus hub</a></strong> has resources and frequent updates for entire the Johns Hopkins University community</li>
						<li><strong><a href="https://coronavirus.jhu.edu/" target="_blank" rel="noopener noreferrer">Johns Hopkins Coronavirus Resource Center</a></strong> has resources to help advance the understanding of the virus, inform the public, and brief policymakers in order to guide a response, improve care, and save lives.</li>
						<li><strong><a href="https://ois.jhu.edu/Immigration_and_Visas/Travel_Information/COVID-19_Immigration-Related_FAQs/index.html">JHU OIS Immigration and Visa Travel Information</a></strong> has immigration-related FAQs.</li>
					</ul>
				  </div>		   		
		       <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
		       <div class="entry-content">

		           <?php the_content(); ?>
		           <?php edit_post_link( __( 'Edit', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
		       </div>
		   </article>
		<?php endwhile;?>

		<?php do_action( 'foundationpress_after_content' ); ?>
		</div>
 	</div>
 </div>
 <?php get_footer();