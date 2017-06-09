<?php
/*
Template Name: Front
*/
get_header(); ?>
<!--ORBIT SLIDER -->

<?php $flagship_evergreen_query = new WP_Query(array(
   'post_type' => 'evergreen',
   'orderby' => 'rand',
   'post_status' => 'publish',
   'posts_per_page' => '3'));

if ( $flagship_evergreen_query->have_posts() ) : ?>

<div class="hero">
<div class="fullscreen-image-slider">
  <div class="orbit" role="region" aria-label="FullScreen Pictures" data-orbit>
    <ul class="orbit-container">
     <?php if ($flagship_evergreen_query->post_count > 1) : ?>
      <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span><span class="fa fa-angle-left fa-4x" aria-hidden="true">&#xFE0E;</button>
      <button class="orbit-next"><span class="show-for-sr">Next Slide</span><span class="fa fa-angle-right fa-4x" aria-hidden="true">&#xFE0E;</button>
      <?php endif;?>
      <?php while ($flagship_evergreen_query->have_posts()) : $flagship_evergreen_query->the_post(); ?>
      <li class="is-active orbit-slide">
        <img class="orbit-image" src="<?php echo get_post_meta($post->ID, 'ecpt_fullimage', true); ?>">
        <figcaption class="orbit-caption">
	        <div class="row">
		        <div class="small-12 large-push-1 columns">
		          <h1><?php the_title(); ?></h1>
		          	<div class="show-for-medium">
		          		<?php the_content(); ?>
		          	</div>
		         </div>
	         </div>
        </figcaption>
      </li>
     <?php endwhile;?>
    </ul>
	<nav class="orbit-bullets">
	  <?php $entries = $flagship_evergreen_query->post_count; ?>
	  <?php for($i=0; $i<$entries; $i++) { ?>
	    <button class="<?php echo $i==0 ? 'is-active' : '' ?>" data-slide="<?php echo $i; ?>"></button>
	  <?php } ?>
	</nav>   
  </div>
</div>
</div>
<?php endif; ?>

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'template-parts/home-findprogram' ); ?>
<?php endwhile;?>
<?php do_action( 'foundationpress_after_content' ); ?>

<div class="section-divider">
	<hr />
</div>

<div class="grey-bg texture">

<section class="news">
	
	<ul class="tabs" data-responsive-accordion-tabs="accordion medium-tabs" id="example-tabs">
	    <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Spotlight</a></li>
	    <li class="tabs-title"><a href="#panel2">News</a></li>
	    <li class="tabs-title"><a href="#panel3">Events</a></li>
	</ul>

	<div class="tabs-content" data-tabs-content="example-tabs">

	    <div class="tabs-panel is-active" id="panel1">
	   
	    <?php $homepage_query = new WP_Query(array(	
			'post_type' => array('deptextra', 'post'),
			'category_name' => 'spotlight',
			'posts_per_page' => '1'				
			)); 
	    	if ( $homepage_query->have_posts() ) : while ( $homepage_query->have_posts() ) : $homepage_query->the_post();
	    	$format = get_post_format();
	    	if ( false === $format ) {
	    		$format = 'standard'; }
	    		if ( $format == 'video' ) : locate_template('template-parts/home-video.php', true, false); endif;
				if ( $format == 'standard' ) : locate_template('template-parts/home-news.php', true, false); endif;?>
		<?php endwhile; endif; ?>
	   
	    </div>
	    <div class="tabs-panel" id="panel2">
	     
	     <?php get_template_part( 'template-parts/hub-news' ); ?>

	    </div>
	    <div class="tabs-panel" id="panel3">
		<?php get_template_part( 'template-parts/hub-events' ); ?>
	    </div>

    </div>
          <hr>

</section>
</div>
<div class="section-divider">
	<hr />
</div>

<section class="connect">
	<h2>Connect</h3>

	<div class="social">
		<ul class="menu align-right">
			<li><a href="https://www.youtube.com/user/jhuksas" title="YouTube"><span class="fi-list fa fa-youtube-square fa-2x"></span><span class="screen-reader-text">YouTube</span></a></li>
			<li><a href="https://twitter.com/JHUKSAS" title="Twitter"><span class="fi-list fa fa-twitter fa-2x"></span><span class="screen-reader-text">Twitter</span></a></li>
			<li><a href="https://www.instagram.com/jhuksas/" title="Instragram"><span class="fi-list fa fa-instagram fa-2x"></span><span class="screen-reader-text">Instragram</span></a></li>
			<li><a href="http://facebook.com/jhuksas" title="Facebook"><span class="fi-list fa fa-facebook-official fa-2x"></span><span class="screen-reader-text">Facebook</span></a></li>
			<li class="menu-text">#jhuksas</li>
		</ul>
	</div>
		<div class="instagram">
			<h1>instagram</h1>
			<?php get_template_part( 'template-parts/feed-instagram' ); ?>
			    
		</div>
		<div class="twitter">
			<h1>twitter</h1>
			<?php get_template_part( 'template-parts/feed-twitter' ); ?>
		</div>
</section>


<div class="section-divider">
	<hr />
</div>


<section class="giving">

	<div class="marketing-site-hero">
	  <div class="marketing-site-hero-content">
	    <h1>Support the Krieger School</h1>
	    <p class="subheader">The School of Arts and Sciences plays a vital role within Johns Hopkins University, housing the disciplines of the humanities and natural and social sciences from which all other courses of study stem.</p>
	    <a href="/giving" class="button">Find Out More</a>
	  </div>
	</div>

</section>

<?php get_footer();
