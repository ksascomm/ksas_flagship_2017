<?php
/**
 * The default template for displaying events via the hub's api
 *
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>


<div class="row">

<h1>
	<a href="https://hub.jhu.edu/events/">Events from The Hub</a>
</h1>

<?php
$hub_event_url = 'https://api.hub.jhu.edu/event_categories/2450,2454,2457,2458,2459,2460,2461,2519,2520,2521,2522/events?v=0&key=bed3238d428c2c710a65d813ebfb2baa664a2fef&return_format=json&per_page=4';
							//if ( false === ( $hub_call = get_transient( 'flagship_hub_query' ) ) ) {
	$hub_event_call = wp_remote_get($hub_event_url);
	//set_transient( 'flagship_hub_query', $hub_call, 86400 ); }
	$hub_event_results = json_decode($hub_event_call['body'], true);
	$hub_events = $hub_event_results['_embedded'];
	foreach($hub_events['events'] as $hub_event) { ?>
	<article class="hub-news hub-events" id="post-<?php the_ID(); ?>">
		<h1><a href="<?php echo $hub_event['url']; ?>" target="_blank"><?php echo $hub_event['name']; ?></a></h1>
		<?php $start = $hub_event['start_time']; 
			$end = $hub_event['end_time'];
			$date = $hub_event['start_date']; ?>
		<h3><span class="fa fa-calendar" aria-hidden="true"></span> <?php echo date('m/d/Y', strtotime($date));?></h3>
		<h4><span class="fa fa-clock-o" aria-hidden="true"></span> <?php echo date('h:i a', strtotime($start));?> - <?php echo date('h:i a', strtotime($end));?></h4>
		<summary>
		<p><?php echo $hub_event['description'];
					if (empty($hub_event['description'])) {
						echo $hub_event['excerpt'];
			} ?>
		</p>
		</summary>
	</article>
	<?php } ?>
</div>