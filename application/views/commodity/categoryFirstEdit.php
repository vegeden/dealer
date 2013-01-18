<article>
	<?php if(isset($error)) {?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4><?php echo $lang->line('commodity_Error'); ?></h4>
		<?php echo $lang->line('commodity_categoryFirstAdd_ErrorMsg'); ?>
	</div>
	<?php } ?>
	<form action="" method="POST">
		<div class="row">
			<div class="span8">
				<dl class="dl-horizontal dlform level">
					<dt><?php echo $lang->line('commodity_categoryFirst_name'); ?></dt>
					<dd><input type="text" placeholder="" class="input-large" name="categoryName" value="<?php echo $query->category_name;?>"></dd>
				</dl>
			</div>
			<div class="span8 offset2">
				<button type="submit" class="btn btn-primary span1"><?php echo $lang->line('edit'); ?></button>
				<button type="submit" class="btn span1" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
			</div>
		</div>
	</form>
</article>