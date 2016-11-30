<style>
.cursor{
  font-size: 18px;
}
.cursor:hover{
  cursor: pointer;
  color: #ccc;
}
</style>
<section class="content-header animated fadeIn">
  <h1>Bus</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>Data Master</li>
    <li class="active">bus</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Bus</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah" onclick="clear_form()">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive" id="list_view">
            <table id="example" class="table table-bordered">
              <thead>
                <tr>
                  <th>List Bus</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($bus as $x) { ?>
                <tr id="del<?= $x->id ?>">
                  <td>
                    <div class="col-md-2" align="center">
                      <?= $this->tag->image(['img/bus/' . $x->image, 'class' => 'img-rounded', 'width' => '150', 'height' => '150', 'style' => 'margin-bottom: 10px;']) ?>
                    </div>
                    <div class="col-md-10">
                      <h3><b><?= $x->type ?> | <?= $x->merk ?></b></h3>
                      <table class="table">
                        <tr>
                          <td width="120"><b>Tahun Beli</b></td>
                          <td> : </td>
                          <td><?= $x->tahun_beli ?></td>
                          <td width="120"><b>Tanggal Pajak</b></td>
                          <td> : </td>
                          <td><?= $x->tanggal_pajak ?></td>
                          <td width="100"><b>Nomor Polisi</b></td>
                          <td> : </td>
                          <td><?= $x->nomor_polisi ?></td>
                        </tr>
                        <tr>
                          <td><b>Tahun Perakitan</b></td>
                          <td> : </td>
                          <td><?= $x->tahun_perakitan ?></td>
                          <td><b>Nominal Pajak</b></td>
                          <td> : </td>
                          <td>Rp. <?php echo number_format($x->nominal_pajak, 0, '.', '.'); ?>,-</td>
                          <td><b>Kondisi</b></td>
                          <td> : </td>
                          <td>
                            <div class="form-group">
                            <?php if ($x->kondisi == 'N') { ?>
                            <label class="usergroup">
                              <input type="checkbox" class="flat-blue check" value="<?= $x->id ?>" checked>
                              <span class="label bg-green" id="status_kondisi<?= $x->id ?>">Kondisi Baik</span>
                            </label>
                            <?php } else { ?>
                            <label class="usergroup">
                              <input type="checkbox" class="flat-blue check" value="<?= $x->id ?>">
                              <span class="label bg-red" id="status_kondisi<?= $x->id ?>">Kondisi Rusak</span>
                            </label>
                            <?php } ?>
                            </div>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-md-12">
                      <i class="fa fa-edit cursor" data-toggle="modal" data-target="#Tambah" onclick="update(<?= $x->id ?>)"></i> | 
                      <i class="fa fa-trash cursor" data-toggle="modal" data-target="#Delete" onclick="deleted(<?= $x->id ?>, '<?= $x->nomor_polisi ?>')"></i> |
                      <i class="fa fa-list cursor"></i> |
                      <?php if ($x->active == 'Y') { ?>
                      <i class="fa fa-power-off cursor text-green" style="font-size:18px;" id="button_status<?= $x->id ?>" onclick="status_action(<?= $x->id ?>, 'N', 'red')"></i> |
                      <span class="label bg-green" id="label_status<?= $x->id ?>">active</span>
                        <?php if ($x->status == 1) { ?>
                        <span id="kondisi<?= $x->id ?>">| <span class="label bg-purple">Sudah Dibooking</span></span>
                        <?php } elseif ($x->status == 2) { ?>
                        <span id="kondisi<?= $x->id ?>">| <span class="label bg-yellow">Dalam Perjalanan ...</span></span>
                        <?php } else { ?>
                        <span id="kondisi<?= $x->id ?>">| <span class="label bg-blue">Free</span></span>
                        <?php } ?>
                      <?php } else { ?>
                      <i class="fa fa-power-off cursor text-red" style="font-size:18px;" id="button_status<?= $x->id ?>" onclick="status_action(<?= $x->id ?>, 'Y', 'green')"></i> |
                      <span class="label bg-red" id="label_status<?= $x->id ?>">not active</span>
                        <?php if ($x->status == 1) { ?>
                        <span id="kondisi" style="display:none;">| <span class="label bg-purple">Sudah Dibooking</span></span>
                        <?php } elseif ($x->status == 2) { ?>
                        <span id="kondisi" style="display:none;">| <span class="label bg-yellow">Dalam Perjalanan ...</span></span>
                        <?php } else { ?>
                        <span id="kondisi" style="display:none;">| <span class="label bg-blue">Free</span></span>
                        <?php } ?>
                      <?php } ?>
                    </div>
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

<!-- include popup -->
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form(0)">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_bus">Input Bus</h4>
      </div>

      <form name="form" action="<?= $this->url->get('Bus/input') ?>" method="POST" enctype="multipart/form-data" data-remote="data-remote">
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
              <?= $this->tag->image(['img/bus/bus.jpg', 'width' => '150', 'height' => '150', 'id' => 'uploadPreview', 'class' => 'img-rounded']) ?>
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
<div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Delete Bus</h4>
      </div>

      <form name="delete" action="<?= $this->url->get('Bus/delete') ?>" method="POST" data-delete="data-delete">
        <div class="modal-body">
          <input type="hidden" name="id" id="id_delete" value="">
          <p>Apakah anda yakin akan menghapus Bus "<span id="bus" class="text-red"></span>" ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default close_btn" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- include JS -->
<script>
$(function () {
  $('#example').DataTable();
});

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
        update_page('Bus', 'page_bus');
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
        update_page('Bus', 'page_bus');
      }
    });

    e.preventDefault();
  });

})();

