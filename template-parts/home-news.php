<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">

<div class="media-object">
  <div class="media-object-section">
  <h6><?php echo get_the_category( $id )[0]->name; ?></h6>
  	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
    	<h1><?php the_title(); ?></h1>
    </a>
    <p><?php the_excerpt(); ?></p>
    
  </div>
  <div class="media-object-section">
    <?php the_post_thumbnail('full'); ?>
  </div>
</div>

</article>