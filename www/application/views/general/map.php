
      <div class="col-sm-8 admin-panel">
      	
      	<h3><i class="fa fa-save blue" id="saveAllButton"></i> <span id="itemType">Карта</span></h3>
	    <hr>
		  
		  
	    <div class="panel-body">
		<div class="form-group">
		  <label class="sr-only" for="nameMarket">Назва</label>
		  <div class="input-group">
		    <div class="input-group-addon"></div>
		    <input type="text" class="form-control" name="nameMarket" id="markerName" placeholder="Name">
		    <div class="input-group-addon"></div>
		    <button type="submit" class="btn btn-success form-control" id="newMarkerButton">Додати</button>
		  </div>
		</div>
	      
	      
		<div id="map-canvas"></div>
		
		<div class="alert alert-warning alert-dismissible fade in" id="errorMessage" role="alert" style="display: none;">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
			  <strong>Для фільтрування по новим точкам продажу оновіть сторінку!</strong>
			</div>
		
		<div class="alert alert-unsaved alert-dismissible fade in" id="unsavedMessage" role="alert" style="display: none;">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
			  <strong>Для фільтрування по новим точкам продажу оновіть сторінку!</strong>
			</div>
		
		<div id="results" class="panel-collapse collapse out">
		  <hr>
		  <h4>Результати</h4>
		  <div class="resultsControl">
		    <div class="btn-group" data-toggle="buttons">
		      <label class="btn btn-default">
			<input type="checkbox" name="showChain" id="showChain" value='0' autocomplete="off"> Показати
		      </label>
		    </div>
		    
		    <div class="" id="listChains">
		      <div class="panel-body">
		  
		      </div>
		    </div>
		  </div>
		</div>
		
		<hr>
		<h4>Ваговий коефіцієнт</h4>
		<div class="resultsControl">
		  <div id="factorWeight"></div>
		  <div class="table-responsive">
		    <table class="table">
		      <thead>
			<tr>
			  <th>Фактор</th>
			  <th>Значимість</th>
			</tr>
		      </thead>
		      <tbody>
			<tr><td>Відстань</td><td style="color: green;"><span id="factorDistance">50</span><span>%</span></td></tr>
			<tr><td>Прибуток</td><td style="color: blue;"><span id="factorIncome">50</span><span>%</span></td></tr>
		      </tbody>
		    </table>
		  </div>
		</div>
		
		<hr>
		<h4>Максимальна глибина пошуку</h4>
		<div class="resultsControl">
		  <div type="text" id="maxDepth"></div>
		  <table class="table">
		    <thead>
		      <tr>
			<th>Параметр</th>
			<th>Значення</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr><td>Глибина</td><td style="color: green;"><span id="parameterDepth"><?=$num_city?></span><span> of <?=$num_city?></span></td></tr>
		    </tbody>
		  </table>
		</div>
		
		<?php if (!empty($markets)) : ?>
		<hr>
		<h4>Початкова точка</h4>
		<div class="resultsControl">
		  <select class="form-control" id="startPoint">
		    <?php foreach ($markets as $market) :?>
		    <option value="<?=$market->id?>"><?=$market->name." ( ".$market->id." )"?></option>
		    <?php endforeach;?>
		  </select>
		</div>
		
		<?php endif; ?>
		
		<?php if (!empty($products)) : ?>
		
		<hr>
		<h4>Продукти</h4>
		<div class="resultsControl">
		  <div class="btn-group" data-toggle="buttons">
		    <label class="btn btn-default active">
		      <input type="radio" name="availableProducts" id="option1" value='0' autocomplete="off"> Всі
		    </label>
		    <label class="btn btn-default">
		      <input type="radio" name="availableProducts" id="option2" value='1' autocomplete="off"> Вибрані
		    </label>
		  </div>
		  
		  <div class="panel-collapse collapse out" id="listProducts">
		    <div class="panel-body">
		      <div class="btn-group btn-item" data-toggle="buttons">
			
			<?php foreach ($products as $product) :?>
			<label class="btn btn-item active item-product">
			  <input type="checkbox" name="itemProduct" id="option1" value='<?=$product->id?>' autocomplete="off"> <?=$product->name?>
			</label>
			<br>
			<?php endforeach; ?>
			
		      </div>
		    </div>
		  </div>
		</div>
		
		<?php endif; ?>
		<?php if (!empty($markets)) : ?>
		
		<hr>
		<h4>Ринки</h4>
		<div class="resultsControl">
		  <div class="btn-group" data-toggle="buttons">
		    <label class="btn btn-default active">
		      <input type="radio" name="availableMarkets" id="option1" value='0' autocomplete="off"> Всі
		    </label>
		    <label class="btn btn-default">
		      <input type="radio" name="availableMarkets" id="option2" value='1' autocomplete="off"> Вибрані
		    </label>
		  </div>
		  
		  <div class="panel-collapse collapse out" id="listMarkets">
		    <div class="panel-body">
		      <div class="btn-group btn-item" data-toggle="buttons">
			
			<?php foreach ($markets as $market) :?>
			<label class="btn btn-item active item-market">
			  <input type="checkbox" name="itemMarket" id="option1" value='<?=$market->id?>' autocomplete="off"> <?=$market->name?>
			</label>
			<br>
			<?php endforeach; ?>
			
		      </div>
		    </div>
		  </div>
		</div>
		
		<?php endif; ?>
		
		<hr>
		
		<button type="submit" class="btn btn-success form-control" id="getResultButton">Отримати результат!</button>
		    
		<center><i style="font-size: 24pt; margin:5px; display:none" class="fa fa-refresh" id="getResultSpinner"></i></center>
		
	    </div><!--/panel-body-->
	    </div><!--/panel-->  
      </div><!--/col-->
    
    <!-- Google Maps script -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwP-tMFGIK69QHHc0l9a78KX8cm87o7x4&language=uk"></script>  
    <script type="text/javascript" src="/static/map/map.js"></script>
    <script type="text/javascript" src="/static/map/load.js"></script>
    <script type="text/javascript" src="/static/map/slider.js"></script>
    
      
         