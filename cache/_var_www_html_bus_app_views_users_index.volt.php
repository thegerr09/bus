<style>
.cursor:hover{
  cursor: pointer;
  color: #ccc;
}
</style>
<section class="content-header animated fadeIn">
  <h1>Users</h1>
  <ol class="breadcrumb">
    <li><a href="<?= $this->url->get() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="<?= $this->url->get('Data/users') ?>">Data</a></li>
    <li class="active">users</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Users</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <td align="center" width="50">
                    <b>No</b>
                  </td>
                  <td align="center" width="15%">
                    <b>Action</b>
                  </td>
                  <td align="center">
                    <b>Name</b>
                  </td>
                  <td align="center" width="15%">
                    <b>Username</b>
                  </td>
                  <td align="center" width="22%">
                    <b>Email</b>
                  </td>
                  <td align="center" width="18%">
                    <b>Handphone</b>
                  </td>
                </tr>
              </thead>
              <tbody id="list_view">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- popup -->
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

<!-- js -->
<script>
(function() {

  $('form[data-remote]').on('submit', function(e) {
    var form = $(this);
    var url = form.prop('action');

    $.ajax({
      type: 'POST',
      url: url,
      dataType:'json',
      data: form.serialize(),
      success: function(response){
        console.log(response);
        // new PNotify({
        //   title: response.title,
        //   text: response.text,
        //   type: response.type
        // });
        // reload_pages(response.link, response.storage);
        // clear_form(response.close);
        // list();
      }
    });

    e.preventDefault();
  });

})();

function list() {
  $.ajax({
    type: 'GET',
    url: '<?= $this->url->get('Users/list') ?>',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response);
    }
  });
}


$(document).ready(function() {
  list();
});
</script>