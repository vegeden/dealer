
$(function(){
	/*		index/		*/
	$('button#NotApply').click(function(){ location.href = ('/dealer/'); return false;});
	$('button#apply').click(function(){ location.href = ('apply/');	return false;});
	
	/*		apply/		*/
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














