<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title><?=$this->lang->line('title')?></title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="/static/admin/style/bootstrap.min.css" rel="stylesheet">
		<link href="/static/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
                <link href="/static/fonts/ionicons/css/ionicons.min.css" rel="stylesheet">
		<link href="/static/upload/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css">
		
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="/static/admin/style/styles.css" rel="stylesheet">
		<link href="/static/admin/style/styles.css" rel="stylesheet">
		<link href="/static/map/map.css" rel="stylesheet">
		<script src="/static/jquery/jquery.min.js"></script>
	</head>
	<body>
<!-- Header -->
<nav id="top-nav" class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-toggle"></span>
      </button>
      <a class="navbar-brand" href="/"> Arbitrage</a>

    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
	<?if(!isset($mail)):?>
        <li><a href="javascript:login.modal.show('signInModal')" role="button">Sign in</a></li>
	<li><a href="javascript:login.modal.show('signUpModal')" role="button">Sign up</a></li>
	<? else: ?>
		        <ul class="nav navbar-nav">
            <li><a href="/orders">Order </a></li>
            <li><a href="/my">Personal page </a></li>
        </ul>
	<li><a href="javascript:login.modal.show('')" role="button"><?=$firstName." ".$surName?></a></li>
	<li style="padding:0px"><a style="padding: 5px;" href="/my" role="button"><img src="<?=isset($avatar)?$avatar:'/static/images/avatar-default.jpg'?>" class="avatar-min img-circle" style="width:3em"></a></li>

	<li style="padding:0px"><a href="/login/logout" role="button"><i class="fa fa-sign-out" style="font-size: 20px;"></i></a></li>
	<?endif;?>
	<li style="padding:0px"><a href="/content/lang/ukrainian" role="button" style="padding-right: 0;"><img src="/static/images/ukraine-flag-icon.png" style="width: 16px; height: 16px;"></i></a></li>
	<li style="padding:0px"><a href="/content/lang/english" role="button" style="padding-left: 3px;"><img src="/static/images/uk-flag-icon.png" style="width: 16px; height: 16px;"></i></a></li>
      </ul>
    </div>
  </div><!-- /container -->
</nav>
<!-- /Header -->

