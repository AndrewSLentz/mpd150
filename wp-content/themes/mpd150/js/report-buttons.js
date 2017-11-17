jQuery(document).ready( function($) {
	$(".report-button-container .read").click(function(){
		console.log($(this).hasClass('read-more'));
		if ($(this).hasClass('read-more')) {
			$(".full-content.hidden").removeClass("hidden");
			$(this).removeClass("read-more");
			$(this).addClass("read-less");
			$(this).html("Read Less");
		} else
		if ($(this).hasClass('read-less')){
			$(".full-content").addClass("hidden");
			$(this).removeClass("read-less");
			$(this).addClass("read-more");
			$(this).html("Read More");
		}
	});




	$(".report-button-container .view-feature").click(function() {
	 	$('html, body').animate({
	        scrollTop: $(".feature").offset().top
	    }, 1000);
	});
});