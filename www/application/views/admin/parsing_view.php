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

			<div id="list_OP">
			<!--
			<form class="form-inline form-add">
                <div class="form-group">
                    <div class="input-group">
                        <div class="form-control bg_eee" style="width: 42px;">ID</div>
                        <div class="input-group-addon"></div>
                        <input type="text" class="form-control" value="Adress" style="cursor:default" readonly>
                        <div class="input-group-addon"></div>
                        <input type="text" class="form-control" value="Rule" style="cursor:default" readonly>
                        <div class="input-group-addon"></div>
                        <input type="text" class="form-control" value="Product" style="cursor:default" readonly>
                        <div class="input-group-addon"></div>
                        <input type="text" class="form-control" value="Category" style="cursor:default" readonly>
                        <div class="input-group-addon"></div>
                        <div class="form-control bg_eee"><i class="fa fa-list-ul text-muted"></i></div>
                        <div class="input-group-addon"></div>
                        <div class="form-control bg_eee"><i class="fa fa-remove text-muted "></i></div>
                    </div>
                </div>
            </form>

			<//?php if($parsers == '') echo '<div class="alert alert-warning margin_top_10px"> <strong>' . 'List of OP is empty !' . '</strong> </div>';
				else foreach ($parsers as $item):?>
            <form class="form-inline form-add">
                <div class="form-group" id="form_group_OP">
                    <div class="input-group" id="element_OP">
                        <div class="form-control" style="width: 42px;"><?=$item->idParser?></div>
                        <div class="input-group-addon"></div>
                        <input type="text" class="form-control" id="adressParser" value='<?=$item->adressParser?>'>
                        <div class="input-group-addon"></div>
                        <input type="text" class="form-control" id="rurlesParser" value='<?=$item->rurlesParser?>'>
                        <div class="input-group-addon"></div>
                        <input type="text" class="form-control" id="nameProduct" value='<?=$item->nameProduct?>'>
                        <div class="input-group-addon"></div>
                        <input type="text" class="form-control" id="categoryProduct" value='<?=$item->categoryProduct?>'>
                        <div class="input-group-addon"></div>
                        <div class="form-control "><i class="fa fa-list-ul text-muted cursor" onclick="get_elements_OP(this)"></i></div>
                        <div class="input-group-addon"></div>
                        <div class="form-control "><i class="fa fa-remove text-muted cursor" onclick="OP_delete(this)"></i></div>
                    </div>
                </div>
            </form>
            <//?php endforeach;?> -->
			</div>


			<!--
			<div id="empty_OP" style="display: none;">
				<div class="alert alert-warning"> <strong> List of OP is empty ! </strong> </div>
			</div> -->




			<!--
            <form class="form-inline form-add">
                        	<div class="form-group">
                        		<div class="input-group">
                        			<div class="form-control ">#</div>
                        			<div class="input-group-addon"></div>
                        			<input type="text" class="form-control" name="nameItem" id="nameItem" value="Name">
                        		    <div class="input-group-addon"></div>
                        			<input type="text" class="form-control" name="priceItem" id="priceItem" value="Price">
                        			<div class="input-group-addon"></div>
                        			<input type="text" class="form-control" name="countItem" id="countItem" value="Count">
                        			<div class="input-group-addon"></div>
                        			<input type="text" class="form-control" name="typeItem" id="typeItem" value="Type">
                        			<div class="input-group-addon"></div>
                        			<input type="text" class="form-control" name="sellerItem" id="sellerItem" value="Seller">
                                    <div class="input-group-addon"></div>
                                    <div class="form-control"><i class='fa fa-edit text-muted cursor ' onclick=''> </i></div>
                                    <div class="input-group-addon"></div>
                                    <div class="form-control"><i class='fa fa-remove text-muted cursor ' onclick=''> </i></div>
                        		</div>
                        	</div>

                        </form>

            			<form class="form-inline form-add">
                        	<div class="form-group">
								<div class="input-group">
                        			<div class="form-control bg_eee">#</div>
                        			<div class="input-group-addon"></div>
                        			<input type="text" class="form-control" name="nameItem" id="nameItem" value="Name" readonly>
                        		    <div class="input-group-addon"></div>
                        			<input type="text" class="form-control" name="priceItem" id="priceItem" value="Price" readonly>
                        			<div class="input-group-addon"></div>
                        			<input type="text" class="form-control" name="countItem" id="countItem" value="Count" readonly>
                        			<div class="input-group-addon"></div>
                        			<input type="text" class="form-control" name="typeItem" id="typeItem" value="Type" readonly>
                        			<div class="input-group-addon"></div>
                        			<input type="text" class="form-control" name="sellerItem" id="sellerItem" value="Seller" readonly>
                                    <div class="input-group-addon"></div>
                                    <div class="form-control bg_eee"><i class='fa fa-edit text-muted cursor'></i></div>
                                    <div class="input-group-addon"></div>
                                    <div class="form-control bg_eee"><i class='fa fa-remove text-muted cursor'></i></div>
                        		</div>
                        	</div>

                        </form>
            			<form class="form-inline form-add">
                        	<div class="form-group">
                        		<div class="input-group">
                        			<div class="form-control ">#</div>
                                        <div class="input-group-addon"></div>
                                        <input type="text" class="form-control" name="nameItem" id="nameItem" value="Name">
                                                              		    <div class="input-group-addon"></div>
                                                              			<input type="text" class="form-control" name="priceItem" id="priceItem" value="Price">
                                                              			<div class="input-group-addon"></div>
                                                              			<input type="text" class="form-control" name="countItem" id="countItem" value="Count">
                                                              			<div class="input-group-addon"></div>
                                                              			<input type="text" class="form-control" name="typeItem" id="typeItem" value="Type">
                                                              			<div class="input-group-addon"></div>
                                                              			<input type="text" class="form-control" name="sellerItem" id="sellerItem" value="Seller">
                                                                          <div class="input-group-addon"></div>
                                                                          <div class="form-control"><i class='fa fa-edit text-muted cursor ' onclick=''> </i></div>
                                                                          <div class="input-group-addon"></div>
                                                                          <div class="form-control"><i class='fa fa-remove text-muted cursor ' onclick=''> </i></div>
                                                              		</div>
                        	</div>
                        	 </form>-->
                 <div id='for_error'></div>

		</div>


		<div class="add_op" style="display: none;">

			<!--
			<form class="form-inline form-add" id="let_parsing" action="/dashboard/parsing_request" method="POST" style="font-family: 'FontAwesome', 'Helvetica Neue', Helvetica, Arial, sans-serif">
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


			<form class="form  " id="let_parsing" action="/dashboard/parsing_request" method="POST">
				<div class="form-group row">
					<div class="parserURL col-xs-7">
						<input type="text" class="form-control" id="parserURL" placeholder="URL" value="" required="required">
					</div>
					<div class="parserRule col-xs-5">
						<input type="text" class="form-control" id="parserRule" placeholder="Rule" value="" required="required">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-xs-4">
						<input type="text" class="form-control" id="parserProductType" width="1em" placeholder="ProductType" value="" name="parserProductType" required="required">
					</div>
					<div class="col-xs-3">
						<input type="text" class="form-control" id="parserCategory" width="1em" placeholder="Category" value="" name="parserCategory" required="required">
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

			<div id="parseResult">

				<div id="parserForm" style="display: none;" >
					<form  class="form margin_top_bot_20px">
						<div class="form-group row">
							<div class="col-xs-6">
								<input type="text" class="form-control" id="parserProductName" width="1em" placeholder="ProductName" value="" name="parserProductName" required="required">
							</div>
							<div class="col-xs-2">
								<input type="number" class="form-control" id="parserPrice" width="1em" placeholder="Price" value="" name="parserPrice" min="1" required="required">
							</div>
							<div class="col-xs-2">
								<input type="number" class="form-control" id="parserCount" width="1em" placeholder="Count" value="" name="parserCount" min="1" required="required">
							</div>
							<div class="col-xs-2">
								<input type="number" class="form-control" id="parserType" width="1em" placeholder="Type" value="" name="parserType" min="1" max="2" required="required">
							</div>

						</div>
						<div class="form-group row">
							<div class="col-xs-6">
								<input type="text" class="form-control" id="parserSeller" width="1em" placeholder="Info about seller" value="" name="parserSeller"  required>
							</div>
							<div class="col-xs-2">
								<select class="form-control" name="role" id="parserMarket">
								<?php foreach($markets as $elem): ?>
                            		<option><?=$elem->name?></option>
								<?php endforeach; ?>
                            	</select>
                            	<!--
                                <input type="text" class="form-control" id="parserMarket" width="1em" placeholder="Market" value="" name="parserMarket">
                            	-->
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