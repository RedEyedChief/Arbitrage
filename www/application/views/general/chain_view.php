<link rel="stylesheet" href="/static/map/map.css">

<ul class="timeline">
<?php
$nextItem = 0;
$next = 0;
$total = 0;
foreach ($chains as $chain): ?>
		  <li>
		    <div class="timeline-badge"><i class="fa fa-map-marker"></i></div>
		    <div class="timeline-panel">
		      <div class="timeline-heading">
			<h4 class="timeline-title"><?=$markets[$chain['start']]->name?>     <span style="color:green" class="pull-right"><?=$next>0?'+'.$dif:''?></span></h4>
		  </div>
		      <div class="timeline-body">
		        <?php if ($next>0):?>
			   <h5><?=$nextItem?></h5>
			   <p>Sell <?=$next?></p>
			<?php $nextItem = $next = 0; endif;?>
			<?php if ($chain['buy']<$chain['sell']):?>
			
			<h5><?=$chain['item']?></h5>
			<p>Buy <?=$chain['buy']?></p>
			<?php $next = $chain['sell']; $nextItem = $chain['item']; $dif = $chain['sell'] - $chain['buy']; $total+=$dif;?>
			<?php endif; ?>
		      </div>
		    </div>
		  </li>
<?php endforeach; ?>
<?php $start = array_shift(array_values($chains));?>
		  <li>
		    <div class="timeline-badge"><i class="fa fa-map-marker"></i></div>
		    <div class="timeline-panel">
		      <div class="timeline-heading">
			<h4 class="timeline-title"><?=$markets[$start['start']]->name?>     <span style="color:green" class="pull-right"><?=$next>0?'+'.$dif:''?></h4>
		  </div>
		      <div class="timeline-body">
		        <?php if ($next>0):?>
			   <h5><?=$nextItem?></h5>
			   <p>Sell <?=$next?></p>
			<?php endif;?>
		      </div>
		    </div>
		  </li>

</ul>

<h4>Total income: <?=$total?></h4>