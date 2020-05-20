jQuery(document).ready( function($) {
  $('.slicker').slick({
  	dots: true,
  	speed: 300,
  	slidesToShow: 3,
  	slidesToScroll: 1,
  	responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 1,
	        infinite: true,
	        dots: true
	      }
	    },
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	  ]
	});
  	$(".slicker").slick("getSlick").slideCount
	$('#magazine-tabs').on('change.zf.tabs', function() {
		$('.slicker').slick('refresh');
	}); 
});