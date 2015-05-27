      <?php if(!$async):?>
      <div class="col-sm-8 admin-panel">
      	
      	<h3><i class="fa fa-users"></i> <span id="itemType">Items</span><span> <?=isset($productId)?'[product '.$productId.']':''?></span></h3>
	    <hr>
		  
	    <div class="panel-body">
			
		  <form class="form-inline form-add" id="formAdd" style="font-family: 'FontAwesome', 'Helvetica Neue', Helvetica, Arial, sans-serif">
			  <div class="form-group">
			    <div class="input-group">
			      <div class="input-group-addon"></div>
			      <select class="form-control" name="product_idProduct">
				<?php if(isset($products)){ foreach ($products as $product) :?>
				<option value="<?=$product->id?>"><?=$product->name." ( ".$product->id." )"?></option>
				<?php endforeach;}?>
			      </select>
			      <div class="input-group-addon"></div>
			      <input type="text" class="form-control" name="priceItem" id="" placeholder="Price">
			      <div class="input-group-addon"></div>
			      <select class="form-control" name="market_idMarket">
				<?php if(isset($markets)){ foreach ($markets as $market) :?>
				<option value="<?=$market->id?>"><?=$market->name." ( ".$market->id." )"?></option>
				<?php endforeach;}?>
			      </select>
			      <div class="input-group-addon"></div>
			      <select class="form-control" name="typeItem">
				<option value="0">Sell</option>
				<option value="1">Buy</option>
			      </select>
			      <div class="input-group-addon"></div>
			      <button type="submit" class="btn btn-success form-control" id="addItem">&#xf055;</button>
			    </div>
			  </div>
			  
			</form>
			
			<hr>

			<ul class="pagination">
			  <?php for($i=0;$i<intval($num/10)+1;$i++):?>
			  <li><a href="?start=<?=$i*10?>&end=<?=($i+1)*10?>"><?=$i+1?></a></li>
			  <?php endfor; ?>
			</ul>
			

			<div id="listpoll">
			  <?php endif;?>
				<?php $c=1;foreach ($items as $item):?>
				<?php switch($item->typeItem){
				    case '0':$icon = "Sell"; break;
				    case '1':$icon = "Buy "; break;
				    default: $icon = "NaN ";break;
				}
				if($item->isActiveItem==0) $removed = "removedUser"; else $removed = "";
				if($async) $added = "newItem"; else $added = ""?>
					<div class="item item-product-table <?=$removed." ".$added?>">
						<span class="icon remove-icon"><?=$icon?></span>
						<b class="marketName"><?=$item->nameMarket?></b> - <span class="productName"><?=$item->nameProduct?></span>
						<span class="itemId"> ( <?=$item->idItem?> )</span>
						<span class="icon edit-icon pull-right" element-id="<?=$item->idItem?>" data-toggle="modal" data-target="#confirm-edit"><i class="fa fa-edit text-muted"></i></span>
						<span class="icon remove-icon pull-right" element-id="<?=$item->idItem?>" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-remove text-muted"></i></span>
					</div>
				<?php $c++;endforeach;?>
				<?php if(!$async):?>
			</div>
	 
	    </div><!--/panel-body-->
	    </div><!--/panel-->  
      </div><!--/col-->
      <?php endif; ?>