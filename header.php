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
		
		<meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/dist/assets/images/favicons/browserconfig.xml" />
		<script>
		!function(a,b,c,d,e,f,g){a.GoogleAnalyticsObject=e,a[e]=a[e]||function(){(a[e].q=a[e].q||[]).push(arguments)},a[e].l=1*new Date,f=b.createElement(c),g=b.getElementsByTagName(c)[0],f.async=1,f.src=d,g.parentNode.insertBefore(f,g)}(window,document,"script","//www.google-analytics.com/analytics.js","ga"),ga("create","UA-40512757-1","jhu.edu"),ga("send","pageview");
		</script>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-5VTN64C');</script>
		<!-- End Google Tag Manager -->		
		<script type="text/javascript">
		!function(){var a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src="//siteimproveanalytics.com/js/siteanalyze_11464.js";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b)}();
		</script>
		<script async src="https://cse.google.com/cse.js?cx=012258670098148303364:zptrsb24qaq"></script>
		<script src="https://kit.fontawesome.com/ed22ca715b.js" crossorigin="anonymous" defer></script>
	</head>
	<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5VTN64C"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<div class="alert-bar" role="navigation" aria-label="COVID-19 Alerts">
    	<a class="alert-message" href="https://covidinfo.jhu.edu/">COVID-19 information and resources for the Johns Hopkins University community</a>
	</div>
	<div role="navigation" aria-label="Skip to main content">
		<a class="skiplink show-on-focus" href="#page">Skip to main content</a>
	</div>
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

		

		<nav class="site-navigation top-bar" aria-label="Main Navigation">
		
				<div class="top-bar-title nav-shield">
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

	<div class="container" aria-label="Main Content Area" id="page">
		<?php do_action( 'foundationpress_after_header' );
