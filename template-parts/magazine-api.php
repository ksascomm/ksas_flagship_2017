<?php
	$frontpagefeaturedimg_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/pages?_embed&slug=home';
	
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
	$latest_features_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/pages?per_page=4&volume=114';

	if ( false === ( $latest_features = get_transient( 'asmagazine_features_query' ) ) ) {
		$latest_features = wp_remote_get($latest_features_url);
		set_transient( 'asmagazine_features_query', $latest_features, 2419200 ); 
	}	
	
	// Display a error nothing is returned.
	if ( is_wp_error( $latest_features ) ) {
		$error_string = $latest_features->get_error_message();
		echo '<div class="callout alert"><p>' . $error_string . '</p></div>';
	}

	// Get the body.
	$features = json_decode( wp_remote_retrieve_body( $latest_features ) );
	// Display a warning nothing is returned.
	if ( empty( $features ) ) {
		echo '<div class="callout warning"><p>There is no content</p></div>';
	}
	// If there are posts then display them!
	if ( ! empty( $features ) ) :?>
		
		<div class="small-12 medium-8 xlarge-9 columns">
			<div class="issue-stories">
				<h2>Fall 2019 Features</h2>
			<?php foreach ( $features as $feature ) : ?>
				<div class="media-object">
					<div class="media-object-section">
				 		<h3><a href="<?php echo $feature->link;?>"><?php echo $feature->title->rendered;?></a></h3>
				 		<p><?php echo $feature->acf->ecpt_tagline;?></p>
					</div>
				</div> 
			<?php endforeach;?>
			</div>
			<a href="https://magazine.krieger.jhu.edu/" class="button float-right">Read the Full Issue <span class="fas fa-arrow-circle-right"></span></a>
		</div>
	<?php endif;?>