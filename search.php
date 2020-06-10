<?php
/**
 * The template for displaying search results pages.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="main-wrap sidebar-right" role="main"  id="page">

<?php do_action( 'foundationpress_before_content' ); ?>


<article <?php post_class('main-content') ?> id="search-results overview">
		<header>
			<h1 class="entry-title"><?php _e( 'Search Results', 'ksasflagship' ); ?></h1>
		</header>

    <gcse:search></gcse:search>

</article>

<?php do_action( 'foundationpress_after_content' ); ?>
<aside class="sidebar">
      <div class="ecpt-page-sidebar">
          <div class="sidebar-content">
            <div class="sidebar_header">
              <h5 class="white">Search JHU Network</h5>
            </div>
            <p>You are currently searching the Krieger network. Try searching the <a href="https://www.jhu.edu/search/">JHU network</a> for websites beyond KSAS.</p>
          </div>
    </div>
</aside>

<?php get_footer();