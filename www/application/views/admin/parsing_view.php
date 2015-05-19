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
			<div id="empty_OP"></div>
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


			<form class="form-inline row " id="let_parsing" action="http://arbitrage/dashboard/parsing_request" method="POST">
				<div class="form-group col-xs-6">
					<div class="parserURL">
						<label for="parserURL">URL</label>
						<input type="text" class="form-control" id="parserURL" placeholder="URL" value="">
					</div>
				</div>

				<div class="form-group col-xs-6">
					<div class="parserRule ">
						<label for="parserRule">Rule</label>
						<input type="text" class="form-control" id="parserRule" placeholder="Rule" value="" >
					</div>

					<div type="submit" id="doParse" class="btn btn-success col-xs-4 margin_top_10px">Parse!</div>
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

				<div id="parserForm" style="display: none;">
					<form  class="form row margin_top_bot_20px">
						<div class="col-xs-2">
							<input type="text" class="form-control" id="parserName" width="1em" placeholder="Name" value="" name="parserName">
						</div>
						<div class="col-xs-2">
							<input type="text" class="form-control" id="parserPrice" width="1em" placeholder="Price" value="" name="parserPrice">
						</div>
						<div class="col-xs-6">
							<input type="text" class="form-control" id="parserSeller" width="1em" placeholder="Info about seller" value="" name="parserSeller">
						</div>
						<input type="submit" class="btn btn-success " id="parserSave" value="Save">
					</form>

					<div id="Form_error" class="alert alert-danger margin_top_10px" style="display: none;">
						<strong>Input data in this fields!</strong>
					</div>
				</div>


				<div id="table_parsing_result"></div>

			</div>
		</div>
	</div>
</div>