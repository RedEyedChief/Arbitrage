
<div class="panel panel-default col-xs-12 nopadding">
    <table class="table table-striped">
            <thead>
              <tr><th>ID</th><th><?=$this->lang->line('list_th_type')?></th><th><?=$this->lang->line('list_th_author')?></th><th><?=$this->lang->line('list_th_title')?></th><th><?=$this->lang->line('list_th_views')?></th><th><?=$this->lang->line('list_th_rating')?></th><th  style="width: 30px;"></th></tr>
            </thead>
            <tbody id="listpoll">
                    <?php $c=1;foreach ($polls as $item):?>
                            <tr class="article link" href="/matherials/article/<?=$item->idPoll?>">
                                    <td class="id-article"><?=$item->idPoll?></td>
                                    <td>Article</td>
                                    <td class="author-article"><?=$item->username?></td>
                                    <td class="header-article"><?=$item->namePoll?></td>
                                    <td><input type="checkbox" <?php if($item->statePoll) echo "checked"?>></td>
                                    <td>4.4</td>
                                    <td class="remove-icon" element-id="<?=$item->idPoll?>" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-remove text-muted"></i></td>
                            </tr>
                    <?php $c++;endforeach;?>
            </tbody>
          </table>
      
    <div id="newsreaderFooter"><? if(count($news)==10): ?><div class="show-more"><?=$this->lang->line('list_showmore')?></div><? endif;?></div>
</div>
