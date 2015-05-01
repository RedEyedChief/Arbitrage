  
   
  <table class="table table-striped">
              <thead>
                <tr><th>ID</th><th><?=$this->lang->line('list_th_type')?></th><th><?=$this->lang->line('list_th_author')?></th><th><?=$this->lang->line('list_th_title')?></th><th><?=$this->lang->line('list_th_views')?></th><th><?=$this->lang->line('list_th_rating')?></th><th  style="width: 30px;"></th></tr>
              </thead>
              <tbody id="newsreader">
                      <?php $c=1;foreach ($news as $item):?>
                              <tr class="article">
                                      <td class="id-article"><?=$item->idArticle?></td>
                                      <td>Article</td>
                                      <td class="author-article"><?=$item->mail?></td>
                                      <td class="header-article link" href="/matherials/article/<?=$item->idArticle?>"><?=$item->headerArticle?></td>
                                      <td>120</td>
                                      <td>4.4</td>
                                      <td class="remove-icon" element-id="<?=$item->idArticle?>" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-remove text-muted"></i></td>
                              </tr>
                      <?php $c++;endforeach;?>
              </tbody>
            </table>
        
  <div id="newsreaderFooter"><? if(count($news)==10): ?><div class="show-more">Show more ...</div><? endif;?></div>
  
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <?=$this->lang->line('list_delete_sure')?>
              </div>
              <div class="modal-body">
                  ...
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal"><?=$this->lang->line('list_delete_cancel')?></button>
                  <a class="btn btn-danger danger confirm-delete"><?=$this->lang->line('list_delete_confirm')?></a>
              </div>
          </div>
      </div>
  </div>