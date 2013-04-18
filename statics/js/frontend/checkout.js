$(function(){
	/**		index		**/
	$('div.btn-group button').click(function() {
		$('div.btn-group button').removeClass("btn-primary");
		$(this).addClass("btn-primary");
		var detailed = $(this).attr("id");
		switch(detailed) {
			case "yes":
				$("div.detail").addClass("displaynNone");
				$("div.detail-default").removeClass("displaynNone");
				break;
			case "no":
				$("div.detail").removeClass("displaynNone");
				$("div.detail-default").addClass("displaynNone");
				break;
		}
		return false;
	});
});