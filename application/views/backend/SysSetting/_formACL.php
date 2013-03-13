		<dl class="dl-horizontal dlform level">
			<dt><?php echo $lang->line('SysSetting_group'); ?></dt>
			<dd><input type="text" placeholder="" class="input-large" name="group" value="<?php if(!empty($ACL->group))echo $ACL->group;?>"></dd>
			<dt><?php echo $lang->line('SysSetting_access'); ?></dt>
			<dd><input type="text" placeholder="" class="input-large" name="access" value="<?php if(!empty($ACL->access))echo $ACL->access;?>"></dd>
			<dt><?php echo $lang->line('SysSetting_permission'); ?></dt>
			<dd>
				<input type="text" placeholder="" class="input-large" name="permission" value="<?php if(!empty($ACL->permission))echo $ACL->permission;?>">
				<span class="help-inline"><?php echo $lang->line('SysSetting_permission_note'); ?></span>
			</dd>
			<dt><?php echo $lang->line('SysSetting_publicPage'); ?></dt>
			<dd>
				<input type="text" placeholder="" class="input-large" name="publicPage" value="<?php if(isset($ACL->publicPage))echo $ACL->publicPage;?>">
				<span class="help-inline"><?php echo $lang->line('SysSetting_publicPage_note'); ?></span>
			</dd>
		</dl>
		<div class="row">
			<div class="span3 offset3">
				<button type="submit" class="btn btn-primary"><?php echo $lang->line('submit'); ?></button>
				<button type="submit" class="btn offset2" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
			</div>
		</div>