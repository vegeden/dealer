$(function(){
	var lang = function() {
		var response = '123';
		$.get('/dealer/backend/account/ajaxGetLang/',{
		},function(request) {	
			// return JSON.parse(request);
		}).done(function(request){
			lang = JSON.parse(request);
		});
	}();
	
	/*		ajaxSysSettingDel/		*/
	$("article#syssetting-list a.Del").click(function(){
		if(confirm(lang.language['web_DoYouWantDel'])) {
			var uti = $(this).attr('href');
			var opt = $(this).parent().parent();
			$.post('ajaxSysSettingDel/',{
						'uti':uti
					},function(e){
						opt.remove();
					});
		}
		return false;
	});
	
	/*		ajaxACLDel/		*/
	$("article#acl-list a.Del").click(function(){
		if(confirm(lang.language['web_DoYouWantDel'])) {
			var uti = $(this).attr('href');
			var opt = $(this).parent().parent();
			$.post('../ajaxACLDel/',{
						'uti':uti
					},function(e){
						opt.remove();
					});
		}
		return false;
	});
});













