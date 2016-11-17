<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Input User</h4>
      </div>
      <form name="form" action="{{ url('Users/input') }}" method="POST" enctype="multipart/form-data" data-remote="data-remote">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama lengkap</label>
                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required>
              </div>
              <div class="form-group">
                <label>Address</label>
                <textarea name="address" class="form-control" placeholder="Alamat Lengkap" required></textarea>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="email" required>
              </div>
              <div class="form-group">
                <label>Facebook</label>
                <input type="text" name="facebook" class="form-control" placeholder="Facebook" required>
              </div>
              <div class="form-group">
                <label>Handphone</label>
                <input type="text" name="handphone" class="form-control" data-mask placeholder="Nomor Handphone" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Usergroup</label>
                  <div class="form-group">
                    {% for ug in group %}
                    <label class="usergroup">
                      <input type="checkbox" class="flat-blue" name="usergroup[]" id="data{{ ug.id }}" value="{{ ug.id }}"> {{ ug.usergroup }}
                    </label><br>
                    {% endfor %}
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Upload Foto</label>
                    <input type="file" class="filestyle" name="image" id="uploadImage" onchange="PreviewImage()">
                    <input type="hidden" name="remove_image">
                  </div>
                  {{ image("img/users/users.png", "width":"150", "height":"150", "id":"uploadPreview", "class":"img-rounded") }}
                </div>
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