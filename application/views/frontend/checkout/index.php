<article id="checkout-index" class="checkout">	
	<?php if(isset($error)) {?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4><?php echo $lang->line('checkout_Error'); ?></h4>
		<?php echo $error; ?>
	</div>
	<?php } ?>
	<div class="center" >
		<form method="POST" action="type">
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
			<tr><td colspan="3"></td><td><?php echo $this->lang->line('checkout_detailed_SubTotal'); ?></td><td><?php echo $sum; ?></td></tr>
			<tr><td style="border-style: none;" colspan="3"></td><td><?php echo $this->lang->line('checkout_detailed_Freight'); ?></td><td><?php echo $freight; ?></td></tr>
			<tr><td style="border-style: none;" colspan="3"></td><td><?php echo $this->lang->line('checkout_detailed_Total'); ?></td><td><?php echo $sum+$freight; ?></td></tr>
			</table>
			<pre>
				<?php echo $this->lang->line('checkout_detailed_addressee'); ?>
				<div class="btn-group" data-toggle="buttons-radio">
				  <button type="button" class="btn btn-large btn-info" value="yes" checked><?php echo $this->lang->line('checkout_detailed_yes'); ?></button>
				  <button type="button" class="btn btn-large btn-success" value="no"><?php echo $this->lang->line('checkout_detailed_no'); ?></button>
				</div >
			</pre>
			<dl>
				<dt><?php echo $lang->line('checkout_detailed_Name');?></dt>
				<dd><input type="text" placeholder="<?php echo $lang->line('checkout_detailed_Name');?>" class="input-large"></dd>
				<dt><?php echo $lang->line('checkout_detailed_Email');?></dt>
				<dd><input type="email" placeholder="<?php echo $lang->line('checkout_detailed_Email');?>" class="input-large"></dd>
				<dt><?php echo $lang->line('checkout_detailed_Phone');?></dt>
				<dd><input type="tel" placeholder="<?php echo $lang->line('checkout_detailed_Phone');?>" class="input-large"></dd>
				<dt><?php echo $lang->line('checkout_detailed_Address');?></dt>
				<dd><input type="text" placeholder="<?php echo $lang->line('checkout_detailed_Address');?>" class="input-xlarge"></dd>			
			</dl>
			<button type="submit" class="btn btn-primary btn-large" name="submit" value="submit"><?php echo $lang->line('checkout_detailed_Next'); ?></button>
			<button type="submit" class="btn offset2 btn-large" name="cancel" value="cancel"><?php echo $lang->line('checkout_detailed_Cancel'); ?></button>
		</form>
	</div>
</article>
<script src="/dealer/statics/js/lib/bootstrap/bootstrap-inputmask.min.js"></script>