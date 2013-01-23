<article id="register">
	<?php if(isset($error)) {?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4><?php echo $lang->line('account_Error'); ?></h4>
		<?php echo $error; ?>
	</div>
	<?php } ?>
	<form action="" method="POST">
		<div class="row">
			<div class="span8">
				<dl class="dl-horizontal dlform">
					<dt><?php echo $lang->line('account_register_type_name'); ?></dt>
					<dd>
						<div class="input-prepend">
							<div class="btn-group register">
								<button class="btn dropdown-toggle" data-toggle="dropdown">
									<?php echo $lang->line('account_register_select'); ?>
								</button>
								<ul class="dropdown-menu">
									<?php 
										if($user_type->num_rows() > 0) {
											foreach($user_type->result() as $row) {
									?>
										<li><a href="<?php echo $row->id; ?>"><?php echo $row->type_name; ?></a></li>
									<?php 
											}
										}
									?>
								</ul>
							</div>
							<input class="span2" id="prependedDropdownButton" type="text" placeholder="<?php echo $lang->line('account_register_please_input'); ?>">
							<input type="hidden" id="level" value="" name="level">
							<input type="hidden" id="upper" value="" name="upper">
						</div>
						<select multiple="multiple" id="NameList"></select>
					</dd>
					<dt><?php echo $lang->line('account_account'); ?></dt>
					<dd><input type="text" placeholder="<?php echo $lang->line('account_account'); ?>" class="input-large" name="account" value=""></dd>
					<dt><?php echo $lang->line('account_password'); ?></dt>
					<dd><input type="password" placeholder="<?php echo $lang->line('account_password'); ?>" class="input-large" name="password" value=""></dd>
				</dl>
			</div>
			<div class="span8 offset2">
				<button type="submit" class="btn btn-primary span1" name="submit" value="submit"><?php echo $lang->line('add'); ?></button>
				<button type="submit" class="btn span1" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
			</div>
		</div>
	</form>
</article>