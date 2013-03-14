
$(function() {
	var lang = function() {
		var response = '123';
		$.get('/dealer/backend/commodity/ajaxGetLang/',{
		},function(request) {	
			// return JSON.parse(request);
		}).done(function(request){
			lang = JSON.parse(request);
		});
	}();

	var originalTable = $('table').clone();
	/*		lists/		*/
	$('input#search_bar').keyup(function() {
		var n = $(this).val();
		if(n.length > 0) {
			$.ajax({
				url: '/dealer/backend/commodity/ajaxFindItemName/',
				type: 'POST',
				data: {
					n: 	n,
				},
				error: function(xhr) {
					// alert('Ajax request 發生錯誤');
				},
				success: function(request) {
					json = JSON.parse(request);
					
					var table = $('table');
					table.html('').append('<tr class="info firstRow">'+ originalTable.find('tr.firstRow').html() +'</tr>');
					if(json.count == 1) {
						for(var i=0;i<json.items_information.length;i++) {
							var rows = '';
							if(json.items_information[i].warn_stock > 0) {
								rows += '<tr class="info">';
							} else {
								rows += '<tr class="error">';
							}
							
							
							rows += 	'<td>';
							rows += 		'<a href="/dealer/backend/commodity/itemEdit/'+json.items_information[i].id+'/"  rel="tooltip" title="'+lang.language['edit']+'"><img src="/dealer/statics/img/ic_action_edit.png"/></a>';
							rows += 		'<a href="'+json.items_information[i].id+'/" class="itemDel"  rel="tooltip" title="'+lang.language['del']+'"><img src="/dealer/statics/img/ic_action_remove.png"/></a>';
							rows += 	'</td>';
							rows += 	'<td>';
							rows += 		'<a href="/dealer/backend/commodity/invoicingEditAdd/'+json.items_information[i].id+'/" rel="tooltip" title="'+lang.language['commodity_invoicing_static1']+lang.language['commodity_invoicing_static0']+'"><img src="/dealer/statics/img/ic_invoice_24.png" width="24" height="24"/></a>';
							rows += 	'</td>';
							rows += 	'<td>'+json.items_information[i].item_name+'</td>';
							rows += 	'<td>'+json.items_information[i].item_number+'</td>';
							rows += 	'<td>'+json.items_information[i].buy_price+'</td>';
							rows += 	'<td>'+json.items_information[i].sell_price+'</td>';
							rows += 	'<td>'+json.items_information[i].safe_stock+'</td>';
							rows += 	'<td>'+json.items_information[i].bread_name+'</td>';
							rows += 	'<td>'+json.items_information[i].stock_quantity+'</td>';
							rows += 	'<td>'+json.items_information[i].item_bonus+'</td>';
							rows += 	'<td>'+json.items_information[i].area_name+'</td>';
							rows += 	'<td>'+json.items_information[i].category_second_name+'</td>';
							rows += 	'<td>'+json.items_information[i].category_name+'</td>';
							rows += 	'<td>'+json.items_information[i].freight_price+'</td>';
							if(json.items_information[i].special_commodity_status != 0) {
								rows += 	'<td>'+lang.language['commodity_yes']+'</td>';
							} else {
								rows += 	'<td>'+lang.language['commodity_no']+'</td>';
							}
							rows += '<tr>';
							table.append(rows);
						}
					} else {
						
					}
					$("[rel='tooltip']").tooltip();
					$("div.pagination").hide();
				}
			});
		} else {
			$('table').html(originalTable.html());
			$("div.pagination").show();
		}
	});
	
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














