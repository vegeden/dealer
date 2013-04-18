<article>
	<?php if(isset($error)) {?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4><?php echo $lang->line('account_levelAdd_Error'); ?></h4>
		<?php echo $error; ?>
	</div>
	<?php } ?>
	<form action="" method="POST">
		<dl class="dl-horizontal dlform level">
			<dt><?php echo $lang->line('account_uplevel'); ?></dt>
			<dd>
				<select name="upper" id="upper">
					<option value="1"><?php echo $lang->line('account_levelAdd_myself'); ?></option>
					<?php 
						if($LevelList->num_rows() > 0) {
							foreach($LevelList->result() as $row) {							
					?>
					<option value="<?php echo $row->id; ?>"><?php echo $row->type_name; ?></option>
					<?php 
							}
						}
					?>
				</select>
			</dd>
			<dt><?php echo $lang->line('account_levelLists_type_name'); ?></dt>
			<dd><input type="text" placeholder="" class="input-large" name="typeName"></dd>
		</dl>
		<div class="row">
			<div class="span3 offset3">
				<button type="submit" class="btn btn-primary" name="submit" value="submit"><?php echo $lang->line('add'); ?></button>
				<button type="submit" class="btn offset2" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
			</div>
		</div>
	</form>
</article>