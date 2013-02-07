<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo $lang->line('web_title'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<link href="/dealer/statics/css/normalize.css" rel="stylesheet" />
		<link href="/dealer/statics/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet" />
		<link href="/dealer/statics/css/frontend/style.css" rel="stylesheet" />
		<link href="/dealer/statics/css/lib/bootstrap/bootstrap-responsive.css" rel="stylesheet">
		
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		<script src="/dealer/statics/js/lib/bootstrap/bootstrap.min.js"></script>
		<script src="/dealer/statics/js/lib/holder/holder.js"></script>
		<script src="/dealer/statics/js/lib/jquery.easing/jquery.easing.1.3.js"></script>
		<script src="/dealer/statics/js/frontend/script.js"></script>
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->	
		<?php if(isset($js)) { ?>
		<script src="/dealer/statics/js/frontend/<?php echo $js; ?>"></script>
		<?php } ?>
	</head>
	<body>
		<div class="navbar navbar-inverse">
			<div class="navbar-inner">
				<div class="container">
				
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</a>

					<a class="brand" href="#">Project name</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li class="active"><a href="/<?php echo $lang->line('folder_name');?>/store/">Store</a></li>
							<li><a href="/<?php echo $lang->line('folder_name');?>/cart/">Cart</a></li>
							<li><a href="/<?php echo $lang->line('folder_name');?>/checkout/">Checkout</a></li>
						</ul>
						<ul class="nav pull-right">
							<li><a href="/dealer/backend/account/lists/">backend</a></li>
							<li><a href="/<?php echo $lang->line('folder_name');?>/home/logout/">logout</a></li>
						</ul>
					</div>

				</div>
			</div>
		</div>
		<?php require_once '/frontend/'.$ArticlePage;?>
	</body>
</html>
