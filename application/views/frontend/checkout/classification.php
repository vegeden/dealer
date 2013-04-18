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
			<div class="btn-group" data-toggle="buttons-radio">
			  <button type="button" id="target1" class="btn btn-primary">Left</button>
			  <button type="button" id="target" class="btn btn-primary">Right</button>
			</div>
			<div id="" class="input-prepend input-append">
			  <span class="add-on">$</span>
			  <input id="appendedPrependedInput" type="number" placeholder="">
			  <span class="add-on">.00</span>
			</div>
			<hr>
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
					<hr>
					<dl class="dl-horizontal">
						<dt><?php echo $lang->line('checkout_ATM_name');?></dt>
						<dd><input type="text" placeholder="<?php echo $lang->line('checkout_ATM_name');?>" class="input-large" name="name1" value=""></dd>
						<dt><?php echo $lang->line('checkout_account');?></dt>
						<dd><input type="text" placeholder="<?php echo $lang->line('checkout_ATM_bank_last5Num');?>" class="input-large last5Num" name="last5Num1" value=""></dd>
						<dt><?php echo $lang->line('checkout_price');?></dt>
						<dd><input type="number" min="0" placeholder="<?php echo $lang->line('checkout_price');?>" class="input-large" name="price1" value="0"></dd>
					</dl>
				</div>
				<button type="submit" class="btn btn-primary btn-large" name="submit" value="submit"><?php echo $lang->line('submit'); ?></button>
				<button type="submit" class="btn offset2 btn-large" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
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
					<hr>
					<dl class="dl-horizontal">
						<dt><?php echo $lang->line('checkout_ATM_name');?></dt>
						<dd><input type="text" placeholder="<?php echo $lang->line('checkout_ATM_name');?>" class="input-large" name="name2" value=""></dd>
						<dt><?php echo $lang->line('checkout_account');?></dt>
						<dd><input type="text" placeholder="<?php echo $lang->line('checkout_ATM_bank_last5Num');?>" class="input-large last5Num" name="last5Num2" value=""></dd>
						<dt><?php echo $lang->line('checkout_price');?></dt>
						<dd><input type="number" min="0" placeholder="<?php echo $lang->line('checkout_price');?>" class="input-large" name="price2" value="0"></dd>
					</dl>
				</div>
				<button type="submit" class="btn btn-primary btn-large" name="submit" value="submit"><?php echo $lang->line('submit'); ?></button>
				<button type="submit" class="btn offset2 btn-large" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
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
				<button type="submit" class="btn btn-primary btn-large" name="submit" value="submit"><?php echo $lang->line('submit'); ?></button>
				<button type="submit" class="btn offset2 btn-large" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
			</div>
			<input type="hidden" name="pay_kind" id="type" value="0">
		</form>
	</div>
</article>
<script>
$("#target").click(function() {
  $("#money").hide();

});
$("#target1").click(function() {
  $("#money").show();

});
</script>
<script src="/dealer/statics/js/lib/bootstrap/bootstrap-inputmask.min.js"></script>