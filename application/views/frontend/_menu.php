<div id="nav_second">
	<div id="title" class="gradient_BlackWhite">
		<?php 
			if(preg_match('/store\/*/', uri_string())) {
				echo $lang->line('nav_class');
			} else if(preg_match('/profile\/*/', uri_string())) {
				echo $lang->line('my_profile');
			} else {
				echo $lang->line('specialoffer');
			}
		?>
	</div>
	<?php
		if(preg_match('/store\/*/', uri_string())) {
			require_once '_menu_nav_second.php';
		} else if(preg_match('/profile\/*/', uri_string())) {
			require_once '_menu_profile.php';
		} else {
			require_once '_menu_specialoffer.php';
		}
	?>
</div>
<div class="advertisement">
	<img src="/<?php echo $lang->line('folder_name').'/statics/img_advertisement/ad_left.jpg';?>">
</div>