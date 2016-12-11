<style>
td {
  font-size: 12px;
}
</style>
<section class="content-header animated fadeIn">
  <h1>Jurnal</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>Akuntansi</li>
    <li class="active">Jurnal</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Jurnal</h3>
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
                  <td align="center" width="30">NO</td>
                  <td align="center" width="120">ACTION</td>
                  <td align="center" width="120">TANGGAL</td>
                  <td align="center" width="80">NO. JURNAL</td>
                  <td align="center">KETERANGAN</td>
                  <td align="center" width="100">KANTOR</td>
                </tr>
              </thead>
              <tbody id="list_view">
                <?php $no = 1; ?>
                <?php foreach ($jurnal as $x) { ?>
                <tr>
                  <td align="center"><?= $no ?></td>
                  <td align="center">
                    <button type="button" class="btn btn-warning btn-xs">
                      <i class="fa fa-bars" data-toggle="tooltip" data-placement="top" title="Detail"></i>
                    </button>&nbsp;
                    <button type="button" class="btn btn-primary btn-xs">
                      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                    </button>&nbsp;
                    <button type="button" class="btn btn-danger btn-xs">
                      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i>
                    </button>&nbsp;
                    <button type="button" class="btn btn-default btn-xs">
                      <i class="fa fa-print" data-toggle="tooltip" data-placement="top" title="Print"></i>
                    </button>
                  </td>
                  <td align="center">
                    <?= $this->Helpers->dateChange($x->tanggal) ?>
                  </td>
                  <td align="center">
                    <?= $x->kode_jurnal ?>
                  </td>
                  <td>
                    <?= Phalcon\Text::upper($x->keterangan) ?>
                  </td>
                  <td align="center">
                    <?= $x->kantor ?>
                  </td>
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

<!-- Include popup -->
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_jurnal">Input Jurnal</h4>
      </div>

      <form name="jurnal" action="<?= $this->url->get('Jurnal/input') ?>" method="POST" data-remote="data-remote">
        <input type="hidden" name="id">
        <div class="modal-body">
          <div class="form-group">
            <label>Tanggal</label>
            <input type="text" name="tanggal" id="tanggal" class="form-control" placeholder="Tanggal">
          </div>
          <div class="form-group">
            <label>Kantor</label>
            <select name="kantor" class="form-control">
              <option value="">Pilih Kantor</option>
              <option value="GALATAMA 1" selected="true">Galatama 1</option>
            </select>
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" name="keterangan" placeholder="Keterangan Jurnal ..."></textarea>
          </div>
          <table>
            <tbody id="parent_jurnal">
              <tr>
                <td width="50%" height="40">
                  <select class="form-control" name="account[]">
                    <?= $this->Helpers->tagAccount() ?>
                  </select>
                </td>
                <td width="1%"></td>
                <td width="21%">
                  <input type="text" name="debet[]" class="form-control" data-debetKredit placeholder="Debet" onkeyup="hitung_debet();" onkeypress="isNumberKey_debet(event)">
                </td>
                <td width="1%"></td>
                <td width="21%">
                  <input type="text" name="kredit[]" class="form-control" data-debetKredit placeholder="Kredit" onkeyup="hitung_kredit();" onkeypress="isNumberKey_kredit(event)">
                </td>
                <td width="1%"></td>
                <td width="5%" align="right">
                  <button type="button" class="btn btn-danger btn-sm btn-flat" onclick="removerTrChild(this)">
                    <i class="fa fa-remove" data-toggle="tooltip" data-placement="top" title="Remove"></i>
                  </button>
                </td>
              </tr>
            </tbody>
            <tbody id="child_jurnal">
              <tr>
                <td width="50%" height="40">
                  <select class="form-control" name="account[]">
                    <?= $this->Helpers->tagAccount() ?>
                  </select>
                </td>
                <td width="1%"></td>
                <td width="21%">
                  <input type="text" name="debet[]" class="form-control" data-debetKredit placeholder="Debet" onkeyup="hitung_debet();" onkeypress="isNumberKey_debet(event)">
                </td>
                <td width="1%"></td>
                <td width="21%">
                  <input type="text" name="kredit[]" class="form-control" data-debetKredit placeholder="Kredit" onkeyup="hitung_kredit();" onkeypress="isNumberKey_kredit(event)">
                </td>
                <td width="1%"></td>
                <td width="5%" align="right">
                  <button type="button" class="btn btn-danger btn-sm btn-flat" onclick="removerTrChild(this)">
                    <i class="fa fa-remove" data-toggle="tooltip" data-placement="top" title="Remove"></i>
                  </button>
                </td>
              </tr>
            </tbody>
            <tr>
              <td width="50%" height="40">
                <button type="button" class="btn btn-success btn-sm btn-flat" id="tambah_jurnal">
                  <i class="fa fa-plus" data-toggle="tooltip" data-placement="top" title="Tambah"></i> Tambah
                </button>
              </td>
              <td width="1%"></td>
              <td width="21%">
                <input type="text" name="total_debet" data-debetKredit class="form-control" placeholder="Total Debet">
              </td>
              <td width="1%"></td>
              <td width="21%">
                <input type="text" name="total_kredit" data-debetKredit class="form-control" placeholder="Total Kredit">
              </td>
              <td width="1%"></td>
              <td width="5%" align="right"></td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Include JS -->
<script>
$("#table").DataTable({
  ordering: false
});

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
        update_page('Jurnal',  'page_jurnal');
        clear_form(response.close);
        list();
      }
    });
 
    e.preventDefault();
  });

})();

function list() {
  $.ajax({
    type: 'GET',
    url: '<?= $this->url->get('Jurnal/list') ?>',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response);
    }
  });
}

var no = 1;
$("#tambah_jurnal").click(function(){
  var charge = $('#parent_jurnal').html();
  $("#child_jurnal").append(charge);
});

function removerTrChild(that) {
	var data = $(that).parent().parent();
	var id   = data.parent().attr('id');

	if (id == 'parent_jurnal') {
		return false;
	} else {
		data.remove();
	}
}

$("[data-debetKredit]").inputmask({mask: "9999999999", placeholder: "",});

function hitung_debet() {
  var values = [];
  $("input[name='debet[]']").each(function() {
      values.push($(this).val());
  });

  n   = values.length,
  sum = 0;
  while(n--)
  sum += parseFloat(values[n]) || 0;

  $("input[name='total_debet']").val(sum);
}

function isNumberKey_debet(evt){
  var charCode = (evt.which) ? evt.which : event.keyCode;
  if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
  return false;
  return true;
}

function hitung_kredit() {
  var values = [];
  $("input[name='kredit[]']").each(function() {
      values.push($(this).val());
  });

  n   = values.length,
  sum = 0;
  while(n--)
  sum += parseFloat(values[n]) || 0;

  $("input[name='total_kredit']").val(sum);
}

function isNumberKey_kredit(evt){
  var charCode = (evt.which) ? evt.which : event.keyCode;
  if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
  return false;
  return true;
}

$('#tanggal').datetimepicker({
  viewMode: 'days',
  format: 'YYYY-MM-DD'
});

function clear_form() {
  $('form[name="jurnal"]').find('[name]').val('');
  $('form[name="jurnal"]').attr('action', '<?= $this->url->get('Jurnal/input') ?>');
}
</script>