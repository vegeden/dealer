					<div class="well sidebar-nav">
						<ul class="nav nav-list">
							<?php 
								foreach($nav as $key => $rows) {
							?>
							<li class="nav-header"><?php echo $lang->line("nav_$key");?></li>
								<?php 
									foreach( $rows as $val) {
								?>
							<li><a href="/<?php echo $this->lang->line('folder_name')."/$key/$val/" ?>"><?php echo $lang->line('nav_'.$key.'_'.$val);?></a></li>
							<?php
										}
									}
							?>
						</ul>
					</div><!--/.well -->
					