var lang;
$(function(){
	getLang();
	/*		levelList/		*/
	$("a.Del").click(function(){
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
	
	/*		getLang/		*/
	function getLang() {
		$.post('/dealer/backend/storedvalue/ajaxGetLang/',{
		},function(request) {	
			// return JSON.parse(request);
		}).done(function(request){
			lang = JSON.parse(request);
		});
	}
});













