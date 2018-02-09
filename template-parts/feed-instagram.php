<script>
    var token = '5470676444.1941e00.2371c1e663ef417397cd14fa04ff3b38',
    username = 'JHUArtsSciences', // rudrastyh - my username :)
    num_photos = 4;

    $.ajax({ // the first ajax request returns the ID of user rudrastyh
    url: 'https://api.instagram.com/v1/users/search',
    dataType: 'jsonp',
    type: 'GET',
    data: {access_token: token, q: username}, // actually it is just the search by username
    success: function(data){
        //console.log(data);
        $.ajax({
            url: 'https://api.instagram.com/v1/users/' + data.data[0].id + '/media/recent', // specify the ID of the first found user
            dataType: 'jsonp',
            type: 'GET',
            data: {access_token: token, count: num_photos},
            success: function(data2){
               ///console.log(data2);
                for(x in data2.data){
                    $('.instagram-images').append('<div class="small-12 medium-6 large-3 columns instagram-card"><img class="gram" alt="'+data2.data[x].caption.text+'" src="'+data2.data[x].images.thumbnail.url+'"></div>');  
                }
                },
            error: function(data2){
                console.log(data2);
            }
        });
    },
    error: function(data){
        console.log(data);
    }
});
</script>

<div class="instagram-images"></div>
<a class="button hollow float-right gram-link" href="https://www.instagram.com/JHUArtsSciences/">View on Instagram</a>