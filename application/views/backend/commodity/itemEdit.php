<article id="itemEdit">
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
			<dd><input type="text" placeholder="" class="input-large" name="item_name" value="<?php echo $query->item_name;?>"></dd>
			<dt><?php echo $lang->line('commodity_item_barcode'); ?></dt>
			<dd><input type="text" placeholder="" class="input-large" name="item_barcode" value="<?php echo $query->item_barcode;?>"></dd>
			<dt><?php echo $lang->line('commodity_item_number'); ?></dt>
			<dd><input type="text" placeholder="" class="input-large" name="item_number" value="<?php echo $query->item_number;?>"></dd>	
			<dt><?php echo $lang->line('commodity_item_buy_price'); ?></dt>					
			<dd><input type="number" placeholder="" class="input-large" name="buy_price" min="0" value="<?php echo $query->buy_price;?>" ></dd>
			<dt><?php echo $lang->line('commodity_item_sell_price'); ?></dt>					
			<dd><input type="number" placeholder="" class="input-large" name="sell_price" min="0" value="<?php echo $query->sell_price;?>" ></dd>
			<dt><?php echo $lang->line('commodity_item_safe_stock'); ?></dt>					
			<dd><input type="number" placeholder="" class="input-large" name="safe_stock" min="1" value="<?php echo $query->safe_stock;?>" ></dd>				
			<dt><?php echo $lang->line('commodity_bread_name'); ?></dt>
			<dd>
				<select name="bread_class" id="bread_class">
					<?php 
						if($BreadList->num_rows() > 0) {
							foreach($BreadList->result() as $row) {	
					?>
					<option value="<?php echo $row->id; ?>"  <?php if($query->bread_id == $row->id) echo 'selected';?>><?php echo $row->bread_name; ?></option>
					<?php 
							}
						}
					?>
				</select>
			</dd>	
			<dt><?php echo $lang->line('commodity_item_dividend'); ?></dt>
			<dd><input type="number" placeholder="" class="input-large" name="dividend" min="0" value="<?php echo $query->dividend;?>" ></dd>						
			<dt><?php echo $lang->line('commodity_area_name'); ?></dt>
			<dd>
				<select name="area_class" id="area_class">
					<?php 
						if($AreaList->num_rows() > 0) {
							foreach($AreaList->result() as $row) {	
								//if($row->id == $query->areaid) continue;
					?>
					<option value="<?php echo $row->id; ?>"  <?php if($query->area_id == $row->id) echo 'selected';?>><?php echo $row->area_name; ?></option>
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
					<option value="<?php echo $row->id; ?>"  <?php if($query->category_second_id == $row->id) echo 'selected';?>><?php echo $row->category_second_name; ?></option>
					<?php 
							}
						}
					?>
				</select>
			</dd>				
			<dt><?php echo $lang->line('commodity_special_item'); ?></dt>
			<dd>
				<label id="checkbox_Item_Edit" class="checkbox">
					<input type="checkbox" id="special_commodity_status" name="special_commodity_status" <?php if($query->special_commodity_status)echo 'checked';?>>
					<?php echo $lang->line('commodity_special_explain'); ?>
				</label>
			</dd>
			<dt id="fp_Edit_dt" class="<?php if(!$query->special_commodity_status) echo 'display'; ?>"><?php echo $lang->line('commodity_freight_price'); ?></dt>					
			<dd id="fp_Edit_dd" class="<?php if(!$query->special_commodity_status) echo 'display'; ?>"><input type="number" placeholder="" id="freight_price" class="input-large" name="freight_price" min="0" value="<?php echo $query->freight_price;?>" ></dd>
		</dl>
	
		<div class="row">
			<div class="span3 offset3">
				<button type="submit" class="btn btn-primary" name="edit" value="edit"><?php echo $lang->line('edit'); ?></button>
				<button type="submit" class="btn offset2" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
			</div>
		</div>
	</form>
</article>