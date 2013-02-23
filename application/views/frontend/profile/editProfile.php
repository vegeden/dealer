<article id="profile-editProfile" class="profile">
	<?php if(isset($error)) {?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4></h4>
		<?php echo $error; ?>
	</div>
	<?php } ?>
	<form method="POST" action="" class="left">
		<dl class="dl-horizontal">
			<dt><?php echo $lang->line('name');?></dt>
			<dd>
				<?php 
					if(!empty($UserInfo->name)) {
						echo $UserInfo->name;
					} else { 
				?>
					<input type="text" placeholder="<?php echo $lang->line('storedvalue_ATM_name');?>" class="input-large" name="name" value="">
				<?php 
					}
				?>
			</dd>
			<dt><?php echo $lang->line('gender');?></dt>
			<dd>
				<?php 
					if(!empty($UserInfo->gender)) {
						echo $lang->line('gender_'.$UserInfo->gender);
					} else { 
				?>
					<label class="radio gender_Male pull-left">
						<input type="radio" name="gender" id="optionsRadios1" value="1">
						<?php echo $lang->line('gender_1');?>
					</label>
					<label class="radio gender_Female">
						<input type="radio" name="gender" id="optionsRadios2" value="2">
						<?php echo $lang->line('gender_2');?>
					</label>
				<?php 
					}
				?>
				
			</dd>
			<dt><?php echo $lang->line('phone');?></dt>
			<dd>
				<input type="text" min="0" placeholder="<?php echo $lang->line('example_phone');?>" class="input-large phone" name="phone" value="<?php echo !empty($UserInfo->phone) ? $UserInfo->phone : ''?>">
			</dd>
			<dt><?php echo $lang->line('email');?></dt>
			<dd>
				<input type="email" min="0" placeholder="<?php echo $lang->line('example_email');?>" class="input-large" name="email" value="<?php echo !empty($UserInfo->email) ? $UserInfo->email : ''?>">
			</dd>
		</dl>
		<div id="submit">
			<button class="btn btn-large offset1" type="sumbit" name="cancel" value="cancel"><?php echo $lang->line('cancel');?></button>
			<button class="btn btn-large btn-primary offset1" type="apply" name="submit" value="submit"><?php echo $lang->line('submit');?></button>
		</div>
	</form>
</article>
<script src="/dealer/statics/js/lib/bootstrap/bootstrap-inputmask.min.js"></script>