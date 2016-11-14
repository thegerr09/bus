<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Input User</h4>
      </div>
      <form action="<?= $this->url->get('Users/input') ?>" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama lengkap</label>
                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap">
              </div>
              <div class="form-group">
                <label>Address</label>
                <textarea name="address" class="form-control" placeholder="Alamat Lengkap"></textarea>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="email">
              </div>
              <div class="form-group">
                <label>Facebook</label>
                <input type="text" name="facebook" class="form-control" placeholder="Facebook">
              </div>
              <div class="form-group">
                <label>Handphone</label>
                <input type="text" name="handphone" class="form-control" data-mask placeholder="Nomor Handphone">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
              <div class="form-group">
                <label>Comfirm Password</label>
                <input type="password" name="password" class="form-control" placeholder="Comfirm Password">
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Upload Foto</label>
                    <input type="file" class="filestyle" name="foto" id="uploadImage" onchange="PreviewImage()">
                  </div>
                </div>
                <div class="col-md-8" align="center" style="padding-top:15px;">
                  <?= $this->tag->image(['img/users/users.png', 'width' => '150', 'id' => 'uploadPreview', 'class' => 'img-rounded']) ?>
                </div>
                <script>
                  $(":file").filestyle({
                    buttonName: "btn-default",
                    iconName: "fa fa-image",
                    buttonText: "Upload Photo",
                    input: false,
                    badge: false
                  });

                  function PreviewImage() {
                    var oFReader = new FileReader();
                    oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

                    oFReader.onload = function (oFREvent) {
                    document.getElementById("uploadPreview").src = oFREvent.target.result;
                    };
                  };

                  $("[data-mask]").inputmask({mask: "99999999999999", placeholder: "",});
                </script>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>