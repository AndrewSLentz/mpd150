jQuery(document).ready( function($) {
	$(".report-button-container .read-more").click(function(){
		$(".full-content.hidden").removeClass("hidden");
	});

	$(".report-button-container .view-feature").click(function() {
	 	$('html, body').animate({
	        scrollTop: $(".feature").offset().top
	    }, 1000);
	});
});