<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_jurnal">Input Jurnal</h4>
      </div>

      <form name="jurnal" action="<?= $this->url->get('Jurnal/input') ?>" method="POST" data-remote="data-remote">
        <input type="hidden" name="id">
        <div class="modal-body">
          <div class="form-group">
            <label>Tanggal</label>
            <input type="text" name="tanggal" id="tanggal" class="form-control" placeholder="Tanggal">
          </div>
          <div class="form-group">
            <label>Kantor</label>
            <select name="kantor" class="form-control">
              <option value="">Pilih Kantor</option>
              <option value="GALATAMA 1" selected="true">Galatama 1</option>
            </select>
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" name="keterangan" placeholder="Keterangan Jurnal ..."></textarea>
          </div>
          <table id="jurnal_child"></table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>