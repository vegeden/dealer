<article id="store-commodity">
	<div id="goods_price_info">
		<div id="goods_pic" class="pull-left">
			<img src="/dealer/img/store/<?php echo $commodity->id; ?>" alt="">
		</div>
		<div id="price_info">
			<h3><?php echo $commodity->item_name; ?></h3>
			<hr>
			<dl class="dl-horizontal dlform level">
				<dt><?php echo $lang->line('store_sell'); ?></dt>
				<dd><?php echo $commodity->sell_price; ?></dd>
				<dt><?php echo $lang->line('store_freight_price'); ?></dt>
				<dd><?php echo $commodity->freight_price; ?></dd>
				<?php if($commodity->special_commodity_status == 1) { ?>
				<dt><?php echo $lang->line('store_special_item'); ?></dt>
				<dd><?php echo $lang->line('store_special_explain'); ?></dd>
				<?php } ?>
			</dl>
			<hr>
			<h4><a href="<?php echo $commodity->id; ?>"><?php echo $lang->line('store_add_Cart'); ?></a></h4>
		</div>
		<div id="content_title"><?php echo $lang->line('content_title');?></div>
		<div id="commodity_content"></div>
	</div>
</article>
