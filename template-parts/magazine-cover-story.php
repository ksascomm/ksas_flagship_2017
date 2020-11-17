<?php

	//get the Feature taxonomy ID
	$latest_cover_story_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/pages?_fields=title,link,acf,categories,excerpt&_embed&categories=136&volume=195';

	if ( false === ( $latest_cover_story = get_transient( 'asmagazine_cover_story_query' ) ) ) {
		$latest_cover_story = wp_remote_get($latest_cover_story_url);
		set_transient( 'asmagazine_cover_story_query', $latest_cover_story, 2419200 ); 
	}	
	
	// Display a error nothing is returned.
	if ( is_wp_error( $latest_cover_story ) ) {
		$cover_story_error_string = $latest_cover_story->get_error_message();
		echo '<script>console.log("Error:' . $cover_story_error_string . '")</script>';
	}

	// Get the body.
	$cover_story = json_decode( wp_remote_retrieve_body( $latest_cover_story ) );
	// Display a warning nothing is returned.
	if ( empty( $cover_story ) ) {
		echo '<script>console.log("Error: There is no Cover Story content")</script>';
	}
	// If there are posts then display them!
	if ( ! empty( $cover_story ) ) :?>
	
			<div class="issue-stories">
			<?php foreach ( $cover_story as $cover ) : ?>
				<div class="card">
					<div class="card-section">
				 		<h3><?php echo $cover->title->rendered;?></h3>
				 		<p><?php echo $cover->excerpt->rendered;?></p>
				 		<p><a class="button" href="<?php echo $cover->link;?>">Read the Full Story on A&S Magazine <span class="fas fa-chevron-circle-right"></span></a></p>
					</div>
				</div> 
			<?php endforeach;?>
			</div>
	
	<?php endif;?>