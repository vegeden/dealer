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
			<dt><?php echo $lang->line('commodity_categoryFirst_name'); ?></dt>
			<dd>
				<select name="category_class" id="category_class">
					<?php 
						
						if($CategoryList->num_rows() > 0) {
							foreach($CategoryList->result() as $row) {	
								if($row->id == $query->id) continue;
					?>
					<option value="<?php echo $row->id; ?>"  <?php if($query->category == $row->id) echo 'selected';?>><?php echo $row->category_name; ?></option>
					<?php 
							}
						}
					?>
				</select>
			</dd>			
			<dt><?php echo $lang->line('commodity_categorySecond_name'); ?></dt>
			<dd><input type="text" placeholder="" class="input-large" name="categorySecondName" value="<?php echo $query->category_second_name;?>"></dd>
		</dl>
		<div class="row">
			<div class="span3 offset3">
				<button type="submit" class="btn btn-primary" name="edit" value="edit"><?php echo $lang->line('edit'); ?></button>
				<button type="submit" class="btn offset2" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
			</div>
		</div>
	</form>
</article>