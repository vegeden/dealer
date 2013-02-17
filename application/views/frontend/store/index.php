<article id="store" class="center">	
	<?php 
	switch($store_level){
		case 0:
	?>
	<?php
			break;
		case 1:
			if($category_second->num_rows()>0)
			foreach($category_second->result() as $key_category_second => $row_category_second) {				
				if(${'store'.$row_category_second->id}->num_rows()>0)
				foreach(${'store'.$row_category_second->id}->result() as $key_store => $row_store) {
					if($key_store % $viewCount == 0) { 
	?>
	<h2><a href="<?php echo $url.'../index/'.$row_category_second->category.'/'.$row_category_second->id.'/'; ?>"><?php echo $row_category_second->category_second_name; ?></a></h2>
	<div class="row">
	<?php 	} ?>
	<div class="span3" >
		<a class="thumbnail decorationNone" href="<?php echo $url.'../commodity/'.$row_store->id.'/'; ?>">
			<img data-src="holder.js/150x150" alt="" width="150" height="150">
			<h4><?php echo $row_store->item_name;?></h4>
			<h3 class="price"><?php echo $lang->line('store_dollar_sign'); ?> <?php echo $row_store->sell_price;?></h3>
		</a>
	</div>
	<?php if($key_store % $viewCount == $viewCount-1) { ?>
	</div>
	<?php
					}
				}
			}
			break;
		case 2:
			if($store->num_rows()>0)
			foreach($store->result() as $key => $row) {
				if($key % $viewCount == 0) { 
	?>
	<div class="row">
	<?php 	} ?>
	<div class="span3" >
		<a class="thumbnail decorationNone" href="<?php echo $url.'../commodity/'.$row->id.'/'; ?>">
			<img data-src="holder.js/150x150" alt="" width="150" height="150">
			<h4><?php echo $row->item_name;?></h4>
			<h3 class="price"><?php echo $lang->line('store_dollar_sign'); ?> <?php echo $row->sell_price;?></h3>
		</a>
	</div>
	<?php if($key % $viewCount == $viewCount-1) { ?>
	</div>
	<?php
						} 
			}
			break;
	}
	?>
</article>