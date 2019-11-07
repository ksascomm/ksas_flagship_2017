<?php
	
	$frontpageresponse = wp_remote_get('https://magazine.krieger.jhu.edu/wp-json/wp/v2/pages?_embed&slug=home');
	// Display a error nothing is returned.
	if ( is_wp_error( $frontpageresponse ) ) {
		$error_string = $frontpageresponse->get_error_message();
		echo '<div class="callout alert"><p>' . $error_string . '</p></div>';

	}
	// Get the body.
	$frontpost = json_decode( wp_remote_retrieve_body( $frontpageresponse ) );
	// Display a warning nothing is returned.
	if ( empty( $frontpost ) ) {
		echo '<div class="callout warning"><p>There is no home page featured image</p></div>';
	}
	// If there is a featured image for the home page, display it!
	if ( ! empty( $frontpost ) ) :?>
		<?php foreach ( $frontpost as $front ) : ?>
		<div class="small-12 medium-4 xlarge-3 columns">
			<div class="issue-cover">
				<div class="card">
					<img class="cover" src="<?php echo $front->_embedded->{'wp:featuredmedia'}[0]->media_details->sizes->{'cover-story-large'}->source_url;?>" alt="<?php echo $front->_embedded->{'wp:featuredmedia'}[0]->alt_text;?>">
				</div>
			</div>
		</div>
	<?php endforeach;?>
	<?php endif;?>
<?php
	//get the Feature taxonomy ID
	$response = wp_remote_get( 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/pages?per_page=4&volume=114' );
	
	// Display a error nothing is returned.
	if ( is_wp_error( $response ) ) {
		$error_string = $response->get_error_message();
		echo '<div class="callout alert"><p>' . $error_string . '</p></div>';
	}

	// Get the body.
	$posts = json_decode( wp_remote_retrieve_body( $response ) );
	// Display a warning nothing is returned.
	if ( empty( $posts ) ) {
		echo '<div class="callout warning"><p>There is no content</p></div>';
	}
	// If there are posts then display them!
	if ( ! empty( $posts ) ) :?>
		
		<div class="small-12 medium-8 xlarge-9 columns">
			<div class="issue-stories">
				<h2>Fall 2019 Features</h2>
			<?php foreach ( $posts as $post ) : ?>
				<div class="media-object">
					<div class="media-object-section">
				 		<h3><a href="<?php echo $post->link;?>"><?php echo $post->title->rendered;?></a></h3>
				 		<p><?php echo $post->acf->ecpt_tagline;?></p>
					</div>
				</div> 
			<?php endforeach;?>
			</div>
			<a href="https://magazine.krieger.jhu.edu/" class="button float-right">Read the Full Issue <span class="fas fa-arrow-circle-right"></span></a>
		</div>
	<?php endif;?>