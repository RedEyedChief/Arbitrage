</div> <!-- end: Content -->

<div class="modal" id="addWidgetModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title">Add Widget</h4>
      </div>
      <div class="modal-body">
        <p>Add a widget stuff here..</p>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dalog -->
</div><!-- /.modal -->


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4><?=$this->lang->line('list_remove_sure')?></h4>
            </div>
            <div class="modal-body">
                <h5><?=$this->lang->line('list_remove_type')?> : <span id="removeType"></span></h5>
                <h5><?=$this->lang->line('list_remove_id')?> : <span id="removeId"></span></h5>
                <h5><?=$this->lang->line('list_remove_name')?> : <span id="removeName"></span></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$this->lang->line('list_remove_cancel')?></button>
                <a class="btn btn-danger danger confirm-delete"><?=$this->lang->line('list_remove_confirm')?></a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form id="formEdit">
        <div class="modal-content">
            <div class="modal-header">
                <h4><?=$this->lang->line('list_edit')?></h4>
            </div>
            <div class="modal-body">
                <div id="editorFields" style="font-family: 'FontAwesome','Helvetica Neue', Helvetica, Arial, sans-serif">
                  
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$this->lang->line('list_remove_cancel')?></button>
                <button type="submit" class="btn btn-primary primary confirm-edit"><?=$this->lang->line('list_edit_confirm')?></button>
            </div>
        </div>
      </form>
    </div>
</div>

<script src="/static/admin/script/dashboard.js"></script>
<script src="/static/site/script/manage.js"></script>
</body>
</html>