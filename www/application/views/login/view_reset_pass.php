<link href="/static/site/style/styles.css" rel="stylesheet">
<div class="row" style="padding-top:50px">
    <div class="col-md-4"></div>
<div class="col-md-4 admin-panel" >
<h2 align="center">Поновлення паролю</h2>

<div id="reset" class="form-group tab-content" align="center" >
        <div role="tabpanel" class="tab-pane active" id="reset_pass_form">
            <form id="reset_pass_form" method="POST">
            	<div class="alert alert-warning alert-dismissible" role="alert" style="display: none">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <ul id="reset_errors"></ul>
              </div>
                <div class="form-group">
                    <label for="user_mail">Імейл адреса</label>
                     <input type="text" name="mail" class="input-small form-control"  id="user_mail" placeholder="Імейл адреса" />
                </div>
                <div>

<button type="submit" class="btn btn-primary">Поновити</button>
</div>
</form>
<div class="col-md-4"></div>
</div>
<script src="/static/site/script/forgot.js"></script>