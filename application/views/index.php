<!DOCHTML html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />		
		<link href="/dealer/statics/css/backend/normalize.css" rel="stylesheet" />
		<link href="/dealer/statics/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet" />
		<link href="/dealer/statics/css/backend/dropdown-jquery-styles.css" rel="stylesheet" >
		<link href="/dealer/statics/css/backend/style.css" rel="stylesheet" />
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script src="/dealer/statics/js/lib/jquery.fixedTOC/jquery.fixedTOC.js"></script>
		<script src="/dealer/statics/js/lib/jquery.transit/jquery.transit.min.js"></script>
		<script src="/dealer/statics/js/lib/jquery.easing/jquery.easing.1.3.js"></script>
		<script src="/dealer/statics/js/lib/bootstrap/bootstrap.min.js"></script>
		<script src="/dealer/statics/js/backend/nav.js"></script>
		<?php if(isset($js)) { ?>
		<script src="/dealer/statics/js/backend/<?php echo $js; ?>"></script>
		<?php } ?>
		
		<title><?php echo $lang->line('web_title'); ?></title>
	</head>
	<body>
		<?php require_once 'header.php'?>
		<div id="wrapper">
			<?php require_once 'nav.php';?>
			<div id="main">
				<?php require_once 'main_top.php';?>
				<div class="content">
					<div id="title"><p><img src="/dealer/statics/img/control_play.png"/><?php echo $lang->line($nav_page) ?></p></div>
					<?php require_once $ArticlePage;?>
				</div>
			</div>
		</div>
		<?php require_once 'footer.php';?>
		<script>init_nav_page('<?php echo $nav_page;?>');</script>
	</body>
	
</html>
