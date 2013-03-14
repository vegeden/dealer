
$(function(){	
	/*		ajaxGetLang/		*/
	var lang = function() {
		var response = '123';
		$.get('/dealer/profile/ajaxGetLang/',{
		},function(request) {	
			// return JSON.parse(request);
		}).done(function(request){
			lang = JSON.parse(request);
		});
	}();
	
	/*		EditProfile/		*/
	$('.phone').inputmask({'mask':'9999-999999'});
	
	
	/*		EditPwd/		*/
	$("article#profile-editPwd input[name='againNewPasswd']").on('keyup', function(){
		var opt = $(this);
		$("div.againNewPasswd span.anim-refresh").removeClass("displaynNone");
		setTimeout(function() {
			if(opt.val() == $("input[name='NewPasswd']").val()) {
				$("div.againNewPasswd").removeClass('error');
				$("div.againNewPasswd span.message").addClass('displaynNone')
			} else {
				$("div.againNewPasswd").addClass('error');
				$("div.againNewPasswd span.message").removeClass('displaynNone').find('h5').html(lang.language['Message_Error_passwdNotMatch']);
			}
			$("div.againNewPasswd span.anim-refresh").addClass("displaynNone");
		}, 1000);
	});
	
	$("article#profile-editPwd button[name='submit']").on('click', function(){
		if($("div.againNewPasswd").hasClass('error')) {
			return false;
		} 
	});
});














