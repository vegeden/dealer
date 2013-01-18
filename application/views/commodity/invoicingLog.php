<article id="storedvalue-lists">
	<ul class="nav nav-pills pull-left">
		<li <?php if($kind == 0) { ?> class="active" <?php } ?>>
			<a href="<?php echo $url.'0/';?>"><?php echo $lang->line('commodity_invoicing_static0');?></a>
		</li>
		<li <?php if($kind == 1) { ?> class="active" <?php } ?>>
			<a href="<?php echo $url.'1/';?>"><?php echo $lang->line('commodity_invoicing_static1');?></a>
		</li>
	</ul>
	<table class="table table-condensed table-bordered table-hover table-striped">
		<tr class="info firstRow">
			<td><?php echo $lang->line('commodity_item_name');?></td>
			<td><?php echo $lang->line('commodity_account');?></td>
			<td><?php echo $lang->line('commodity_item_stock_quantity');?></td>
			<?php if($kind == 1){ ?>
			<td><?php echo $lang->line('commodity_invoicingEdit_quantity');?></td>
			<td><?php echo $lang->line('commodity_invoicingEdit_content');?></td>
			<td><?php echo $lang->line('commodity_invoicingEdit_time');?></td>
			<?php }else{ ?>
			<td><?php echo $lang->line('commodity_invoicingAdd_quantity');?></td>
			<td><?php echo $lang->line('commodity_invoicingAdd_time');?></td>
			<?php } ?>
			<td><?php echo $lang->line('commodity_IP');?></td>
		</tr>
		<?php 
			if($items_purchase_stock->num_rows() > 0) {
				foreach($items_purchase_stock->result() as $row) {
		?>
		<tr class="info">		
			<td><?php echo $row->item_name;?></td>
			<td><?php echo $row->name;?></td>
			<td><?php echo $row->original_quantity;?></td>
			<?php if($kind == 1){?>
			<td><?php echo $row->stock_quantity;?></td>
			<td><?php echo $row->stock_content;?></td>
			<td><?php echo $row->datetime;?></td>
			<td><?php echo $row->ip;?></td>
			<?php }else{?>
			<td><?php echo $row->purchase_quantity;?></td>
			<td><?php echo $row->datetime;?></td>
			<td><?php echo $row->ip;?></td>
			<?php }?>
		</tr>
		<?php 
				}
			}
		?>
	</table>
	<?php if($page_TotalPageNum != 0) {?>
	<div class="pagination pagination-centered">
		<ul>
			<li><a href="<?php echo $url.$kind.'/'.$page_previous.'/'; ?>">«</a></li>
			<?php
				for($i=1;$i<=$page_TotalPageNum;$i++) {
			?>
			<li><a href="<?php echo $url.$kind.'/'.$i.'/';?>"><?php echo $i;?></a></li>
			<?php 
				}
			?>
			<li><a href="<?php echo $url.$kind.'/'.$page_next.'/'; ?>">»</a></li>
		</ul>
	</div>
	<?php } ?>
</article>
<?php if($UserInfo->type_id == 1) { ?>
<script src="/dealer/statics/js/backend/storedvalue-lists.js"></script>
<?php } ?>