<style>
.cursor:hover{
  cursor: pointer;
  color: #ccc;
}
.usergroup{
  cursor: pointer;
  color: #807c7c;
}
</style>
<section class="content-header animated fadeIn">
  <h1>Users</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>Data</li>
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
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah" onclick="clear_form()">
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
                  <td align="center" width="16%">
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
                <?php $no = 1; ?>
                <?php foreach ($users as $x) { ?>
                <tr id="del<?= $x->id ?>">
                  <td align="center"><?php echo $no++; ?></td>
                  <td style="vertical-align:middle;">
                    <i class="fa fa-edit cursor" style="font-size:18px;" data-toggle="modal" data-target="#Tambah" onclick="update(<?= $x->id ?>)"></i> |
                    <i class="fa fa-trash cursor" style="font-size:18px;" data-toggle="modal" data-target="#Delete" onclick="deleted(<?= $x->id ?>, '<?= $x->username ?>')"></i> |
                    <?php if ($x->active == 'Y') { ?>
                    <i class="fa fa-power-off cursor text-green" style="font-size:18px;" id="button_status<?= $x->id ?>" onclick="status_action(<?= $x->id ?>, 'N', 'red')"></i> |
                    <span class="label bg-green" id="label_status<?= $x->id ?>">active</span>
                    <?php } else { ?>
                    <i class="fa fa-power-off cursor text-red" style="font-size:18px;" id="button_status<?= $x->id ?>" onclick="status_action(<?= $x->id ?>, 'Y', 'green')"></i> |
                    <span class="label bg-red" id="label_status<?= $x->id ?>">not active</span>
                    <?php } ?>
                  </td>
                  <td><?= $x->name ?></td>
                  <td><?= $x->username ?></td>
                  <td>
                    <?= $x->email ?>
                  </td>
                  <td align="center">
                    <?= $x->handphone ?>
                  </td>
                </tr>
                <?php } ?>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Input User</h4>
      </div>
      <form name="form" action="<?= $this->url->get('Users/input') ?>" method="POST" enctype="multipart/form-data" data-remote="data-remote">
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
                    <?php foreach ($group as $ug) { ?>
                    <label class="usergroup">
                      <input type="checkbox" class="flat-blue" name="usergroup[]" id="data<?= $ug->id ?>" value="<?= $ug->id ?>"> <?= $ug->usergroup ?>
                    </label><br>
                    <?php } ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Upload Foto</label>
                    <input type="file" class="filestyle" name="image" id="uploadImage" onchange="PreviewImage()">
                    <input type="hidden" name="remove_image">
                  </div>
                  <?= $this->tag->image(['img/users/users.png', 'width' => '150', 'height' => '150', 'id' => 'uploadPreview', 'class' => 'img-rounded']) ?>
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
<div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Delete User </h4>
      </div>

      <form name="delete" action="<?= $this->url->get('Users/delete') ?>" method="POST" data-delete="data-delete">
        <div class="modal-body">
          <input type="hidden" name="id" id="id_delete" value="">
          <p>Apakah anda yakin akan menghapus user "<span id="user" class="text-success"></span>"</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default close_btn" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
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
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(response){
        new PNotify({
          title: response.title,
          text: response.text,
          type: response.type
        });
        update_page('Users', 'page_users');
        clear_form(response.close);
        list();
      }
    });

    e.preventDefault();
  });

})();


(function() {

  $('form[data-delete]').on('submit', function(e) {
    var form = $(this);
    var url = form.prop('action');

    $.ajax({
      type: 'POST',
      url: url,
      dataType:'json',
      data: form.serialize(),
      success: function(response){
        new PNotify({
          title: response.title,
          text: response.text,
          type: response.type
        });
        $('#Delete').modal('hide');
        $('#del'+response.id).fadeOut(1000);
        update_page(response.link, response.storage);
      }
    });

    e.preventDefault();
  });

})();

function deleted(id, user) {
  $('input#id_delete').val(id);
  $('#user').text(user);
}

function update(id) {
  $('#label_users').text('Update Users');
  $('form[name="form"]').attr('action', '<?= $this->url->get('Users/update/') ?>'+id);
  var btn_submit = $('form[name="form"]').find('button[type="submit"]');
  btn_submit.removeClass('btn-success');
  btn_submit.addClass('btn-primary');
  btn_submit.text('Save Update');

  $.ajax({
    type: 'GET',
    url: '<?= $this->url->get('Users/detail/') ?>'+id,
    dataType:'json',
    success: function(response){
      $.each(response, function(key, value) {
        $('form[name="form"]').find('[name="'+key+'"]')
          .not('input[name^="usergroup"]')
          .not('input[name="image"]')
          .not('input[name="password"]')
          .val(value);
        if (key == 'image') {
          $('input[name="remove_image"]').val(value);
          $('#uploadPreview').attr('src', 'img/users/'+value);
        }
        var str = response.usergroup;
        var res = str.split(",");
        for (var i = 0; i < res.length; i++) {
          $('input[type="checkbox"].flat-blue#data'+res[i]).iCheck('check');
        }
      });
    }
  });
}

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

function clear_form(id){
  $('form[name="form"]').find('[name]').not('input[name^="usergroup"]').val('');
  $('input[type="checkbox"].flat-blue').iCheck('uncheck');
  $('#uploadPreview').attr('src', 'img/users/users.png');
  if (id == '1') {
    $('#Tambah').modal('hide');
  } else {
    $('#label_users').text('Input Users');
    $('form[name="form"]').attr('action', '<?= $this->url->get('Users/input') ?>');
    var btn_submit = $('form[name="form"]').find('button[type="submit"]');
    btn_submit.removeClass('btn-primary');
    btn_submit.addClass('btn-success');
    btn_submit.text('Save');
  }
}

function status_action(id, status, clas) {
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Users/status') ?>',
    dataType:'json',
    data: 'id='+id+'&active='+status+'&class='+clas,
    success: function(response){
      new PNotify({
        title: response.title,
        text: response.text,
        type: response.type,
        icon: response.icon
      });
      $("#button_status"+id).removeClass()
        .addClass('fa fa-power-off cursor text-'+response.class)
        .attr("onclick", "status_action("+id+", '"+response.status+"', '"+response.class+"')");

      $("#label_status"+id).removeClass()
        .addClass('label bg-'+response.class)
        .text(response.label);

      update_page('Users', 'page_users');
    }
  });
}

$('input[type="checkbox"].flat-blue').iCheck({
  checkboxClass: 'icheckbox_flat-blue'
});

$("[data-mask]").inputmask({mask: "99999999999999", placeholder: "",});

$(":file").filestyle({
  buttonName: "btn-default",
  iconName: "fa fa-image",
  buttonText: "Upload Photo",
  input: false,
  badge: false
});

function PreviewImage() {
  $('input[name="remove_image"]').val('');
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

  oFReader.onload = function (oFREvent) {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
  };
};
</script>