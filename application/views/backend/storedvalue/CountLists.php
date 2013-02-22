<article id="CountList">
	<ul class="nav nav-pills pull-left">
		<li <?php if($kind == 0) { ?> class="active" <?php } ?>>
			<a href="<?php echo $url.'0/';?>"><?php echo $lang->line('storedvalue_status0');?></a>
		</li>
		<li <?php if($kind == 1) { ?> class="active" <?php } ?>>
			<a href="<?php echo $url.'1/';?>"><?php echo $lang->line('storedvalue_status1');?></a>
		</li>
	</ul>
	<?php if($UserInfo->type_id == 1) { ?>
	<div class="input-append pull-right">
		<input id="kind" type="hidden" value="<?php echo $kind;?>">
		<input class="" id="search_bar" type="text" name="search" placeholder="<?php echo $lang->line('storedvalue_bank_code');?>">
		<span class="add-on"><?php echo $lang->line('search');?></span>
	</div>
	<?php } ?>
	<table class="table table-condensed table-bordered table-hover table-striped">
		<tr class="info firstRow">
			<td  class="option"><?php echo $lang->line('storedvalue_status');?></td>
			<?php if($kind == 1){ ?>
			<td><?php echo $lang->line('storedvalue_user_level');?></td>
			<?php } ?>
			<td><?php echo $lang->line('storedvalue_method');?></td>
			<td><?php echo $lang->line('storedvalue_name');?></td>
			<td><?php echo $lang->line('storedvalue_account');?></td>
			<td><?php echo $lang->line('storedvalue_price');?></td>
			<td><?php echo $lang->line('storedvalue_apply_time');?></td>
			<?php if($kind == 1 ) { ?>
			<td><?php echo $lang->line('storedvalue_admin');?></td>
			<td><?php echo $lang->line('storedvalue_audit_time');?></td>
			<?php } ?>
		</tr>
		<?php 
			if($icash_apply->num_rows() > 0) {
				foreach($icash_apply->result() as $row) {
		?>
		<tr class="info row<?php echo $row->id;?>">
			<td class="option">
				<?php 
					if($UserInfo->type_id == 1 && $kind == 0) { 
				?>
				<div class="btn-group lists">
					<a class="btn status">
						<?php echo $lang->line('storedvalue_status'.$row->remittance_status);?>
					</a>
					<a class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="1,<?php echo $row->id;?>"><i class="icon-ok"></i> <span><?php echo $lang->line('storedvalue_status1'); ?></span></a></li>
						<li><a href="2,<?php echo $row->id;?>"><i class="icon-remove"></i> <span><?php echo $lang->line('storedvalue_status2'); ?></span></a></li>
					</ul>
				</div>
				<?php 
					} else { 
				?>
				<span>
				<?php 
					echo $lang->line('storedvalue_status'.$row->remittance_status);
				?>
				</span>
					<?php 
						if($kind == 0) { 
					?>
				<a class="cancel" href="<?php echo $row->id;?>" rel="tooltip" data-original-title="<?php echo $lang->line('storedvalue_cancel');?>"><img src="/dealer/statics/img/ic_action_remove.png" width="20" height="20" /></a>
					<?php
						} 
					} 
				?>
				
			</td>
			<?php if($kind == 1) { ?>
			<td><?php echo $row->type_name;?></td>
			<?php } ?>
			<td><?php echo $lang->line('storedvalue_status_'.$row->apply_status);?></td>
			<td><?php echo $row->apply_name;?></td>
			<td><?php echo $row->bank_num;?></td>
			<td><?php echo $row->apply_price;?></td>
			<td><?php echo $row->apply_datetime;?></td>
			<?php if($kind == 1){ ?>
			<td><?php echo $row->admin_name;?></td>
			<td><?php echo $row->audit_datetime;?></td>
			<?php } ?>
		</tr>
		<?php 
				}
			}
		?>
	</table>
	<?php if($page_TotalPageNum != 1) {?>
	<div class="pagination pagination-centered">
		<ul>
			<li><a href="<?php echo $url.$kind.'/'.$page_previous.'/'; ?>">«</a></li>
			<?php
				for($i=1;$i<=$page_TotalPageNum;$i++) {
			?>
			<li><a href="<?php echo $url.$kind.'/'.$i.'/';?>"><?php echo $i;?></a></li>
			<?php 
				}
			?>
			<li><a href="<?php echo $url.$kind.'/'.$page_next.'/'; ?>">»</a></li>
		</ul>
	</div>
	<?php } ?>
</article>
<?php if($UserInfo->type_id == 1) { ?>
<script src="/dealer/statics/js/backend/storedvalue-lists.js"></script>
<?php } ?>