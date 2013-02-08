$(function(){
	/**		bootstrap		**/
	$("[rel='tooltip']").tooltip();
});


/** 	jQuery Plugin	**/
;(function($) {
	/**		search_bar		**/
	$.fn.search_easeOutQuart = function() {
		$(this).on('focus', function(){
			$(this).animate({ 
				width: "120px",
			  }, "slow", "easeOutQuart" );
		})
		.on('blur',function() {
			$(this).animate({ 
				width: "70px",
			}, "slow", "easeOutQuart" );
		});
	}
})(jQuery);

















