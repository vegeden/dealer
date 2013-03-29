<article id="checkout-index" class="checkout">	
	<?php if(isset($error)) {?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4><?php echo $lang->line('checkout_Error'); ?></h4>
		<?php echo $error; ?>
	</div>
	<?php } ?>
	<div class="center" >
		<form method="POST" action="">
			<?php 
				foreach($cart as $key => $row)	{
					echo $key.','.$row.'</br>';
				}
			?>
		</form>
	</div>
</article>
<script src="/dealer/statics/js/lib/bootstrap/bootstrap-inputmask.min.js"></script>