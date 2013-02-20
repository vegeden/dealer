<header>
	<div id="logo"><img src="/dealer/statics/img/logo.gif"></div>
	<div id="nav">
		<div id="top">
			<ul id="UserName" class="breadcrumb">
				<li><b><?php echo $UserInfo->name.$lang->line('Welcome'); ?></b></li>
			</ul>
			<div id="UserInfo">
				<div id="break"></div>
				<div id="break-right">
					<ul class="breadcrumb">
						<li><a href="#"><?php echo $lang->line('UserInfo_logout'); ?></a> <span class="divider">|</span></li>
						<li><a href="#"><?php echo $lang->line('UserInfo_Profile'); ?></a> <span class="divider">|</span></li>
						<li class="active"><?php echo $lang->line('UserInfo_MyCart'); ?></li>
					</ul>
				</div>
			</div>
			<div id="About">
				<div id="break"></div>
				<div id="break-right">
					<ul class="breadcrumb">
						<li><a href="#"><?php echo $lang->line('About_CustomerService'); ?></a> <span class="divider">|</span></li>
						<li><a href="#"><?php echo $lang->line('About_BuyDirections'); ?></a> <span class="divider">|</span></li>
						<li><a href="#"><?php echo $lang->line('About_us'); ?></a></li>
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