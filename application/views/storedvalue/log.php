<article id="storedvalue-lists">
	<table class="table table-condensed table-bordered table-hover table-striped">
		<tr class="info firstRow">
			<td><?php echo $lang->line('storedvalue_status');?></td>
			<?php if($UserInfo->type_id == 1) {?>
			<td><?php echo $lang->line('storedvalue_admin');?></td>
			<?php } ?>
			<td><?php echo $lang->line('storedvalue_sale_id');?></td>
			<td><?php echo $lang->line('storedvalue_price');?></td>
			<td><?php echo $lang->line('storedvalue_apply_time');?></td>
		</tr>
		<?php 
			if($icash_log->num_rows() > 0) {
				foreach($icash_log->result() as $row) {
		?>
		<tr class="info row<?php echo $row->id;?>">
			<td id="option">
				<span>
				<?php 
					echo $lang->line('storedvalue_action'.$row->action);
				?>
				</span>
				
				
			</td>
			<?php if($UserInfo->type_id == 1) { ?>
			<td><?php echo $row->name;?></td>
			<?php } ?>
			<td><?php echo $row->sale_id;?></td>
			<td><?php echo $row->price;?></td>
			<td><?php echo $row->log_datetime;?></td>
		</tr>
		<?php 
				}
			}
		?>
	</table>
	<?php if($page_TotalPageNum != 0) {?>
	<div class="pagination pagination-centered">
		<ul>
			<li><a href="<?php echo $url.$page_previous.'/'; ?>">«</a></li>
			<?php
				for($i=1;$i<=$page_TotalPageNum;$i++) {
			?>
			<li><a href="<?php echo $url.$i.'/';?>"><?php echo $i;?></a></li>
			<?php 
				}
			?>
			<li><a href="<?php echo $url.$page_next.'/'; ?>">»</a></li>
		</ul>
	</div>
	<?php } ?>
</article>