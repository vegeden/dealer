<article>
		<div id="menu-control">
	<ul class="nav nav-pills pull-left">
		<li class="">
			<a href="<?php echo $url.'../itemAdd/';?>"><?php echo $lang->line('nav_commodity_itemAdd');?></a>
		</li>
	</ul>
	<div class="input-append pull-right">
		<input class="" id="search_bar" type="text" name="search" placeholder="<?php echo $lang->line('commodity_item_name');?>">
		<span class="add-on"><?php echo $lang->line('search');?></span>
	</div>
		</div>
	<table class="table table-condensed table-bordered table-hover table-striped">
		<tr class="info firstRow">
			<td class="items"></td>
			<td class="invoice"></td>
			<td><?php echo $lang->line('commodity_item_name'); ?></td>
			<td><?php echo $lang->line('commodity_item_barcode'); ?></td>
			<td><?php echo $lang->line('commodity_item_number'); ?></td>
			<td><?php echo $lang->line('commodity_item_buy_price'); ?></td>
			<td><?php echo $lang->line('commodity_item_sell_price'); ?></td>
			<td><?php echo $lang->line('commodity_item_safe_stock'); ?></td>
			<td><?php echo $lang->line('commodity_bread_name'); ?></td>
			<td><?php echo $lang->line('commodity_item_stock_quantity'); ?></td>
			<td><?php echo $lang->line('commodity_item_dividend'); ?></td>
			<td><?php echo $lang->line('commodity_area_name'); ?></td>
			<td><?php echo $lang->line('commodity_categorySecond_name'); ?></td>
			<td><?php echo $lang->line('commodity_categoryFirst_name'); ?></td>
			<td><?php echo $lang->line('commodity_freight_price'); ?></td>
			<td><?php echo $lang->line('commodity_special_item'); ?></td>
		</tr>
		<?php 
			if($Items_information->num_rows() > 0) {
				foreach($Items_information->result() as $row) {
		?>
		<?php if($row->warn_stock > 0){?>
		<tr class="info">
		<?php } else { ?>
		<tr class="error">
		<?php } ?>
			<td>
				<a href="/dealer/backend/commodity/itemEdit/<?php echo $row->id;?>/"  rel="tooltip" title="<?php echo $lang->line('edit'); ?>"><img src="/dealer/statics/img/ic_action_edit.png"/></a>
				<a href="<?php echo $row->id;?>" class="itemDel"  rel="tooltip" title="<?php echo $lang->line('del'); ?>"><img src="/dealer/statics/img/ic_action_remove.png"/></a>
			</td>
			<td>
				<a href="/dealer/backend/commodity/invoicingEditAdd/<?php echo $row->id;?>/" rel="tooltip" title="<?php echo $lang->line('commodity_invoicing_static1').$lang->line('commodity_invoicing_static0');?>"><img src="/dealer/statics/img/ic_invoice_24.png" width="24" height="24"/></a>
			</td>			
			<td><?php echo $row->item_name;?></td>
			<td><?php echo $row->item_barcode;?></td>
			<td><?php echo $row->item_number;?></td>
			<td><?php echo $row->buy_price;?></td>
			<td><?php echo $row->sell_price;?></td>
			<td><?php echo $row->safe_stock;?></td>
			<td><?php echo $row->bread_name;?></td>
			<td><?php echo $row->stock_quantity;?></td>
			<td><?php echo $row->dividend;?></td>
			<td><?php echo $row->area_name;?></td>
			<td><?php echo $row->category_second_name;?></td>
			<td><?php echo $row->category_name;?></td>
			<td><?php echo $row->freight_price;?></td>
			<td>
			<?php
				if($row->special_commodity_status) {
					echo $lang->line('commodity_yes');
				} else {
					echo $lang->line('commodity_no');
				}
			?>
			</td>
		</tr>
		<?php 
				}
			}
		?>
	</table>
	<div class="pagination pagination-centered">
		<ul>
			<li><a href="<?php echo $url.$page_previous.'/'; ?>">«</a></li>
			<?php
				for($i=1;$i<=$page_TotalPageNum;$i++) {
			?>
			<li><a href="<?php echo $url.$i.'/';?>"><?php echo $i;?></a></li>
			<?php 
				}
			?>
			<li><a href="<?php echo $url.$page_next.'/'; ?>">»</a></li>
		</ul>
	</div>
</article>
<script src="/dealer/statics/js/backend/commodity-itemlists.js"></script>
