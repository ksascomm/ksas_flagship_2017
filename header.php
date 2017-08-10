<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
		<script>
		!function(a,b,c,d,e,f,g){a.GoogleAnalyticsObject=e,a[e]=a[e]||function(){(a[e].q=a[e].q||[]).push(arguments)},a[e].l=1*new Date,f=b.createElement(c),g=b.getElementsByTagName(c)[0],f.async=1,f.src=d,g.parentNode.insertBefore(f,g)}(window,document,"script","//www.google-analytics.com/analytics.js","ga"),ga("create","UA-40512757-1","jhu.edu"),ga("send","pageview");
		</script>
		<script type="text/javascript">
		!function(){var a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src="//siteimproveanalytics.com/js/siteanalyze_11464.js";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b)}();
		</script>
	</head>
	<body <?php body_class(); ?>>
	<a class="skiplink show-on-focus" href="#page">Skip to main content</a>

	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	
	<div class="off-canvas-wrapper">
	
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>

	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>
	

	<header class="site-header" role="banner" aria-label="Tile Bar Area">

		<div class="site-title-bar title-bar" <?php foundationpress_title_bar_responsive_toggle() ?> data-hide-for="large">
			<div class="title-bar-left">
				<button class="menu-icon" type="button" data-toggle="<?php foundationpress_mobile_menu_id(); ?>"><span class="screen-reader-text">Menu</span></button>
				<span class="site-mobile-title title-bar-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Menu</a>
				</span>
			</div>
		</div>


		<div class="roof show-for-large" aria-hidden="true">
			<?php get_template_part( 'template-parts/roof' ); ?>
		</div>

		

		<nav class="site-navigation top-bar" role="navigation" aria-label="Main Navigation">
		
				<div class="top-bar-title">
					<h1><span class="screen-reader-text"><?php echo get_bloginfo( 'title' ); ?></span></h1>
			
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img data-interchange="[<?php echo get_template_directory_uri() ?>/assets/images/ksas-horizontal-sm.png, small], [<?php echo get_template_directory_uri() ?>/assets/images/ksas-horizontal-md.png, medium], [<?php echo get_template_directory_uri() ?>/assets/images/ksas-horizontal-lg.png, large]" alt="Krieger School of Arts & Sciences">
					</a>	
				</div>
	
			<div class="top-bar-left">
				<?php foundationpress_top_bar_r(); ?>
				<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
					<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
				<?php endif; ?>
			</div>
		</nav>
	</header>

	<section class="container" aria-label="Main Content Area" id="page">
		<?php do_action( 'foundationpress_after_header' );
