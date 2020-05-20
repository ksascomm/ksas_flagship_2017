<?php
	$frontpagefeaturedimg_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/media/13048';
	
	if ( false === ( $frontpageimage = get_transient( 'asmagazine_image_query' ) ) ) {
		$frontpageimage = wp_remote_get($frontpagefeaturedimg_url);
		set_transient( 'asmagazine_image_query', $frontpageimage, 2419200 ); 
	}		
	
	// Display a error nothing is returned.
	if ( is_wp_error( $frontpageimage ) ) {
		$error_string = $frontpageimage->get_error_message();
		echo '<div class="callout alert"><p>' . $error_string . '</p></div>';

	}
	// Get the body.
	
	$frontpost = json_decode( wp_remote_retrieve_body( $frontpageimage ) );

	// Display a warning nothing is returned.
	if ( empty( $frontpost ) ) {
		echo '<div class="callout warning"><p>There is no home page featured image</p></div>';
	}
	
	// If there is a featured image for the home page, display it!
	if ( ! empty( $frontpost ) ) :?>
		<?php foreach ( $frontpost as $front ) : ?>
			<div class="issue-cover">
				<div class="card">
					<img class="cover" src="<?php echo $front->_embedded->{'wp:featuredmedia'}[0]->media_details->sizes->{'medium_large'}->source_url;?>" alt="<?php echo $front->_embedded->{'wp:featuredmedia'}[0]->alt_text;?>">
				</div>
			</div>
		<?php endforeach;?>
	<?php endif;?>