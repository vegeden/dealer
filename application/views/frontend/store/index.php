<article id="store">
	<?php if($store_level == 1) {?>
	<div id="top4" class="side">
		<div id="title" class="gradient_BlackWhite"><?php echo $lang->line('store_top4');?></div>
		<ul>
			<?php 
			if($category_second->num_rows() > 0) {
				foreach($category_second->result() as $row) {
					if($viewCount == 1) break;
					else {
						if(${'store'.$row->id}->num_rows() > 0) {
							foreach(${'store'.$row->id}->result() as $row_store) {
			?>
			<li>
				<a class="thumbnail" href="../../commodity/<?php echo $row_store->id ;?>/">
					<img src="" data-src="holder.js/220x220" alt="">
					<div id="name" class="center"><?php echo $row_store->item_name ;?></div>
					<div class="price center">
						<span><?php echo $lang->line('store_special_offer'); ?></span>
						<span class="price-num"><?php echo number_format($row_store->sell_price) ;?></span>
					</div>
				</a>
			</li>
			<?php 
								break;
							}
						}
					}
					$viewCount--;
				}
			}
			?>
		</ul>
	</div>
	<div id="order" class="side">
		<ul>
			<li><?php echo $lang->line('store_order'); ?></li>
			<li><a class="select" href="#"><?php echo $lang->line('store_new_store'); ?></a><span class="divider"> |&nbsp;</span></li>
			<li><a href="#"><?php echo $lang->line('store_order_low_to_hight'); ?></a><span class="divider"> |&nbsp;</span></li>
			<li><a href="#"><?php echo $lang->line('store_order_hight_to_low'); ?></a></li>
		</ul>
	</div>
	<?php 
		if($category_second->num_rows() > 0) {
			foreach($category_second->result() as $row) {
				if(${'store'.$row->id}->num_rows() > 0) {
					$viewCount = 5;
	?>
	<div class="content side">
		<a href="../<?php echo $row->category ;?>/<?php echo $row->id ;?>/"><div id="title" class="gradient_BlackWhite"><?php echo $row->category_second_name ;?></div></a>
		<ul>
			<li>
				<ul>
					<?php 
						foreach(${'store'.$row->id}->result() as $row_store) {
							if($viewCount ==1) {
								break;
							}
							else {
					?>
					<li>
						<a class="thumbnail" href="../../commodity/<?php echo $row_store->id ;?>/">
							<img src="" data-src="holder.js/180x180" alt="">
							<div id="name" class="center"><?php echo $row_store->item_name ;?></div>
							<div class="price center">
								<span><?php echo $lang->line('store_special_offer'); ?></span>
								<span class="price-num"><?php echo number_format($row_store->sell_price); ?></span>
							</div>
						</a>
					</li>
					<?php
								$viewCount--;
							}
						}
					?>
				</ul>
			</li>
		</ul>
	</div>
	<?php	
				}
			}
		}
	}
	else if($store_level == 2) {
	?>
	<div id="top4" class="side">
		<div id="title" class="gradient_BlackWhite"><?php echo $lang->line('store_top4');?></div>
		<ul>
			<?php 
				if($store_hot->num_rows() > 0) {
					foreach($store_hot->result() as $row_store) {
						if($viewCount == 0) break;
						else {
			?>
			<li>
				<a class="thumbnail" href="../../../commodity/<?php echo $row_store->id ;?>/">
					<img src="" data-src="holder.js/220x220" alt="">
					<div id="name" class="center"><?php echo $row_store->item_name ;?></div>
					<div class="price center">
						<span><?php echo $lang->line('store_special_offer'); ?></span>
						<span class="price-num"><?php echo number_format($row_store->sell_price) ;?></span>
					</div>
				</a>
			</li>
			<?php 
						}
						$viewCount--;
					}
				}
			?>
		</ul>
	</div>
	<div id="order" class="side">
		<ul>
			<li><?php echo $lang->line('store_order'); ?></li>
			<li><a class="select" href="#"><?php echo $lang->line('store_new_store'); ?></a><span class="divider"> |&nbsp;</span></li>
			<li><a href="#"><?php echo $lang->line('store_order_low_to_hight'); ?></a><span class="divider"> |&nbsp;</span></li>
			<li><a href="#"><?php echo $lang->line('store_order_hight_to_low'); ?></a></li>
		</ul>
	</div>	
	<div class="content">
		<ul>
			<li>
				<ul>
					<?php 
						foreach($store->result() as $row_store) {
					?>
					<li>
						<a class="thumbnail" href="../../../commodity/<?php echo $row_store->id ;?>/">
							<img src="" data-src="holder.js/180x180" alt="">
							<div id="name" class="center"><?php echo $row_store->item_name ;?></div>
							<div class="price center">
								<span><?php echo $lang->line('store_special_offer'); ?></span>
								<span class="price-num"><?php echo number_format($row_store->sell_price); ?></span>
							</div>
						</a>
					</li>
					<?php
						}
					?>
				</ul>
			</li>
		</ul>
	</div>
	<?php } ?>
	<div class="pagination pagination-centered pagination-large">
		<ul>
			<li class="disabled"><a href="#">&laquo;</a></li>
			<li class="active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">&raquo;</a></li>
		</ul>
	</div>
</article>