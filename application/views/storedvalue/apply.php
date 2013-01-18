<article id="apply">	
	<div class="row">
		<div class="span8 offset2">
			<div class="btn-group">
				<a class="btn"><i class="icon-shopping-cart"></i> <span class="method"><?php echo $lang->line('storedvalue_method');?></span></a>
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				<ul class="dropdown-menu">
					<?php foreach($method as $key => $value) {?>
					<li><a href="<?php echo $key; ?>"><i class="icon-pencil"></i> <span><?php echo $value; ?></span></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<form action="" method="POST" class="hide">
		<input type="hidden" id="pay_kind" class="hide" value="" name="pay_kind">
		<!-- 		ATM			-->
		<div class="row pay_kind hide" id="ATM">
			<div class="span8 offset1">
				<div class="pay_direction">
					
				</div>
				<hr>
				<dl class="dl-horizontal">
					<dt><h2><?php echo $lang->line('storedvalue_bank');?></h2></dt>
					<dd><h2><?php echo $lang->line('storedvalue_bank_name');?></h2></dd>
					<dt><h2><?php echo $lang->line('storedvalue_bank_code');?></h2></dt>
					<dd><h2><?php echo $lang->line('storedvalue_bank_code_name');?></h2></dd>
					<dt><h2><?php echo $lang->line('storedvalue_account');?></h2></dt>
					<dd><h2><?php echo $lang->line('storedvalue_account_num');?></h2></dd>
				</dl>
				<hr>
				<h3><?php echo $lang->line('storedvalue_ATM_direction');?></h3>
				<dl class="dl-horizontal">
					<dt><h4><?php echo $lang->line('storedvalue_ATM_bank_last5Num');?></h4></dt>
					<dd><input type="text" name="last5Num" value="" data-mask="99999"></dd>
					<dt><h4><?php echo $lang->line('storedvalue_ATM_name');?></h4></dt>
					<dd><input type="text" name="name" value="<?php echo $UserInfo->name;?>"></dd>
					<dt><h4><?php echo $lang->line('storedvalue_price');?></h4></dt>
					<dd><input type="text" name="price" value=""></dd>
				</dl>
			</div>
		</div>
		<!--		end 		-->
		<!-- 	CreditCard		-->
		<div class="row pay_kind hide" id="CreditCard">
			<div class="span8 offset2">

			</div>
		</div>
		<!-- 		end 		-->
		<div class="row">
			<div class="span8 offset2">
				<button type="submit" class="btn btn-primary span1"><?php echo $lang->line('storedvalue'); ?></button>
				<button type="submit" class="btn span1" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
			</div>
		</div>
		
	</form>
</article>