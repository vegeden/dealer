<article id="profile-editPwd" class="profile">
	<?php if(isset($error)) {?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4><?php echo $lang->line('account_levelAdd_Error'); ?></h4>
		<?php echo $error; ?>
	</div>
	<?php } ?>
	<form method="POST" action="" class="left">
		<dl class="dl-horizontal">
			<dt><?php echo $lang->line('OriginalPasswd');?></dt>
			<dd><input type="password" placeholder="" class="input-large" name="OriginalPasswd" value=""></dd>
			<dt><?php echo $lang->line('NewPasswd');?></dt>
			<dd><input type="password" placeholder="" class="input-large" name="NewPasswd" value=""></dd>
			<dt><?php echo $lang->line('againNewPasswd');?></dt>
			<dd><input type="password" min="0" placeholder="" class="input-large" name="againNewPasswd" value=""></dd>
		</dl>
		<div id="submit">
			<button class="btn btn-large offset1" type="sumbit" name="cancel" value="cancel"><?php echo $lang->line('cancel');?></button>
			<button class="btn btn-large btn-primary offset1" type="submit" name="submit" value="submit"><?php echo $lang->line('submit');?></button>
		</div>
	</form>
</article>