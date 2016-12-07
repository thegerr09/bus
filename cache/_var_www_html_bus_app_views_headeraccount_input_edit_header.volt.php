<div class="modal fade" id="TambahHeader" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_header">Input Header</h4>
      </div>

      <form name="header" action="<?= $this->url->get('HeaderAccount/input/header') ?>" method="POST" data-remote="data-remote">
        <input type="hidden" name="id">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Header</label>
            <input type="text" name="header" class="form-control" placeholder="Nama Header">
          </div>
          <div class="form-group">
            <label>Jenis</label>
            <select name="jenis" class="form-control">
              <option value="">Pilih Jenis</option>
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