<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

 get_header(); ?>

 <div id="page-sidebar-left" role="main">
 <?php do_action( 'foundationpress_before_content' ); ?>
 <?php while ( have_posts() ) : the_post(); ?>
   <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
    <?php get_template_part( 'template-parts/featured-image' ); ?>
       <header>
       <?php if ( !has_post_thumbnail( $post->ID ) ) : ?>
           <h1 class="entry-title"><?php the_title(); ?></h1>
       <?php endif;?>
       </header>
       <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
       <div class="entry-content">
           <?php the_content(); ?>
           <?php edit_post_link( __( 'Edit', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
       </div>
   </article>
 <?php endwhile;?>

 <?php do_action( 'foundationpress_after_content' ); ?>
 <?php get_sidebar(); ?>

 </div>

 <?php get_footer();
