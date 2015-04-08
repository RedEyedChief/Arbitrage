<div id="newsreader">
  <?php foreach ($news as $item):?>
    <div class="panel panel-article article link" href="/matherials/article/<?=$item->idArticle?>">
      <h4 class="header-article"><?=$item->headerArticle?> - <small class="details-article text-muted"><?=$item->dateArticle?></small></h4><span class="pull-right"></span>
      <p class="description-article"><?=$item->descriptionArticle?></p>
    </div>
  
  <?php endforeach;?>
</div>
<div id="newsreaderFooter"><? if(count($news)==10): ?><div class="show-more">Show more ...</div><? endif;?></div>