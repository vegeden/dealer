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
			<div id="btn-group" data-toggle="buttons-radio">
				<button type="button" class="btn btn-large" value="Remittance"><?php echo $lang->line('checkout_method_Remittance');?></button>
				<button type="button" class="btn btn-large" value="ATM"><?php echo $lang->line('checkout_method_ATM');?></button>
				<button type="button" class="btn btn-large" value="CreditCard"><?php echo $lang->line('checkout_method_CreditCard');?></button>
			</div>
			<div id="Remittance" class="displaynNone detail">
				<div class="left">
					<dl class="dl-horizontal">
						<dt><?php echo $lang->line('checkout_bank');?></dt>
						<dd><?php echo $lang->line('checkout_bank_name');?></dd>
						<dt><?php echo $lang->line('checkout_bank_code');?></dt>
						<dd><?php echo $lang->line('checkout_bank_code_name');?></dd>
						<dt><?php echo $lang->line('checkout_account');?></dt>
						<dd><?php echo $lang->line('checkout_account_num');?></dd>
					</dl>
					<dl class="dl-horizontal">
						<dt><?php echo $lang->line('checkout_ATM_name');?></dt>
						<dd><input type="text" placeholder="<?php echo $lang->line('checkout_ATM_name');?>" class="input-large" name="name1" value=""></dd>
						<dt><?php echo $lang->line('checkout_account');?></dt>
						<dd><input type="text" placeholder="<?php echo $lang->line('checkout_ATM_bank_last5Num');?>" class="input-large last5Num" name="last5Num1" value=""></dd>
						<dt><?php echo $lang->line('checkout_price');?></dt>
						<dd><input type="number" min="0" placeholder="<?php echo $lang->line('checkout_price');?>" class="input-large" name="price1" value="0"></dd>
					</dl>
				</div>
			</div>
			<div id="ATM" class="displaynNone detail">
				<div class="left">
					<dl class="dl-horizontal">
						<dt><?php echo $lang->line('checkout_bank');?></dt>
						<dd><?php echo $lang->line('checkout_bank_name');?></dd>
						<dt><?php echo $lang->line('checkout_bank_code');?></dt>
						<dd><?php echo $lang->line('checkout_bank_code_name');?></dd>
						<dt><?php echo $lang->line('checkout_account');?></dt>
						<dd><?php echo $lang->line('checkout_account_num');?></dd>
					</dl>
					<dl class="dl-horizontal">
						<dt><?php echo $lang->line('checkout_ATM_name');?></dt>
						<dd><input type="text" placeholder="<?php echo $lang->line('checkout_ATM_name');?>" class="input-large" name="name2" value=""></dd>
						<dt><?php echo $lang->line('checkout_account');?></dt>
						<dd><input type="text" placeholder="<?php echo $lang->line('checkout_ATM_bank_last5Num');?>" class="input-large last5Num" name="last5Num2" value=""></dd>
						<dt><?php echo $lang->line('checkout_price');?></dt>
						<dd><input type="number" min="0" placeholder="<?php echo $lang->line('checkout_price');?>" class="input-large" name="price2" value="0"></dd>
					</dl>
				</div>
			</div>
				<div id="CreditCard" class="displaynNone detail">
					<div class="left">
						<dl class="dl-horizontal">
							<dt><?php echo $lang->line('checkout_ATM_name');?></dt>
							<dd><input type="text" placeholder="<?php echo $lang->line('checkout_ATM_name');?>" class="input-large" name="name3" value=""></dd>
							<dt><?php echo $lang->line('checkout_account');?></dt>
							<dd><input type="text" placeholder="<?php echo $lang->line('checkout_ATM_bank_last5Num');?>" class="input-large last5Num" name="last5Num3" value=""></dd>
							<dt><?php echo $lang->line('checkout_price');?></dt>
							<dd><input type="number" min="0" placeholder="<?php echo $lang->line('checkout_price');?>" class="input-large" name="price3" value="0"></dd>
						</dl>
					</div>
				</div>
			<input type="hidden" name="pay_kind" id="type" value="0">
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