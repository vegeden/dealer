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

$(function(){
	/*		classification		*/
	$('.last5Num').inputmask({'mask':'99999'});
	var temp_type = -1;
	$('#btn-group button').click(function(){ 
		var val 	= $(this).val();
		var type 	= 0;
		
		switch(val) {
			case "Remittance":
				type = 1;
				break;
			case "ATM":
				type = 2;
				break;
			case "CreditCard":
				type = 3;
				break;
		}
		
		if(temp_type != type) {
			hideAll();
			$('#'+val).slideDown(800);
			$(this).addClass('btn-warning');
		}
		$("#type").val(type);
		temp_type = type;
		
		
		function hideAll() {
			$('#Remittance').hide();
			$('#ATM').hide();
			$('#CreditCard').hide();
			
			$('#btn-group button').removeClass('btn-warning');
		}
	});
});