<div class="col-sm-3 admin-panel">
	    <!-- left -->
	    <h3><i class="fa fa-briefcase"></i> Інструменти</h3>
	    <hr>
	    <ul class="nav nav-stacked">
		  <!--<li><a href="/dashboard/"><i class="fa fa-cog"></i> Controls</a></li>-->
		  <li><a href="/dashboard/stats"><i class="fa fa-bar-chart"></i> Статистика</a></li>
		  <li><a href="/dashboard/parsing"><i class="fa fa-tasks"></i> Парсинг</a></li>
		  <?php if($admin):?><li><a href="/dashboard/request"><i class="fa fa-map-marker"></i> Запит</a></li><?php endif;?>
	    </ul>
	    <hr>	    
	    <ul class="nav nav-stacked">
		  <?php if($admin):?>
		  <li><a href="/dashboard/users"><i class="fa fa-users"></i> Користувачі</a></li>
		  <li><a href="/dashboard/orders"><i class="fa fa-suitcase"></i> Замовлення</a></li>
		  <?php endif;?>
		  <li><a href="/dashboard/products"><i class="fa fa-shopping-cart"></i> Продукти</a></li>
		  <li><a href="/dashboard/items"><i class="fa fa-inbox"></i> Елементи</a></li>
		  <!--<li><a href="/dashboard/cities"><i class="fa fa-map-marker"></i> Cities</a></li>-->
		  <?php if($admin):?>
		  <li><a href="/dashboard/prices"><i class="fa fa-money"></i> Тарифи</a></li>
		  <?php endif;?>
	    </ul>
	    <hr>
      </div><!-- /span-3 -->