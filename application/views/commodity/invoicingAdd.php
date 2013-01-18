<article>
	<form action="" method="POST">
		<table class="table table-condensed table-bordered table-hover table-striped">
			<tr class="info">
				<td><?php echo $lang->line('commodity_item_name'); ?></td>
				<td><?php echo $itemList -> item_name;?></td>
			</tr>
			<tr class="info">
				<td><?php echo $lang->line('commodity_item_safe_stock'); ?></td>
				<td><?php echo $itemList -> safe_stock;?></td>
			</tr>
			<tr class="info">
				<td><?php echo $lang->line('commodity_item_stock_quantity'); ?></td>
				<td><?php echo $itemList -> stock_quantity;?></td>
			</tr>
			<tr class="info">
				<td><?php echo $lang->line('commodity_invoicingAdd_quantity'); ?></td>
				<td><input type="number" class="input-large" name="purchase_quantity" value="1" min="1"></td>
			</tr>
		</table>
		<div class="span8 offset2">
			<button type="submit" class="btn btn-primary span1"><?php echo $lang->line('add'); ?></button>
			<button type="submit" class="btn span1" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
		</div>
	</form>
</article>