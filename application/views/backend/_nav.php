					<div class="well sidebar-nav">
						<ul class="nav nav-list">
							<?php 
								foreach($nav as $key => $rows) {
							?>
							<li class="nav-header"><?php echo $lang->line("nav_$key");?></li>
								<?php 
									foreach( $rows as $val) {
								?>
							<li>
								<?php 
									if($val == 'index') {
								?>
								<a href="/<?php echo $this->lang->line('folder_name')."/backend/$key/" ?>">
								<?php 
									} else {
								?>
								<a href="/<?php echo $this->lang->line('folder_name')."/backend/$key/$val/" ?>">
								<?php 
									}
									echo $lang->line('nav_'.$key.'_'.$val);
								?>
								</a>
							</li>
							<?php
										}
									}
							?>
						</ul>
					</div><!--/.well -->
					