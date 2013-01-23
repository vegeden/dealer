<article id="adminEidt">
	<?php if(isset($error)) {?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4><?php echo $lang->line('account_levelAdd_Error'); ?></h4>
		<?php echo $lang->line('account_levelAdd_ErrorMsg'); ?>
	</div>
	<?php } ?>
	<?php if(isset($UpperInfo)) { ?>
	<form action="" method="POST">
		<div class="row">
			<div class="span8">
				<dl class="dl-horizontal dlform">
					<dt><?php echo $lang->line('account_change_level'); ?></dt>
					<dd>
						<div class="input-prepend">
							<span class="btn btn-success dropdown-toggle"><?php echo $UpperInfo->name; ?></span>
							<input class="span2" id="prependedDropdownButton" autocomplete="off" type="text" placeholder="<?php echo $lang->line('account_register_please_input'); ?>">
							<input type="hidden" id="level" value="<?php echo $User_information->type_id; ?>" name="level">
							<input type="hidden" id="upper" value="" name="upper">
						</div>
						<select multiple="multiple" id="NameList"></select>
					</dd>
				</dl>
			</div>
			<div class="span8 offset2">
				<button type="submit" class="btn btn-primary span1" name="submit" value="submit"><?php echo $lang->line('edit'); ?></button>
				<button type="submit" class="btn span1" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
			</div>
		</div>
		<input type="hidden" name="item" value="<?php echo time(); ?>">
	</form>
	<hr>
	<?php } ?>
	<form action="" method="POST">
		<div class="row">
			<div class="span8">
				<dl class="dl-horizontal dlform">
					<dt><?php echo $lang->line('account_account'); ?></dt>
					<dd><input type="text" placeholder="<?php echo $lang->line('account_account'); ?>" class="input-large" name="account" value="<?php echo $User_information->account;?>" disabled></dd>
					<dt><?php echo $lang->line('account_password'); ?></dt>
					<dd>
						<input type="password" placeholder="<?php echo $lang->line('account_password'); ?>" class="input-large" name="password" value="">
						<small>
							<cite title="<?php echo $lang->line('account_repasswd_note'); ?>">
								<span class="label label-success"><?php echo $lang->line('account_repasswd_random'); ?></span>
							</cite>
						</small>
					</dd>
				</dl>
			</div>
			<div class="span8 offset2">
				<button type="submit" class="btn btn-primary span1" name="submit" value="submit"><?php echo $lang->line('edit'); ?></button>
				<button type="submit" class="btn span1" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
			</div>
		</div>
	</form>
</article>