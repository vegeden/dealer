<article id="profile-index">
	<ul>
		<li>
			<div class="header center">
				<h3><?php echo $lang->line('profile_title'); ?></h3>
			</div>
			<ul>
				<li class="center"><a href="/<?php echo $lang->line('folder_name').'/profile/EditProfile/';?>"><h4><?php echo $lang->line('profile_myself'); ?></h4></a></li>
				<li class="center"><a href="/<?php echo $lang->line('folder_name').'/profile/EditPwd/';?>"><h4><?php echo $lang->line('profile_account_settings'); ?></h4></a></li>
			</ul>
		</li>
		<li>
			<div class="header center">
				<h3><?php echo $lang->line('storedvalue_title'); ?></h3>
			</div>
			<ul>
				<li class="center"><a href=""><h4><?php echo $lang->line('storedvalue_list'); ?></h4></a></li>
				<li class="center"><a href="/<?php echo $lang->line('folder_name').'/storedvalue/';?>"><h4><?php echo $lang->line('storedvalue_plus'); ?></h4></a></li>
			</ul>
		</li>
		<li>
			<div class="header center">
				<h3><?php echo $lang->line('buy_title'); ?></h3>
			</div>
			<ul>
				<li class="center"><a href=""><h4><?php echo $lang->line('buy_list'); ?></h4></a></li>
			</ul>
		</li>
	</ul>
</article>