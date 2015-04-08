<?php $item = $news[0];?>
<div class="row">
	<h1>
		<?=$item->headerArticle?>
	</h1>
	<div class="col-xs-12">
		<article class="feature">
			<figure class="pull-left news-thumbs thumbnail">
				<img alt="" src="http://1.gravatar.com/avatar/3a4fe156e7e23a3f6c023ab0abb305e2?s=160&amp;d=http%3A%2F%2Fcss-tricks.com%2Fimages%2Fget-gravatar.png%3Fs%3D160&amp;r=PG" class="avatar avatar-160 photo" height="160" width="160" />
			</figure>
			<p class="justify"><?=$item->textArticle?></p>
		</article>
	</div>
</div>
<!-- 
<table class="table table-striped">
        <thead>
          <tr><th>ID</th><th>Type</th><th>Author</th><th>Title</th><th>Views</th><th>Rating</th></tr>
        </thead>
        <tbody id="newsreader">
		<?php $c=1;foreach ($news as $item):?>
			<tr class="article link" href="/matherials/article/<?=$item->idArticle?>">
				<td class="id-article"><?=$item->idArticle?></td>
				<td>Article</td>
				<td class="author-article"><?=$item->username?></td>
				<td class="header-article"><?=$item->headerArticle?></td>
				<td>120</td>
				<td>4.4</td>
			</tr>
		<?php $c++;endforeach;?>
        </tbody>
-->      </table>
      
<div id="newsreaderFooter"><? if(count($news)==10): ?><div class="show-more">Show more ...</div><? endif;?></div>