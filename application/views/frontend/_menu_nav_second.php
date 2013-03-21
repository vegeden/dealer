<ul>
	<?php 
		if(isset($menu_nav_second)) if($menu_nav_second->num_rows() > 0) 
			foreach($menu_nav_second->result() as $key => $row) {	
	?>
	<li class="<?php if($key == count($menu_nav_second->result())-1) echo "last";?>"><a href="/<?php echo $lang->line('folder_name').'/store/index/'.$category.'/'.$row->id.'/';?>"><?php echo $row->category_second_name; ?></a></li>
	<?php 	} ?>
</ul>