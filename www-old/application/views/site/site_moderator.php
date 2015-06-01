
<!--add article modal-->
<div id="addArticleModal" class="modal" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
          <h3 class="text-center" style="display: initial;"><?=$this->lang->line('add_article')?></h3>
      </div>
      <div class="modal-body">
	<div class="row">
          <div class="form col-md-12 center-block">
	    <?php echo form_open_multipart('/content/writePost','id="writeArticle"');?>
	      <div class="form-group">
		<input type="text" class="form-control input-sm" name="title" placeholder="<?=$this->lang->line('add_article_title_placeholder')?>" required>
	      </div>
	      <div class="form-group">
		<input type="text" class="form-control input-sm" name="description" placeholder="<?=$this->lang->line('add_article_description_placeholder')?>" required>
	      </div>
	      <div class="form-group">
		<textarea class="form-control"  rows="5" name="text" placeholder="test" style="display:none;" ></textarea>
		<div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
		  <div class="btn-group">
		    <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
		      <ul class="dropdown-menu">
		      </ul>
		    </div>
		  <div class="btn-group">
		    <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
		      <ul class="dropdown-menu">
		      <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
		      <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
		      <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
		      </ul>
		  </div>
		  <div class="btn-group">
		    <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
		    <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
		    <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
		    <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
		  </div>
		  <div class="btn-group">
		    <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
		    <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
		    <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-indent-left"></i></a>
		    <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent-right"></i></a>
		  </div>
		  <div class="btn-group">
		    <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
		    <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
		    <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
		    <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
		  </div>
		  <div class="btn-group">
			      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
				<div class="dropdown-menu input-append">
					<input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
					<button class="btn" type="button">Add</button>
		    </div>
		    <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
		  </div>
		  
		  <div class="btn-group">
		    <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture"></i></a>
		    <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
		  </div>
		  <div class="btn-group">
		    <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
		    <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
		  </div>
		  <input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="">
		</div>
		<div id="editor" name="text">
		  <?=$this->lang->line('add_article_content_placeholder')?>
		</div>
	      </div>
	      <div class="form-group">
		<!--<input id="input-2" type="file" class="file" name="img" multiple="true" data-show-upload="false" data-show-caption="true">
-->	      <input type="file" name="userfile" size="20" /></div>
	      <div class="form-group">
		<button class="btn btn-primary btn-sm btn-block"><?=$this->lang->line('add_article_add')?></button>
		
	      </div>
	    <?="</form>"?>
	  </div>
	</div>
      </div>
  </div>
  </div>
</div>

<!--add poll modal-->
<div id="addPollModal" class="modal" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
          <h3 class="text-center" style="display: initial;"><?=$this->lang->line('add_poll')?></h3>
      </div>
      <div class="modal-body">
	<div class="row">
          <form class="form col-md-12 center-block" action="/content/addPoll" method="post">
            <div class="form-group">
              <input type="text" class="form-control input-sm" name="title" placeholder="Title" required>
            </div>
	    <div class="form-group text-vote">
              <input type="text" class="form-control input-sm" name="textPollVote[]" placeholder="<?=$this->lang->line('add_poll_variant_placeholder')?>" required>
            </div>
            <div class="form-group">
              <button class="btn btn-success btn-sm btn-block add-row"><?=$this->lang->line('add_poll_add_variant')?></button>
	      <button class="btn btn-primary btn-sm btn-block" id="add-button"><?=$this->lang->line('add_poll_add')?></button>
	      <span><a href="#">Need help?</a></span>
            </div>
          </form>
	</div>
      </div>
  </div>
  </div>
</div>
