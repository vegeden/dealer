		<dl class="dl-horizontal dlform level">
			<dt><?php echo $lang->line('SysSetting_key'); ?></dt>
			<dd><input type="text" placeholder="" class="input-large" name="key" value="<?php if(!empty($SysConfig->key))echo $SysConfig->key;?>"></dd>
			<dt><?php echo $lang->line('SysSetting_value'); ?></dt>
			<dd><input type="text" placeholder="" class="input-large" name="value" value="<?php if(!empty($SysConfig->value))echo $SysConfig->value;?>"></dd>
			<dt><?php echo $lang->line('SysSetting_directions'); ?></dt>
			<dd><input type="text" placeholder="" class="input-large" name="directions" value="<?php if(!empty($SysConfig->directions))echo $SysConfig->directions;?>"></dd>
		</dl>
		<div class="row">
			<div class="span3 offset3">
				<button type="submit" class="btn btn-primary"><?php echo $lang->line('submit'); ?></button>
				<button type="submit" class="btn offset2" name="cancel" value="cancel"><?php echo $lang->line('cancel'); ?></button>
			</div>
		</div>