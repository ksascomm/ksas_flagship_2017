<?php
/**
 * The template for displaying all single Fields of Study CPT
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
 <div class="main-wrap sidebar-left" role="main">
	<?php do_action( 'foundationpress_before_content' ); ?>
		
		<!--custom breadcrumbs-->

		<ul id="breadcrumbs" class="breadcrumbs">
			<li class="item-home">
				<a class="bread-link bread-home" href="<?php echo site_url();?>" title="Home">Home</a>
			</li>
			<li class="item-parent">
				<a class="bread-parent" href="/academics/" title="Academics">Academics</a>
			</li>
			<li class="item-parent">
				<a class="bread-parent" href="/academics/fields" title="Academics">Fields of Study</a>
			</li>
			<li class="current item"><?php echo the_title();?></li>
		</ul>



		<?php
		    $field = get_post_meta($post->ID, 'ecpt_field_level', true);
		      if ( ($field == 'undergraduate') || ($field == 'full-graduate' ) ) {
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
