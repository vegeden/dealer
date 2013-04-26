<div id="nav_second">
	<p id="title" class="gradient_BlackWhite">
		<?php 
			if(preg_match('/store\/index*/', uri_string()) || preg_match('/store\/commodity*/', uri_string())) {
				echo $lang->line('nav_class');
			} else if(preg_match('/profile\/*/', uri_string()) || preg_match('/^storedvalue$/', uri_string())) {
				echo $lang->line('my_profile');
			} else {
				echo $lang->line('specialoffer');
			}
		?>
	</p>
	<?php
		if(preg_match('/store\/index*/', uri_string()) || preg_match('/store\/commodity*/', uri_string())) {
			require_once '_menu_nav_second.php';
		} else if(preg_match('/profile\/*/', uri_string()) || preg_match('/^storedvalue$/', uri_string())) {
			require_once '_menu_profile.php';
		} else {
			require_once '_menu_specialoffer.php';
		}
	?>
</div>
<div class="advertisement">
	<img src="/<?php echo $lang->line('folder_name').'/statics/img_advertisement/ad_left.jpg';?>">
</div>
<div class="facebook_fans">
	<iframe src="http://www.facebook.com/plugins/likebox.php?href=http://www.facebook.com/pages/%E8%94%AC%E9%A3%9F%E4%BC%8A%E7%94%B8%E5%9C%92/195272967164333?width=200&amp;colorscheme=light&amp;show_faces=true&amp;stream=false&amp;header=false&amp;height=355&amp;width=180" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:180px; height:355px;" allowtransparency="true"></iframe>
</div>