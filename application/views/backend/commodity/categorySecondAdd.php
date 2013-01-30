<article>
	<?php if(isset($error)) {?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4><?php echo $lang->line('commodity_Error'); ?></h4>
		<?php echo $lang->line('commodity_categorySecondAdd_ErrorMsg'); ?>
	</div>
	<?php } ?>
	<form action="" method="POST">
		<dl class="dl-horizontal dlform level">
			<dt><?php echo $lang->line('commodity_categoryFirst_name'); ?></dt>
			<dd>
				<select name="category_class" id="category_class">
					<?php 
						if($CategoryList->num_rows() > 0) {
							foreach($CategoryList->result() as $row) {							
					?>
					<option value="<?php echo $row->id; ?>"><?php echo $row->category_name; ?></option>
					<?php 
							}
						}
					?>
				</select>
			</dd>					
			<dt><?php echo $lang->line('commodity_categorySecond_name'); ?></dt>
			<dd><input type="text" placeholder="" class="input-large" name="categorySecondName"></dd>
		</dl>
		<div class="row">
			<div class="span3 offset3">
				<button type="submit" class="btn btn-primary"><?php echo $lang->line('add'); ?></button>
				<button type="submit" class="btn offset2" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
			</div>
		</div>
	</form>
</article>