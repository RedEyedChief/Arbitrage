      <?php if(!$async):?>
      <div class="col-sm-8 admin-panel">
      	
      	<h3><i class="fa fa-money"></i> <span id="itemType">Тарифи</span></h3>
	    <hr>
		  
	    <div class="panel-body" style="font-family: 'FontAwesome', 'Helvetica Neue', Helvetica, Arial, sans-serif">
		  
		  <div class="row text-center">
		    <div class="col-md-4">
			<span class="fa-stack fa-4x">
			    <i class="fa fa-circle fa-stack-2x text-prices"></i>
			    <i class="fa fa-star-o fa-stack-1x fa-inverse"></i>
			</span>
			<h4 class="service-heading "><?=$prices[0]->name?></h4>
			
			<form action="/content/updatePrices/1" method="POST">
			  <div class="input-group">
			    <input type="text" class="form-control" name="costPrice" id="" placeholder="Вартість" data-rule-required="true" data-rule-number="true" value="<?=$prices[0]->cost?>">
			    <div class="input-group-addon" style="width:1px; padding: 0"></div>
			    <button type="submit" class="btn btn-success form-control" id="addItem"><span>&#xf055;</span></button>
			  </div>
			</form>
			<br>
			      
			<ul class="list-unstyled text-muted">
			  <li><i class="fa fa-plus icon-green"></i> Вивід послідовності міст</li>
			  <li><i class="fa fa-plus icon-green"></i> Зображення плану операцій</li>
			  <li><i class="fa fa-plus icon-green"></i> Вибір товарів</li>
			</ul>
		    </div>
		    <div class="col-md-4">
			<span class="fa-stack fa-4x">
			    <i class="fa fa-circle fa-stack-2x text-prices"></i>
			    <i class="fa fa-star-half-empty fa-stack-1x fa-inverse"></i>
			</span>
			<h4 class="service-heading"><?=$prices[1]->name?></h4>
			
			<form action="/content/updatePrices/2" method="POST">
			  <div class="input-group">
			    <input type="text" class="form-control" name="costPrice" id="" placeholder="Вартість" data-rule-required="true" data-rule-number="true" value="<?=$prices[1]->cost?>">
			    <div class="input-group-addon" style="width:1px; padding: 0"></div>
			    <button type="submit" class="btn btn-success form-control" id="addItem"><span>&#xf055;</span></button>
			  </div>
			</form>
			<br>
			  
			<ul class="list-unstyled text-muted">
			  <li><i class="fa fa-plus icon-green"></i> Вивід послідовності міст</li>
			  <li><i class="fa fa-plus icon-green"></i> Зображення плану операцій</li>
			  <li><i class="fa fa-plus icon-green"></i> Вивід шляху на карту</li>
			  <li><i class="fa fa-plus icon-green"></i> Вибір товарів</li>
			  <li><i class="fa fa-plus icon-green"></i> Вибір ринків</li>
			</ul>
		    </div>
		    <div class="col-md-4">
			<span class="fa-stack fa-4x">
			    <i class="fa fa-circle fa-stack-2x text-prices"></i>
			    <i class="fa fa-star fa-stack-1x fa-inverse"></i>
			</span>
			<h4 class="service-heading"><?=$prices[2]->name?></h4>
			
			<form action="/content/updatePrices/3" method="POST">
			  <div class="input-group">
			    <input type="text" class="form-control" name="costPrice" id="" placeholder="Вартість" data-rule-required="true" data-rule-number="true" value="<?=$prices[2]->cost?>">
			    <div class="input-group-addon" style="width:1px; padding: 0"></div>
			    <button type="submit" class="btn btn-success form-control" id="addItem"><span>&#xf055;</span></button>
			  </div>
			</form>
			<br>
			  
			<ul class="list-unstyled text-muted">
			  <li><i class="fa fa-plus icon-green"></i> Вивід послідовності міст</li>
			  <li><i class="fa fa-plus icon-green"></i> Зображення плану операцій</li>
			  <li><i class="fa fa-plus icon-green"></i> Вивід шляху на карту</li>
			  <li><i class="fa fa-plus icon-green"></i> Вибір товарів</li>
			  <li><i class="fa fa-plus icon-green"></i> Вибір ринків</li>
			  <li><i class="fa fa-plus icon-green"></i> Вибір факторів оцінки</li>
			  <li><i class="fa fa-plus icon-green"></i> Обмеження глибини пошуку</li>
			</ul>
		    </div>
		</div>
		  
	    </div><!--/panel-body-->
	    </div><!--/panel-->  
      </div><!--/col-->
      
      <script>
	
	$('form').submit(function(){
	  if(!$(this).valid()) return false
	  return true
	})
	
	jQuery.validator.addMethod("lettersonly", function(value, element) {
	  return this.optional(element) || /^[1234567890абвгдеёіїІЇґҐжзийклмнопрстуфхцчшщьыъэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЬЫЪЭЮ@.ЯqwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM-]*$/.test(value);
	}, "Letters only please");
	
	$('form').each(function(el){
	  console.log($(el))
	  $(this).validate({
	    validClass: 'has-success',
	    highlight: function (element) {
	      console.log($(element))
		$(element).removeClass('has-success').addClass('has-error');
	    },
	    success: function (element) {
	      console.log($(element).closest('.form-control'))
		$(element).closest('input').removeClass('has-error').addClass('has-success');
	    },
	    errorPlacement: function(error,element) {
		return true;
	    }
	  });  
	});
      </script>
      
      
      <?php endif; ?>
      
      
      
         