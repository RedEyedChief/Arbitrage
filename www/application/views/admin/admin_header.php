<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Панель керування</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="/static/admin/style/bootstrap.min.css" rel="stylesheet">
		<link href="/static/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
                <link href="/static/fonts/ionicons/css/ionicons.min.css" rel="stylesheet">
		<link rel="stylesheet" href="/static/jquery/jquery-ui.css">
		
		<script src="/static/jquery/jquery.min.js"></script>
		<script src="/static/jquery/jquery-ui.js"></script>
		<script src="/static/admin/script/bootstrap.min.js"></script>
		<script src="/static/jquery/jquery.validate.js"></script>
				
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="/static/admin/style/styles.css" rel="stylesheet">
	</head>
	<body class="body-admin">
<!-- Header -->
<div id="top-nav-<?=$admin?"admin":"moderator"?>" class="navbar navbar-inverse navbar-static-top navbar-admin">
<div class="container">
    <div class="navbar-header navbar-header-admin">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-toggle"></span>
      </button>
      <a class="navbar-brand" href="#">Панель керування</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
	<?if(!isset($mail)):?>
        <li><a href="javascript:login.modal.show('signInModal')" role="button"><?=$this->lang->line('sign_in')?></a></li>
	<li><a href="javascript:login.modal.show('signUpModal')" role="button"><?=$this->lang->line('sign_up')?></a></li>
	<? else: ?>
	<li><a href="javascript:login.modal.show('')" role="button"><?=$firstName." ".$surName?></a></li>
	<li style="padding:0px"><a style="padding: 5px;" href="/my" role="button"><img src="<?=isset($avatar)?$avatar:'/static/images/avatar-default.jpg'?>" class="avatar-min img-circle" style="width:3em"></a></li>
	<li style="padding:0px"><a href="/login/logout" role="button"><i class="fa fa-sign-out" style="font-size: 20px;"></i></a></li>
	<?endif;?>
	<!--<li style="padding:0px"><a href="/content/lang/ukrainian" role="button" style="padding-right: 0;"><img src="/static/images/ukraine-flag-icon.png" style="width: 16px; height: 16px;"></i></a></li>
	<li style="padding:0px"><a href="/content/lang/english" role="button" style="padding-left: 3px;"><img src="/static/images/uk-flag-icon.png" style="width: 16px; height: 16px;"></i></a></li>-->
      </ul>
    </div>
  </div><!-- /container -->
</div>
<!-- /Header -->


<!-- Main -->
<div class="container" id="main">
  