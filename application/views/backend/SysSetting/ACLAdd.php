<article id="shelvesEditAdd">
	<?php if(isset($error)) {?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4><?php echo $lang->line('account_levelAdd_Error'); ?></h4>
		<?php echo $lang->line('account_levelAdd_ErrorMsg'); ?>
	</div>
	<?php } ?>
	<form action="" method="POST">
		<?php require_once '_formACL.php'; ?>
	</form>
</article>