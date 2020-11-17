<?php

	//get the Feature taxonomy ID
	$latest_big_ideas_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/posts?_fields=title,link,excerpt&volume=195&categories=70';

	if ( false === ( $latest_big_ideas = get_transient( 'asmagazine_big_ideas_query' ) ) ) {
		$latest_big_ideas = wp_remote_get($latest_big_ideas_url);
		set_transient( 'asmagazine_big_ideas_query', $latest_big_ideas, 2419200 ); 
	}	
	
	// Display a error nothing is returned.
	if ( is_wp_error( $latest_big_ideas ) ) {
		$big_ideas_error_string = $latest_big_ideas->get_error_message();
		echo '<script>console.log("Error:' . $big_ideas_error_string . '")</script>';
	}

	// Get the body.
	$big_ideas = json_decode( wp_remote_retrieve_body( $latest_big_ideas ) );
	// Display a warning nothing is returned.
	if ( empty( $big_ideas ) ) {
		echo '<script>console.log("Error: There is no Big Ideas content")</script>';
	}
	// If there are posts then display them!
	if ( ! empty( $big_ideas ) ) :?>
	
			<div class="issue-stories slicker" id="ideas" data-equalizer>
			<?php foreach ( $big_ideas as $ideas ) : ?>
				<div data-equalizer-watch>
					<div class="media-object">
						<div class="media-object-section">
					 		<h3><a href="<?php echo $ideas->link;?>"><?php echo $ideas->title->rendered;?></a></h3>
					 		<p><?php echo $ideas->excerpt->rendered;?></p>
						</div>
					</div>
				</div>
			<?php endforeach;?>
			</div>
	
	<?php endif;?>