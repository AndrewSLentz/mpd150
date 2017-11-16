jQuery(document).ready(function($) {
	$(".learn-more-tri, #learn-more").click(function() {
		 $('html, body').animate({
	        scrollTop: $("#full-width-page-wrapper").offset().top
	    }, 1000);
	});
});
