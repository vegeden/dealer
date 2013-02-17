<article id="itemAdd">
	<?php if(isset($error)) {?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4><?php echo $lang->line('commodity_Error'); ?></h4>
		<?php echo $error; ?>
	</div>
	<?php } ?>
	<form action="" method="POST">
		<dl class="dl-horizontal dlform level">
			<dt><?php echo $lang->line('commodity_item_name'); ?></dt>
			<dd><input type="text" placeholder="" class="input-large" name="item_name"></dd>
			<dt><?php echo $lang->line('commodity_item_barcode'); ?></dt>
			<dd><input type="text" placeholder="" class="input-large" name="commodity_item_barcode"></dd>	
			<dt><?php echo $lang->line('commodity_item_number'); ?></dt>
			<dd><input type="text" placeholder="" class="input-large" name="item_number"></dd>	
			<dt><?php echo $lang->line('commodity_item_buy_price'); ?></dt>					
			<dd><input type="number" placeholder="" class="input-large" name="buy_price" min="0" value="0" ></dd>
			<dt><?php echo $lang->line('commodity_item_sell_price'); ?></dt>					
			<dd><input type="number" placeholder="" class="input-large" name="sell_price" min="0" value="0" ></dd>
			<dt><?php echo $lang->line('commodity_item_safe_stock'); ?></dt>					
			<dd><input type="number" placeholder="" class="input-large" name="safe_stock" min="1" value="1" ></dd>				
			<dt><?php echo $lang->line('commodity_bread_name'); ?></dt>
			<dd>
				<select name="bread_class" id="bread_class">
					<?php 
						if($BreadList->num_rows() > 0) {
							foreach($BreadList->result() as $row) {							
					?>
					<option value="<?php echo $row->id; ?>"><?php echo $row->bread_name; ?></option>
					<?php 
							}
						}
					?>
				</select>
			</dd>						
			<dt><?php echo $lang->line('commodity_item_stock_quantity'); ?></dt>					
			<dd><input type="number" placeholder="" class="input-large" name="stock_quantity" min="1" value="1" ></dd>			
			<dt><?php echo $lang->line('commodity_item_bonus'); ?></dt>
			<dd><input type="number" placeholder="" class="input-large" name="item_bonus" min="0" value="0" ></dd>						
			<dt><?php echo $lang->line('commodity_area_name'); ?></dt>
			<dd>
				<select name="area_class" id="area_class">
					<?php 
						if($AreaList->num_rows() > 0) {
							foreach($AreaList->result() as $row) {							
					?>
					<option value="<?php echo $row->id; ?>"><?php echo $row->area_name; ?></option>
					<?php 
							}
						}
					?>
				</select>
			</dd>					
			<dt><?php echo $lang->line('commodity_categorySecond_name'); ?></dt>
			<dd>
				<select name="category_second_class" id="category_second_class">
					<?php 
						if($CategorySecondList->num_rows() > 0) {
							foreach($CategorySecondList->result() as $row) {							
					?>
					<option value="<?php echo $row->id; ?>"><?php echo $row->category_second_name; ?></option>
					<?php 
							}
						}
					?>
				</select>
			</dd>	
			<dt><?php echo $lang->line('commodity_special_item'); ?></dt>
			<dd>
				<label id="checkbox_Item_Add" class="checkbox">
				  <input type="checkbox" id="special_commodity_status" name="special_commodity_status">
				  <?php echo $lang->line('commodity_special_explain'); ?>
				</label>
			</dd>
			<dt id="fp_Add_dt"><?php echo $lang->line('commodity_freight_price'); ?></dt>					
			<dd id="fp_Add_dd"><input type="number" placeholder="" class="input-large" name="freight_price" min="0" value="0" ></dd>
		</dl>
		<div class="row">
			<div class="span3 offset3">
				<button type="submit" class="btn btn-primary" name="add" value="add"><?php echo $lang->line('add'); ?></button>
				<button type="submit" class="btn offset2" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
			</div>
		</div>
	</form>
</article>