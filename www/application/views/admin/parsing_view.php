<div class="col-sm-8 admin-panel">
	<h3><i class="fa fa-tasks"></i> Parsing</h3>
	<hr>
		  
	<div class="panel-body">

		<div class="form-group row">
			<div class="col-xs-6">
        		<button  type="button" class="btn btn-primary form-control" id="view_op" onclick="view_op()">View OP</button>
        	</div>
        	<div class="col-xs-6">
                <button  type="button" class="btn btn-info form-control" id="add_op" >Add OP</button>
            </div>

		</div>

		<hr>

		<div class="view_op">

			<div id="list_OP"></div>
			<div id="empty_OP" style="display: none;">
				<div class="alert alert-warning"> <strong> List of OP is empty ! </strong> </div>
			</div>
		</div>


		<div class="add_op" style="display: none;">

			<!--
			<form class="form-inline form-add" id="let_parsing" action="http://arbitrage/dashboard/parsing_request" method="POST" style="font-family: 'FontAwesome', 'Helvetica Neue', Helvetica, Arial, sans-serif">
            	<div class="form-group">
            		<div class="input-group">
            			<div class="input-group-addon"></div>
            			<input type="text" class="form-control" id="parserURL" placeholder="URL" value="http://hotline.ua/knigi/">
            			<div class="input-group-addon"></div>
            			<input type="text" class="form-control" id="parserRule" placeholder="Rule" value="ul[class=book-tabl] li" >
            			<div class="input-group-addon"></div>
            			<button type="submit" id="doParse" class="btn btn-success form-control" id="addItem">&#xf055;</button>
            		</div>
            	</div>

            </form> -->


			<form class="form row " id="let_parsing" action="http://arbitrage/dashboard/parsing_request" method="POST">
				<div class="form-group row">
					<div class="parserURL col-xs-7">
						<input type="text" class="form-control" id="parserURL" placeholder="URL" value="">
					</div>
					<div class="parserRule col-xs-5">
						<input type="text" class="form-control" id="parserRule" placeholder="Rule" value="" >
					</div>
				</div>
				<div class="form-group row">
					<div class="col-xs-4">
						<input type="text" class="form-control" id="parserProductType" width="1em" placeholder="ProductType" value="" name="parserProductType">
					</div>
					<div class="col-xs-3">
						<input type="text" class="form-control" id="parserCategory" width="1em" placeholder="Category" value="" name="parserCategory" >
					</div>
					<div class="parserSub col-xs-5">
                		<div type="submit" id="doParse" class="btn btn-success form-control">Parse!</div>
                	</div>
				</div>

			</form>

			<div id="parser_error" class="alert alert-danger margin_top_10px" style="display: none;">
				 <strong>Input data in this fields!</strong>
			</div>
			<div id="parser_data_error" class="alert alert-danger margin_top_10px" style="display: none;">
				 <strong>Invalid data in this field!</strong>
			</div>

			<hr>

			<div id="parseResult" style="display: none;">

				<div id="parserForm" style="display: none;" >
					<form  class="form row margin_top_bot_20px">
						<div class="form-group row">
							<div class="col-xs-6">
								<input type="text" class="form-control" id="parserProductName" width="1em" placeholder="ProductName" value="" name="parserProductName">
							</div>
							<div class="col-xs-2">
								<input type="text" class="form-control" id="parserPrice" width="1em" placeholder="Price" value="" name="parserPrice">
							</div>
							<div class="col-xs-2">
								<input type="text" class="form-control" id="parserCount" width="1em" placeholder="Count" value="" name="parserCount">
							</div>
							<div class="col-xs-2">
								<input type="text" class="form-control" id="parserType" width="1em" placeholder="Type" value="" name="parserType">
							</div>

						</div>
						<div class="form-group row">
							<div class="col-xs-6">
								<input type="text" class="form-control" id="parserSeller" width="1em" placeholder="Info about seller" value="" name="parserSeller">
							</div>
							<div class="col-xs-2">
                                <input type="text" class="form-control" id="parserMarket" width="1em" placeholder="Market" value="" name="parserMarket">
                            </div>
							<div class="col-xs-4">
								<input type="submit" class="btn btn-success form-control" id="parserSave" value="Save">
							</div>
						</div>
					</form>

					<div id="Form_error" class="alert alert-danger margin_top_10px" style="display: none;">
						<strong>Input data in this fields!</strong>
					</div>
				</div>

				<div class="progress" id="progress_parsing" style="display: none;">
                     <div class="progress-bar progress-bar-striped active"
                          role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                     </div>
                </div>

				<div id="parse_error" >
					<div id="parse_nothing_found" class="alert alert-danger" style="display: none;"> <strong> Nothing found </strong> </div>
				</div>
				
				<div id="table_parsing_result">
				</div>

			</div>
		</div>
	</div>
</div>