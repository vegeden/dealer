<article id="acl-list">
	<ul class="nav nav-pills pull-left">
		<li class="">
			<a href="<?php echo $url.'../ACLAdd/';?>"><?php echo $lang->line('add');?></a>
		</li>
	</ul>
	<table class="table table-condensed table-bordered table-hover table-striped">
		<tr class="info">
			<td class="items"></td>
			<td><?php echo $lang->line('SysSetting_group');?></td>
			<td><?php echo $lang->line('SysSetting_access');?></td>
			<td><?php echo $lang->line('SysSetting_permission');?></td>
			<td><?php echo $lang->line('SysSetting_publicPage');?></td>
		</tr>
		<?php 
			if($ACL->num_rows() > 0) {
				foreach($ACL->result() as $row) {
		?>
		<tr class="info">
			<td>
				<a href="../ACLEdit/<?php echo $row->id;?>/" rel="tooltip" title="<?php echo $lang->line('edit'); ?>"><img src="/dealer/statics/img/ic_action_edit.png"/></a>
				<a href="<?php echo $row->id;?>" class="Del" rel="tooltip" title="<?php echo $lang->line('del'); ?>"><img src="/dealer/statics/img/ic_action_remove.png"/></a>
			</td>
			<td><?php echo $row->group;?></td>
			<td><?php echo $row->access;?></td>
			<td><?php echo $row->permission;?></td>
			<td><?php echo $lang->line('SysSetting_publicPage'.$row->publicPage);?></td>
		</tr>
		<?php 
				}
			}
		?>
	</table>
</article>