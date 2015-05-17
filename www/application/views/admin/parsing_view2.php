<div class="col-sm-8 admin-panel">
	<h3><i class="fa fa-tasks"></i> Parsing</h3>
	<hr>
		  
	<div class="panel-body">

		<form class="form-inline row " id="let_parsing" action="http://arbitrage/dashboard/parsing_request" method="POST">
			<div class="form-group col-xs-6">
				<div class="parserURL">
					<label for="parserURL">URL</label>
					<input type="text" class="form-control" id="parserURL" placeholder="URL" value="http://hotline.ua/knigi/">
				</div>
			</div>

			<div class="form-group col-xs-6">
				<div class="parserRule ">
					<label for="parserRule">Rule</label>
					<input type="text" class="form-control" id="parserRule" placeholder="Rule" value="ul[class=book-tabl] li" >
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
			</div></div>


			<!--
			<div class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Warning!</strong> Developer mode enabled! Please enable active mode to show all parsers!
			</div>-->


			<div id="table_parsing_result"></div>

			<!--
			<table class="table table-striped parseResult">
				<thead>
					<tr></th><th>ID</th><th>Image</th><th>Information</th><th style="width: 30px;"></th><th style="width: 30px;"></th></tr>
				</thead>
				<tbody >
					<?php $count=0;foreach($html->find('.book-tabl li') as $element):$count++;?>
						<tr>
							<td class="id-article"><?=$count?></td>
							<td><?='<img src=http://hotline.ua/'.$element->children(0)->children(0)->src.'>'?></td>
							<td><?=iconv("utf-8","windows-1251",$element->plaintext)?></td>
							<td><i class="fa fa-edit text-muted cursor" id='element_OP_edit'></i></td>
							<td><i class="fa fa-remove text-muted cursor" id='element_OP_delete'></i></td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>-->
		</div>
	</div>
</div>