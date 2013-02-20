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
				<a href="#"><?php echo $rows->category_name; ?></a> 
				<ul>
					<?php 
						$nav_second = $this->items_category_second->SWhereCategory($rows->id);
						if(isset($nav_second)) if($nav_second->num_rows() > 0) 
							foreach($nav_second->result() as $row) {	
					?>
					<li><a href="#"><?php echo $row->category_second_name; ?></a></li>
					<?php } ?>
				</ul>
			</li>
			<?php } ?>
		</ul>
	</div>
	<div id="right"></div>
	<div id="icash_save"><a href="#"></a></div>
	<div id="mostly"><a href="#"></a></div>
</nav>
					