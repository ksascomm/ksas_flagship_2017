<?php
/*
Template Name: Front
*/
get_header(); ?>

<?php
// Get any existing copy of our transient data
if ( WP_DEBUG or false === ($flagship_evergreen_query = get_transient( 'flagship_evergreen_query' ) ) ) {
    // It wasn't there, so regenerate the data and save the transient
	$flagship_evergreen_query = new WP_Query(array(
	   'post_type' => 'evergreen',
	   'orderby' => 'rand',
	   'post_status' => 'publish',
	   'posts_per_page' => 1,
	));
	//set a 24 hour transient
	set_transient( 'flagship_evergreen_query', $flagship_evergreen_query, 86400 );
}
?>


<header class="hero" role="banner" aria-label="Explore the Krieger School Slider">

	<div class="fullscreen-image-slider show-for-large">
		<?php if ( $flagship_evergreen_query->have_posts() ) :  while ($flagship_evergreen_query->have_posts() ) : $flagship_evergreen_query->the_post(); ?>
		<div class="front-hero" role="banner" data-interchange="[<?php echo the_post_thumbnail_url('featured-small'); ?>, small], [<?php echo the_post_thumbnail_url('featured-medium'); ?>, medium], [<?php echo the_post_thumbnail_url('full'); ?>, large], [<?php echo the_post_thumbnail_url('full'); ?>, xlarge]" aria-label="<?php the_title(); ?> Banner">
		<?php endwhile; else :?>
		<div class="front-hero" role="banner" style="background: url('<?php echo get_template_directory_uri(); ?>/assets/images/frontpage/homepage-slider-hero.jpg') bottom center; background-size: cover;" aria-label="Homepage Banner">>
		<?php endif; ?>
			<div class="small-12 large-5 large-push-7 columns">
				<div class="caption">
		 <?php  if ( $flagship_evergreen_query->have_posts() ) : while ($flagship_evergreen_query->have_posts() ) : $flagship_evergreen_query->the_post(); ?>
					<h1><?php the_title(); ?></h1>
		<?php endwhile; endif;  wp_reset_postdata();?>

				<?php //Reset to content loop
				while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile;?>
				</div>
			</div>
		</div>
	</div>
		<?php if ( $flagship_evergreen_query->have_posts() ) : while ($flagship_evergreen_query->have_posts() ) : $flagship_evergreen_query->the_post(); ?>
			<div class="front-hero-featured-image show-for-medium-only hide-for-print" role="banner" aria-label="Mobile Hero Image">
				<?php the_post_thumbnail('featured-large');?>
			</div>
	<?php endwhile; endif; ?>
</header>


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

	    </div>

		<hr>

	</section>
</div>

<div class="section-divider"></div>

<div class="magazine-background">
	<section class="magazine" aria-label="From A&S Magazine">
		<div class="row">
			<div class="small-12 columns">
				<h1 class="heading">
					Arts & Sciences Magazine <small>Fall 2020 Issue</small>
				</h1>
			</div>
		</div>
		<div class="row">
			<div class="small-12 large-4 columns">
				<?php get_template_part( 'template-parts/magazine-cover' ); ?>
			</div>
			<div class="small-12 large-8 columns">
				<ul class="tabs" data-tabs id="magazine-tabs">
			    	<li class="tabs-title is-active"><a href="#mag-features">Features</a></li>
			    	<li class="tabs-title"><a href="#mag-dean">Dean's Desktop</a></li>
			    	<li class="tabs-title slickTrigger" data-tab-target="slickNews"><a href="#mag-news">News</a></li>
			    	<li class="tabs-title slickTrigger"><a href="#mag-ideas" data-tab-target="slickIdeas">Big Ideas</a></li>
			    	<li class="tabs-title slickTrigger" data-tab-target="slickDigest"><a href="#mag-digest">Student Digest</a></li>
			    	<li class="tabs-title slickTrigger" data-tab-target="slickAlumni"><a href="#mag-alumni">Alumni</a></li>
				</ul>
				<div class="tabs-content" data-tabs-content="magazine-tabs">
					<div class="tabs-panel is-active" id="mag-features">
					 	<?php get_template_part( 'template-parts/magazine-feature' ); ?>
					</div>
					<div class="tabs-panel" id="mag-dean">
					 	<?php get_template_part( 'template-parts/magazine-dean' ); ?>
					</div>
					<div class="tabs-panel" id="mag-news">
					 	<?php get_template_part( 'template-parts/magazine-news' ); ?>
					</div>
					<div class="tabs-panel" id="mag-ideas">
					 	<?php get_template_part( 'template-parts/magazine-big-ideas' ); ?>
					</div>
					<div class="tabs-panel" id="mag-digest">
					 	<?php get_template_part( 'template-parts/magazine-student-digest' ); ?>
					</div>
					<div class="tabs-panel" id="mag-alumni">
					 	<?php get_template_part( 'template-parts/magazine-alumni' ); ?>
					</div>
				</div>
   			</div>

		</div>
	</section>
</div>

<div class="section-divider"></div>

<section class="connect" aria-label="Connect with the Krieger School">
	<div class="links">
		<h1 class="heading">Connect</h1>
		<div class="social">
			<ul class="menu align-right">
				<li><a href="https://www.tiktok.com/@jhuartssciences"><span class="fab fa-tiktok fa-2x"></span><span class="screen-reader-text">TikTok</span></a></li>
				<li><a href="https://www.youtube.com/user/jhuksas"><span class="fab fa-youtube fa-2x"></span><span class="screen-reader-text">YouTube</span></a></li>
				<li><a href="https://twitter.com/JHUArtsSciences"><span class="fab fa-twitter fa-2x"></span><span class="screen-reader-text">Twitter</span></a></li>
				<li><a href="https://www.instagram.com/JHUArtsSciences/"><span class="fab fa-instagram fa-2x"></span><span class="screen-reader-text">Instagram</span></a></li>
				<li><a href="https://facebook.com/JHUArtsSciences"><span class="fab fa-facebook-square fa-2x"></span><span class="screen-reader-text">Facebook</span></a></li>
				<li class="menu-text">#JHUArtsSciences</li>
			</ul>
		</div>
	</div>
	<div class="feed">
		<div class="row feeds">
			<div class="small-12 large-12 columns">
				<div class="insta">
					<?php echo do_shortcode('[instagram-feed]');?>
				</div>
			</div>
		</div>
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
