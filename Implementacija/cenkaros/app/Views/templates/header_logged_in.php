<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title></title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='stylesheet' type='text/css' media='screen' href='<?php echo site_url('main.css'); ?>'>
        <script src="<?php echo site_url('main.js'); ?>"></script>
</head>
<body class="bg-color1">
	<div id="header">
            <!---->
		<img src="<?php echo site_url('img/logo.png');?>" alt="Logo"/>
		<div id="title">Ценкарош</div>		
	</div>
	<div id="nav" class="bg-color2">
		<div id="nav-container">
			<a class="nav-element" href="<?php echo site_url($controller); ?>">Pocetna</a>
			<a class="nav-element" href="<?php echo site_url($controller."/o_nama"); ?>">O nama</a>
			<a class="nav-element" href="<?php echo site_url($controller."/kontakt"); ?>">Kontakt</a>
			<a class="nav-element" href="<?php echo site_url($controller."/odjavi_se"); ?>">Odjavi se</a>
		</div>
	</div>