<?php
// use this instagram access token generator http://instagram.pixelunion.net/
$access_token = '5470676444.1677ed0.ac76a8915e084f649aa9bc5da7af1e83';
$photo_count = 4;

$json_link = 'https://api.instagram.com/v1/users/self/media/recent/?';
$json_link .= "access_token={$access_token}&count={$photo_count}";

if ( false === ( $obj = get_transient( 'instagram_query' ) ) ) {    

$json = file_get_contents($json_link);
$obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);

set_transient( 'instagram_query', $obj, 86400 ); }

foreach ($obj['data'] as $post ) {

    $pic_text = $post['caption']['text'];
    $excerpt_text = substr($pic_text, 0, 45);
    $pic_link = $post['link'];
    $pic_like_count = $post['likes']['count'];
    $pic_comment_count = $post['comments']['count'];
    $pic_src = str_replace('http://', 'https://', $post['images']['thumbnail']['url']);
    $pic_created_time = date('F j, Y', $post['caption']['created_time']);
    $pic_created_time = date('F j, Y', strtotime($pic_created_time . ' +1 days'));

    echo "<div class='small-12 medium-6 large-3 columns instagram-card'>";    
        echo "<a href='{$pic_link}' target='_blank'>";
            echo "<img class='gram' src='{$pic_src}' alt='{$excerpt_text}...'>";
        echo '</a>';
    echo '</div>';
}

?>

<a class="button hollow float-right gram-link" href="https://www.instagram.com/JHUArtsSciences/">View on Instagram</a>