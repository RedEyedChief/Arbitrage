      <?php if(!$async):?>
      <div class="col-sm-8 admin-panel">
      	
      	<h3><i class="fa fa-users"></i> <span id="itemType">Products</span></h3>
	    <hr>
		  
	    <div class="panel-body">
			
		  <form class="form-inline form-add" id="formAdd" style="font-family: 'FontAwesome', 'Helvetica Neue', Helvetica, Arial, sans-serif">
			  <div class="form-group">
			    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
			    <div class="input-group">
			      <div class="input-group-addon"></div>
			      <input type="text" class="form-control" name="nameProduct" id="exampleInputAmount" placeholder="Name">
			      <div class="input-group-addon"></div>
			      <input type="text" class="form-control" name="categoryProduct" id="exampleInputAmount" placeholder="Category">
			      <div class="input-group-addon"></div>
			      <button type="submit" class="btn btn-success form-control" id="addItem"><span>&#xf055;</span></button>
			    </div>
			  </div>
			  
			</form>
			<br>
			<div class="alert alert-danger alert-dismissible fade in" id="errorMessage" role="alert" style="display: none;">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
			  <strong>Error!</strong>
			</div>
			<hr>

			<ul class="pagination">
			  <?php for($i=0;$i<intval($num[0]->num/10)+1;$i++):?>
			  <li><a href="?start=<?=$i*10?>&end=<?=($i+1)*10?>"><?=$i+1?></a></li>
			  <?php endfor; ?>
			</ul>
			

			<div id="listpoll">
			  <?php endif;?>
				<?php $c=1;foreach ($products as $item):?>
				<?php switch('4'){
				    case '0':$icon = "fa fa-ban"; break;
				    case '2':$icon = "fa fa-star-o"; break;
				    case '3':$icon = "fa fa-shield"; break;
				    case '4':$icon = "fa fa-certificate"; break;
				    default: $icon = "";break;
				}
				if($item->isActiveProduct==0) $removed = "removedUser"; else $removed = "";
				if($async) $added = "newItem"; else $added = ""?>
					<div class="item item-product-table <?=$removed." ".$added?>">
						<span class="icon remove-icon <?=$icon?>"></span>
						<span class="id-article itemId"><?=$item->idProduct?></span>
						<span class="author-article itemName"><?=$item->nameProduct?></span>
						<span class="icon edit-icon pull-right" element-id="<?=$item->idProduct?>" data-toggle="modal" data-target="#confirm-edit"><i class="fa fa-edit text-muted"></i></span>
						<span class="icon remove-icon pull-right" element-id="<?=$item->idProduct?>" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-remove text-muted"></i></span>
					</div>
				<?php $c++;endforeach;?>
				<?php if(!$async):?>
			</div>
	    
	  <div id="newsreaderFooter"><? if(count($products)==10): ?><div class="show-more">Show more ...</div><? endif;?></div>
			
	    </div><!--/panel-body-->
	    </div><!--/panel-->  
      </div><!--/col-->
      <?php endif; ?>