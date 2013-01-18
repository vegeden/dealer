
function init_nav_page( item ) {
	/** 
		nav list display and item font blod
		parame nav from php 
	**/
	var nav = item.substr(0,item.length - (item.split('_')[2].length+1));
	$('#'+nav).removeClass('closed').find("#"+item).find('a').addClass('click');
	
	// call the plugin on the "#toc" element
	$('#toc').fixedTOC({
		menuOpens: 'click', // or 'mouseenter'
		scrollSpeed: 1000,
		menuSpeed: 300,
		useSubMenus: true,
		resetSubMenus: true,
		topLinkWorks: true
	});
}

$(function(){
	$("[rel='tooltip']").tooltip();
});


















