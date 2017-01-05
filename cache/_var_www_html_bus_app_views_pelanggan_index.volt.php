<style>
.cursor:hover{
  cursor: pointer;
  color: #ccc;
}
td {
  font-size: 12px;
}
</style>
<section class="content-header animated fadeIn">
  <h1>Pelanggan</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>Data Master</li>
    <li class="active">pelanggan</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Pelanggan</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah" onclick="clear_form()">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="table" class="table table-bordered">
              <thead class="bg-blue">
                <tr>
                  <td align="center" width="30">
                    <b>NO</b>
                  </td>
                  <td align="center" width="120">
                    <b>ACTION</b>
                  </td>
                  <td align="center" width="220">
                    <b>NAMA PELANGGAN</b>
                  </td>
                  <td align="center" width="150">
                    <b>TELPON</b>
                  </td>
                  <td align="center">
                    <b>ALAMAT</b>
                  </td>
                </tr>
              </thead>
              <tbody id="list_view">
                <?php $no = 1; ?>
                <?php foreach ($pelanggan as $x) { ?>
                <tr id="del<?= $x->id ?>">
                  <td align="center"><?= $no ?></td>
                  <td align="center">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Tambah" onclick="edit(<?= $x->id ?>)">
                      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> Edit
                    </button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Deleted" onclick="dlt(<?= $x->id ?>, '<?= $x->nama ?>')">
                      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i> Hapus
                    </button>
                  </td>
                  <td><?= $x->nama ?></td>
                  <td><?= $x->telp ?></td>
                  <td><?= $x->alamat ?></td>
                </tr>
                <?php $no = $no + 1; ?>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>


<!-- include modal -->
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
<div class="modal fade" id="Deleted" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Delete Pelanggan</h4>
      </div>

      <form name="deleted" method="POST" data-delete="data-delete">
        <div class="modal-body">
          <input type="hidden" name="id" id="id_delete" value="">
          <p>Apakah anda yakin akan menghapus pelanggan "<span id="nama" class="text-success"></span>"</p>
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
// datatables
$('#table').DataTable({
	ordering: false
});

// ajax
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
        new PNotify({
          title: response.title,
          text: response.text,
          type: response.type
        });
        update_page('Pelanggan', 'page_pelanggan');
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

    // console.log(action);
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

        update_page('Pelanggan', 'page_pelanggan');
        $('#del'+response.id).fadeOut(700);
        $('#Deleted').modal('hide');
      }
    });

    e.preventDefault();
  });

})();

function list() {
  $.ajax({
    type: 'GET',
    url: '<?= $this->url->get('Pelanggan/list') ?>',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response);
    }
  });
}

$("[data-mask]").inputmask({mask: "999999999999999", placeholder: "",});

function edit(id) {
  var modal = $('#Tambah');
  modal.find('form[name="pelanggan"]').attr('action', 'Pelanggan/update/'+id);
  var btn = modal.find('button[type="submit"]');
  btn.attr('class', 'btn btn-primary').text('Save Update');
  modal.find('#label_pelanggan').text('Update pelanggan');
  $.ajax({
    type: 'GET',
    url: '<?= $this->url->get('Pelanggan/detail/') ?>'+id,
    dataType:'json',
    success: function(response){
      $.each(response, function (key, value) {
        modal.find('form[name="pelanggan"] [name="'+key+'"]').val(value);
      });
    }
  });
}

function dlt(id, nama) {
  $('#Deleted').find('form[name="deleted"]').attr('action', 'Pelanggan/deleted/'+id);
  $('#Deleted').find('#nama').text(nama );
}

function clear_form(id) {
	var modal = $('#Tambah');
  var btn = modal.find('button[type="submit"]');
  btn.attr('class', 'btn btn-success').text('Save');
  modal.find('#label_pelanggan').text('Input pelanggan');

  modal.find('form[name="pelanggan"]').attr('action', '<?= $this->url->get('Pelanggan/input') ?>');
  modal.find('form[name="pelanggan"] [name]').val('');
  if (id == 1) {
    $('#Tambah').modal('hide');
  }
}
</script>