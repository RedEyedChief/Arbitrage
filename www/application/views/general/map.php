
      <div class="col-sm-8 admin-panel">
      	
      	<h3><i class="fa fa-save blue" id="saveAllButton"></i> <span id="itemType">Map</span></h3>
	    <hr>
		  
		  
	    <div class="panel-body">
		<div class="form-group">
		  <label class="sr-only" for="nameMarket">Name</label>
		  <div class="input-group">
		    <div class="input-group-addon"></div>
		    <input type="text" class="form-control" name="nameMarket" id="markerName" placeholder="Name">
		    <div class="input-group-addon"></div>
		    <button type="submit" class="btn btn-success form-control" id="newMarkerButton">Add</button>
		  </div>
		</div>
	      
	      
		<div id="map-canvas"></div>
		
		<hr>
		<h4>Weight coefficient</h4>
		<div class="resultControls">
		  <div id="factorWeight"></div>
		  <div class="table-responsive">
		    <table class="table">
		      <thead>
			<tr>
			  <th>Factor</th>
			  <th>Weight</th>
			</tr>
		      </thead>
		      <tbody>
			<tr><td>Distance</td><td style="color: green;"><span id="factorDistance">50</span><span>%</span></td></tr>
			<tr><td>Income</td><td style="color: blue;"><span id="factorIncome">50</span><span>%</span></td></tr>
		      </tbody>
		    </table>
		  </div>
		</div>
		
		<hr>
		<h4>Maximum depth</h4>
		<div class="resultControls">
		  <div type="text" id="maxDepth"></div>
		  <table class="table">
		    <thead>
		      <tr>
			<th>Parameter</th>
			<th>Value</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr><td>Depth</td><td style="color: green;"><span id="parameterDepth"><?=$num_city?></span><span> of <?=$num_city?></span></td></tr>
		    </tbody>
		  </table>
		</div>
		
		<?php if (!empty($markets)) : ?>
		<hr>
		<h4>Start point</h4>
		<div class="resultControls">
		  <select class="form-control" id="startPoint">
		    <?php foreach ($markets as $market) :?>
		    <option value="<?=$market->id?>"><?=$market->name." ( ".$market->id." )"?></option>
		    <?php endforeach;?>
		  </select>
		</div>
		
		<?php endif; ?>
		
		<?php if (!empty($products)) : ?>
		
		<hr>
		<h4>Available products</h4>
		<div class="resultsControl">
		  <div class="btn-group" data-toggle="buttons">
		    <label class="btn btn-default active">
		      <input type="radio" name="availableProducts" id="option1" value='0' autocomplete="off"> All
		    </label>
		    <label class="btn btn-default">
		      <input type="radio" name="availableProducts" id="option2" value='1' autocomplete="off"> Selected
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
		<h4>Available markets</h4>
		<div class="resultsControl">
		  <div class="btn-group" data-toggle="buttons">
		    <label class="btn btn-default active">
		      <input type="radio" name="availableMarkets" id="option1" value='0' autocomplete="off"> All
		    </label>
		    <label class="btn btn-default">
		      <input type="radio" name="availableMarkets" id="option2" value='1' autocomplete="off"> Selected
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
		
		<button type="submit" class="btn btn-success form-control" id="getResultButton">Get result</button>
		    
	    </div><!--/panel-body-->
	    </div><!--/panel-->  
      </div><!--/col-->
    
    <!-- Google Maps script -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwP-tMFGIK69QHHc0l9a78KX8cm87o7x4"></script>  
    <script type="text/javascript" src="/static/map/map.js"></script>
    <script type="text/javascript" src="/static/map/load.js"></script>
    <script type="text/javascript" src="/static/map/slider.js"></script>
    
      
         