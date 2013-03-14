$(function(){
	/**		index		**/
	$('a.remove').click(function() {
		var opt = $(this);
		var i = $(this).attr('href');
		$.post('/dealer/cart/remove/',{
			'i' : i
		},function(request){
			var org = $('ul.media-list li').first().find('dl a').attr('href');
			opt.parent().parent().parent().parent().parent().remove();
			if(org == i) $('ul.media-list li');//.first().removeClass('hr');		
		});
		return false;
	});
	
	$('input[type="number"]').change(function() {
		var opt = $(this);
		var one_price 	= $(this).parent().parent().find('.one_price').attr('data-price');
		var number 		= $(this).val();
		// input buffer lock
		opt.prop('disabled', true);
		setTimeout(function() {
			// update price
			var pull_pot = opt.parent().parent();
			var old = pull_pot.find('.total_price').attr('data-price');
				pull_pot.find('.total_price').attr('data-price',one_price*number).val(one_price*number)
						.priceFormat({prefix: '', centsSeparator: ',', centsLimit: 3});
			
			// update sum price;
			var sum = $('div.row dl dd').attr('data-price')-old+(one_price*number);
			$('div.row dl dd').attr('data-price',sum).val(sum).priceFormat({prefix: '', centsSeparator: ',', centsLimit: 3});

			// find id;
			var i = pull_pot.parent().parent().find('dl dd a').attr('href');
			// update data
			$.post('/dealer/cart/add/',{'i' : i, 'c' : number});
			
			// input buffer open
			opt.prop('disabled', false);
		}, 400);
	});
	
	$('article#cart .row .checkout').addClass('animated shake');
	$('article#cart .row .checkout').on('mouseenter', function(){
		$(this).removeClass('animated shake');
	});
});

















