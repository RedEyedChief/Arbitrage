
<div class="panel panel-default col-xs-12 nopadding">
    <table class="table table-striped">
            <thead>
              <tr><th>ID</th><th>Username</th><th>Name</th><th>Comments</th><th style="width: 30px;"></th></tr>
            </thead>
            <tbody id="listpoll">
                    <?php $c=1;foreach ($users as $item):?>
                            <tr class="article link" href="/matherials/article/<?=$item->idProfile?>">
                                    <td class="id-article"><?=$item->idProfile?></td>
                                    <td class="author-article"><?=$item->mail?></td>
                                    <td><?=$item->firstName." ".$item->surName?></td>
                                    <td class="header-article">-</td>
                                    <td class="remove-icon" element-id="<?=$item->idProfile?>" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-remove text-muted"></i></td>
                            </tr>
                    <?php $c++;endforeach;?>
            </tbody>
          </table>
      
    <div id="newsreaderFooter"><? if(count($users)==10): ?><div class="show-more">Show more ...</div><? endif;?></div>
</div>
