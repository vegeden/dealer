<article id="checkout-type" class="checkout">	
	<?php if(isset($error)) {?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4><?php echo $lang->line('checkout_Error'); ?></h4>
		<?php echo $error; ?>
	</div>
	<?php } ?>
	<div class="center" >
		<form method="POST" action="">
			<div class="container-fluid">
			  <div class="row-fluid">
				<div class="span6">
					<h2 class="left">
						<p><?php echo $this->lang->line('checkout_detailed_Total').($sale_info['freight_price']+$sale_info['item_price_sum']); ?></p>
					</h2>
				</div>
				<div class="span6">
					<h2>
						<p class="right"><?php echo $this->lang->line('checkout_method_Currently').$this->lang->line('checkout_method_Icash').$icash_deposit_price; ?></p>
						<p class="right"><?php echo $this->lang->line('checkout_method_Currently').$this->lang->line('checkout_method_Divddend').$dividend_deposit_price; ?></p>
					</h2>
				</div>
			  </div>
			</div>
			<hr>
			<h3 id="detailed_title">
				<?php echo $this->lang->line('checkout_method_Icash-Divddend'); ?>
			</h3>
			<?php if($icash_deposit_price != 0 || $dividend_deposit_price != 0) { ?>
			<div class="left">
				<dl class="dl-horizontal">
					<?php if($icash_deposit_price != 0) { ?>
					<dt><?php echo $lang->line('checkout_method_Icash');?></dt>
					<dd><input type="number" name="icash_checkout" placeholder="<?php echo $lang->line('checkout_method_Icash');?>" class="input-large" min="0" max="<?php echo $icash_deposit_price;?>"></dd>
					<?php }
						  if($dividend_deposit_price != 0) {?>
					<dt><?php echo $lang->line('checkout_method_Divddend');?></dt>
					<dd><input type="number" name="dividend_checkout" placeholder="<?php echo $lang->line('checkout_method_Divddend');?>" class="input-large" min="0" max="<?php echo $dividend_deposit_price;?>"></dd>		
					<?php } ?>
				</dl>
			</div>
			<?php } ?>
			<br />
			<div class="pull-left">
				<button type="submit" class="btn btn-large" name="cancel" value="cancel"><?php echo $lang->line('checkout_detailed_Upper'); ?></button>
			</div>
			<div class="pull-right">
				<button type="submit" class="btn btn-primary btn-large" name="submit" value="submit"><?php echo $lang->line('checkout_detailed_Next'); ?></button>
			</div>
		</form>
	</div>
</article>
<script src="/dealer/statics/js/lib/bootstrap/bootstrap-inputmask.min.js"></script>