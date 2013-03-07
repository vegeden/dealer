<article id="storedvalue-lists" class="storedvalue">
	<table class="table table-condensed table-bordered table-hover table-striped">
		<tr class="info firstRow">
			<td  class="option"><?php echo $lang->line('storedvalue_status');?></td>
			<td><?php echo $lang->line('storedvalue_method');?></td>
			<td><?php echo $lang->line('storedvalue_name');?></td>
			<td><?php echo $lang->line('storedvalue_price');?></td>
			<td><?php echo $lang->line('storedvalue_apply_time');?></td>
			<td><?php echo $lang->line('storedvalue_audit_time');?></td>
		</tr>
		<?php 
			if($icash_apply->num_rows() > 0) {
				foreach($icash_apply->result() as $row) {
					switch($row->remittance_status) {
						case 1:
		?>
			<tr class="success">
		<?php				
							break;
						default:
		?>
			<tr>
		<?php
							break;
					}
		?>
			<td  class="option"><?php echo $lang->line('storedvalue_status'.$row->remittance_status); ?></td>
			<td><?php echo $lang->line('storedvalue_status_'.$row->apply_status);?></td>
			<td><?php echo $row->apply_name;?></td>
			<td><?php echo $row->apply_price;?></td>
			<td><?php echo $row->apply_datetime;?></td>
			<td><?php if($row->audit_datetime != "0000-00-00 00:00:00") echo $row->audit_datetime;?></td>
		</tr>
		<?php 
				}
			}
		?>
	</table>
	</table>
</article>