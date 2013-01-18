<article>
	<table class="table table-condensed table-bordered table-hover table-striped">
		<tr class="info">
			<td></td>
			<td><?php echo $lang->line('commodity_area_name'); ?></td>
		</tr>
		<?php 
			if($Items_area->num_rows() > 0) {
				foreach($Items_area->result() as $row) {
		?>
		<tr class="info">
			<td class="items">
				<a href="/dealer/commodity/areaEdit/<?php echo $row->id;?>/"><img src="/dealer/statics/img/ic_action_edit.png"/></a>
				<a href="<?php echo $row->id;?>" class="areaDel"><img src="/dealer/statics/img/ic_action_remove.png"/></a>
			</td>
			<td><?php echo $row->area_name;?></td>
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