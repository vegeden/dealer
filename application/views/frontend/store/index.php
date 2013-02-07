<article id="store" class="center">	
	<?php 
		if($store->num_rows()>0)
		foreach($store->result() as $key => $row) {
			if($key % $viewCount == 0) { 
	?>
	<div class="row">
	<?php 	} ?>
		<div class="span2" data-original-title="">
			<a class="thumbnail decorationNone" href="<?php echo $url.'../commodity/'.$row->id.'/'; ?>">
				<img data-src="holder.js/150x150" alt="" width="150" height="150">
				<h4><?php echo $row->item_name;?></h4>
				<h3 class="price"><?php echo $lang->line('store_dollar_sign'); ?> <?php echo $row->sell_price;?></h3>
			</a>
		</div>
	
	<?php 	if($key % $viewCount == $viewCount-1) { ?>
	</div>
	<?php 
			} 
		} 
	?>
</article>