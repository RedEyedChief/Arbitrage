<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Bootstrap 3 Control Panel</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="static/admin/style/bootstrap.min.css" rel="stylesheet">
		<link href="static/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
                <link href="static/fonts/ionicons/css/ionicons.min.css" rel="stylesheet">
		
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="static/admin/style/styles.css" rel="stylesheet">
		<link href="static/site/style/main.css" rel="stylesheet">
	</head>
	<body>
<!-- Header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-toggle"></span>
      </button>
      <a class="navbar-brand" href="#">Site title</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
	<?if(!isset($email)):?>
        <li><a href="javascript:login.modal.show('signInModal')" role="button">Sign In</a></li>
	<li><a href="javascript:login.modal.show('signUpModal')" role="button">Sign Up</a></li>
	<? else: ?>
	<li><a href="javascript:login.modal.show('')" role="button"><?=$firstName." ".$surName?></a></li>
	<li style="padding:0px"><a style="padding: 5px;" href="javascript:login.modal.show('')" role="button"><img src="<?=isset($avatar)?$avatar:'/static/images/avatar-default.jpg'?>" class="avatar-min img-circle" style="width:3em"></a></li>
	<li style="padding:0px"><a href="/login/logout" role="button"><i class="fa fa-sign-out" style="font-size: 20px;"></i></a></li>
	<?endif;?>
      </ul>
    </div>
  </div><!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
<div class="container row">
	<div class="col-sm-3">
		??ваываа