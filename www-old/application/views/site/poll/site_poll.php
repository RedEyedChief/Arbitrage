    <div class="panel panel-default panel-poll">
	<div class="panel-heading">
	    <h3 class="panel-title"><?=$poll[0]->namePoll?></h3>
	</div>
	<div class="panel-body">
	    <?php
	    $sum=0;
	    foreach ($poll as $item){
		$sum+=$item->countPollVote;
	    }
	    $sum=$sum/100;

	    foreach ($poll as $item):?>
	    <strong><?=$item->textPollVote?></strong><span class="pull-right"><?=round($item->countPollVote/$sum)?>%</span>
	    <div class="progress xs progress-7">
		  <div class="progress-bar progress-bar-green" style="width: <?=$item->countPollVote/$sum?>%;"></div>
	    </div>
	    <? endforeach;?>
	    <strong>Votes: <?=$sum*100?></strong>
	</div>
    </div>