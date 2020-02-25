<?php
/**
* The default template for displaying latest tiktok video
*
* @package FoundationPress
* @since FoundationPress 1.0.0
*/
?>

<?php
	global $wp_query;
	$frontid = $wp_query->post->ID;
	$video_id = get_post_meta($frontid, 'ecpt_tiktok_video', true);
	$tiktok_video_url = 'https://www.tiktok.com/oembed?url='. $video_id;

	if ( WP_DEBUG or false === ( $tiktok_video = get_transient( 'tiktok_video_query' ) ) ) {
		$tiktok_video = wp_remote_get($tiktok_video_url);
	set_transient( 'tiktok_video_query', $tiktok_video, 86400 ); }

	// Display a error nothing is returned.
	if ( is_wp_error( $tiktok_video ) ) {
		$error_string = $tiktok_video->get_error_message();
		echo '<div class="callout alert"><p>' . $error_string . '</p></div>';

	}

	$tiktok_results = json_decode($tiktok_video['body'], true);
	//print_r($url);


	// Display a warning nothing is returned.
	if ( empty( $tiktok_results ) ) {
		echo '<div class="callout warning"><p>There is no tiktok!</p></div>';
	}
	//print_r($tiktok_results);
	if ( ! empty( $tiktok_results ) ) : ?>
		<?php 	//store the video link
	preg_match('/cite="([^"]+)"/', $tiktok_results['html'], $matches);
	$tiktok_vid_url = $matches[1];?>
	<div class="tiktok-thumb">
		<a href="<?php echo $tiktok_vid_url;?>">
			<img src="<?php echo $tiktok_results['thumbnail_url'];?>" class="float-center image" alt="<?php echo $tiktok_results['title'];?>">
			<div class="overlay">
    			<div class="text">
    				<?php echo $tiktok_results['title'];?>
    				<br>
    				<svg xmlns="http://www.w3.org/2000/svg" height="2rem" viewBox="-32 0 512 512" width="2rem"><g><path d="m432.734375 112.464844c-53.742187 0-97.464844-43.722656-97.464844-97.464844 0-8.285156-6.714843-15-15-15h-80.335937c-8.28125 0-15 6.714844-15 15v329.367188c0 31.59375-25.707032 57.296874-57.300782 57.296874s-57.296874-25.703124-57.296874-57.296874c0-31.597657 25.703124-57.300782 57.296874-57.300782 8.285157 0 15-6.714844 15-15v-80.335937c0-8.28125-6.714843-15-15-15-92.433593 0-167.632812 75.203125-167.632812 167.636719 0 92.433593 75.199219 167.632812 167.632812 167.632812 92.433594 0 167.636719-75.199219 167.636719-167.632812v-145.792969c29.851563 15.917969 63.074219 24.226562 97.464844 24.226562 8.285156 0 15-6.714843 15-15v-80.335937c0-8.28125-6.714844-15-15-15zm0 0" data-original="#000000" class="active-path" data-old_color="#000000" fill="#fff"/></g></svg>
    				</div>
  			</div>
		</a>
	</div>
	<?php endif;?>