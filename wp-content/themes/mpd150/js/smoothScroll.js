jQuery(document).ready(function($) {
	$(".learn-more-tri, #learn-more").click(function() {
		 $('html, body').animate({
	        scrollTop: $("#report-title").offset().top
	    }, 1000);
	});
});