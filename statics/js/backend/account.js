
$(function(){
	/*		levelList/		*/
	$("a.levelDel").click(function(){
		if(confirm("確定刪除?")) {
			var uti = $(this).attr('href');
			var opt = $(this).parent().parent();
			$.post('/dealer/account/levelDel/',{
						'uti':uti
					},function(e){
						opt.remove();
					});
		}
		return false;
	});
	
	/*		register/		*/
	$("div.register ul.dropdown-menu li a").click(function(){
		var type_name = $(this).html();
		var type_id = $(this);
		
		$("input#level").attr('value', type_id.attr('href'));

		$.post('/dealer/account/ajaxHaveUpper/',{
					'level':type_id.attr('href')
				},function(request){
					
					json = JSON.parse(request);
					
					switch(json['hu']) {
						case '0':
							$('#prependedDropdownButton').attr('readonly','');
							break;
						case '1':
							$('#prependedDropdownButton').removeAttr('readonly','');
							break;
					}
				});
				
		$("button.dropdown-toggle")
			.html(type_name)
			.addClass('btn-success')
			.parent().parent().find("input#prependedDropdownButton")
			.trigger('focus')
			.trigger('click');
			
		return false;
	});
	
	$("input#prependedDropdownButton").keyup(function(){
		var name = $(this).attr('value');
		var level = $(this).parent().find('input#level').attr('value');
		
		// level 1 is admin!!
		if(level != 1) {
			$.post('/dealer/account/ajaxUpper/',{
						'level' : level,
						'name' : name
					},function(request){
						json = JSON.parse(request);
						if(json['count'] == '1') {
							if( json['list'].length > 0 ) {
								$('select#NameList').html('').show();
								for(i=0;i<json['list'].length;i++) {
									$('select#NameList').append('<option value="'+json['list'][i]['id']+'">'+json['list'][i]['name']+'</option>');
								}
							}
						} else {
							$('select#NameList').hide();
						}
					});
		}
	});
	
	$("select#NameList").change(function(){
		var id 		= $(this).val();
		var name 	= $(this).find("option:selected").text();
		$("input#prependedDropdownButton").attr('value', name);
		$("input#upper").attr('value', id);
		$(this).hide();
	});
	
	/*		lists/		*/
	$('table').on('click','div.lists ul.dropdown-menu li a', function(){
		var opt 	= $(this);
		var href 	= opt.attr('href');
		if(href.legnth == 1) {
			var split 	= href.split(',');
			var st 		= split[0];
			var i 		= split[1];
			
			
			 $.post('/dealer/account/ajaxSetUserStatus/',{
						'st' : st,
						'i' : i
					},function(request) {	
						var clickName = opt.find('span').html();
						opt.parent().parent().parent().find('a.status').html(clickName).parent().trigger('focus').trigger('click');
					});
			return false;
		}
		
		
	});
	
	$("input#search_bar").focusin(function(){
		$(this).animate({ 
			width: "+=50",
		  }, "slow", "easeOutQuart" );
	})
	.focusout(function(){
		$(this).animate({ 
			width: "-=50",
		  }, "slow", "easeOutQuart" );
	});
	
	/*		repasswd/		*/
	$("small cite span.label").click(function() {
		var rp = randomPasswd(8)
		$(this).parent().parent().parent().find('input[type="password"]').attr('value',rp);
	});
	
	/*		editPasswd/		*/
	$('.newpassword').popover({'placement':'right','trigger':'focus'});
});

function randomPasswd(length, special) {
	var iteration = 0;
	var password = "";
	var randomNumber;
	if(special == undefined) {
		var special = false;
	}
	while(iteration < length) {
		randomNumber = (Math.floor((Math.random() * 100)) % 94) + 33;
		if(!special) {
			if ((randomNumber >=33) && (randomNumber <=47)) { continue; }
			if ((randomNumber >=58) && (randomNumber <=64)) { continue; }
			if ((randomNumber >=91) && (randomNumber <=96)) { continue; }
			if ((randomNumber >=123) && (randomNumber <=126)) { continue; }
		}
		iteration++;
		password += String.fromCharCode(randomNumber);
	}
	return password;
}














