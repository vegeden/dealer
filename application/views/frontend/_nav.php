<nav>
	<div id="left"></div>
	<div id="hot"></div>
	<div id="main">
		<ul class="breadcrumb">
			<?php 
				if(isset($nav)) if($nav->num_rows() > 0) 
					foreach($nav->result() as $rows) {
			?>
			<li>
				<a href="/<?php echo $lang->line('folder_name').'/store/index/'.$rows->id.'/';?>"><?php echo $rows->category_name; ?></a> 
				<ul>
					<?php 
						$nav_second = $this->items_category_second->SWhereCategory($rows->id);
						if(isset($nav_second)) if($nav_second->num_rows() > 0) 
							foreach($nav_second->result() as $key => $row) {	
					?>
					<li class="<?php if($key == count($nav_second->result())-1) echo "last";?>"><a href="/<?php echo $lang->line('folder_name').'/store/index/'.$rows->id.'/'.$row->id.'/';?>"><?php echo $row->category_second_name; ?></a></li>
					<?php } ?>
				</ul>
			</li>
			<?php } ?>
		</ul>
	</div>
	<div id="right"></div>
	<div id="icash_store"><a href="/<?php echo $lang->line('folder_name').'/storedvalue/';?>"></a></div>
	<div id="mostly"><a href="/<?php echo $lang->line('folder_name').'/mostly/';?>"></a></div>
</nav>
					