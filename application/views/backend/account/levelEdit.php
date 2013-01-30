<article>
	<?php if(isset($error)) {?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4><?php echo $lang->line('account_levelAdd_Error'); ?></h4>
		<?php echo $lang->line('account_levelAdd_ErrorMsg'); ?>
	</div>
	<?php } ?>
	<form action="" method="POST">
		<div class="row">
			<div class="span8">
				<dl class="dl-horizontal dlform level">
					<dt><?php echo $lang->line('account_uplevel'); ?></dt>
					<dd>
						<select name="upper" id="upper">
							<option value="1"><?php echo $lang->line('account_levelAdd_myself'); ?></option>
							<?php 
								if($LevelList->num_rows() > 0) {
									foreach($LevelList->result() as $row) {	
										if($row->id == $query->id) continue;
							?>
							<option value="<?php echo $row->id; ?>"  <?php if($query->upper == $row->id) echo 'selected';?>><?php echo $row->type_name; ?></option>
							<?php 
									}
								}
							?>
						</select>
					</dd>
					<dt><?php echo $lang->line('account_levelLists_type_name'); ?></dt>
					<dd><input type="text" placeholder="" class="input-large" name="typeName" value="<?php echo $query->type_name;?>"></dd>
				</dl>
			</div>
			<div class="span8 offset2">
				<button type="submit" class="btn btn-primary span1"><?php echo $lang->line('edit'); ?></button>
				<button type="submit" class="btn span1" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
			</div>
		</div>
	</form>
</article>