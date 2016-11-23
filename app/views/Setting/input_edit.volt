<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form(0)">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_setting">Input Driver</h4>
      </div>

      <form name="settings" action="{{ url('Setting/input') }}" method="POST" data-remote="data-remote">
        <div class="modal-body">
          <div class="form-group">
            <label>Name Setting</label>
            <input type="text" name="name" class="form-control" placeholder="Name Setting">
          </div>
          <div class="form-group">
            <label>Setting</label>
            <textarea name="setting" class="form-control" placeholder="Input Setting ..." style="height:100px;"></textarea>  
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form(0)">Close</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>