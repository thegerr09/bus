<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_pelanggan">Input Pelanggan</h4>
      </div>

      <form name="pelanggan" method="POST" data-remote="data-remote">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Nama pelanggan</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Pelanggan">
              </div>
              <div class="form-group">
                <label>Nomor Telpon</label>
                <input type="text" name="telp" data-mask class="form-control" placeholder="Nomor Telpon">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
              </div>
              <div class="form-group">
                <label>Kota</label>
                <input type="text" name="kota" class="form-control" placeholder="Kota">
              </div>
              <div class="form-group">
                <label>Instansi</label>
                <input type="text" name="instansi" class="form-control" placeholder="instansi">
              </div>
              <div class="form-group">
                <label>Telpon Instansi</label>
                <input type="text" name="telp_instansi" data-mask class="form-control" placeholder="Telpon Instansi">
              </div>
              <div class="form-group">
                <label>Alamat Instansi</label>
                <textarea name="alamat_instansi" class="form-control" placeholder="Alamat Instansi"></textarea>
              </div>
              <div class="form-group">
                <label>Type Pelanggan</label>
                <select class="form-control" name="tipe_pelanggan">
                  <option value="">Pilih Tipe Pelanggan</option>
                  <option value="agen">Agen</option>
                  <option value="umum">Umum</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>