function detail() {
  $.ajax({
    type: 'GET',
    url: '<?= $this->url->get('Bus/detail') ?>',
    dataType:'html',
    success: function(response){
      $('#detail_view').html(response);
    }
  });
}

function deleted(id, bus) {
  $('input#id_delete').val(id);
  $('span#bus').text(bus);
}

function update(id) {
  $('#label_bus').text('Update Bus');
  $('form[name="form"]').attr('action', '<?= $this->url->get('Bus/update/') ?>'+id);
  var btn_submit = $('form[name="form"]').find('button[type="submit"]');
  btn_submit.removeClass('btn-success');
  btn_submit.addClass('btn-primary');
  btn_submit.text('Save Update');

  $.ajax({
    type: 'GET',
    url: '<?= $this->url->get('Bus/detail/') ?>'+id,
    dataType:'json',
    success: function(response){
      $.each(response, function(key, value) {
        $('form[name="form"]').find('[name="'+key+'"]')
          .not('input[name="image"]')
          .val(value);
        if (key == 'image') {
          $('input[name="remove_image"]').val(value);
          $('#uploadPreview').attr('src', 'img/bus/'+value);
        }
      });
    }
  });
}

function list() {
  $.ajax({
    type: 'GET',
    url: '<?= $this->url->get('Bus/list') ?>',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response);
      $('input[type="checkbox"].flat-blue').iCheck({
        checkboxClass: 'icheckbox_flat-green'
      });
    }
  });
}

function status_action(id, status, clas) {
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Bus/status') ?>',
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

       if (response.type == 'error') {
         $('#kondisi'+id).hide();
       } else {
         $('#kondisi'+id).show();
       }

      update_page('Bus', 'page_bus');
    }
  });
}

function PreviewImage() {
  $('input[name="remove_image"]').val('');
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

  oFReader.onload = function (oFREvent) {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
  };
};

$(":file").filestyle({
  buttonName: "btn-default btn-xs",
  iconName: "fa fa-image",
  buttonText: "Upload Photo",
  input: false,
  badge: false
});

$("[data-cc]").inputmask({mask: "99999", placeholder: "",});

$('[data-pajak]').datetimepicker({ 
	viewMode: 'days',
    format: 'YYYY-MM-DD'
});
$('[data-tahun-perakitan]').datetimepicker({ 
	viewMode: 'years',
    format: 'YYYY'
});
$('[data-tahun-beli]').datetimepicker({ 
	viewMode: 'years',
    format: 'YYYY'
});

function clear_form(id){
  $('form[name="form"]').find('[name]').val('');
  $('#uploadPreview').attr('src', 'img/bus/bus.jpg');
  if (id == '1') {
    $('#Tambah').modal('hide');
  } else {
    $('#label_bus').text('Input Bus');
    $('form[name="form"]').attr('action', '<?= $this->url->get('Bus/input') ?>');
    var btn_submit = $('form[name="form"]').find('button[type="submit"]');
    btn_submit.removeClass('btn-primary');
    btn_submit.addClass('btn-success');
    btn_submit.text('Save');
  }
}

$('input[type="checkbox"].flat-blue').iCheck({
	checkboxClass: 'icheckbox_flat-green'
});

$('.usergroup').on('ifChecked', 'input[type="checkbox"].flat-blue.check', function(event) {
  var id = $(this).val();

	$.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Bus/kondisi') ?>',
    dataType:'json',
    data: 'id='+id+'&kondisi=N',
    success: function(response){
      new PNotify({
        title: response.title,
        text: response.text,
        type: response.type,
        icon: response.icon
      });
      $("#status_kondisi"+id).removeClass()
        .addClass('label bg-'+response.class)
        .text(response.label);

      update_page('Bus', 'page_bus');
    }
  });
}).on('ifUnchecked', 'input[type="checkbox"].flat-blue.check', function(event) {
  var id = $(this).val();

  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Bus/kondisi') ?>',
    dataType:'json',
    data: 'id='+id+'&kondisi=Y',
    success: function(response){
      new PNotify({
        title: response.title,
        text: response.text,
        type: response.type,
        icon: response.icon
      });
      $("#status_kondisi"+id).removeClass()
        .addClass('label bg-'+response.class)
        .text(response.label);

      update_page('Bus', 'page_bus');
    }
  });
});

</script>