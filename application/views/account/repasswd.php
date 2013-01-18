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
				<button type="submit" class="btn btn-primary span1" name="submit" value="submit"><?php echo $lang->line('add'); ?></button>
				<button type="submit" class="btn span1" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
			</div>
		</div>
	</form>
</article>