      <?php if(!$async):?>
      <div class="col-sm-8 admin-panel">
      	
      	<h3><i class="fa fa-users"></i> <span id="itemType">News</span></h3>
	    <hr>
		  
	    <div class="panel-body">
		<!---
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
			-->
			
			<ul class="pagination">
			  <?php for($i=0;$i<intval($num[0]->num/10)+1;$i++):?>
			  <li><a href="?start=<?=$i*10?>&end=<?=($i+1)*10?>"><?=$i+1?></a></li>
			  <?php endfor; ?>
			</ul>
			
		  <table class="table table-striped">
            <thead>
              <tr><th>ID</th><th><?=$this->lang->line('list_th_type')?></th><th><?=$this->lang->line('list_th_author')?></th><th><?=$this->lang->line('list_th_title')?></th><th><?=$this->lang->line('list_th_views')?></th><th><?=$this->lang->line('list_th_rating')?></th><th  style="width: 30px;"></th></tr>
            </thead>
            <tbody id="newsreader">
	      <?php endif;?>
                    <?php $c=1;foreach ($news as $item):?>
                            <tr class="article link" href="/matherials/article/<?=$item->idArticle?>">
                                    <td class="id-article itemId"><?=$item->idArticle?></td>
                                    <td>Article</td>
                                    <td class="author-article"><?=$item->mail?></td>
                                    <td class="header-article itemName"><?=$item->headerArticle?></td>
                                    <td>120</td>
                                    <td>4.4</td>
				    <td class="edit-icon" element-id="<?=$item->idArticle?>" data-toggle="modal" data-target="#confirm-edit"><i class="fa fa-edit text-muted"></i></td>
                                    <td class="remove-icon" element-id="<?=$item->idArticle?>" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-remove text-muted"></i></td>
                            </tr>
                    <?php $c++;endforeach;?>
		    <?php if(!$async):?>
            </tbody>
          </table>
	    
	  <div id="newsreaderFooter"><? if(count($news)==10): ?><div class="show-more">Show more ...</div><? endif;?></div>
			
	    </div><!--/panel-body-->
	    </div><!--/panel-->  
      </div><!--/col-->
    <?php endif; ?>
      
      
      
         