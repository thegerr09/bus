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
                  <td align="center" width="100">
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
                <tr>
                  <td align="center">1</td>
                  <td align="center">
                    <button type="button" class="btn btn-warning btn-xs">
                      <i class="fa fa-list" data-toggle="tooltip" data-placement="top" title="Detail"></i>
                    </button>
                    <button type="button" class="btn btn-primary btn-xs">
                      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-xs">
                      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                    </button>
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
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

$("[data-debetKredit]").inputmask({mask: "9999999999", placeholder: "",});

function clear_form(id) {
	var modal = $('#Tambah');
  modal.find('form').attr('action', '<?= $this->url->get('Pelanggan/input') ?>');
}
</script>