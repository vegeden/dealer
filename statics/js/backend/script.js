$(function(){
	/**		bootstrap		**/
	$("[rel='tooltip']").tooltip();
});


/** 	jQuery Plugin	**/
;(function($) {
	/**		search_bar		**/
	$.fn.search_easeOutQuart = function(opt) {
		$(this).on('focus', function() {
			if(opt.find('input#search_bar').val().length == 0) {
				$(this).stop().animate({ 
					width: "120px",
				}, "slow", "easeOutQuart" );
			}
		})
		.on('blur',function() {
			if(opt.find('input#search_bar').val().length == 0) {
				$(this).stop().width(110).animate({ 
					width: "70px",
				}, "slow", "easeOutQuart" );
			}
		});
	}
})(jQuery);

















