<article>
	<?php if(isset($error)) {?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4><?php echo $lang->line('commodity_Error'); ?></h4>
		<?php echo $error; ?>
	</div>
	<?php } ?>
	<form action="" method="POST">
		<dl class="dl-horizontal dlform level">
			<dt><?php echo $lang->line('commodity_invoicing_static1').'/'.$lang->line('commodity_invoicing_static0'); ?></dt>
			<dd>
				<select name="invoicing_status" id="invoicing_status">
					<option value="1"><?php echo $lang->line('commodity_invoicing_static1'); ?></option>
					<option value="0"><?php echo $lang->line('commodity_invoicing_static0'); ?></option>
				</select>	
			</dd>
			<dt><?php echo $lang->line('commodity_item_name'); ?></dt>
			<dd><?php echo $itemList -> item_name;?></dd>	
			<dt><?php echo $lang->line('commodity_item_safe_stock'); ?></dt>
			<dd><?php echo $itemList -> safe_stock;?></dd>	
			<dt><?php echo $lang->line('commodity_item_stock_quantity'); ?></dt>
			<dd><?php echo $itemList -> stock_quantity;?></dd>	
			<dt><?php echo $lang->line('commodity_invoicingEdit_quantity').'/'.$lang->line('commodity_invoicingAdd_quantity'); ?></dt>
			<dd><input type="number" class="input-large" name="stock_purchase_quantity" min="1"></dd>	
			<dt><?php echo $lang->line('commodity_invoicingEdit_content'); ?></dt>
			<dd><textarea id="stock_content" name="stock_content" rows="3"></textarea></dd>
		</dl>		
		<div class="row">
			<div class="span3 offset3">
				<button type="submit" class="btn btn-primary" name="edit" value="edit"><?php echo $lang->line('edit'); ?></button>
				<button type="submit" class="btn offset2" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
			</div>
		</div>
	</form>
</article>