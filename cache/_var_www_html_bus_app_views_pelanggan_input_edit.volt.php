<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_booking">Input Pelanggan</h4>
      </div>

      <form method="POST" data-remote="data-remote">
        <div class="modal-body">
          <div class="row">
            <!-- left -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama pelanggan</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Pelanggan">
              </div>
              <div class="form-group">
                <label>Nomor Telpon</label>
                <input type="text" name="telp" class="form-control" placeholder="Nomor Telpon">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat">
              </div>
              <div class="form-group">
                <label>Kota</label>
                <input type="text" name="kota" class="form-control" placeholder="Kota">
              </div>
            </div>
            <!-- right -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Instansi</label>
                <input type="text" name="instansi" class="form-control" placeholder="instansi">
              </div>
              <div class="form-group">
                <label>Telpon Instansi</label>
                <input type="text" name="telp_instansi" class="form-control" placeholder="Telpon Instansi">
              </div>
              <div class="form-group">
                <label>Alamat Instansi</label>
                <input type="text" name="alamat_instansi" class="form-control" placeholder="Alamat Instansi">
              </div>
              <div class="form-group">
                <label>Type Pelanggan</label>
                <input type="text" name="type" class="form-control" placeholder="Type Pelanggan">
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