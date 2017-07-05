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

<article class="home-news" id="post-<?php the_ID(); ?>">

<div class="row">
  <div class="large-6 large-push-6 columns">

    <?php the_post_thumbnail('full', [
	   'class' => 'img-responsive large-news',
	   'title' => 'Feature image',
    ]); ?>
  </div>
  <div class="large-6 large-pull-6 columns">
      <h1><small><?php echo get_the_category( $id )[0]->name; ?></small><br>
      <?php the_title(); ?></h1> 
      <p><?php the_excerpt(); ?></p>

     <?php if ( get_post_meta($post->ID, 'ecpt_location', true) ) : ?>
      	<a href="<?php echo get_post_meta($post->ID, 'ecpt_location', true); ?>" target="_blank" class="button" title="<?php the_title(); ?>">Read the Full Story</a>
  	<?php else : ?>
  		<a href="<?php the_permalink(); ?>" class="button" title="<?php the_title(); ?>">Read the Full Story</a>
	<?php endif;?>
  </div>
</div>

</article>