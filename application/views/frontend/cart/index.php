<article id="cart">
	<div id="no_data" class="center <?php if(isset($items_information)) echo 'displaynNone'; ?>">
		<h2><?php echo $lang->line('no_data');?></h2>
		<div>
			<a class="btn btn-large btn-success" href="<?php echo $url; ?>../../store/"><?php echo $lang->line('continueBuy'); ?></a>
		</div>
	</div>
	<?php 
		if(isset($items_information)) {
	?>
	<div id="cart-info">
		<div class="row">
			<div class="pull-right continueBuy">
				<a class="btn btn-success" href="<?php echo $url; ?>../../store/"><?php echo $lang->line('continueBuy'); ?></a>
			</div>
		</div>
		<ul class="media-list">
			<?php 
				if($items_information->num_rows() > 0)
				foreach($items_information->result() as $key => $rows) {
			?>
			<li class="media hr">
				<a class="pull-left" href="#">
					<img class="media-object" data-src="holder.js/100x100" alt="100x100">
				</a>
				<div class="media-body productInfo">
					<h4 class="media-heading pull-left"><?php echo $rows->item_name;?></h4>
					<div class="pull-right">
						<span class="one_price" data-price="<?php echo $rows->sell_price; ?>"><?php echo number_format($rows->sell_price); ?></span>
						<span class="num"><input type="number" value="<?php echo $cart[$rows->id]; ?>" min="1"></span>
						<span class="total_price" data-price="<?php echo $rows->sell_price * $cart[$rows->id];?>"><?php $sum += $rows->sell_price * $cart[$rows->id];echo number_format($rows->sell_price * $cart[$rows->id]);?></span>
					</div>
				</div>
				<div class="media-body productNum">
					<div class="pull-right">
						<dl class="dl-horizontal dlform level">
							<dt><?php echo $lang->line('cart_stock_quantity').$rows->stock_quantity; ?></dt>
							<dd><a href="<?php echo $rows->id; ?>" class="remove"><?php echo $lang->line('cart_remove'); ?></a></dd>
						</dl>
					</div>
				</div>
			</li>
			<?php 
				}
			?>
		</ul>
		<div class="row">
			<div class="pull-right sum">
				<dl class="dl-horizontal dlform level">
					<dt><?php echo $lang->line('cart_sum'); ?></dt>
					<dd data-price="<?php echo $sum; ?>" class="price"><?php echo $lang->line('store_dollar_sign').' '.number_format($sum); ?></dd>
				</dl>
			</div>
			<div class="pull-right checkout">
				<a class="btn btn-danger btn-large" href="<?php echo $url; ?>../../checkout/"><?php echo $lang->line('checkout'); ?></a>
			</div>
		</div>
		<?php } else { ?>
		
		<?php } ?>
	</div>
</article>
<script src="/dealer/statics/lib/Jquery-Price-Format/jquery.price_format.js"></script>
