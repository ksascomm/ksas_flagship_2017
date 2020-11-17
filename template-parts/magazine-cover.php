<?php
	$frontpagecoverimg_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/pages?_embed&slug=home';

	if ( false === ( $frontpagecover = get_transient( 'asmagazine_cover_image_query' ) ) ) {
		$frontpagecover = wp_remote_get($frontpagecoverimg_url);
		set_transient( 'asmagazine_cover_image_query', $frontpagecover, 2419200 );
	}

	// Display a error nothing is returned.
	if ( is_wp_error( $frontpagecover ) ) {
		$front_error_string = $frontpagecover->get_error_message();
		echo '<script>console.log("Error:' . $front_error_string . '")</script>';

	}
	// Get the body.

	$frontcover = json_decode( wp_remote_retrieve_body( $frontpagecover ) );

	// Display a warning nothing is returned.
	if ( empty( $frontcover ) ) {
		echo '<script>console.log("Error: There is no Front Cover content")</script>';
	}

	// If there is a featured image for the home page, display it!
	if ( ! empty( $frontcover ) ) :?>
		<?php foreach ( $frontcover as $cover ) : ?>
			<div class="issue-cover">
				<div class="card">
					<img class="cover" src="<?php echo $cover->_embedded->{'wp:featuredmedia'}[0]->media_details->sizes->{'full'}->source_url;?>" alt="<?php echo $cover->_embedded->{'wp:featuredmedia'}[0]->alt_text;?>">
				</div>
			</div>
		<?php endforeach;?>
	<?php endif;?>
