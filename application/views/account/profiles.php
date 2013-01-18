<article>
	<div class="row">
		<div class="span9">
			<div class="row">
				<div class="span1">
					<h3><?php echo $lang->line('account_status');?></h3>
				</div>
				<div class="span1">
					<h3><?php echo $lang->line('account_status'.$UserInfo->user_status);?></h3>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="span1"><h3><?php echo $lang->line('account_account');?></h3></div>
				<div class="span1">
					<h3><?php echo $UserInfo->account;?></h3>
				</div>
				<div class="span1 link"><a href="<?php echo $url.'editPasswd/';?>"><?php echo $lang->line('account_editpasswd');?></a></div>
			</div>
			<hr>
			<div class="row">
				<div class="span1"><h3><?php echo $lang->line('account_name');?></h3></div>
				<div class="span1 name"><h3><?php echo $UserInfo->name;?></h3></div>
				<div class="span1 link"><a href="<?php echo $url.'editInfo/';?>"><?php echo $lang->line('account_editinfo');?></a></div>
			</div>
			<div class="row">
				<div class="span1"><h3><?php echo $lang->line('account_gender');?></h3></div>
				<div class="span7"><h3><?php echo $lang->line('account_gender'.$UserInfo->gender);?></h3></div>
			</div>
			<div class="row">
				<div class="span1"><h3><?php echo $lang->line('account_email');?></h3></div>
				<div class="span7"><h3><?php echo $UserInfo->email;?></h3></div>
			</div>
			<div class="row">
				<div class="span1"><h3><?php echo $lang->line('account_phone');?></h3></div>
				<div class="span7"><h3><?php echo $UserInfo->phone;?></h3></div>
			</div>
			<div class="row">
				<div class="span1"><h3><?php echo $lang->line('account_address');?></h3></div>
				<div class="span7"><h3><?php echo $UserInfo->address;?></h3></div>
			</div>
		</div>
	</div>
</article>