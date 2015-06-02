
      <div class="col-sm-8 admin-panel">
      	
      	<h3><i class="fa fa-suitcase"></i> <span id="itemType">Orders</span></h3>
	    <hr>
		  
	    <div class="panel-body">
			
		    
			
			<ul class="pagination">
			  <?php for($i=0;$i<intval($num[0]->num/10)+1;$i++):?>
			  <li><a href="?start=<?=$i*10?>&end=<?=($i+1)*10?>"><?=$i+1?></a></li>
			  <?php endfor; ?>
			</ul>
			
		  <table class="table table-striped">
			<thead>
			  <tr><th>ID</th><th>Email</th><th>Start</th><th>Depth</th><th>Distance</th><th style="width: 30px;"></th><th style="width: 30px;"></th></tr>
			</thead>
			<tbody id="listpoll">
			  <?php foreach($orders as $item): ?>
					<tr class="item link" href="/orders/request/<?=$item->id?>">
						
						<td class=""><?=$item->id?></td>
						<td class=""><?=$item->mail?></td>
						<td class=""><?=$item->start_market?> ( <?=$item->id_start?> )</td>
						<td class=""><?=$item->depth?></td>
						<td class=""><?=$item->c_dist?>%</td>
						<td class="remove-icon" element-id="<?=$item->id?>" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-remove text-muted"></i></td>
					</tr>
				<?php endforeach;?>
				
			</tbody>
		  </table>
	    
	  		
	    </div><!--/panel-body-->
	    </div><!--/panel-->  
      </div><!--/col-->

      
         