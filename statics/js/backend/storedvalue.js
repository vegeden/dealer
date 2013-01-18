
$(function(){
	/*		apply/		*/
	var tempKey = '';
	$("article#apply div.btn-group ul li a").click(function(){
		
		var key = $(this).attr('href');
		$("input#pay_kind").attr('value', key);
		if(tempKey != key) {
			tempKey = key;
			$(".pay_kind").slideUp();
			$("form").show();
		}
		switch(key) {
			// ATM
			case '0':
				$('#ATM').slideDown();
				break;
			// CreditCard
			case '1':
				$('#CreditCard').slideDown();
				break;
		}
		
		/**  UI	**/
		$("span.method").html($(this).find('span').html()).trigger('click');
		
		return false;
	});
	
	/*		lists/		*/
	$('table').on('click','div.lists ul.dropdown-menu li a', function(){
		var opt = $(this);
		var href = opt.attr('href');
		var clickName = opt.find('span').html();
		if(href.substr(0,1)=='#') {
			var split 	= href.substr(1).split(',');
			var st 		= split[0];
			var i 		= split[1];
			
			$.post('/dealer/storedvalue/ajaxSetStatus/',{
				'st' : st,
				 'i' : i
			},function(request) {	
				var clickName = opt.find('span').html();
				opt.parent().parent().parent().parent().parent().remove();
			});
			return false;
		}
	});
	
	$("input#search_bar").focusin(function(){
		$(this).animate({ 
			width: "200px",
		  }, "slow", "easeOutQuart" );
	})
	.focusout(function(){
		$(this).animate({ 
			width: "100px",
		  }, "slow", "easeOutQuart" );
	});
	
	$(".cancel").click(function(){
		var opt = $(this);
		var i = opt.attr('href');
		
		$.post('/dealer/storedvalue/ajaxCancel/',{
			'i' : i,
		},function(request) {	
			opt.parent().parent().remove();
		});
		
		return false;
	});
});














