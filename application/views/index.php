<!DOCHTML html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $lang->line('web_title'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">		
		
		<link href="/dealer/statics/css/normalize.css" rel="stylesheet" />
		<link href="/dealer/statics/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet" />
		
		<link href="/dealer/statics/css/lib/bootstrap/bootstrap-responsive.css" rel="stylesheet">
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
		<script src="/dealer/statics/js/lib/bootstrap/bootstrap.min.js"></script>
		<script src="/dealer/statics/js/backend/style.js"></script>
		<?php if(isset($js)) { ?>
		<script src="/dealer/statics/js/backend/<?php echo $js; ?>"></script>
		<?php } ?>
		
		
	</head>
	<body>
		<h2><a href="/dealer/backend/account/lists/">backend</a></h2>
		<h3><a href="/<?php echo $lang->line('folder_name');?>/home/logout/" class="navbar-link">logout</a></h3>
	</body>
	
</html>
