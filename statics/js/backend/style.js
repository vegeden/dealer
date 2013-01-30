$(function(){
	/**		bootstrap		**/
	$("[rel='tooltip']").tooltip();
});


/** 	jQuery Plugin	**/
;(function($) {
	/**		search_bar		**/
	$.fn.search_easeOutQuart = function() {
		$(this).focusin(function(){
			$(this).animate({ 
				width: "120px",
			  }, "slow", "easeOutQuart" );
		})
		.focusout(function(){
			$(this).animate({ 
				width: "70px",
			  }, "slow", "easeOutQuart" );
		});
	}
})(jQuery);

















