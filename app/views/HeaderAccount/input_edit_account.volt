<div class="modal fade" id="TambahAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_header">Input Account</h4>
      </div>

      <form name="account" action="{{ url('HeaderAccount/input/account') }}" method="POST" data-remote="data-remote">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Account</label>
            <input type="text" name="account" class="form-control" placeholder="Nama account">
          </div>
          <div class="form-group">
            <label>Header</label>
            <select name="jenis" class="form-control">
              <option value="">Pilih Header</option>
              <option value="debet">Debet</option>
              <option value="kredit">Kredit</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>