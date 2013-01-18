<article>
	<?php if(isset($error)) {?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?php echo $error; ?>
	</div>
	<?php } ?>
	<form action="" method="POST">
		<div class="row">
			<div class="span8">
				<dl class="dl-horizontal dlform">
					<dt><?php echo $lang->line('account_name'); ?></dt>
					<dd><input type="text" placeholder="<?php echo $lang->line('account_name'); ?>" class="input-large" name="name" value="<?php echo $UserInfo->name; ?>"></dd>
					<dt><?php echo $lang->line('account_gender'); ?></dt>
					<dd>
						<select name="gender">
							<option value="0" <?php if($UserInfo->gender == 0) echo 'selected';?>><?php echo $lang->line('account_register_select'); ?></option>
							<option value="1" <?php if($UserInfo->gender == 1) echo 'selected';?>><?php echo $lang->line('account_register_gender_male'); ?></option>
							<option value="2" <?php if($UserInfo->gender == 2) echo 'selected';?>><?php echo $lang->line('account_register_gender_female'); ?></option>
						</select>
					</dd>
					<dt><?php echo $lang->line('account_email'); ?></dt>
					<dd><input type="email" placeholder="test@example.com" class="input-large" name="email" value="<?php echo $UserInfo->email; ?>" required></dd>
					<dt><?php echo $lang->line('account_phone'); ?></dt>
					<dd><input type="text" placeholder="<?php echo $lang->line('account_phone'); ?>" class="input-large" name="phone" value="<?php echo $UserInfo->phone; ?>"></dd>
					<dt><?php echo $lang->line('account_address'); ?></dt>
					<dd><input type="text" placeholder="<?php echo $lang->line('account_address'); ?>" class="input-xlarge address" name="address" value="<?php echo $UserInfo->address; ?>"></dd>
				</dl>
			</div>
			<div class="span8 offset2">
				<button type="submit" class="btn btn-primary span1" name="submit" value="submit"><?php echo $lang->line('edit'); ?></button>
				<button type="submit" class="btn span1" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
			</div>
		</div>
	</form>
</article>