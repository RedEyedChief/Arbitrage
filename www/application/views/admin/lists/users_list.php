      <div class="col-sm-8 admin-panel">
      	
      	<h3><i class="fa fa-users"></i> <span id="itemType">Users</span></h3>
	    <hr>
		  
	    <div class="panel-body">
			
		  <table class="table table-striped">
			<thead>
			  <tr><th style="width: 28px;"></th></th><th>ID</th><th>Email</th><th>Name</th><th>Role</th><th style="width: 30px;"></th><th style="width: 30px;"></th></tr>
			</thead>
			<tbody id="listpoll">
				<?php $c=1;foreach ($users as $item):?>
				<?php switch($item->role){
				    case '2':$icon = "fa fa-star-o"; break;
				    case '3':$icon = "fa fa-shield"; break;
				    case '4':$icon = "fa fa-certificate"; break;
				    default: $icon = "";break;
				}
				if($item->isActive==0) $removed = "removedUser"; else $removed = ""?>
					<tr class="article link <?=$removed?>" href="/matherials/article/<?=$item->idProfile?>">
						<td class="remove-icon <?=$icon?>"></td>
						<td class="id-article itemId"><?=$item->idProfile?></td>
						<td class="author-article"><?=$item->mail?></td>
						<td class="itemName"><?=$item->firstName." ".$item->surName?></td>
						<td><?=$item->role?></td>
						<td class="remove-icon" element-id="<?=$item->idProfile?>" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-edit text-muted"></i></td>
						<td class="remove-icon" element-id="<?=$item->idProfile?>" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-remove text-muted"></i></td>
					</tr>
				<?php $c++;endforeach;?>
			</tbody>
		  </table>
	    
	  <div id="newsreaderFooter"><? if(count($users)==10): ?><div class="show-more">Show more ...</div><? endif;?></div>
			
	    </div><!--/panel-body-->
	    </div><!--/panel-->  
      </div><!--/col-->
      
      
      
      
         