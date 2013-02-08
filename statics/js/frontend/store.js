$(function(){
	/**		commodity		**/
	$('#commodity a').click(function() {
		var i = $(this).attr('href');
		$.post('/dealer/cart/add/',{
			'i' : i
		},function(request){
		});
		return false;
	});
});

















