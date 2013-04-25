<article>
		<div id="menu-control">
	<ul class="nav nav-pills pull-left">
		<li class="">
			<a href="<?php echo $url.'../categoryFirstAdd/';?>"><?php echo $lang->line('nav_commodity_categoryFirstAdd');?></a>
		</li>
	</ul>
		</div>
	<table class="table table-condensed table-bordered table-hover table-striped">
		<tr class="info">
			<td></td>
			<td><?php echo $lang->line('commodity_categoryFirst_name'); ?></td>
		</tr>
		<?php 
			if($Items_category->num_rows() > 0) {
				foreach($Items_category->result() as $row) {
		?>
		<tr class="info">
			<td class="items">
				<a href="/dealer/backend/commodity/categoryFirstEdit/<?php echo $row->id;?>/" rel="tooltip" title="<?php echo $lang->line('edit'); ?>"><img src="/dealer/statics/img/ic_action_edit.png"/></a>
				<a href="<?php echo $row->id;?>" class="categoryFirstDel" rel="tooltip" title="<?php echo $lang->line('del'); ?>"><img src="/dealer/statics/img/ic_action_remove.png"/></a>
			</td>
			<td><?php echo $row->category_name;?></td>
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