$(function(){
	/**		index		**/
	$('a.remove').click(function() {
		var opt = $(this);
		var i = $(this).attr('href');
		removeProduct(opt, i);
		return false;
	});
	
	$('input[type="number"]').change(function() {
		var opt = $(this);
		var one_price 	= $(this).parent().parent().find('.one_price').attr('data-price');
		var number 		= $(this).val();
		
		opt.prop('disabled', true);
		setTimeout(function() {
			if(number == 0) {
				var removeOpt = opt.parent().parent().parent().parent().find('a.remove');
				var i = removeOpt.attr('href');
				removeProduct(removeOpt, i);
			} else {
				// update price
				var pull_pot = opt.parent().parent();
				var old = pull_pot.find('.total_price').attr('data-price');
					pull_pot.find('.total_price').attr('data-price',one_price*number).val(one_price*number)
							.priceFormat({prefix: '', centsSeparator: ',', centsLimit: 3});
				
				// update sum price;
				var sum = $('div.row dl dd').attr('data-price')-old+(one_price*number);
				$('div.row dl dd')
						.prop('data-price',sum)
						.val(sum)
						.priceFormat({prefix: '', centsSeparator: ',', centsLimit: 3})
						.html('$ '+ $('div.row dl dd').html());

				// find id;
				var i = pull_pot.parent().parent().find('dl dd a').prop('href');
				// update data
				$.post('/dealer/cart/add/',{'i' : i, 'c' : number});
			}
			// input buffer open
			opt.prop('disabled', false);
		}, 400);
	});
	
	$('article#cart .row .checkout').addClass('animated shake');
	$('article#cart .row .checkout').on('mouseenter', function(){
		$(this).removeClass('animated shake');
	});
	
	function removeProduct(opt, i) {
		$.post('/dealer/cart/remove/',{
			'i' : i
		},function(request) {
			var org = $('ul.media-list li').first().find('dl a').attr('href');
			opt.parent().parent().parent().parent().parent().remove();
			if(org == i) $('ul.media-list li');	
			if(document.getElementsByClassName("media").length == 0) {
				$('article#cart div#cart-info').html('');
				$('div#no_data').removeClass('displaynNone');
			}
		});
	}
});

















