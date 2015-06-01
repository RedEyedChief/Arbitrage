<link href="/static/site/style/styles.css" rel="stylesheet">
<div class="row" style="padding-top:50px">
    <div class="col-md-4"></div>
<div class="col-md-4 admin-panel" >
<h2 align="center">Update your password</h2>
<div class="form-group" id = "update_pass_form" align="center">
	<form action="/login/update_password" method ="POST">
		<div class="form-group">
			<label for="mail">Email: </label>
			<?php if (isset($mail_hash,$mail_code)) { ?>
			<input type="hidden" value="<?php echo $mail_hash ?>" name="mail_hash" />
			<input type="hidden" value="<?php echo $mail_code ?>" name="mail_code" />

			<?php } ?>
			<input class="form-control" type="mail" value="<?php echo (isset($mail)) ? $mail : ''; ?>" name="mail" />
		</div>
		<div class="form-group">
			<label for = "password">New password: </label>
			<input  class="form-control" type= "password" value="" name="password" />
		</div>
		<div class="form-group">
			<label for = "password_conf">New password again: </label>
			<input class="form-control" type= "password" value="" name="password_conf" />
		</div>
		<div style="padding-bottom:10px">
			<input type="submit" class="btn btn-primary" name="submit" value="Update my password" />
		</div>
	</form>
</div>
</div>
<div class="col-md-4"></div>
</div>