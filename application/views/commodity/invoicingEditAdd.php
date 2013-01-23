<article>
	<form action="" method="POST">
		<div class="row">
			<table class="table table-condensed table-bordered table-hover table-striped">
				<tr class="info">
					<td><?php echo $lang->line('commodity_invoicing_static1').'/'.$lang->line('commodity_invoicing_static0'); ?></td>
					<td>
						<select name="invoicing_status" id="invoicing_status">
							<option value="1"><?php echo $lang->line('commodity_invoicing_static1'); ?></option>
							<option value="0"><?php echo $lang->line('commodity_invoicing_static0'); ?></option>
						</select>			
					</td>
				</tr>
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
					<td><?php echo $lang->line('commodity_invoicingEdit_quantity').'/'.$lang->line('commodity_invoicingAdd_quantity'); ?></td>
					<td><input type="number" class="input-large" name="stock_purchase_quantity" min="1"></td>
				</tr>
				<tr class="info">
					<td><?php echo $lang->line('commodity_invoicingEdit_content'); ?></td>
					<td><textarea id="stock_content" name="stock_content" rows="3"></textarea></td>
				</tr>			
			</table>
			<div class="span8 offset2">
				<button type="submit" class="btn btn-primary span1"><?php echo $lang->line('edit'); ?></button>
				<button type="submit" class="btn span1" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
			</div>
		</div>
	</form>
</article>