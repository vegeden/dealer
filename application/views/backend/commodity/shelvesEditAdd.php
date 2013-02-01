<article id="shelvesEditAdd">
	<form method="POST" action="" enctype="multipart/form-data" />
		<dl class="dl-horizontal dlform level">
			<dt><?php echo $lang->line('commodity_item_name'); ?></dt>
			<dd><?php echo $itemList -> item_name;?></dd>
			<dt><?php echo $lang->line('commodity_item_stop_sale_status'); ?></dt>
			<dd>
				<select name="stop_sale_status" id="stop_sale_status">
					<?php if($itemList->stop_sale_status == 0) {;
					?>
					<option value="0"><?php echo $lang->line('commodity_item_stop_status'); ?></option>
					<option value="1"><?php echo $lang->line('commodity_item_sale_status'); ?></option>
					<?php } else {?>
					<option value="1"><?php echo $lang->line('commodity_item_sale_status'); ?></option>
					<option value="0"><?php echo $lang->line('commodity_item_stop_status'); ?></option>
					<?php }?>
				</select>			
			</dd>	
			<dt><?php echo $lang->line('commodity_item_image'); ?></dt>
			<dd>
				<div class="fileupload fileupload-new" data-provides="fileupload">
					<?php if($item_image_info[0]){ ?> 
					<div class="fileupload-new thumbnail" style="width: <?php echo $item_image_info[1];?>px; height: <?php echo $item_image_info[2];?>px;"><img src="<?php echo $item_image_info[0];?>" /></div>
					<?php } else {?>
					<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" /></div>
					<?php } ?>
					<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
					<div>
						<span class="btn btn-file"><span class="fileupload-new"><?php echo $lang->line('commodity_item_image_select'); ?></span><span class="fileupload-exists"><?php echo $lang->line('commodity_item_image_change'); ?></span><input type="file" name="userfile" /></span>
						<a href="#" class="btn fileupload-exists" data-dismiss="fileupload"><?php echo $lang->line('commodity_item_image_remove'); ?></a>
					</div>
				</div>			
			</dd>	
			<dt><?php echo $lang->line('commodity_item_content'); ?></dt>
			<dd><textarea name="item_content" rows="5"><?php echo $itemList->item_content;?></textarea></dd>	
			<dt><?php echo $lang->line('commodity_item_fulltext'); ?></dt>
			<dd><textarea name="item_fulltext" rows="10"><?php echo $itemList -> fulltext;?></textarea></dd>
			
		</dl>
		<div class="row">
			<div class="span3 offset3">
				<button type="submit" class="btn btn-primary" name="submit" value="submit"><?php echo $lang->line('add'); ?></button>
				<button type="submit" class="btn offset2" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
			</div>
		</div>
	</form>
</article>
<script src="/dealer/statics/js/lib/ckeditor/ckeditor.js"></script>