jQuery(document).ready( function($) {
	$(".report-button-container .read").click(function(){
		console.log($(this).hasClass('read-more'));
		if ($(this).hasClass('read-more')) {
			$(".full-content.hidden").removeClass("hidden");
			$(this).removeClass("read-more");
			$(this).addClass("read-less");
			$(this).html("Read Less");
			$(".report-button-container").addClass("fixed");
		} else
		if ($(this).hasClass('read-less')){
			$(".full-content").addClass("hidden");
			$(this).removeClass("read-less");
			$(this).addClass("read-more");
			$(this).html("Read More");
			$(".report-button-container").removeClass("fixed");
			$('html, body').animate({
	        	scrollTop: $("#main-heading-container").offset().top
	    	}, 1000);
		}
	});

	
    $(window).scroll(function() {
    	if ($(".report-button-container").hasClass("fixed")) { 
	    	var featureTop = $(".feature").offset().top;
	        if($(window).scrollTop() + $(window).height() > featureTop) { //scrolled past the other div?
	        	console.log('test');
	            $(".report-button-container").css("height",0); //reached the desired point -- hide div
	        }
	    }
    });

	$(".report-button-container .view-feature").click(function() {
	 	$('html, body').animate({
	        scrollTop: $(".feature").offset().top
	    }, 1000);
	});
});