<div class="col-xs-12 nopadding">
    <hr>
        <h3><?=$this->lang->line('comments')?></h3>
    <hr>
    <div id="comments">
    <?php $c=1; if($comments!=Null)
    {
    foreach ($comments as $item):?>
        <div class="comment">
            <span class="comment-mail"><?=$item->mail?></span>
            <span class="comment-text"><?=$item->comment?></span>
            <span class="comment-date pull-right"><?=$item->date?></span>
        </div>
    <?php $c++;endforeach;}?>
    </div>
    
    <?php if ($isLogged):?>
    <div class="input-group">
        <textarea rows="1" class="form-control custom-control comment-field" rows="1" style="resize:none"></textarea>     
        <span class="input-group-addon btn btn-primary" id="send">Send</span>
    </div>
    <?php endif; ?>
</div>