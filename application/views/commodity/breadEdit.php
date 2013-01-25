<article>
	<?php if(isset($error)) {?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4><?php echo $lang->line('commodity_Error'); ?></h4>
		<?php echo $lang->line('commodity_breadDel_ErrorMsg'); ?>
	</div>
	<?php } ?>
	<form action="" method="POST">
		<dl class="dl-horizontal dlform level">
			<dt><?php echo $lang->line('commodity_bread_name'); ?></dt>
			<dd><input type="text" placeholder="" class="input-large" name="breadName" value="<?php echo $query->bread_name;?>"></dd>
		</dl>
		<div class="row">
			<div class="span3 offset3">
				<button type="submit" class="btn btn-primary"><?php echo $lang->line('edit'); ?></button>
				<button type="submit" class="btn offset2" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
			</div>
		</div>
	</form>
</article>