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
					<dt><?php echo $lang->line('account_nowpassword'); ?></dt>
					<dd><input type="password" placeholder="<?php echo $lang->line('account_nowpassword'); ?>" class="input-large" name="nowpassword" value="" ></dd>
					<dt><?php echo $lang->line('account_newpasswrod'); ?></dt>
					<dd><input type="password" placeholder="<?php echo $lang->line('account_newpasswrod'); ?>" class="input-large newpassword" name="newpassword" value="" data-content="<?php echo $lang->line('account_note_content'); ?>" data-original-title="<?php echo $lang->line('account_note_title'); ?>"></dd>
					<dt><?php echo $lang->line('account_newpasswrodagain'); ?></dt>
					<dd><input type="password" placeholder="<?php echo $lang->line('account_newpasswrod'); ?>" class="input-large" name="newpasswordagain" value="" ></dd>
				</dl>
			</div>
			<div class="span8 offset2">
				<button type="submit" class="btn btn-primary span1" name="submit" value="submit"><?php echo $lang->line('edit'); ?></button>
				<button type="submit" class="btn span1" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
			</div>
		</div>
	</form>
</article>