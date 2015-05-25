<h2 align="center">Update your password</h2>
<div id = "update_pass_form" align="center">
	<form action="/login/update_password" method ="POST">
		<div>
			<label for = "mail">Email: </label>
			<?php if (isset($mail_hash,$mail_code)) { ?>
			<input type="hidden" value="<?php echo $mail_hash ?>" name="mail_hash" />
			<input type="hidden" value="<?php echo $mail_code ?>" name="mail_code" />

			<?php } ?>
			<input type="mail" value="<?php echo (isset($mail)) ? $mail : ''; ?>" name="mail" />
		</div>
		<div>
			<label for = "password">New password: </label>
			<input type= "password" value="" name="password" />
		</div>
		<div>
			<label for = "password_conf">New password again: </label>
			<input type= "password" value="" name="password_conf" />
		</div>
		<div>
			<input type="submit" name="submit" value="Update my password" />
		</div>
	</form>
</div>