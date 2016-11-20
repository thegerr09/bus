<div class="modal fade" id="Update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Update Acl</h4>
      </div>

      <form name="update" action="{{ url('Acl/update') }}" method="POST" data-remote="data-remote">
        <input type="hidden" name="id" id="u_id">
        <div class="modal-body">
          <div class="form-group">
            <label>Controller</label>
            <input type="text" name="controller" id="u_controller" class="form-control" placeholder="Controller">
          </div>
          <div class="form-group">
            <label>Action</label>
            <input type="text" name="actions" id="u_actions" class="form-control" placeholder="Action"> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>

    </div>
  </div>
</div>