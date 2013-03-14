$(function(){
	var lang;
	getLang();
	/*		areaList		*/
	$("a.areaDel").click(function(){
		if(confirm("確定刪除?")) {
			var uti = $(this).attr('href');
			var opt = $(this).parent().parent();
			$.post('/dealer/backend/commodity/areaDel/',{
						'uti':uti
					},function(request){
						var json = JSON.parse(request);
						if(json.item_count == 0){
							opt.remove();
						} else {
							alert(lang.language['commodity_areaDel_ErrorMsg']);
						}
					});
		}
		return false;
	});
	
	/*		breadList/		*/
	$("a.breadDel").click(function(){
		if(confirm("確定刪除?")) {
			var uti = $(this).attr('href');
			var opt = $(this).parent().parent();
			$.post('/dealer/backend/commodity/breadDel/',{
						'uti':uti
					},function(request){
						var json = JSON.parse(request);
						if(json.item_count == 0){
							opt.remove();
						} else {
							alert(lang.language['commodity_breadDel_ErrorMsg']);
						}
					});
		}
		return false;
	});	
	
	/*		categoryFirstList/		*/
	$("a.categoryFirstDel").click(function(){
		if(confirm("確定刪除?")) {
			var uti = $(this).attr('href');
			var opt = $(this).parent().parent();
			$.post('/dealer/backend/commodity/categoryFirstDel/',{
						'uti':uti
					},function(request) {
						var json = JSON.parse(request);
						if(json.cotegory_second_count == 0){
							opt.remove();
						} else {
							alert(lang.language['commodity_categoryFirstDel_ErrorMsg']);
						}
					});
		}
		return false;
	});	
	
	/*		categorySecondList/		*/
	$("a.categorySecondDel").click(function(){
		if(confirm("確定刪除?")) {
			var uti = $(this).attr('href');
			var opt = $(this).parent().parent();
			$.post('/dealer/backend/commodity/categorySecondDel/',{
						'uti':uti
					},function(request){
						var json = JSON.parse(request);
						if(json.information_count == 0){
							opt.remove();
						} else {
							alert(lang.language['commodity_categorySeconfDel_ErrorMsg']);
						}
					});
		}
		return false;
	});
	/*		itemList		*/
	$("a.itemDel").click(function(){
		if(confirm("確定刪除?")) {
			var uti = $(this).attr('href');
			var opt = $(this).parent().parent();
			$.post('/dealer/backend/commodity/itemDel/',{
						'uti':uti
					},function(request){
						var json = JSON.parse(request);
						if(json.sale_count == 0){
							opt.remove();
						} else {
							alert(lang.language['commodity_itemDel_ErrorMsg']);
						}
					});
		}
		return false;
	});
	$("input#search_bar").search_easeOutQuart($(this));
	
	/*	itemEdit */
	$('#checkbox_Item_Edit').change(function() {
		if($('input:checkbox').is(':checked')){
			$('#fp_Edit_dt').show();
			$('#fp_Edit_dd').show();
		} else {
			$('#fp_Edit_dt').hide();
			$('#fp_Edit_dd').hide();
		}
	});
	/*	itemAdd */
	$("#fp_Add_dt").hide();
	$("#fp_Add_dd").hide();
	$('#checkbox_Item_Add').change(function() {
		if($('input:checkbox').is(':checked')){
			$('#fp_Add_dt').show();
			$('#fp_Add_dd').show();
		} else {
			$('#fp_Add_dt').hide();
			$('#fp_Add_dd').hide();
		}
	});
	
	/*	invoicingEditAdd.php	*/
	$('#invoicing_status').change(function() {
		if($('#invoicing_status').val() == 1) {
			$('#stock_content').removeAttr("disabled");
		} else {
			$('#stock_content').attr("disabled", true);
		} 
	});

	/*		shelvesList/		*/
	$('table').on('click','div.lists ul.dropdown-menu li a', function(){
		var opt 	= $(this);
		var href 	= opt.attr('href');
		var split 	= href.split(',');
		var st 		= split[0];
		var i 		= split[1];
		if(split.length == 2) {
			$.post('/dealer/backend/commodity/ajaxSetShelvesStatus/',{
						'st' : st,
						'i' : i
					},function(request) {	
						lang = JSON.parse(request);
						if(lang['error']) {
							alert(lang['error']);
						} else {
							var clickName = opt.find('span').html();
							opt.parent().parent().parent().find('a.status').html(clickName).parent().parent().parent().remove();	
						}
					});
			return false;
		}
	});
	
	/* Lang */
	function getLang() {
		$.post('/dealer/backend/commodity/ajaxGetLang/',{
		},function(request) {	
			// return JSON.parse(request);
		}).done(function(request){
			lang = JSON.parse(request);
		});
	}	
});