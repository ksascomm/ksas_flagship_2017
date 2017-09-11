<?php
/*
Template Name: Front
*/
get_header(); ?>
<!--ORBIT SLIDER -->


<header class="hero" role="banner" aria-label="Explore the Krieger School Slider">
	<?php if (!is_mobile()) : ?> 
	<div class="fullscreen-image-slider show-for-large">
	  <div class="orbit" role="region" aria-label="Research Video" data-orbit>
	    <ul class="orbit-container">
			<li class="is-active orbit-slide">
				<div class="responsive-embed widescreen">
			  	    <video loop muted autoplay poster="http://krieger2.jhu.edu/flagship/homepage-video/screenGrab-BennettStudents.jpg" id="video">
				        <source src="http://krieger2.jhu.edu/flagship/homepage-video/highlight_540p.mp4" type="video/mp4">
				    </video>
				</div>
				<figcaption class="orbit-caption">
				    <div class="row">
				        <div class="small-12 large-push-1 columns">
				          <h1>Discovery Is...</h1>
				          	<p>Innovative research takes place every day at the Krieger School of Arts and Sciences.</p>
				          	<p><a class="button orbit" href="https://www.youtube.com/watch?v=wJYtZiCWtK4">Watch Now <span class="fa fa-play-circle" aria-hidden="true"></span></a></p>
				         </div>
				     </div>
				</figcaption>
			</li>
	    </ul>
	  </div>
	</div>
	<?php endif; ?>
	<div class="front-hero hide-for-large video"></div>
		<div class="row">
	        <div class="small-12 large-push-1 columns">
	          <h1>Discovery Is...</h1>
	          	<p>Innovative research takes place every day at the Krieger School of Arts and Sciences.</p>
	          	<p><a class="button orbit" href="#">Watch Now <span class="fa fa-play-circle" aria-hidden="true"></span></a></p>
	         </div>
	     </div>
		<hr>
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

		    <div class="tabs-panel" id="hubnews" aria-label="Hub News">
		     
		     <?php get_template_part( 'template-parts/hub-news' ); ?>

		    </div>

		    <div class="tabs-panel" id="hubevents" aria-label="Hub Events">
			
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
			<li><a href="https://twitter.com/JHUKSAS"><span class="fi-list fa fa-twitter fa-2x"></span><span class="screen-reader-text">Twitter</span></a></li>
			<li><a href="https://www.instagram.com/jhuksas/"><span class="fi-list fa fa-instagram fa-2x"></span><span class="screen-reader-text">Instagram</span></a></li>
			<li><a href="http://facebook.com/jhuksas"><span class="fi-list fa fa-facebook-official fa-2x"></span><span class="screen-reader-text">Facebook</span></a></li>
			<li class="menu-text">#jhuksas</li>
		</ul>
	</div>	
	<div class="instagram" aria-labelledby="instagram-link" role="contentinfo">
		<h1 id="instagram-link">instagram <span class="fa fa-instagram"></span><span class="screen-reader-text">Instagram</span></h1>
		<?php get_template_part( 'template-parts/feed-instagram' ); ?>
		    
	</div>

	<div class="twitter" aria-labelledby="twitter-link" role="contentinfo">
		<h1 id="twitter-link">twitter <span class="fa fa-twitter"></span><span class="screen-reader-text">Twitter</span></h1>
		<?php get_template_part( 'template-parts/feed-twitter' ); ?>
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
