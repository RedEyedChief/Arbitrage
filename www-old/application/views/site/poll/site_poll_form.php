    <div class="panel panel-default panel-poll">	
	<div class="panel-heading">
	    <h3 class="panel-title"><?=$poll[0]->namePoll?></h3>
	</div>
	<form method="post" name="poll" num="<?=$poll[0]->idPoll?>">
	<div class="panel-body">
	    <?php
	    $sum=0;
	    foreach ($poll as $item){
		$sum+=$item->countPollVote;
	    }
	    $sum=$sum/100;

	    foreach ($poll as $item):?>
	    <label>
		<input type="radio" class="poll-item" name="optionsRadios" value="<?=$item->numberPollVote?>">
		<?=$item->textPollVote?>
	    </label>
	    <br>
	    <? endforeach;?>
	</div>
	<div class="panel-footer">
	    <span><input type="submit" class="btn btn-primary btn-xs vote" value="Vote"></input></span>
	    <span><strong>Votes: <?=$sum*100?></strong></span>
	</div>
	</form>
    </div>