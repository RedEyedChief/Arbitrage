


<!--sign in modal-->
<div id="signInModal" class="modal" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
          <h3 class="text-center" style="display: initial;">Логін</h3>
      </div>
      <div class="modal-body">
	<div class="row">
          <form class="form col-md-12 center-block" method="post" action="/login/signin">
              <div class="alert alert-danger alert-dismissible" role="alert" style="display: none">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <ul id="login_errors"></ul>
              </div>
            <div class="form-group">
              <input type="text" class="form-control input-sm" placeholder="Імейл" name="mail">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-sm" placeholder="Пароль" name="password">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-sm btn-block">Увійти</button>
              <span class="pull-right"><a href="/login/reset_password">Забули ваш пароль?</a></span>
            </div>
          </form>
	</div>
      </div>
  </div>
  </div>
</div>

<div id="signUpModal" class="modal" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
          <h3 class="text-center" style="display: initial;">Реєстрація</h3>
      </div>
      <div class="modal-body">
	<div class="row">
          <form class="form col-md-12 center-block" method="POST" action="/login/register">
              <div class="alert alert-danger alert-dismissible" role="alert" style="display: none">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <ul id="register_errors"></ul>
              </div>

              <div class="form-group">
		<input type="text" name="firstname" class="form-control" placeholder="Ім'я"/>
	    </div>
	    <div class="form-group">
		<input type="text" name="surname" class="form-control" placeholder="Прізвище"/>
	    </div>
	    <div class="form-group">
		<input type="text" name="mail" class="form-control" placeholder="Імейл"/>
	    </div>
	    <div class="form-group">
		<input type="password" name="password" class="form-control" placeholder="Пароль"/>
	    </div>
	    <div class="form-group">
		<input type="password" name="password2" class="form-control" placeholder="Повторіть пароль"/>
	    </div>
            <div class="form-group">
              <button class="btn btn-primary btn-sm btn-block">Реєстрація</button>
    
            </div>
          </form>
	</div>
      </div>
  </div>
  </div>
</div>



  
	<!-- script references -->
		<script src="/static/jquery/jquery.min.js"></script>
		<script src="/static/jquery/jquery.hotkeys.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
		<script src="/static/site/script/login.js"></script>
		<script src="/static/pagination/pagination.js"></script>
		<script src="/static/site/script/global.js"></script>
		<script src="/static/admin/script/bootstrap.min.js"></script>
		<script src="/static/site/script/poll.js"></script>
		<script src="/static/site/script/jquery.easing.min.js"></script>
		<script src="/static/site/script/slider.js"></script>
		<script src="/static/site/script/reader.js"></script>
		<script src="/static/site/script/manage.js"></script>
		
		<script src="/static/wysi/bootstrap-wysiwyg.js"></script>
		<script src="/static/upload/js/fileinput.js"></script>

        <script src="/static/site/script/orders.js"></script>

        <script src="/static/site/script/slider.js"></script>
		<script src="/static/site/script/jquery.easing.min.js"></script>
    
		
<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//rgr/analytics/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//rgr/analytics/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
		
		
	</body>
</html>