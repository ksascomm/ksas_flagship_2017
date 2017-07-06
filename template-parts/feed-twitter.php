<?php require_once TEMPLATEPATH . '/library/TwitterAPIExchange.php';

	$settings = array(
	    'oauth_access_token' => '76501231-3Q9xzxcUDD7QxeMsbM6tGpujxQkg8f4OX3zlKLlGJ',
	    'oauth_access_token_secret' => 'FpcOSDtDRxfMDYm2wNlNTEluuSL16jGI0cIJj9cs7DZ23',
	    'consumer_key' => 'B4MBEAkUTDsXzn4CI4gqMMDDP',
	    'consumer_secret' => 'EaqO701XB5qeDorTEh7v07h3WyoqHtW8Zhpvs92hosVDG1DkUg',
	);

$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$requestMethod = 'GET';
if (isset($_GET['user']) ) {$user = $_GET['user'];}  else {$user  = 'JHUKSAS';}
if (isset($_GET['count']) ) {$count = $_GET['count'];} else {$count = 2;}
$getfield = "?screen_name=$user&count=$count";
$twitter = new TwitterAPIExchange($settings);

$string = json_decode($twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest(),$assoc = true);
// if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}


foreach ($string as $items ) : ?>

	<div class="media-object stack-for-small">
		<div class="media-object-section hide-for-small-only">
			<a href="https://twitter.com/<?php echo $items['user']['screen_name'];?>">
				<img alt="<?php echo $items['user']['screen_name'];?> avatar" class="avatar" src="<?php echo $items['user']['profile_image_url'];?>">
			</a>
		</div>
		<div class="media-object-section">
			<h5><?php echo $items['user']['name'];?>
			<small><?php $date = $items['created_at'];
			echo date('m/d/Y', strtotime($date));?>
			</small>
			</h5>
			<p>
				<a href="https://twitter.com/<?php echo $items['user']['screen_name'];?>/status/<?php echo $items['id'];?>" target="_blank">
					<?php $items['text'] = preg_replace('/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/', '', $items['text']); echo $items['text'];?>
				</a>
			</p>
		</div>
	</div>

<?php endforeach; ?>