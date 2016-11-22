<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form(0)">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_driver">Input Bus</h4>
      </div>

      <form name="form" action="<?= $this->url->get('Bus/input') ?>" method="POST" enctype="multipart/form-data" data-remote="data-remote">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Bus</label>
                <input type="text" name="name_bus" class="form-control" placeholder="Nama Bus">
              </div>
              <div class="form-group">
                <label>Nomor Posilisi</label>
                <input type="text" name="no_polisi" class="form-control" placeholder="Nomor Posili">
              </div>
              <div class="form-group">
                <label>Nomor Kerangka</label>
                <input type="text" name="no_rangka" class="form-control" placeholder="Nomor Kerangka">
              </div>
              <div class="form-group">
                <label>Tanggal Pajak STNK</label>
                <input type="text" name="tgl_stnk" class="form-control" placeholder="Tanggal Pajak STNK">
              </div>
            </div>
            <div class="col-md-6"></div>
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