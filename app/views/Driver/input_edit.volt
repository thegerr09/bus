<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form(0)">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_driver">Input Driver</h4>
      </div>

      <form name="form" action="{{ url('Driver/input') }}" method="POST" enctype="multipart/form-data" data-remote="data-remote">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" placeholder="Alamat lengkap driver ..."></textarea>  
          </div>
          <div class="form-group">
            <label>Nomor Telpon</label>
            <input type="text" name="telpon" class="form-control" data-mask placeholder="Nomor Telpon">
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" placeholder="Keterangan driver ..."></textarea>  
          </div>
          <div class="form-group">
            <label>Foto Driver</label>
            <input type="file" class="filestyle" name="image" id="uploadImage" value="img/driver/users.png" onchange="PreviewImage()">
            <input type="hidden" name="remove_image">
            <div align="center" style="margin-top:10px;">
              {{ image("img/driver/users.png", "width":"150", "height":"150", "id":"uploadPreview", "class":"img-rounded") }}
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