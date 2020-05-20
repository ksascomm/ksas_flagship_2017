<?php

	//get the Feature taxonomy ID
	$latest_student_digest_url = 'https://magazine.krieger.jhu.edu/wp-json/wp/v2/posts?_fields=title,link,excerpt&volume=190&categories=76';

	if ( false === ( $latest_student_digest = get_transient( 'asmagazine_student_digest_query' ) ) ) {
		$latest_student_digest = wp_remote_get($latest_student_digest_url);
		set_transient( 'asmagazine_student_digest_query', $latest_student_digest, 2419200 ); 
	}	
	
	// Display a error nothing is returned.
	if ( is_wp_error( $latest_student_digest ) ) {
		$error_string = $latest_student_digest->get_error_message();
		echo '<div class="callout alert"><p>' . $error_string . '</p></div>';
	}

	// Get the body.
	$student_digest = json_decode( wp_remote_retrieve_body( $latest_student_digest ) );
	// Display a warning nothing is returned.
	if ( empty( $student_digest ) ) {
		echo '<div class="callout warning"><p>There is no content</p></div>';
	}
	// If there are posts then display them!
	if ( ! empty( $student_digest ) ) :?>
	
			<div class="issue-stories slicker" id="digest" data-equalizer>
			<?php foreach ( $student_digest as $digest ) : ?>
				<div data-equalizer-watch>
					<div class="media-object">
						<div class="media-object-section">
					 		<h3><a href="<?php echo $digest->link;?>"><?php echo $digest->title->rendered;?></a></h3>
					 		<p><?php echo $digest->excerpt->rendered;?></p>
						</div>
					</div>
				</div>
			<?php endforeach;?>
			</div>
	
	<?php endif;?>