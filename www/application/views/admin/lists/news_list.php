      <div class="col-sm-8 admin-panel">
      	
      	<h3><i class="fa fa-users"></i> News</h3>
	    <hr>
		  
	    <div class="panel-body">
			
		  <table class="table table-striped">
            <thead>
              <tr><th>ID</th><th><?=$this->lang->line('list_th_type')?></th><th><?=$this->lang->line('list_th_author')?></th><th><?=$this->lang->line('list_th_title')?></th><th><?=$this->lang->line('list_th_views')?></th><th><?=$this->lang->line('list_th_rating')?></th><th  style="width: 30px;"></th></tr>
            </thead>
            <tbody id="newsreader">
                    <?php $c=1;foreach ($news as $item):?>
                            <tr class="article link" href="/matherials/article/<?=$item->idArticle?>">
                                    <td class="id-article"><?=$item->idArticle?></td>
                                    <td>Article</td>
                                    <td class="author-article"><?=$item->mail?></td>
                                    <td class="header-article"><?=$item->headerArticle?></td>
                                    <td>120</td>
                                    <td>4.4</td>
                                    <td class="remove-icon" element-id="<?=$item->idArticle?>" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-remove text-muted"></i></td>
                            </tr>
                    <?php $c++;endforeach;?>
            </tbody>
          </table>
	    
	  <div id="newsreaderFooter"><? if(count($news)==10): ?><div class="show-more">Show more ...</div><? endif;?></div>
			
	    </div><!--/panel-body-->
	    </div><!--/panel-->  
      </div><!--/col-->
      
      
      
      
         