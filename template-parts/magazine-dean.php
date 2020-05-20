<?php

	//get the Feature taxonomy ID
	$latest_from_dean_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/posts?_embed&volume=190&categories=72';

	if ( false === ( $latest_from_dean = get_transient( 'asmagazine_from_dean_query' ) ) ) {
		$latest_from_dean = wp_remote_get($latest_from_dean_url);
		set_transient( 'asmagazine_from_dean_query', $latest_from_dean, 2419200 ); 
	}	
	
	// Display a error nothing is returned.
	if ( is_wp_error( $latest_from_dean ) ) {
		$error_string = $latest_from_dean->get_error_message();
		echo '<div class="callout alert"><p>' . $error_string . '</p></div>';
	}

	// Get the body.
	$from_dean = json_decode( wp_remote_retrieve_body( $latest_from_dean ) );
	// Display a warning nothing is returned.
	if ( empty( $from_dean ) ) {
		echo '<div class="callout warning"><p>There is no content</p></div>';
	}
	// If there are posts then display them!
	if ( ! empty( $from_dean ) ) :?>
	
			<div class="issue-stories">
			<?php foreach ( $from_dean as $dean ) : ?>
				<div class="media-object stack-for-small">
					<div class="media-object-section">
						<img class="dean-portrait" src="<?php echo $dean->_embedded->{'wp:featuredmedia'}[0]->media_details->sizes->{'full'}->source_url;?>" alt="Dean Headshot">
					</div>
					<div class="media-object-section">
				 		<p><?php echo strip_tags($dean->excerpt->rendered);?></p>
				 		<p><a class="button" href="<?php echo $dean->link;?>">More from Dean Wendland</a></p>
					</div>
				</div> 
			<?php endforeach;?>
			</div>
	
	<?php endif;?>