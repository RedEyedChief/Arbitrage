<div id="newsreader">
  <?php foreach ($news as $item):?>
    <div class="panel panel-default article">
      <h4 class="header-article"><?=$item->headerArticle?></h4>
      <hr>
      <p class="description-article"><?=$item->descriptionArticle?></p>
      <hr>
      <small class="details-article"><?=$item->dateArticle?> by <?=$item->mail?></small>
    </div>
  
  <?php endforeach;?>
</div>
<div id="newsreaderFooter"><? if(count($news)==10): ?><div class="show-more">Show more ...</div><? endif;?></div>