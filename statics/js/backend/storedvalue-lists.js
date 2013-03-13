
$(function() {
	var lang = function() {
		var response = '123';
		$.get('/dealer/backend/storedvalue/ajaxGetLang/',{
		},function(request) {	
			// return JSON.parse(request);
		}).done(function(request){
			lang = JSON.parse(request);
		});
	}();
	
	var originalTable = $('table').clone();
	/*		lists/		*/
	$('input#search_bar').keyup(function() {
		var k = $('input#kind').val();
		var bn = $(this).val();
		if(bn.length > 0) {
			$.ajax({
				url: '/dealer/backend/storedvalue/ajaxFindBankCode/',
				type: 'POST',
				data: {
					k: 	k,
					bn: bn
				},
				error: function(xhr) {
					// alert('Ajax request 發生錯誤');
				},
				success: function(request) {
					json = JSON.parse(request);
					
					var table = $('table');
					table.html('').append('<tr class="info firstRow">'+ originalTable.find('tr.firstRow').html() +'</tr>');
					if(json.count == 1) {
						for(var i=0;i<json.icash_apply.length;i++) {
							var rows = '';
							rows += '<tr class="info">';
							if(k == 0) {
							rows += 	'<td>';
							rows += 		'<div class="btn-group lists">';
							rows += 			'<a class="btn status">';
							rows += 				lang.language['storedvalue_status'+json.icash_apply[i].remittance_status]
							rows += 			'</a>';
							rows += 			'<a class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>';
							rows += 			'<ul class="dropdown-menu">';
							rows += 				'<li><a href="#1,'+json.icash_apply[i].id+'"><i class="icon-ok"></i> <span>'+lang.language['storedvalue_status1']+'</span></a></li>';
							rows += 				'<li><a href="#1,'+json.icash_apply[i].id+'"><i class="icon-remove"></i> <span>'+lang.language['storedvalue_status2']+'</span></a></li>';
							rows += 			'</ul>';
							rows += 		'</div>';
							rows += 	'</td>';
							} else {
							rows += 	'<td>'+lang.language['storedvalue_status'+json.icash_apply[i].remittance_status]+'</td>';
							rows += 	'<td>'+json.icash_apply[i].type_name+'</td>';
							}
							rows += 	'<td>'+json.icash_apply[i].apply_name+'</td>';
							rows += 	'<td>'+json.icash_apply[i].bank_num+'</td>';
							rows += 	'<td>'+json.icash_apply[i].apply_price+'</td>';
							rows += 	'<td>'+json.icash_apply[i].apply_datetime+'</td>';
							
							if( k == 1) {
							rows += 	'<td>'+json.icash_apply[i].admin_name+'</td>';
							rows += 	'<td>'+json.icash_apply[i].audit_datetime+'</td>';
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
	
	$('table').on('click','div.lists ul.dropdown-menu li a', function(){
		var opt = $(this);
		var href = opt.attr('href');
		var clickName = opt.find('span').html();
		if(href.substr(0,1)=='#') {
			var split 	= href.substr(1).split(',');
			var i 		= split[1];
			
			originalTable.find("tr.row"+i).remove();
			return false;
		}
	});
	
});














