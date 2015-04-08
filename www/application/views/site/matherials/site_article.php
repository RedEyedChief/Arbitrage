<?php $item = $news[0];?>
<div>
	<div class="panel panel-dotted">
          <div class="panel-heading"><h1 id="<?=$item->idArticle?>" class="header-article">
		<?=$item->headerArticle?>
          </h1></div>
          <div class="panel-body">
                  <article class="feature">
                    <?php if ($item->imageArticle):?>
                          <figure class="pull-left news-thumbs thumbnail">
                                  <img alt="" src="/static/images/articles/<?=$item->idArticle?>.png" class="avatar avatar-160 photo" height="160" width="160" />
                          </figure>
                    <?php endif;?>
                          <p class="justify"><?=$item->textArticle?></p>
                  </article>
          </div>
        </div>
</div>