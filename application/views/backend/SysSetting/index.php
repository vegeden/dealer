<article id="syssetting-list">
		<div id="menu-control">
	<ul class="nav nav-pills pull-left">
		<li class="">
			<a href="<?php echo $url.'../SysConfigAdd/';?>"><?php echo $lang->line('add');?></a>
		</li>
	</ul>
		</div>
	<table class="table table-condensed table-bordered table-hover table-striped">
		<tr class="info">
			<td class="items"></td>
			<td><?php echo $lang->line('SysSetting_key');?></td>
			<td><?php echo $lang->line('SysSetting_value');?></td>
			<td><?php echo $lang->line('SysSetting_directions');?></td>
			<td><?php echo $lang->line('SysSetting_dateTime');?></td>
		</tr>
		<?php 
			if($SysConfig->num_rows() > 0) {
				foreach($SysConfig->result() as $row) {
		?>
		<tr class="info">
			<td>
				<a href="SysConfigEdit/<?php echo $row->id;?>/" rel="tooltip" title="<?php echo $lang->line('edit'); ?>"><img src="/dealer/statics/img/ic_action_edit.png"/></a>
				<a href="<?php echo $row->id;?>" class="Del" rel="tooltip" title="<?php echo $lang->line('del'); ?>"><img src="/dealer/statics/img/ic_action_remove.png"/></a>
			</td>
			<td><?php echo $row->key;?></td>
			<td><?php echo $row->value;?></td>
			<td><?php echo $row->directions;?></td>
			<td><?php echo $row->dateTime;?></td>
		</tr>
		<?php 
				}
			}
		?>
	</table>
</article>