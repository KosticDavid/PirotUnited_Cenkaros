<!--Milan Akik 2018/0688-->
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title></title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel='stylesheet' type='text/css' media='screen' href='<?php echo site_url('main.css'); ?>'>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="<?php echo site_url('main.js'); ?>"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
</head>
<body class="bg-color1">
	<div class="container-fluid">
            <div class="row">
                <div class="col-4 d-md-none"></div>
                <div class="col-4 col-md-2" id="logo-div"> <img id="logo" src="<?php echo site_url('img/logo.png');?>" alt="Logo"/> </div>
                <div class="col-4 d-md-none"></div>
                <div class="d-none d-md-block col-md-8">
                    <div id="title">Ценкарош</div>
                </div>
            </div>
            <div class="row bg-color2" id="nav-container">
                <div class="col-xs-12 col-md-2 nav-element"></div>
			<a class="col-xs-12 col-md-2 nav-element" href="<?php echo site_url($controller); ?>">Pocetna</a>
			<a class="col-xs-12 col-md-2 nav-element" href="<?php echo site_url($controller."/o_nama"); ?>">O nama</a>
			<a class="col-xs-12 col-md-2 nav-element" href="<?php echo site_url($controller."/kontakt"); ?>">Kontakt</a>
			<a class="col-xs-12 col-md-2 nav-element" href="<?php echo site_url($controller."/odjavi_se"); ?>">Odjavi se</a>
		</div>
	</div>