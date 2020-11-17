<?php

	//get the Feature taxonomy ID
	$latest_features_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/pages?_fields=title,link,acf,categories&volume=195&categories=141';

	if ( false === ( $latest_features = get_transient( 'asmagazine_features_query' ) ) ) {
		$latest_features = wp_remote_get($latest_features_url);
		set_transient( 'asmagazine_features_query', $latest_features, 2419200 ); 
	}	
	
	// Display a error nothing is returned.
	if ( is_wp_error( $latest_features ) ) {
		$feature_error_string = $latest_features->get_error_message();
		echo '<script>console.log("Error:' . $feature_error_string . '")</script>';
	}

	// Get the body.
	$features = json_decode( wp_remote_retrieve_body( $latest_features ) );
	// Display a warning nothing is returned.
	if ( empty( $features ) ) {
		echo '<script>console.log("Error: There is no Features content")</script>';
	}
	// If there are posts then display them!
	if ( ! empty( $features ) ) :?>
	
			<div class="issue-stories">
			<?php foreach ( $features as $feature ) : ?>
				<div class="media-object">
					<div class="media-object-section">
				 		<h3>
							<a href="<?php echo $feature->link;?>">
								<?php $category_name = $feature->categories[0];
				 				if ($category_name == '136'):?>
				 					<?php echo '<small>Cover Story:</small> ';?>
				 				<?php endif;?>
				 				<?php echo $feature->title->rendered;?>
				 			</a>
						</h3>
				 		<p><?php echo $feature->acf->ecpt_tagline;?></p>
					</div>
				</div> 
			<?php endforeach;?>
			</div>
	
	<?php endif;?>