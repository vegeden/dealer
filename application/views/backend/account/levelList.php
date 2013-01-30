<article>
	<ul class="nav nav-pills pull-left">
		<li class="">
			<a href="<?php echo $url.'../levelAdd/';?>"><?php echo $lang->line('nav_account_levelAdd');?></a>
		</li>
	</ul>
	<table class="table table-condensed table-bordered table-hover table-striped">
		<tr class="info">
			<td></td>
			<td><?php echo $lang->line('account_levelLists_type_name'); ?></td>
			<td><?php echo $lang->line('account_uplevel'); ?></td>
		</tr>
		<?php 
			if($User_type->num_rows() > 0) {
				foreach($User_type->result() as $row) {
		?>
		<tr class="info">
			<td class="items">
				<a href="/dealer/account/levelEdit/<?php echo $row->id;?>/" rel="tooltip" title="<?php echo $lang->line('edit'); ?>"><img src="/dealer/statics/img/ic_action_edit.png"/></a>
				<a href="<?php echo $row->id;?>" class="levelDel" rel="tooltip" title="<?php echo $lang->line('del'); ?>"><img src="/dealer/statics/img/ic_action_remove.png"/></a>
			</td>
			<td><?php echo $row->type_name;?></td>
			<td><?php if($row->upper!=0) echo $upLevelName[$row->upper];?></td>
		</tr>
		<?php 
				}
			}
		?>
	</table>
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
</article>