<article id="commodity">
	<h3><?php echo $commodity->item_name; ?></h3>
	<h4><a href="<?php echo $commodity->id; ?>"><?php echo $lang->line('store_add_Cart'); ?></a></h4>
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
</article>