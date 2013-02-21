<div id="nav_second">
	<div id="title" class="gradient_BlackWhite">
		<?php echo preg_match('/store/', uri_string()) ? $lang->line('nav_class') : $lang->line('specialoffer') ?>
	</div>
	<?php
		if(preg_match('/store/', uri_string())) 
			require_once '_menu_nav_second.php';
		else 
			require_once '_menu_specialoffer.php';
	?>
</div>
<div class="advertisement">
	<img src="/<?php echo $lang->line('folder_name').'/statics/img_advertisement/ad_left.jpg';?>">
</div>