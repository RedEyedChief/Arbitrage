<link href="/static/site/style/styles.css" rel="stylesheet">
<div class="row" style="padding-top:50px">
    <div class="col-md-4"></div>
<div class="col-md-4 admin-panel" >
<h2 align="center">Reset password</h2>

<div class="form-group tab-content" align="center" >
        <div role="tabpanel" class="tab-pane active" id="reset_pass_form">
            <form id="reset_pass_form" action="/login/reset_password" method="POST">
                <div class="form-group">
                    <label for="user_mail">Email address</label>
                     <input type="email" name="mail" class="input-small form-control"  id="user_mail" placeholder="Enter email" />
                </div>
                <div>

<button type="submit" class="btn btn-primary">Reset my password</button>
</div>
<div class="col-md-4"></div>
</div>