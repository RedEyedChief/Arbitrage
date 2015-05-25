<div class="col-sm-8 admin-panel">
		  <h3><i class="fa fa-tasks"></i> Parsing</h3>
		  <hr>
		  
<div class="panel-body">
		  
		  <form class="form-inline row">
		  <div class="form-group col-xs-6">
		    <label for="parserURL">URL</label>
		    <input type="text" class="form-control" id="parserURL" placeholder="http://www.hotline.ua/books/" value="http://www.hotline.ua/books/" readonly>
		  </div>
		  <div class="form-group col-xs-3">
		    <label for="parserID">Parser ID</label>
		    <input type="email" class="form-control" id="parserID" width="1em" placeholder="0" value="0" readonly>
		  </div>
		  <div id="doParse" class="btn btn-success col-xs-2">Parse!</div>
		</form>
		  <hr>
				    
		  <div id="parseResult" style="display: none;">
				    <div class="alert alert-warning alert-dismissible" role="alert">
					    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					    <strong>Warning!</strong> Developer mode enabled! Please enable active mode to show all parsers!
				    </div>
				    <table class="table table-striped parseResult">
					  <thead>
					    <tr></th><th>Image</th><th>Name</th><th>Author</th><th>Price</th></tr>
					  </thead>
					  <tbody >
						  <?php foreach($html->find('.book-tabl li') as $element):?>
							  <tr>
								  <td><?='<img src=http://hotline.ua/'.$element->children(0)->children(0)->src.'>'?></td>
								  <td><?=iconv("utf-8","windows-1251",$element->children(1)->children(0)->plaintext)?></td>
								  <td><?=str_replace(iconv("utf-8","windows-1251", $element->children(1)->children(1)->children(0)->plaintext)
								  ,'',iconv("utf-8","windows-1251",$element->children(1)->children(1)->plaintext ))?></td>
								  <td><?=iconv("utf-8","windows-1251",$element->children(2)->children(0)->plaintext)?></td>
								  
							  </tr>
						  <?php endforeach;?>
					  </tbody>
				    </table>
		  </div>
			
	    </div></div>