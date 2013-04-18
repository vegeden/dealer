<article id="checkout-index" class="checkout">	
	<?php if(isset($error)) {?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4><?php echo $lang->line('checkout_Error'); ?></h4>
		<?php echo $error; ?>
	</div>
	<?php } ?>
	<div>
		<form method="POST" action="">
			<table class="table table-hover">
				<caption></caption>
				<thead>
					<tr>
						<th><?php echo $this->lang->line('checkout_detailed_ItemName'); ?></th>
						<th><?php echo $this->lang->line('checkout_detailed_Special'); ?></th>
						<th><?php echo $this->lang->line('checkout_detailed_Num'); ?></th>
						<th><?php echo $this->lang->line('checkout_detailed_SellPrice'); ?></th>
						<th><?php echo $this->lang->line('checkout_detailed_Sum'); ?></th>
					</tr>
				</thead>
				<tbody>
			<?php 
				foreach($cart as $key => $row)	{
			?>
					<tr>
			<?php
					for($i=1;$i<count(${'item'.$key});$i++) {
			?>
						<td>
						<?php 
							if($i == 2) {
								if(${'item'.$key}[$i] == 1) {
						?>
								<i class="icon-ok"></i>
						<?php
								}
							} else {
								echo ${'item'.$key}[$i]; 
							}
						?>
						</td>
			<?php
					}
			?>
					</tr>
			<?php
				}
			?>
				
			</table>
			<hr>
			<div class="total_sell">
				<table class="pull-right">
					<tr><td class="sell_field"><?php echo $this->lang->line('checkout_detailed_SubTotal'); ?></td><td class="right"><?php echo number_format($sum); ?></td></tr>
					<tr><td class="sell_field"><?php echo $this->lang->line('checkout_detailed_Freight'); ?></td><td class="right"><?php echo number_format($freight); ?></td></tr>
					<tr id="total"><td class="sell_field"><?php echo $this->lang->line('checkout_detailed_Total'); ?></td><td class="right"><?php echo number_format($sum+$freight); ?></td></tr>
				</table>
			</div>
			
			<br />
			<blockquote >
				<h2><?php echo $lang->line('checekou_fieight_title');?></h2>
			</blockquote>
			<hr>

			<h3 id="detailed_title" class="left pull-left">
				<?php echo $this->lang->line('checkout_detailed_addressee'); ?>
			</h3>
			<div class="btn-group" data-toggle="buttons-radio">
				<button type="button" class="btn btn-primary btn-large" id="yes"><?php echo $this->lang->line('checkout_detailed_yes'); ?></button>
				<button type="button" class="btn btn-large" id="no"><?php echo $this->lang->line('checkout_detailed_no'); ?></button>
			</div>
			
			
			<div class="detail-default">
				<div class="left">
					<dl class="dl-horizontal">
						<dt><?php echo $lang->line('checkout_detailed_Name');?></dt>
						<dd><?php echo $UserInfo->name;?></dd>
						<dt><?php echo $lang->line('checkout_detailed_Email');?></dt>
						<dd><?php echo $UserInfo->email;?></dd>
						<dt><?php echo $lang->line('checkout_detailed_Phone');?></dt>
						<dd><?php echo $UserInfo->phone;?></dd>
						<dt><?php echo $lang->line('checkout_detailed_Address');?></dt>
						<dd><?php echo $UserInfo->address;?></dd>			
					</dl>
				</div>
			</div>

			<div class="displaynNone detail">
				<div class="left">
					<dl class="dl-horizontal">
						<dt><?php echo $lang->line('checkout_detailed_Name');?></dt>
						<dd><input type="text" name="freight_name" placeholder="<?php echo $lang->line('checkout_detailed_Name');?>" class="input-large"></dd>
						<dt><?php echo $lang->line('checkout_detailed_Email');?></dt>
						<dd><input type="email" name="freight_email" placeholder="<?php echo $lang->line('checkout_detailed_Email');?>" class="input-large"></dd>
						<dt><?php echo $lang->line('checkout_detailed_Phone');?></dt>
						<dd><input type="tel" name="freight_phone" placeholder="<?php echo $lang->line('checkout_detailed_Phone');?>" class="input-large"></dd>
						<dt><?php echo $lang->line('checkout_detailed_Address');?></dt>
						<dd><input type="text" name="freight_address" placeholder="<?php echo $lang->line('checkout_detailed_Address');?>" class="input-xlarge"></dd>			
					</dl>
				</div>
			</div>
			<br />
			<div class="pull-left">
				<button type="submit" class="btn btn-large" name="cancel" value="cancel"><?php echo $lang->line('checkout_detailed_Cancel'); ?></button>
			</div>
			<div class="pull-right">
				<button type="submit" class="btn btn-primary btn-large" name="submit" value="submit"><?php echo $lang->line('checkout_detailed_Next'); ?></button>
			</div>
		</form>
	</div>
</article>