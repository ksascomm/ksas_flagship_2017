<?php
/**
 * The default template for displaying FT Undergrad & Grad Fields of Study
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('main-content') ?>>
<img src="<?php echo get_post_meta($post->ID, 'ecpt_image', true); ?>" alt="<?php the_title(); ?>" class="radius10">
	<header>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</header>
	<div class="entry-content">
		<p class="contact"> <!-- Contact info line -->

			<?php if ( get_post_meta($post->ID, 'ecpt_homepage', true) ) : ?>
				<br><span class="fa fa-globe"></span> 
				<a href="http://<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>" onclick="ga('send','event','Outgoing Links','<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>')">
					<?php echo get_post_meta($post->ID, 'ecpt_homepage', true);?>
				</a>	
			<?php endif; ?>


			<?php if ( get_post_meta($post->ID, 'ecpt_emailaddress', true) ) : ?>
				<span class="fa fa-envelope"></span> 
				<a href="mailto:<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true); ?>">
					<?php echo get_post_meta($post->ID, 'ecpt_emailaddress', true);?>
				</a>	
			<?php endif; ?>

			<?php if ( get_post_meta($post->ID, 'ecpt_phonenumber', true) ) : ?>
				<span class="fa fa-phone-square"></span>  <?php echo get_post_meta($post->ID, 'ecpt_phonenumber', true); ?>
			<?php endif; ?>
						
			<?php if ( get_post_meta($post->ID, 'ecpt_location', true) ) : ?>
				<span class="fa fa-map-marker"></span>  <?php echo get_post_meta($post->ID, 'ecpt_location', true); ?>
			<?php endif; ?>


		</p> <!-- End Contact info line -->
		<?php if ( get_post_meta($post->ID, 'ecpt_section1', true) ) :  echo get_post_meta($post->ID, 'ecpt_section1', true);  endif; ?>
					
		<?php if ( get_post_meta($post->ID, 'ecpt_section2content', true) ) :?>  
				<h3>What can you do with your degree?</h3>
			<?php echo get_post_meta($post->ID, 'ecpt_section2content', true);  endif; ?>
		
		<?php if ( get_post_meta($post->ID, 'ecpt_section3heading', true) ) : ?><h3><?php echo get_post_meta($post->ID, 'ecpt_section3heading', true) ?></h3><?php elseif(get_post_meta($post->ID, 'ecpt_section3content', true)) : ?>
			<h3>Related Programs and Centers</h3>
		<?php endif; ?>
		<?php if ( get_post_meta($post->ID, 'ecpt_section3content', true) ) :  echo get_post_meta($post->ID, 'ecpt_section3content', true);  endif; ?>

	</div>

	<hr />

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<div class="blue_bg offset-gutter sidebar_header">
						<h5 class="white">Explore <?php the_title();?></h5>
				</div>	

				<!--Begin Department Navigation Links -->
				<div class="row">
					<ul class="nav">
						<?php if ( get_post_meta($post->ID, 'ecpt_homepage', true) ) : ?>
							<li><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>" onclick="ga('send','event','Outgoing Links','<?php echo get_post_meta($post->ID, 'ecpt_homepage', true); ?>')"><?php the_title(); ?> Website</a></li>
						<?php endif; ?>
						<?php if ( get_post_meta($post->ID, 'ecpt_facultypage', true) ) : ?>
							<li><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_facultypage', true); ?>">Faculty</a></li>
						<?php endif; ?>

						<?php if ( get_post_meta($post->ID, 'ecpt_undergraduatepage', true) ) : ?>
							<li><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_undergraduatepage', true); ?>">Undergraduate</a></li>
						<?php endif; ?>

						<?php if ( get_post_meta($post->ID, 'ecpt_graduatepage', true) ) : ?>
							<li><a href="http://<?php echo get_post_meta($post->ID, 'ecpt_graduatepage', true); ?>">Graduate</a></li>
						<?php endif; ?>
					</ul>
				</div> <!--End Dept Nav Links -->
			<?php endwhile; endif; ?>	

			<?php if ( get_post_meta($post->ID, 'ecpt_title', true) && get_post_meta($post->ID, 'ecpt_content', true) ) : ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_title', true) ) : ?>
					<div class="blue_bg offset-gutter sidebar_header">
						<h5 class="white"><?php echo get_post_meta($post->ID, 'ecpt_title', true);?></h5>
					</div>	
				<?php endif; ?>
				<?php if ( get_post_meta($post->ID, 'ecpt_content', true) ) : ?> 
					<div class="row">
						<div class="small-12 columns">
							<?php echo get_post_meta($post->ID, 'ecpt_content', true); ?>
						</div>		
					</div>
				<?php endif; ?>
			<?php endif; ?>		
</div>
