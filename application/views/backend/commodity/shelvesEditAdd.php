<article id="shelvesEditAdd">
	<?php if(isset($error)) {?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4><?php echo $lang->line('commodity_Error'); ?></h4>
		<?php echo $error; ?>
	</div>
	<?php } ?>
	<form method="POST" action="" enctype="multipart/form-data" />
		<dl class="dl-horizontal dlform level">
			<dt><?php echo $lang->line('commodity_item_name'); ?></dt>
			<dd><?php echo $itemList -> item_name;?></dd>	
			<dt><?php echo $lang->line('commodity_item_image'); ?></dt>
			<dd>
				<div class="fileupload fileupload-new" data-provides="fileupload">
					<?php if($img_exist){ ?> 
					<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo '/dealer/statics/img_commodity/main/'.$img_name;?>" /></div>
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
				<button type="submit" class="btn btn-primary" name="add" value="add"><?php echo $lang->line('add'); ?></button>
				<button type="submit" class="btn offset2" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
			</div>
		</div>
	</form>
</article>
<script src="/dealer/statics/lib/ckeditor/ckeditor.js"></script>
<script src="/dealer/statics/lib/ckfinder/ckfinder.js"></script>
<script src="/dealer/statics/lib/bootstrap/bootstrap-fileupload.js"></script>
<script>
	/*	shelvesEditAdd.php	*/
	CKEDITOR.replace( 'item_fulltext',
    {
        filebrowserBrowseUrl : '/dealer/statics/lib/ckfinder/ckfinder.html',
		filebrowserImageUploadUrl : '/dealer/statics/lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
    });	
</script>