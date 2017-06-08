<?php
/**
 * The default template for displaying news via the hub's api
 *
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<h1>
	<a href="https://hub.jhu.edu/">News from The Hub</a>
</h1>

<div class="row">
	<?php
	$hub_url = 'https://api.hub.jhu.edu/articles?v=0&key=bed3238d428c2c710a65d813ebfb2baa664a2fef&return_format=json&divisions=426&per_page=4';
								//if ( false === ( $hub_call = get_transient( 'flagship_hub_query' ) ) ) {
		$hub_call = wp_remote_get($hub_url);
	//set_transient( 'flagship_hub_query', $hub_call, 86400 ); }
	$hub_results = json_decode($hub_call['body'], true);
							$hub_articles = $hub_results['_embedded'];
	foreach($hub_articles['articles'] as $hub_article) { ?>
		<article class="hub-news" id="post-<?php the_ID(); ?>">
			<img class="hub-img" src="<?php echo $hub_article['_embedded']['image_thumbnail'][0]['sizes']['thumbnail']; ?>" alt="From The Hub" />
			<h1><a href="<?php echo $hub_article['url']; ?>"><?php echo $hub_article['headline']; ?></a></h1>
			<summary>
			<p><?php echo $hub_article['subheadline'];
						if (empty($hub_article['subheadline'])) {
							echo $hub_article['excerpt'];
				} ?>
			</p>
			</summary>
		</article>
	<?php } ?>
</div>