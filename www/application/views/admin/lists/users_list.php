      <?php if(!$async):?>
      <div class="col-sm-8 admin-panel">
      	
      	<h3><i class="fa fa-users"></i> <span id="itemType">Users</span></h3>
	    <hr>
		  
	    <div class="panel-body">
			
			<form class="form-inline form-add" id="formAdd" style="font-family: 'FontAwesome', 'Helvetica Neue', Helvetica, Arial, sans-serif">
			  <div class="form-group">
			    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
			    <div class="input-group">
			      <select class="form-control" name="role">
				<option value="1">&#xf007;</option>
				<option value="2">&#xf006;</option>
				<option value="3">&#xf132;</option>
				<option value="4">&#xf0A3;</option>
			      </select>
			      <div class="input-group-addon"></div>
			      <input type="email" class="form-control" name="mail" id="exampleInputAmount" placeholder="E-mail">
			      <div class="input-group-addon"></div>
			      <input type="password" class="form-control" name="password" id="exampleInputAmount" placeholder="Surname">
			      <div class="input-group-addon"></div>
			      <input type="text" class="form-control" name="firstname" id="exampleInputAmount" placeholder="Name">
			      <div class="input-group-addon"></div>
			      <input type="text" class="form-control" name="surname" id="exampleInputAmount" placeholder="Surname">
			      <div class="input-group-addon"></div>
			      <button type="submit" class="btn btn-success form-control" id="addItem">&#xf055;</button>
			    </div>
			  </div>
			  
			</form>
			
			<hr>
			
		  <table class="table table-striped">
			<thead>
			  <tr><th style="width: 28px;"></th></th><th>ID</th><th>Email</th><th>Name</th><th>Role</th><th style="width: 30px;"></th><th style="width: 30px;"></th></tr>
			</thead>
			<tbody id="listpoll">
			  <?php endif;?>
				<?php $c=1;foreach ($users as $item):?>
				<?php switch($item->role){
				    case '2':$icon = "fa fa-star-o"; break;
				    case '3':$icon = "fa fa-shield"; break;
				    case '4':$icon = "fa fa-certificate"; break;
				    default: $icon = "";break;
				}
				if($item->isActive==0) $removed = "removedUser"; else $removed = "";
				if($async) $added = "newItem"; else $added = ""?>
					<tr class="article link <?=$removed." ".$added?>" href="/matherials/article/<?=$item->idProfile?>">
						<td class="remove-icon <?=$icon?>"></td>
						<td class="id-article itemId"><?=$item->idProfile?></td>
						<td class="author-article"><?=$item->mail?></td>
						<td class="itemName"><?=$item->firstName." ".$item->surName?></td>
						<td><?=$item->role?></td>
						<td class="remove-icon" element-id="<?=$item->idProfile?>" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-edit text-muted"></i></td>
						<td class="remove-icon" element-id="<?=$item->idProfile?>" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-remove text-muted"></i></td>
					</tr>
				<?php $c++;endforeach;?>
				<?php if(!$async):?>
			</tbody>
		  </table>
	    
	  <div id="newsreaderFooter"><? if(count($users)==10): ?><div class="show-more">Show more ...</div><? endif;?></div>
			
	    </div><!--/panel-body-->
	    </div><!--/panel-->  
      </div><!--/col-->
      <?php endif; ?>
      
      
      
         