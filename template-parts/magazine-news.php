<?php

	//get the Feature taxonomy ID
	$latest_news_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/posts?_fields=title,link,excerpt&volume=195&categories=1';

	if ( false === ( $latest_news = get_transient( 'asmagazine_news_query' ) ) ) {
		$latest_news = wp_remote_get($latest_news_url);
		set_transient( 'asmagazine_news_query', $latest_news, 2419200 ); 
	}	
	
	// Display a error nothing is returned.
	if ( is_wp_error( $latest_news ) ) {
		$news_error_string = $latest_news->get_error_message();
		echo '<script>console.log("Error:' . $news_error_string . '")</script>';
	}

	// Get the body.
	$news = json_decode( wp_remote_retrieve_body( $latest_news ) );
	// Display a warning nothing is returned.
	if ( empty( $news ) ) {
		echo '<script>console.log("Error: There is no News content")</script>';
	}
	// If there are posts then display them!
	if ( ! empty( $news ) ) :?>
	
			<div class="issue-stories slicker" id="news" data-equalizer>
			<?php foreach ( $news as $new ) : ?>
				<div data-equalizer-watch>
					<div class="media-object">
						<div class="media-object-section">
					 		<h3><a href="<?php echo $new->link;?>"><?php echo $new->title->rendered;?></a></h3>
					 		<p><?php echo $new->excerpt->rendered;?></p>
						</div>
					</div> 
				</div>
			<?php endforeach;?>
			</div>
	
	<?php endif;?>