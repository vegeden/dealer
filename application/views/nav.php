			<nav>
				<div class="nav-top-img">
					<img src="/dealer/statics/img/admin_main_top.jpg">
				</div>
				<div id="toc-holder" class="toc-holder">
					<ul id="toc" class="toc">
						<?php 
							foreach($nav as $key => $rows) {
						?>
						<li class="toc-h1">
							<a href=""><div>▼</div><?php echo $lang->line("nav_$key");?></a>
							<ul id="<?php echo "nav_$key";?>" class="toc-sub closed">
							<?php 
								foreach( $rows as $val) {
							?>
								<li id="<?php echo 'nav_'.$key.'_'.$val; ?>"><a href="/<?php echo $this->lang->line('folder_name')."/$key/$val/" ?>"><?php echo $lang->line('nav_'.$key.'_'.$val);?></a></li>
							<?php
								}
							?>
							</ul>
						</li>
						<?php
							}
						?>
					</ul>
				</div>
			</nav>