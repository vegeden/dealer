<article id="storedvalue-lists">
	<ul class="nav nav-pills pull-left">
		<li <?php if($kind == 0) { ?> class="active" <?php } ?>>
			<a href="<?php echo $url.'0/';?>"><?php echo $lang->line('commodity_shelves_stop_status');?></a>
		</li>
		<li <?php if($kind == 1) { ?> class="active" <?php } ?>>
			<a href="<?php echo $url.'1/';?>"><?php echo $lang->line('commodity_shelves_sale_status');?></a>
		</li>
	</ul>	
	<div class="input-append pull-right">
		<input class="" id="search_bar" type="text" name="search" placeholder="<?php echo $lang->line('account_name');?>">
		<span class="add-on"><?php echo $lang->line('search');?></span>
	</div>
	<table class="table table-condensed table-bordered table-hover table-striped">
		<tr class="info firstRow">
			<td class="justedit"></td>
			<td><?php echo $lang->line('commodity_item_name');?></td>
			<td><?php echo $lang->line('commodity_item_content');?></td>
		</tr>
		<?php 
			if($items_information_shelvers->num_rows() > 0) {
				foreach($items_information_shelvers->result() as $row) {
		?>
		<tr class="info">		
			<td>
				<a href="/dealer/backend/commodity/shelvesEditAdd/<?php echo $row->id;?>/"  rel="tooltip" title="<?php echo $lang->line('edit'); ?>"><img src="/dealer/statics/img/ic_action_edit.png"/></a>
			</td>
			<td><?php echo $row->item_name;?></td>
			<td><?php echo $row->item_content;?></td>
		</tr>
		<?php 
				}
			}
		?>
	</table>
	<?php if($page_TotalPageNum != 0) {?>
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