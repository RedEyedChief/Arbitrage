      <?php if(!$async):?>
      <div class="col-sm-8 admin-panel">
      	
      	<h3><i class="fa fa-users"></i> <span id="itemType">Елементи</span><span> <?=isset($productId)?'[product '.$productId.']':''?></span></h3>
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
			      <input type="text" class="form-control" name="priceItem" id="" placeholder="Ціна">
			      <div class="input-group-addon"></div>
			      <select class="form-control" name="market_idMarket">
				<?php if(isset($markets)){ foreach ($markets as $market) :?>
				<option value="<?=$market->id?>"><?=$market->name." ( ".$market->id." )"?></option>
				<?php endforeach;}?>
			      </select>
			      <div class="input-group-addon"></div>
			      <select class="form-control" name="typeItem">
				<option value="0">Продаж</option>
				<option value="1">Купівля</option>
			      </select>
			      <div class="input-group-addon"></div>
			      <button type="submit" class="btn btn-success form-control" id="addItem"><span>&#xf055;</span></button>
			    </div>
			  </div>
			  
			</form>
			
			<br>
			<div class="alert alert-danger alert-dismissible fade in" id="errorMessage" role="alert" style="display: none;">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
			  <strong>Помилка!</strong>
			</div>
			
			<hr>

			<ul class="pagination">
			  <?php for($i=0;$i<intval($num/10)+1;$i++):?>
			  <li><a href="?start=<?=$i*10?>&end=<?=($i+1)*10?>"><?=$i+1?></a></li>
			  <?php endfor; ?>
			</ul>
			

			<table class="table table-striped">
			<thead>
			  <tr><th>ID</th><th>Продукт</th><th>Ринок</th><th>Ціна</th><th style="width: 30px;"></th><th style="width: 30px;"></th></tr>
			</thead>
			<tbody id="listpoll">
			  <?php endif;?>
			      <?php if(!empty($items)):?>
				<?php $c=1;foreach ($items as $item):?>
		      		<?php if($async) $added = "newItem"; else $added = ""?>
					<tr class="item link <?=$added?>">
						<td class="itemId"><?=$item->idItem?></td>
						<td class="productName"><?=$item->nameProduct?></td>
						<td class="marketName"><?=$item->nameMarket?></td>
						<td class="marketName"><?=$item->priceItem?></td>
						<td class="edit-icon" element-id="<?=$item->idItem?>" data-toggle="modal" data-target="#confirm-edit"><i class="fa fa-edit text-muted"></i></td>
						<td class="remove-icon" element-id="<?=$item->idItem?>" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-remove text-muted"></i></td>
					</tr>
				<?php $c++;endforeach;?>
				<?php endif;?>
				<?php if(!$async):?>
			</tbody>
		  </table>
	 
	    </div><!--/panel-body-->
	    </div><!--/panel-->  
      </div><!--/col-->
      
       <script>
	jQuery.validator.addMethod("lettersonly", function(value, element) {
	  return this.optional(element) || /^[1234567890'абвгдеёіїІЇґҐжзийклмнопрстуфхцчшщьыъэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЬЫЪЭЮ@.ЯqwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM-]*$/.test(value);
	}, "Letters only please");
	
	$('#formAdd').validate({
	validClass: 'has-success',
        rules: {
            priceItem: {
                required: true,
		number: true
            }
        },
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
	
	
	var CATEGORY = "Items"
      </script>
      
      <?php endif; ?>