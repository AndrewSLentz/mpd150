jQuery(document).ready( function($) {
	$(".report-button-container .read").click(function(){
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
    		if ($(".report-button-container").css("height")=="46px") {
		    	var featureTop = $(".feature").offset().top;

		        if($(window).scrollTop() + $(window).height() > featureTop) { //scrolled past the other div?     
		            $(".report-button-container").css("height",0); //reached the desired point -- hide div
		        }
		    } else {
		    	var featureTop = $(".feature").offset().top;
		    	 if($(window).scrollTop() + $(window).height() < featureTop) { //scrolled past the other div?     
		            $(".report-button-container").css("height","46px"); //reached the desired point -- hide div
		        }

		    }
	    }
    });

	$(".report-button-container .view-feature").click(function() {
	 	$('html, body').animate({
	        scrollTop: $(".feature").offset().top
	    }, 1000);
	});
});