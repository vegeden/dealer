$(function(){
	/**		ajaxGetLang/		**/
	var lang = function() {
		var response = '123';
		$.get('/dealer/store/ajaxGetLang/',{
		},function(request) {	
			// return JSON.parse(request);
		}).done(function(request){
			lang = JSON.parse(request);
		});
	}();
	
	/**		index		**/
	toastr.options = {timeOut: 1000, positionClass: 'toast-bottom-right'};
	
	/**		commodity		**/
	$('#store-commodity a').click(function() {
		var i = $(this).attr('href');
		$.post('/dealer/cart/add/',{
			'i' : i
		},function(request){
			toastr.success(lang.language['add_cart']);
		});
		return false;
	});
});

















