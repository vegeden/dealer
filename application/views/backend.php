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
		<link href="/dealer/statics/css/backend/style.css" rel="stylesheet" />
		<link href="/dealer/statics/css/lib/bootstrap/bootstrap-responsive.css" rel="stylesheet">
		
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		<script src="/dealer/statics/js/lib/bootstrap/bootstrap.min.js"></script>
		<script src="/dealer/statics/js/lib/jquery.easing/jquery.easing.1.3.js"></script>
		<script src="/dealer/statics/js/backend/style.js"></script>
		
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<?php if(isset($js)) { ?>
		<script src="/dealer/statics/js/backend/<?php echo $js; ?>"></script>
		<?php } ?>
	</head>

	<body>

		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<?php require_once 'backend_header.php';?>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span2">
					<?php require_once 'backend_nav.php';?>
				</div><!--/span-->
				<div class="span10">
					<?php require_once 'backend_main_top.php';?>
					<?php require_once '/backend/'.$ArticlePage;?>
				</div><!--/span-->
			</div><!--/row-->

			<hr>
			
			<?php require_once 'backend_footer.php';?>

		</div><!--/.fluid-container-->

	</body>
</html>
