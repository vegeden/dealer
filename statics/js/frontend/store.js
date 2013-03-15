$(function(){
	/**		index		**/
	// $(".price-num").attr("data-price",$(this).html());
	// $(".price-num").priceFormat({prefix: '', centsSeparator: ',', centsLimit: 3});
	
	/**		commodity		**/
	$('#store-commodity a').click(function() {
		var i = $(this).attr('href');
		$.post('/dealer/cart/add/',{
			'i' : i
		},function(request){
		});
		return false;
	});
});

















