<article id="adminEdit">
	<?php if(isset($error)) {?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4><?php echo $lang->line('account_levelAdd_Error'); ?></h4>
		<?php echo $error; ?>
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
			<div class="row">
				<div class="span3 offset3">
					<button type="submit" class="btn btn-primary" name="submit" value="submit"><?php echo $lang->line('add'); ?></button>
					<button type="submit" class="btn offset2" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
				</div>
			</div>
		</div>
		<input type="hidden" name="item" value="1">
	</form>
	<hr>
	<?php } ?>
	<form action="" method="POST">
		<div class="row">
			<div class="span8">
				<dl class="dl-horizontal dlform">
					<dt><?php echo $lang->line('account_bonusPercentage'); ?></dt>
					<dd><input type="text" placeholder="%" class="input-large" name="bonus" value="<?php if(isset($Bonus->bonusPercentage)) echo $Bonus->bonusPercentage; else echo 0;?>"></dd>
				</dl>
			</div>
			<div class="row">
				<div class="span3 offset3">
					<button type="submit" class="btn btn-primary" name="submit" value="submit"><?php echo $lang->line('add'); ?></button>
					<button type="submit" class="btn offset2" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
				</div>
			</div>
		</div>
		<input type="hidden" name="item" value="2">
	</form>
	<hr>
	
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
			<div class="row">
				<div class="span3 offset3">
					<button type="submit" class="btn btn-primary" name="submit" value="submit"><?php echo $lang->line('add'); ?></button>
					<button type="submit" class="btn offset2" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
				</div>
			</div>
		</div>
		<input type="hidden" name="item" value="3">
	</form>
</article>