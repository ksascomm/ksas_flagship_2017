<?php

function rudr_instagram_api_curl_connect( $api_url ){
    $connection_c = curl_init(); // initializing
    curl_setopt( $connection_c, CURLOPT_URL, $api_url ); // API URL to connect
    curl_setopt( $connection_c, CURLOPT_RETURNTRANSFER, 1 ); // return the result, do not print
    curl_setopt( $connection_c, CURLOPT_TIMEOUT, 20 );
    $json_return = curl_exec( $connection_c ); // connect and get json data
    curl_close( $connection_c ); // close connection
    return json_decode( $json_return ); // decode and return
}

// use this instagram access token generator https://rudrastyh.com/tools/access-token
$access_token = '5470676444.1941e00.2371c1e663ef417397cd14fa04ff3b38';
$username = 'JHUArtsSciences';
$user_search = rudr_instagram_api_curl_connect("https://api.instagram.com/v1/users/search?q=" . $username . "&access_token=" . $access_token);
// $user_search is an array of objects of all found users
// we need only the object of the most relevant user - $user_search->data[0]
// $user_search->data[0]->id - User ID
// $user_search->data[0]->first_name - User First name
// $user_search->data[0]->last_name - User Last name
// $user_search->data[0]->profile_picture - User Profile Picture URL
// $user_search->data[0]->username - Username

//userid = 5470676444

$user_id = $user_search->data[0]->id; // or use string 'self' to get your own media
$return = rudr_instagram_api_curl_connect("https://api.instagram.com/v1/users/" . $user_id . "/media/recent?access_token=" . $access_token);

//print_r( $return ); // if you want to display everything the function returns

$returndata = array_slice( $return->data, 0, 4 );
foreach ($returndata as $post) {
    echo '<div class="small-12 medium-6 large-3 columns instagram-card">';   
    echo '<a href="' . $post->link . '"><img class="gram" alt="'. substr($post->caption->text, 0, 45) . '" src="' . $post->images->thumbnail->url . '" /></a>';
    echo '</div>';
}

?>

<a class="button hollow float-right gram-link" href="https://www.instagram.com/JHUArtsSciences/">View on Instagram</a>