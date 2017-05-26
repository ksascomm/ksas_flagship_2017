<?php
/**
 * The sidebar containing the main widget area
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<aside class="sidebar">
	<?php do_action( 'foundationpress_before_sidebar' ); ?>

<?php 
	wp_reset_query();
	if( is_page() ) { 
		global $post;
	        $ancestors = get_post_ancestors( $post->ID ); // Get the array of ancestors
	        //Get the top-level page slug for sidebar/widget content conditionals
			$ancestor_id = ($ancestors) ? $ancestors[count($ancestors)-1]: $post->ID;
		    $the_ancestor = get_page( $ancestor_id );
		    $ancestor_slug = $the_ancestor->post_name;
	    	//If there are no ancestors display a menu of children
				if (count($ancestors) == 0 && is_front_page() == false ) {
					$page_name = $post->post_title;
					$test_menu = wp_nav_menu( array( 
						'theme_location' => 'top-bar-r', 
						'menu_class' => 'nav',
						'container_class' => 'offset-gutter',
						'items_wrap' =>  '<div class="radius-topright" id="sidebar_header"><h5 class="white">Also in <span class="grey bold">' . $page_name . '</span></h5></div><ul class="%2$s" role="navigation" aria-label="Sidebar Menu">%3$s</ul>',				
						'submenu' => $page_name,
						'depth' => 1,
					));
				if (strpos($test_menu,'<li id') !== false) : echo $test_menu; endif;
			}
	        //If there are one or more display a menu of siblings
				elseif (count($ancestors) >= 1) {
					$parent_page = get_post($post->post_parent);
					$parent_url  = get_permalink($post->post_parent);
					$parent_name = $parent_page->post_title;
				?>
			<!--Below is displayed when on a child page -->	
				<div class="offset-gutter radius-topright" id="sidebar_header">
					<h5 class="white">Also in <a href="<?php echo $parent_url;?>" class="grey bold"><?php echo $parent_name ?></a></h5>
				</div>
				<?php
					wp_nav_menu( array( 
						'theme_location' => 'top-bar-r', 
						'menu_class' => 'nav', 
						'container_class' => 'offset-gutter',
						'submenu' => $parent_name,
						'items_wrap' => '<ul class="%2$s" role="navigation" aria-label="Sidebar Menu">%3$s</ul>',
						'depth' => 2
					));
				}
	} ?>
	<?php if( is_singular('people') ) : ?>
		<div class="offset-gutter radius-topright" id="sidebar_header">
			<h5 class="white">Also in <a href="/people" class="grey bold">People</a></h5>
		</div>
		<?php
			wp_nav_menu( array( 
				'theme_location' => 'top-bar-r', 
				'menu_class' => 'nav', 
				'container_class' => 'offset-gutter',
				'submenu' => 'People',
				'items_wrap' => '<ul class="%2$s" role="navigation" aria-label="Sidebar Menu">%3$s</ul>',
				'depth' => 2
			));
	if (has_term('', 'role') && !has_term('job-market-candidate', 'role')) : ?>
	
		<label for="jump">
			<h5>Jump to Leadership Profile</h5>
		</label>
		<select name="jump" id="jump" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<option>---<?php the_title(); ?></option> 
			<?php endwhile; endif; ?>
			<?php $jump_menu_query = new WP_Query(array(
				'post-type' => 'people',
				'role' => 'leadership',
				'meta_key' => 'ecpt_people_alpha',
				'orderby' => 'meta_value',
				'order' => 'ASC',
				'posts_per_page' => '-1')); ?>
			<?php while ($jump_menu_query->have_posts()) : $jump_menu_query->the_post(); ?>				
				<option value="<?php the_permalink() ?>"><?php the_title(); ?></option>
			<?php endwhile; ?>
		</select>

	<?php endif; endif; ?>				

	<?php if( is_singular('studyfields') ) : ?>
		<div class="offset-gutter radius-topright" id="sidebar_header">
			<h5 class="white">Also in <a href="/academics" class="grey bold">Academics</a></h5>
		</div>
		<?php
			wp_nav_menu( array( 
				'theme_location' => 'top-bar-r', 
				'menu_class' => 'nav', 
				'container_class' => 'offset-gutter',
				'submenu' => 'Academics',
				'items_wrap' => '<ul class="%2$s" role="navigation" aria-label="Sidebar Menu">%3$s</ul>',
				'depth' => 2
			)); ?>
	
		<?php $field = get_post_meta($post->ID, 'ecpt_field_level', true);?>
	
			<label for="jump">
				<div class="blue_bg offset-gutter sidebar_header">
					<h5 class="white">
					<?php if ( ($field == 'undergraduate') || ($field == 'full-graduate' )) : ?>
						Other Undergraduate &  Full-Time Graduate Programs
					<?php elseif ( $field == 'part-graduate' ) : ?>
						Other Part Time Graduate Programs
					<?php endif;?>
					</h5>
				</div>
			</label>	
	        <select name="jump" id="jump" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
	         	<option>--<?php the_title(); ?></option>
	         	<?php if ( ($field == 'undergraduate') || ($field == 'full-graduate' )) : ?>

					<?php $jump_menu_undergrad_query = new WP_Query(array(
								'post_type' => 'studyfields',
								'orderby' => 'title',
								'order' => 'ASC',
								'posts_per_page' => '-1',
								'tax_query' => array(
									array(
									    'taxonomy' => 'program_type',
									    'field' => 'slug',
									    'terms' => array('undergrad_program', 'full_time_program'),
									))
							));
						 
						 while ($jump_menu_undergrad_query->have_posts()) : $jump_menu_undergrad_query->the_post(); ?>	
							<option value="<?php the_permalink() ?>"><?php the_title(); ?></option>
					<?php endwhile; ?>

			<?php else : ?>

				<?php $jump_menu_part_grad_query = new WP_Query(array(
							'post_type' => 'studyfields',
							'orderby' => 'title',
							'order' => 'ASC',
							'posts_per_page' => '-1',
							'tax_query' => array(
								array(
								    'taxonomy' => 'program_type',
								    'field' => 'slug',
								    'terms' => 'part_time_program',
								))
						)); 
					while ($jump_menu_part_grad_query->have_posts()) : $jump_menu_part_grad_query->the_post(); ?>
						<option value="<?php the_permalink() ?>"><?php the_title(); ?></option>
					<?php endwhile; ?>
			
			<?php endif;?>
			</select>
	<?php endif; ?>	
	
	<!-- Page Specific Sidebar -->
		<?php if ( is_page() && get_post_meta($post->ID, 'ecpt_page_sidebar', true) ) : ?>
			<div class="ecpt-page-sidebar">
				<?php wp_reset_query(); 
				echo apply_filters('the_content', get_post_meta($post->ID, 'ecpt_page_sidebar', true)); ?>
			</div>
		<?php endif; ?>

	<?php dynamic_sidebar( 'sidebar-widgets' ); ?>
	<?php do_action( 'foundationpress_after_sidebar' ); ?>
</aside>
