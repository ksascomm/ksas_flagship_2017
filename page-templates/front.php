<?php
/*
Template Name: Front
*/
get_header(); ?>
<!--ORBIT SLIDER -->

<?php 
$flagship_evergreen_query = new WP_Query(array(
   'post_type' => 'evergreen',
   'orderby' => 'rand',
   'post_status' => 'publish',
   'posts_per_page' => 10,
));

if ( $flagship_evergreen_query->have_posts() ) : ?>

<header class="hero" role="banner" aria-label="Explore the Krieger School Slider">

	<div class="fullscreen-image-slider show-for-large">
	  <div class="orbit" role="region" aria-label="FullScreen Pictures" data-orbit>
	    <ul class="orbit-container">
			<?php if ($flagship_evergreen_query->post_count > 1 ) : ?>
			<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span><span class="fa fa-angle-left fa-4x" aria-hidden="true"></span></button>
			<button class="orbit-next"><span class="show-for-sr">Next Slide</span><span class="fa fa-angle-right fa-4x" aria-hidden="true"></span></button>
			<?php endif;?>
			<?php while ($flagship_evergreen_query->have_posts() ) : $flagship_evergreen_query->the_post(); ?>
			<li class="is-active orbit-slide">
			<img class="orbit-image" src="<?php echo get_post_meta($post->ID, 'ecpt_fullimage', true); ?>" alt="<?php the_title(); ?>">
			<figcaption class="orbit-caption">
			    <div class="row">
			        <div class="small-12 large-push-1 columns">
			          <h1><?php the_title(); ?></h1>
			          	<div class="show-for-medium">
			          		<?php the_content(); ?>
				  				<?php if (get_post_meta($post->ID, 'ecpt_link_destination', true) ) : ?>
							   		<p>
							   			<a href="<?php echo get_post_meta($post->ID, 'ecpt_link_destination', true);?>" class="button orbit" target="_blank"><?php echo get_post_meta($post->ID, 'ecpt_link_button_text', true);?></a>
							   		</p>
								<?php endif; ?>
			          	</div>
			         </div>
			     </div>
			</figcaption>
			</li>
			<?php endwhile;?>
	    </ul>
		<nav class="orbit-bullets" aria-label="Slider Buttons">
			<?php $bullet_counter = 0; while( $flagship_evergreen_query->have_posts() ) : $flagship_evergreen_query->the_post();
			 $slide_image = get_post_meta($post->ID, 'ecpt_fullimage', true); ?>
				<button<?php if( $bullet_counter === 0 ) : echo ' class="is-active"'; endif; ?> data-slide="<?php echo $bullet_counter; ?>">
					<span class="show-for-sr">Slide of <?php echo the_title(); ?></span>
					<?php if( $bullet_counter === 0 ) :?><span class="show-for-sr">Current Slide</span><?php endif; ?>
				</button>
			<?php $bullet_counter++; endwhile; ?>
		</nav>		
	  </div>
	</div>

	<div class="front-hero hide-for-large">
		<!--static slider image-->
	</div>

</header>
<?php endif; ?>


<div class="find-program">
	<?php do_action( 'foundationpress_before_content' ); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'template-parts/home-find-program' ); ?>
	<?php endwhile;?>
	<?php do_action( 'foundationpress_after_content' ); ?>
</div>

<div class="section-divider"></div>

<div class="texture">

	<section class="news" aria-label="News and Events">
		
		<ul class="tabs" data-responsive-accordion-tabs="accordion medium-tabs" id="home-tabs">
		    <li class="tabs-title is-active"><a href="#spotlight" aria-selected="true">Spotlight</a></li>
		    <li class="tabs-title"><a href="#hubnews">News</a></li>
		    <li class="tabs-title"><a href="#hubevents">Events</a></li>
		</ul>

		<div class="tabs-content" data-tabs-content="home-tabs">

		    <div class="tabs-panel is-active" id="spotlight">
		   
			    <?php $homepage_query = new WP_Query(array(
					'post_type' => array('deptextra', 'post'),
					'posts_per_page' => '1',
					));
			    	if ( $homepage_query->have_posts() ) : while ( $homepage_query->have_posts() ) : $homepage_query->the_post();
			    	$format = get_post_format();
					if ( false === $format ) { $format = 'standard'; }
					if ( 'video' === $format ) : locate_template('template-parts/home-video.php', true, false); endif;
					if ( 'standard' === $format ) : locate_template('template-parts/home-news.php', true, false); endif;?>
				<?php endwhile; endif; ?>
		   
		    </div>

		    <div class="tabs-panel" id="hubnews">
		     
		     <?php get_template_part( 'template-parts/hub-news' ); ?>

		    </div>

		    <div class="tabs-panel" id="hubevents">
			
				<?php get_template_part( 'template-parts/hub-events' ); ?>
		    
		    </div>

	    </div>
	
		<hr>

	</section>
</div>


<div class="section-divider"></div>

<section class="connect" aria-label="Connect with the Krieger School">
	<h1 class="heading">Connect</h1>
	<div class="social">
		<ul class="menu align-right">
			<li><a href="https://www.youtube.com/user/jhuksas"><span class="fi-list fa fa-youtube-square fa-2x"></span><span class="screen-reader-text">YouTube</span></a></li>
			<li><a href="https://twitter.com/JHUArtsSciences"><span class="fi-list fa fa-twitter fa-2x"></span><span class="screen-reader-text">Twitter</span></a></li>
			<li><a href="https://www.instagram.com/JHUArtsSciences/"><span class="fi-list fa fa-instagram fa-2x"></span><span class="screen-reader-text">Instagram</span></a></li>
			<li><a href="http://facebook.com/JHUArtsSciences"><span class="fi-list fa fa-facebook-official fa-2x"></span><span class="screen-reader-text">Facebook</span></a></li>
			<li class="menu-text">#JHUArtsSciences</li>
		</ul>
	</div>		
	<div class="twitter" aria-labelledby="twitter-link" role="contentinfo">
		<h1 id="twitter-link">twitter <span class="fa fa-twitter"></span><span class="screen-reader-text">Twitter</span></h1>
		<?php get_template_part( 'template-parts/feed-twitter' ); ?>
	</div>
	<div class="instagram" aria-labelledby="instagram-link" role="contentinfo">
		<h1 id="instagram-link">instagram <span class="fa fa-instagram"></span><span class="screen-reader-text">Instagram</span></h1>
		<?php get_template_part( 'template-parts/feed-instagram' ); ?>   
	</div>
</section>

<div class="section-divider"></div>

<section class="giving" aria-label="Support the Krieger School">

	<div class="giving-hero">
	  <div class="giving-hero-content">
	    <h1>Support the Krieger School</h1>
	    <p class="subheader">The School of Arts & Sciences offers a stellar education that positions its students as the best of the best and trains them to be future leaders. Help us ensure that a Hopkins education is attainable to every deserving student, regardless of financial ability.</p>
	    <p><a href="/giving" class="button">Find Out More</a></p>
	  </div>
	</div>

</section>

<?php get_footer();