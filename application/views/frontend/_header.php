<header>
	<div id="logo"><a href="/<?php echo $lang->line('folder_name').'/home/'; ?>"><img src="/dealer/statics/img/logo.gif"></a></div>
	<div id="nav">
		<div id="top">
			<ul id="UserName" class="breadcrumb">
				<li><b><?php if($UserInfo->user_status != 0) echo $UserInfo->name.$lang->line('Welcome'); ?></b></li>
			</ul>
			<div id="UserInfo">
				<div id="break"></div>
				<div id="break-right">
					<ul class="breadcrumb">
						<?php if($UserInfo->type_id != 4) { ?>
						<li><a href="/<?php echo $lang->line('folder_name').'/backend/account/lists/'; ?>"><?php echo $lang->line('Backend_management'); ?></a> <span class="divider">|</span></li>
						<?php } ?>
						<li><a href="/<?php echo $lang->line('folder_name').'/profile/'; ?>"><?php echo $lang->line('UserInfo_Profile'); ?></a> <span class="divider">|</span></li>
						<li><a href="/<?php echo $lang->line('folder_name').'/cart/'; ?>"><?php echo $lang->line('UserInfo_MyCart'); ?></a> <span class="divider">|</span></li>
						<li><a href="/<?php echo $lang->line('folder_name').'/home/logout/'; ?>"><?php echo $lang->line('UserInfo_logout'); ?></a></li>
					</ul>
				</div>
			</div>
			<div id="About">
				<div id="break"></div>
				<div id="break-right">
					<ul class="breadcrumb">
						<li><a href="#"><?php echo $lang->line('About_CustomerService'); ?></a> <span class="divider">|</span></li>
						<li><a href="#"><?php echo $lang->line('About_BuyDirections'); ?></a> <span class="divider">|</span></li>
						<li><a href="/<?php echo $lang->line('folder_name').'/about/'; ?>"><?php echo $lang->line('About_us'); ?></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="search">
			<form method="POST">
				<label><input type="text" placeholder="<?php echo $lang->line('search_bar_placeholder'); ?>" class="input-medium" name="search" value=""></label>
			</form>
		</div>
	</div>
</header>