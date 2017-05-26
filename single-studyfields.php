<?php
/**
 * The template for displaying all single Fields of Study CPT
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
 <div id="page-sidebar-left" role="main">
	<?php do_action( 'foundationpress_before_content' ); ?>
		<?php  
		    $field = get_post_meta($post->ID, 'ecpt_field_level', true);
		      if ( ($field == 'undergraduate') || ($field == 'full-graduate' )) {
		    	locate_template('/template-parts/undergrad-grad.php', true, false);
		    } 
		     if ( $field == 'part-graduate' ) {
		    	locate_template('/template-parts/part-time-grad.php', true, false);
		    } 
		?>
	<?php do_action( 'foundationpress_after_content' ); ?>
	<?php get_sidebar(); ?>
</div>
<?php get_footer();
