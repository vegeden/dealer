
$(function() {
	var lang;
	getLang();
	var originalTable = $('table').clone();
	/*		lists/		*/
	$('input#search_bar').keyup(function() {
		var n = $(this).val();
		if(n.length > 0) {
			$.ajax({
				url: '/dealer/backend/account/ajaxFindUserName/',
				type: 'POST',
				data: {
					n: 	n,
				},
				error: function(xhr) {
					// alert('Ajax request 發生錯誤');
				},
				success: function(request) {
					json = JSON.parse(request);
					console.log(json);
					
					var table = $('table');
					table.html('').append('<tr class="info firstRow">'+ originalTable.find('tr.firstRow').html() +'</tr>');
					if(json.count == 1) {
						for(var i=0;i<json.user_information.length;i++) {
							
							var rows = '';
							rows += '<tr class="info">';
							rows += 	'<td>';
							if(json.type_id == 1) {
							rows += 		'<div class="btn-group lists">';
							rows += 			'<a class="btn status">';
							rows += 				lang.language['account_status'+json.user_information[i].user_status];
							rows += 			'</a>';
							rows += 			'<a class="btn dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>';
							rows += 			'<ul class="dropdown-menu">';
							rows += 				'<li><a href="0,'+json.user_information[i].id+'"><i class="icon-remove"></i> <span>'+lang.language['account_status0']+'</span></a></li>';
							rows += 				'<li><a href="1,'+json.user_information[i].id+'"><i class="icon-ok"></i> <span>'+lang.language['account_status1']+'</span></a></li>';
							rows += 				'<li><a href="2,'+json.user_information[i].id+'"><i class="icon-lock"></i> <span>'+lang.language['account_status2']+'</span></a></li>';
							rows += 				'<li class="divider"></li>';
							rows += 				'<li><a href="/dealer/backend/account/adminEdit/'+json.user_information[i].id+'/"><i class="icon-pencil"></i> '+lang.language['edit']+'</li>';
							rows += 			'</ul>';
							rows += 		'</div>';
							} else {
							rows += 		lang.language['account_status'+json.user_information[i].user_status];
							}
							rows += 	'</td>';
							rows += 	'<td>'+json.user_information[i].account+'</td>';
							rows += 	'<td>'+json.user_information[i].name+'</td>';
							rows += 	'<td>'+json.user_information[i].email+'</td>';
							rows += 	'<td>'+lang.language['account_gender'+json.user_information[i].gender]+'</td>';
							rows += 	'<td>'+json.user_information[i].phone+'</td>';
							rows += 	'<td>'+json.user_information[i].address+'</td>';
							
							if(json.type_id == 1) {
							rows += 	'<td>'+json.user_information[i].type_id+'</td>';
								if(json.user_information[i].upper_id != null) {
									rows += 	'<td>'+json.user_information[i].upper_id+'</td>';
								} else {
									rows += 	'<td></td>';
								}
							}
							rows += '<tr>';
							table.append(rows);
						}
					} else {
					
					}
				}
			});
		} else {
			$('table').html(originalTable.html());
			
		}
	});

	function getLang() {
		$.post('/dealer/backend/account/ajaxGetLang/',{
		},function(request) {	
			// return JSON.parse(request);
		}).done(function(request){
			lang = JSON.parse(request);
		});
	}
	
	$('table').on('click','div.lists ul.dropdown-menu li a', function(){
		var opt = $(this);
		var href = opt.attr('href');
		if(href.legnth == 1) {
			var clickName = opt.find('span').html();
			
			var split 	= href.substr(1).split(',');
			var i 		= split[1];
			originalTable.find("tr td div a#user"+i).html(clickName);
			
			return false;
		}
		
		
	});
	
});














