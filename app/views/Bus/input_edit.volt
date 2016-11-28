<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form(0)">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_bus">Input Bus</h4>
      </div>

      <form name="form" action="{{ url('Bus/input') }}" method="POST" enctype="multipart/form-data" data-remote="data-remote">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Ukuran</label>
                <select name="ukuran" class="form-control">
                  <option value="">Ukuran BUS</option>
                  <option value="medium">BUS MEDIUM</option>
                  <option value="big">BUS BIG</option>
                </select>
              </div>
              <div class="form-group">
                <label>Nomor Polisi</label>
                <input type="text" name="nomor_polisi" class="form-control" placeholder="Nomor Polisi">
              </div>
              <div class="form-group">
                <label>Nomor Pemilik</label>
                <input type="text" name="nama_pemilik" class="form-control" placeholder="Nomor Pemilik">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" placeholder="Alamat ..."></textarea>
              </div>
              <div class="form-group">
                <label>Merk</label>
                <input type="text" name="merk" class="form-control" placeholder="Merk">
              </div>
              <div class="form-group">
                <label>Type</label>
                <input type="text" name="type" class="form-control" placeholder="Type">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Tahun Perakitan</label>
                <input type="years" name="tahun_perakitan" data-tahun-perakitan class="form-control" placeholder="Tahun Perakitan">
              </div>
              <div class="form-group">
                <label>Tahun Beli</label>
                <input type="text" name="tahun_beli" data-tahun-beli class="form-control" placeholder="Tahun Beli">
              </div>
              <div class="form-group">
                <label>CC</label>
                <input type="text" name="cc" maxlength="5" data-cc class="form-control" placeholder="CC">
              </div>
              <div class="form-group">
                <label>Nomor Rangka</label>
                <input type="text" name="nomor_rangka" class="form-control" placeholder="Nomor Rangka">
              </div>
              <div class="form-group">
                <label>Nomor Mesin</label>
                <input type="text" name="nomor_mesin" class="form-control" placeholder="Nomor Mesin">
              </div>
              <div class="form-group">
                <label>Nomor BPKB</label>
                <input type="text" name="nomor_bpkb" class="form-control" placeholder="Nomor BPKB">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Warna</label>
                <input type="text" name="warna" class="form-control" placeholder="Warna">
              </div>
              <div class="form-group">
                <label>Tanggal Pajak STNK</label>
                <div class="input-group date" data-pajak >
                  <input type="text" name="tanggal_pajak" class="form-control" placeholder="Tanggal Pajak STNK">
                  <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label>Nominal Pajak</label>
                <input type="number" name="nominal_pajak" data-nominal class="form-control" placeholder="Nominal Pajak">
              </div>
              <div class="form-group">
                <label>Upload Foto</label>
                <input type="file" class="filestyle" name="image" data-size="sm" id="uploadImage" onchange="PreviewImage()">
                <input type="hidden" name="remove_image">
              </div>
              {{ image("img/bus/bus.jpg", "width":"150", "height":"150", "id":"uploadPreview", "class":"img-rounded") }}
            </div>
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