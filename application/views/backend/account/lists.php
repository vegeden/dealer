<article>
	<?php if($UserInfo->type_id == 1) { ?>
	<ul class="nav nav-pills pull-left">
		<li class="">
			<a href="<?php echo $url.'../register/';?>"><?php echo $lang->line('nav_account_register');?></a>
		</li>
	</ul>
	<div class="input-append pull-right">
		<input class="" id="search_bar" type="text" name="search" placeholder="<?php echo $lang->line('account_name');?>">
		<span class="add-on"><?php echo $lang->line('search');?></span>
	</div>
	<?php } ?>
	<table class="table table-condensed table-bordered table-hover table-striped">
		<tr class="info firstRow">
			<td class="option"><?php echo $lang->line('account_status');?></td>
			<td><?php echo $lang->line('account_account');?></td>
			<td><?php echo $lang->line('account_name');?></td>
			<td><?php echo $lang->line('account_email');?></td>
			<td><?php echo $lang->line('account_gender');?></td>
			<td><?php echo $lang->line('account_phone');?></td>
			<td><?php echo $lang->line('account_address');?></td>
			<?php if($UserInfo->type_id == 1) { ?>
			<td><?php echo $lang->line('account_class');?></td>
			<td><?php echo $lang->line('account_uplevel');?></td>
			<?php } ?>
		</tr>
		<?php 
			if($User_information->num_rows() > 0) {
				foreach($User_information->result() as $row) {
		?>
		<tr class="info">
			<td>
				<?php if($UserInfo->type_id == 1) { ?>
				<div class="btn-group lists">
					<a class="btn status" id="user<?php echo $row->id;?>" href="#">
						<?php echo $lang->line('account_status'.$row->user_status);?>
					</a>
					<a class="btn dropdown-toggle" data-toggle="dropdown" href=""><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="0,<?php echo $row->id;?>"><i class="icon-remove"></i> <span><?php echo $lang->line('account_status0'); ?></span></a></li>
						<li><a href="1,<?php echo $row->id;?>"><i class="icon-ok"></i> <span><?php echo $lang->line('account_status1'); ?></span></a></li>
						<li><a href="2,<?php echo $row->id;?>"><i class="icon-lock"></i> <span><?php echo $lang->line('account_status2'); ?></span></a></li>
						<li class="divider"></li>
						<li><a href="/dealer/backend/account/adminEdit/<?php echo $row->id;?>/"><i class="icon-pencil"></i> <?php echo $lang->line('edit'); ?></li>
					</ul>
				</div>
				<?php 
					} else { 
						echo $lang->line('account_status'.$row->user_status);
					} 
				?>
			</td>
			<td><?php echo $row->account;?></td>
			<td><?php echo $row->name;?></td>
			<td><?php echo $row->email;?></td>
			<td><?php echo $lang->line('account_gender'.$row->gender);?></td>
			<td><?php echo $row->phone;?></td>
			<td><?php echo $row->address;?></td>
			<?php if($UserInfo->type_id == 1) { ?>
			<td><?php echo $row->type_id;?></td>
			<td><?php echo $row->upper_id;?></td>
			<?php } ?>
		</tr>
		<?php 
				}
			}
		?>
	</table>
	<?php if($page_TotalPageNum != 1) { ?>
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
<script src="/dealer/statics/js/backend/account-lists.js"></script>
