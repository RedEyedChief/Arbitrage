      <?php if(!$async):?>
      <div class="col-sm-8 admin-panel">
      	
      	<h3><i class="fa fa-money"></i> <span id="itemType">Prices</span></h3>
	    <hr>
		  
	    <div class="panel-body">
		  
		  <form class="form-inline form-add" id="formAdd" style="font-family: 'FontAwesome', 'Helvetica Neue', Helvetica, Arial, sans-serif">
			  <div class="form-group">
			    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
			    <div class="input-group">
			      <div class="input-group-addon"></div>
			      <input type="text" class="form-control" name="namePrice" id="exampleInputAmount" placeholder="Name">
			      <div class="input-group-addon"></div>
			      <input type="text" class="form-control" name="costPrice" id="exampleInputAmount" placeholder="Price">
			      <div class="input-group-addon"></div>
			      <button type="submit" class="btn btn-success form-control" id="addItem">&#xf055;</button>
			    </div>
			  </div>
			  
			</form>
			
			<hr>
			  
			  <ul class="pagination">
			  <?php for($i=0;$i<intval($num[0]->num/10)+1;$i++):?>
			  <li><a href="?start=<?=$i*10?>&end=<?=($i+1)*10?>"><?=$i+1?></a></li>
			  <?php endfor; ?>
			</ul>
			  
		  <table class="table table-striped">
			<thead>
			  <tr><th style="width: 28px;"></th></th><th>ID</th><th>Name</th><th>Area</th><th>Cost</th><th style="width: 30px;"></th><th style="width: 30px;"></th></tr>
			</thead>
			<tbody id="listpoll">
			  <?php endif;?>
				<?php $c=1;foreach ($prices as $item):?>
				<?php switch('4'){
				    case '0':$icon = "fa fa-ban"; break;
				    case '2':$icon = "fa fa-star-o"; break;
				    case '3':$icon = "fa fa-shield"; break;
				    case '4':$icon = "fa fa-certificate"; break;
				    default: $icon = "";break;
				}
				if($item->isActivePrice==0) $removed = "removedUser"; else $removed = "";
				if($async) $added = "newItem"; else $added = ""?>
					<tr class="article link <?=$removed?>" href="/matherials/article/<?=$item->idPrice?>">
						<td class="remove-icon <?=$icon?>"></td>
						<td class="id-article itemId"><?=$item->idPrice?></td>
						<td class="itemName"><?=$item->namePrice?></td>
						<td><?=$item->nameArea?></td>
						<td><?=$item->costPrice?></td>
						<td class="edit-icon" element-id="<?=$item->idPrice?>" data-toggle="modal" data-target="#confirm-edit"><i class="fa fa-edit text-muted"></i></td>
						<td class="remove-icon" element-id="<?=$item->idPrice?>" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-remove text-muted"></i></td>
					</tr>
				<?php $c++;endforeach;?>
				<?php if(!$async):?>
			</tbody>
		  </table>
	    
	  <div id="newsreaderFooter"><? if(count($prices)==10): ?><div class="show-more">Show more ...</div><? endif;?></div>
			
	    </div><!--/panel-body-->
	    </div><!--/panel-->  
      </div><!--/col-->
      <?php endif; ?>
      
      
      
         