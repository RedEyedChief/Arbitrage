<link href="/static/site/style/styles.css" rel="stylesheet">
<section>
	<div class="row" style="padding-top:50px">
		<div class="col-md-3"></div>
	<div class="col-md-6 admin-panel" >
	<form class="form-horizontal" id="order_form">
		<div class="form-group">
			<h3 align='center'>Choose starting city</h3>
			<label for="select_city" class="col-sm-3 control-label">City</label>
			<div class="col-sm-5">
				<select id="select_city" class="form-control">
					<?php
					if (!isset($city)){
						print "<option> There is no city available! </option>";
					}
					else{
						print '<option selected>Select your option</option>';
						foreach ($city as $val){
							print "<option value='".$val['nameCity']."'>".$val['nameCity']."</option>";
						}
					}
					?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="select_market"  class="col-sm-3 control-label">Market</label>
			<div class="col-sm-5">
				<select id="select_market" name="select_market" class="form-control"></select>
			</div>
		</div>


		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-5">
				<button type="submit" class="btn btn-default">Show products</button>
			</div>
		</div>
	</form>

	<table class="table table-bordered" id="datatable_products">
	</table>

	<div class="col-sm-offset-3 col-sm-5" style="padding-bottom:10px">
		<button id="make_order" name="make_order" class="btn btn-default" >Order</button>

	</div>
	</div>
	</div>
	<div class="col-md-3"></div>
	</div>
	</section>