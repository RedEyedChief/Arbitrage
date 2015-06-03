<div class="col-sm-8 admin-panel">
	<h3><i class="fa fa-tasks"></i> Парсинг</h3>
	<hr>
		  
	<div class="panel-body">

		<div class="form-group row">
			<div class="col-xs-6">
        		<button  type="button" class="btn btn-primary form-control" id="view_op" onclick="view_op()">Переглянути ОП</button>
        	</div>
        	<div class="col-xs-6">
                <button  type="button" class="btn btn-info form-control" id="add_op" >Додати ОП</button>
            </div>

		</div>

		<hr>

		<div class="view_op">

			<div id="list_OP"></div>
				
			<div id="empty_OP"></div>
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
						<input type="text" class="form-control" id="parserRule" placeholder="Правило" value="" required="required">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-xs-4">
						<input type="text" class="form-control" id="parserProductType" width="1em" placeholder="Тип продукту" value="" name="parserProductType" required="required">
					</div>
					<div class="col-xs-3">
						<input type="text" class="form-control" id="parserCategory" width="1em" placeholder="Категорія" value="" name="parserCategory" required="required">
					</div>
					<div class="parserSub col-xs-5">
                		<div type="submit" id="doParse" class="btn btn-success form-control">Парсити!</div>
                	</div>
				</div>

			</form>

			<div id="parser_error" class="alert alert-danger margin_top_10px" style="display: none;">
				 <strong>Введіть дані в ці поля!</strong>
			</div>
			<div id="parser_data_error" class="alert alert-danger margin_top_10px" style="display: none;">
				 <strong>Некоректні дані в полях!</strong>
			</div>

			<hr>

			<div id="parseResult">

				<div id="parserForm" style="display: none;" >
					<form  class="form margin_top_bot_20px">
						<div class="form-group row">
							<div class="col-xs-6">
								<input type="text" class="form-control" id="parserProductName" width="1em" placeholder="Назва Продукту" value="" name="parserProductName" required="required">
							</div>
							<div class="col-xs-2">
								<input type="number" class="form-control" id="parserPrice" width="1em" placeholder="Ціна" value="" name="parserPrice" min="1" required="required">
							</div>
							<div class="col-xs-2">
								<input type="number" class="form-control" id="parserCount" width="1em" placeholder="Кількість" value="" name="parserCount" min="1" required="required">
							</div>
							<div class="col-xs-2">
							<select class="form-control" name="role" id="parserType">
                                  <option>0</option>
                                  <option>1</option>
                            </select>
                            <!--
								<input type="number" class="form-control" id="parserType" width="1em" placeholder="Type" value="" name="parserType" min="1" max="2" required="required">
							-->
							</div>

						</div>
						<div class="form-group row">
							<div class="col-xs-6">
								<input type="text" class="form-control" id="parserSeller" width="1em" placeholder="Інформація про продавця" value="" name="parserSeller"  required>
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
						<strong>Введіть дані в ці поля!</strong>
					</div>
				</div>

				<div class="progress" id="progress_parsing" style="display: none;">
                     <div class="progress-bar progress-bar-striped active"
                          role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                     </div>
                </div>

				<div id="parse_error" >
					<div id="parse_nothing_found" class="alert alert-danger" style="display: none;"> <strong> Нічого не знайдено </strong> </div>
				</div>
				
				<div id="table_parsing_result">
				</div>

				<div>
					<div class='col-xs-6'>
                        <button type='button' id='button_view_OP' class='btn btn-success btn-lg center-block col-xs-10' style="display: none;" onclick='continue_view()'>Переглянути цей ОП</button>
                    </div>
                    <div class='col-xs-6'>
                        <button type='button' id='button_abort_OP' class='btn btn-danger btn-lg center-block col-xs-10' style="display: none;" onclick='abort_parse()'>Відмінити парсинг</button>
                    </div>
                </div>

			</div>
		</div>
	</div>
</div>