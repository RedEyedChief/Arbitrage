
<h1 align="center">Reset password</h1>

<div class="tab-content" align="center" >
        <div role="tabpanel" class="tab-pane active" id="reset_pass_form">
            <form id="reset_pass_form" action="/login/reset_password" method="POST">
                <div class="form-group">
                    <label for="user_mail">Email address</label>
                     <input type="email" name="mail" class="input-small"  id="user_mail" placeholder="Enter email" />
                </div>
                <div>

<button type="submit" class="btn btn-primary">Reset my password</button>
</form>
</div>