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
		<?php require_once 'frontend/_header.php';?>
		<?php require_once 'frontend/_nav.php';?>
		<div class="container-fluid">
			<div class="row-fluid">
				<div id="menu" class="pull-left">
					<?php require_once 'frontend/_menu.php';?>
				</div><!--/span-->
				<div id="content" class="pull-right">
				<?php 
					if(!preg_match('/store\/index*/', uri_string()) && !preg_match('/store\/commodity*/', uri_string())) require_once 'frontend/_article_title.php';
					require_once 'frontend/'.$ArticlePage;
				?>
				</div><!--/span-->
			</div><!--/row-->
			<hr>
			<?php require_once 'frontend/_footer.php';?>
		</div><!--/.fluid-container-->
	</body>
</html>
