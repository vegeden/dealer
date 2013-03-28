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

function IncludeJavaScript(jsFile) {
	var head = document.getElementsByTagName('head')[0];
   
	script = document.createElement('script');
	script.src = jsFile;
	script.type = 'text/javascript';
   
	head.appendChild(script);
}
function IncludeCSS(cssFile) {
	var head = document.getElementsByTagName('head')[0];
   
	style = document.createElement('link');
	style.href = cssFile;
	style.rel = 'stylesheet';
	style.type = 'text/css';
   
	head.appendChild(style);
}












