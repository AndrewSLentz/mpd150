jQuery(document).ready(function($) {

	/* Enable Direct Links to events by query string */
	var searchParams = new URLSearchParams(window.location.search);
	event = searchParams.get("event");
	if (event) {
		$('#' + event).modal('show');
	}

	/* Making activating modals change history event (and URL) */
	$('.modal').on('shown.bs.modal', function (e) {
		var slug = $(this).attr('id')
		var hashstring = '#' + slug;
		if (window.location.href.indexOf(hashstring)==-1) { /*if hashstring doesn't exist add query string */
			history.pushState(slug, null, hashstring);
		}
	});

	$('.modal').on('hidden.bs.modal', function (e) {
		var slug = $(this).attr('id')
		var hashstring = '#' + slug;
		if (window.location.href.indexOf(hashstring)!=-1) { /*if hashstring doesn't exist add query string */
			history.pushState(null, null, location.href.split("#")[0]);
		}
	});

	/* Making history changes (back,forward) show/hide modals */
	window.addEventListener('popstate', function(e){
    	var state = e.state;
    	if (state==null) {
	    	$(".modal").modal('hide');
	    } else {
	    	$("#" + state).modal('show');
	    }
	});

});