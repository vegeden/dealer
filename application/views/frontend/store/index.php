<article id="store">
	<div id="top4" class="side">
		<div id="title" class="gradient_BlackWhite"><?php echo $lang->line('store_top4');?></div>
		<ul>
			<li>
				<a class="thumbnail" href="#">
					<img src="" data-src="holder.js/220x220" alt="">
					<div id="name" class="center">你好你好你好</div>
					<div class="price center">
						<span>特價：</span>
						<span class="price-num" data-price="4800"><?php echo number_format(4800); ?></span>
					</div>
				</a>
			</li>
			<li>
				<a class="thumbnail" href="#">
					<img src="" data-src="holder.js/220x220" alt="">
					<div id="name" class="center">你好你好你好</div>
					<div class="price center">
						<span>特價：</span>
						<span class="price-num" data-price="4800"><?php echo number_format(4800); ?></span>
					</div>
				</a>
			</li>
			<li>
				<a class="thumbnail" href="#">
					<img src="" data-src="holder.js/220x220" alt="">
					<div id="name" class="center">你好你好你好</div>
					<div class="price center">
						<span>特價：</span>
						<span class="price-num" data-price="4800"><?php echo number_format(4800); ?></span>
					</div>
				</a>
			</li>
			<li>
				<a class="thumbnail" href="#">
					<img src="" data-src="holder.js/220x220" alt="">
					<div id="name" class="center">你好你好你好</div>
					<div class="price center">
						<span>特價：</span>
						<span class="price-num" data-price="4800"><?php echo number_format(4800); ?></span>
					</div>
				</a>
			</li>
		</ul>
	</div>
	<div id="order" class="side">
		<ul>
			<li>排序：</li>
			<li><a class="select" href="#">最新上架</a><span class="divider"> |&nbsp;</span></li>
			<li><a href="#">售價低到高</a><span class="divider"> |&nbsp;</span></li>
			<li><a href="#">售價高到低</a></li>
		</ul>
	</div>
	<div class="content side">
		<div id="title" class="gradient_BlackWhite">營養補給</div>
		<ul>
			<li>
				<ul>
					<li>
						<a class="thumbnail" href="#">
							<img src="" data-src="holder.js/180x180" alt="">
							<div id="name" class="center">你好你好你好</div>
							<div class="price center">
								<span>特價：</span>
								<span class="price-num" data-price="4800"><?php echo number_format(4800); ?></span>
							</div>
						</a>
					</li>
					<li>
						<a class="thumbnail" href="#">
							<img src="" data-src="holder.js/180x180" alt="">
							<div id="name" class="center">你好你好你好</div>
							<div class="price center">
								<span>特價：</span>
								<span class="price-num" data-price="4800"><?php echo number_format(4800); ?></span>
							</div>
						</a>
					</li>
					<li>
						<a class="thumbnail" href="#">
							<img src="" data-src="holder.js/180x180" alt="">
							<div id="name" class="center">你好你好你好</div>
							<div class="price center">
								<span>特價：</span>
								<span class="price-num" data-price="4800"><?php echo number_format(4800); ?></span>
							</div>
						</a>
					</li>
					<li>
						<a class="thumbnail" href="#">
							<img src="" data-src="holder.js/180x180" alt="">
							<div id="name" class="center">你好你好你好</div>
							<div class="price center">
								<span>特價：</span>
								<span class="price-num" data-price="4800"><?php echo number_format(4800); ?></span>
							</div>
						</a>
					</li>
					<li>
						<a class="thumbnail" href="#">
							<img src="" data-src="holder.js/180x180" alt="">
							<div id="name" class="center">你好你好你好</div>
							<div class="price center">
								<span>特價：</span>
								<span class="price-num" data-price="4800"><?php echo number_format(4800); ?></span>
							</div>
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
	<div class="content">
		<ul>
			<li>
				<ul>
					<li>
						<a class="thumbnail" href="#">
							<img src="" data-src="holder.js/180x180" alt="">
							<div id="name" class="center">你好你好你好</div>
							<div class="price center">
								<span>特價：</span>
								<span class="price-num" data-price="4800"><?php echo number_format(4800); ?></span>
							</div>
						</a>
					</li>
					<li>
						<a class="thumbnail" href="#">
							<img src="" data-src="holder.js/180x180" alt="">
							<div id="name" class="center">你好你好你好</div>
							<div class="price center">
								<span>特價：</span>
								<span class="price-num" data-price="4800"><?php echo number_format(4800); ?></span>
							</div>
						</a>
					</li>
					<li>
						<a class="thumbnail" href="#">
							<img src="" data-src="holder.js/180x180" alt="">
							<div id="name" class="center">你好你好你好</div>
							<div class="price center">
								<span>特價：</span>
								<span class="price-num" data-price="4800"><?php echo number_format(4800); ?></span>
							</div>
						</a>
					</li>
					<li>
						<a class="thumbnail" href="#">
							<img src="" data-src="holder.js/180x180" alt="">
							<div id="name" class="center">你好你好你好</div>
							<div class="price center">
								<span>特價：</span>
								<span class="price-num" data-price="4800"><?php echo number_format(4800); ?></span>
							</div>
						</a>
					</li>
					<li>
						<a class="thumbnail" href="#">
							<img src="" data-src="holder.js/180x180" alt="">
							<div id="name" class="center">你好你好你好</div>
							<div class="price center">
								<span>特價：</span>
								<span class="price-num" data-price="4800"><?php echo number_format(4800); ?></span>
							</div>
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
	<?php 
	switch($store_level){
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
<script src="/dealer/statics/js/lib/Jquery-Price-Format/jquery.price_format.js"></script>