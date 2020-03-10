<?php
/**
* The default template for displaying events via the hub's api
*
* @package FoundationPress
* @since FoundationPress 1.0.0
*/
?>
<div class="row" data-equalizer data-equalize-on="large">
	<h1 class="hub-title"><a href="https://hub.jhu.edu/events/">Events from The Hub</a></h1>
	<?php
	$hub_event_url = 'https://api.hub.jhu.edu/events?v=1&key=bed3238d428c2c710a65d813ebfb2baa664a2fef&locations=668&include_subterms=668&per_page=4';

	if ( false === ( $hub_event_call = get_transient( 'flagship_hub_events_query' ) ) ) {
		$hub_event_call = wp_remote_get($hub_event_url);
	set_transient( 'flagship_hub_events_query', $hub_event_call, 86400 ); }

	// Display a error nothing is returned.
	if ( is_wp_error( $hub_event_call ) ) {
		$error_string = $hub_event_call->get_error_message();
		echo '<div class="callout alert"><p>' . $error_string . '</p></div>';

	}

	// Get the body.
		$hub_event_results = json_decode($hub_event_call['body'], true);
		$hub_events = $hub_event_results['_embedded'];

	// Display a warning nothing is returned.
	if ( empty( $hub_events ) ) {
		echo '<div class="callout warning"><p>There are no upcoming events</p></div>';
	}

	foreach ($hub_events['events'] as $hub_event ) { ?>
	<article class="hub-news hub-events end" aria-labelledby="post-<?php echo $hub_event['id'];?>" data-equalizer-watch>
		<h1><a href="<?php echo $hub_event['url']; ?>" target="_blank" id="post-<?php echo $hub_event['id'];?>"><?php echo $hub_event['name']; ?></a></h1>
		<?php $start = $hub_event['start_time'];
		$end = $hub_event['end_time'];
		$date = $hub_event['start_date']; ?>
		<h3><span class="far fa-calendar-alt" aria-label="date"></span> <?php echo date('m/d/Y', strtotime($date));?></h3>
		<h4><span class="far fa-clock" aria-label="time"></span> <?php echo date('h:i a', strtotime($start));?> - <?php echo date('h:i a', strtotime($end));?></h4>
		<summary>
		<p><?php $description =  $hub_event['description'];
		$excerpt = $hub_event['excerpt'];
			echo  wp_trim_words($description, 35, '...');
			if (empty($description) ) {
				echo wp_trim_words($excerpt, 35, '...');
			} ?>
		</p>
		</summary>
	</article>
	<?php } ?>
</div>