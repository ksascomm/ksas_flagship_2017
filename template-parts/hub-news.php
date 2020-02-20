<?php
/**
* The default template for displaying news via the hub's api
*
* @package FoundationPress
* @since FoundationPress 1.0.0
*/
?>
<div class="row">
	<h1 class="hub-title"><a href="https://hub.jhu.edu/">News from The Hub</a></h1>
	<?php
	$hub_url = 'https://api.hub.jhu.edu/articles?v=1&key=bed3238d428c2c710a65d813ebfb2baa664a2fef&divisions=426&per_page=4';
	if ( false === ( $hub_call = get_transient( 'flagship_hub_query' ) ) ) {
		$hub_call = wp_remote_get($hub_url);
	set_transient( 'flagship_hub_query', $hub_call, 86400 ); }
	
	// Display a error nothing is returned.
	if ( is_wp_error( $hub_call ) ) {
		$error_string = $hub_call->get_error_message();
		echo '<div class="callout alert"><p>' . $error_string . '</p></div>';

	}

	// Get the body.
	if (is_array($hub_call) && !empty($hub_call['body'])) {
	$hub_results = json_decode($hub_call['body'], true);
	} else {
		return false; // wp_remote_get failed somehow
	}
	$hub_articles = $hub_results['_embedded'];

	// Display a warning nothing is returned.
	if ( empty( $hub_articles ) ) {
		echo '<div class="callout warning"><p>There are no upcoming events</p></div>';
	}
	foreach ($hub_articles['articles'] as $hub_article ) { ?>
	<article class="hub-news story end" aria-labelledby="post-<?php echo $hub_article['id'];?>">
		<img class="hub-img" src="<?php echo $hub_article['_embedded']['image_thumbnail'][0]['sizes']['thumbnail']; ?>" alt="From The Hub: <?php echo $hub_article['headline']; ?>" />
		<h1><a href="<?php echo $hub_article['url']; ?>" id="post-<?php echo $hub_article['id'];?>"><?php echo $hub_article['headline']; ?></a></h1>
		<summary>
		<p><?php echo $hub_article['subheadline'];
			if (empty($hub_article['subheadline']) ) {
				echo $hub_article['excerpt'];
			} ?>
		</p>
		</summary>
	</article>
	<?php } ?>
</div>