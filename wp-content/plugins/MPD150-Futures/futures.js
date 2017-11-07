jQuery(document).ready(function($){
	$('.modal').on('shown.bs.modal', function (e) {
		var topicID = $(this).attr("id");
		var list = $(".acf-field-taxonomy .acf-checkbox-list", this);
		list.children("li").each(function(){
			var labelText = $("label span", this).html();
			if (labelText.toLowerCase()==topicID) {
				$("input", this).prop("checked",true);
			}
		});

		$(".acf-field-textarea", this).change(function(){
			console.log('change');
		})


	});
});