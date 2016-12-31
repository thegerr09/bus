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
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah" onclick="clear_form()">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-3" style="margin-bottom:0px;">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#TutupBuku">
                <i class="fa fa-book"></i> Tutup Buku
              </button>
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#PrintAll">
                <i class="fa fa-print"></i> Print
              </button>
            </div>
            <div class="col-md-6" align="center">
              <p id="date_title">
                <b><?= date('01 F Y') ?> - <?= date('d F Y') ?></b><br>
                <!-- <small class="text-danger">Jurnal dari range di atas ada yang belum di tutup buku</small> -->
              </p>
            </div>
            <div class="col-md-3" style="margin-bottom:10px;">
              <div class="form-group">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" value="<?= date('m/01/Y') ?> - <?= date('m/d/Y') ?>" class="form-control pull-right" id="reservation">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="table-responsive">
                <table id="table" class="table table-bordered">
                  <thead class="bg-blue">
                    <tr>
                      <td style="vertical-align: middle;" align="center" width="40">NO</td>
                      <td style="vertical-align: middle;" align="center" width="140">ACTION</td>
                      <td style="vertical-align: middle;" align="center" width="120">TANGGAL</td>
                      <td style="vertical-align: middle;" align="center" width="100">NO. JURNAL</td>
                      <td style="vertical-align: middle;" align="center">KETERANGAN</td>
                      <td style="vertical-align: middle;" align="center" width="100">KANTOR</td>
                    </tr>
                  </thead>
                  <tbody id="list_view">
                    <?php $no = 1; ?>
                    <?php foreach ($jurnal as $x) { ?>
                    <tr id="del<?= $x->id ?>">
                      <td align="center"><?= $no ?></td>
                      <td align="center">
                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#Detail" onclick="detail(<?= $x->id ?>)">
                          <i class="fa fa-bars" data-toggle="tooltip" data-placement="top" title="Detail"></i>
                        </button>&nbsp;
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Tambah" onclick="edit(<?= $x->id ?>)">
                          <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                        </button>&nbsp;
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Deleted" onclick="deleted_jurnal('<?= $x->id ?>', '<?= $x->kode_jurnal ?>')">
                          <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i>
                        </button>&nbsp;
                        <a href="Jurnal/printOne/<?= $x->id ?>" class="btn btn-default btn-xs" target="_blank">
                          <i class="fa fa-print" data-toggle="tooltip" data-placement="top" title="Print"></i>
                        </a>
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
              <?= $this->Helpers->tagSetting('kantor', 'Pilih Kantor', '') ?>
            </select>
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" name="keterangan" placeholder="Keterangan Jurnal ..."></textarea>
          </div>
          <table id="jurnal_child"></table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>
<div class="modal fade" id="Deleted" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_deleted"></h4>
      </div>

      <div class="modal-body">
        <p>Apakah anda yakin akan menghaus jurnal ini ???</p>
      </div>

      <div class="modal-footer">
        <div class="pull-left">
          <button type="button" class="btn btn-default" data-dismiss="modal">
            <i class="fa fa-remove"></i> cancle
          </button>
        </div>
        <form name="deleted" method="POST" data-delete="data-delete">
          <button type="submit" class="btn btn-danger">
            <i class="fa fa-trash"></i> Deleted
          </button>
        </form>
      </div>
    
    </div>
  </div>
</div>
<style type="text/css">
  .detail-td {
    font-size: 14px;
  }
</style>

<div class="modal fade" id="PrintAll" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Print All</h4>
      </div>

      <div class="modal-body">
        <p>ini akan mengeprint dengan range yang di tentukan saat ini </p>
      </div>

      <div class="modal-footer">
        <a id="print" href="Jurnal/printAll/<?= date('Y-m-1') ?>/<?= date('Y-m-d') ?>" target="_blank" class="btn btn-default btn-block">
          <i class="fa fa-print"></i> Print All Jurnal
        </a>
      </div>
    
    </div>
  </div>
</div>

<div class="modal fade" id="Detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Detail Jurnal</h4></center>
      </div>

      <div class="modal-body">
        <table>
          <tr>
            <td class="detail-td" height="25" valign="top">Tanggal</td>
            <td class="detail-td" valign="top" width="20" align="center">:</td>
            <td class="detail-td tanggal"></td>
          </tr>
          <tr>
            <td class="detail-td" height="25" valign="top">Nomor Jurnal</td>
            <td class="detail-td" valign="top" width="20" align="center">:</td>
            <td class="detail-td"><b class="kode_jurnal"></b></td>
          </tr>
          <tr>
            <td class="detail-td" height="25" valign="top">Kantor</td>
            <td class="detail-td" valign="top" width="20" align="center">:</td>
            <td class="detail-td kantor"></td>
          </tr>
          <tr>
            <td class="detail-td" height="25" valign="top">Keterangan</td>
            <td class="detail-td" valign="top" width="20" align="center">:</td>
            <td class="detail-td keterangan"></td>
          </tr>
          <tr>
            <td class="detail-td" height="25" valign="top">Total Debet</td>
            <td class="detail-td" valign="top" width="20" align="center">:</td>
            <td class="detail-td total_debet"></td>
          </tr>
          <tr>
            <td class="detail-td" height="25" valign="top">Total Kredit</td>
            <td class="detail-td" valign="top" width="20" align="center">:</td>
            <td class="detail-td total_kredit"></td>
          </tr>
        </table>
        <p></p>
        <table class="table table-bordered">
          <thead style="background-color: #eee;">
            <tr>
              <td width="50">NO</td>
              <td>ACCOUNT</td>
              <td width="150">DEBET</td>
              <td width="150">KREDIT</td>
            </tr>
          </thead>
          <tbody id="listChildDetail">
            
          </tbody>
        </table>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    
    </div>
  </div>
</div>
<div class="modal fade" id="TutupBuku" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearTutupBuku()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Tutup Buku</h4>
      </div>

      <form name="tutupBuku" action="Jurnal/tutupBuku" method="POST" data-remote>
        <div class="modal-body">
          <div class="form-group">
            <label>Pilih Bulan</label>
            <input type="text" name="tutup_bulan" class="form-control" placeholder="Pilih Bulan" data-jurnal>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-block">
            <i class="fa fa-book"></i> Tutup Buku
          </button>
        </div>
      </form>
    
    </div>
  </div>
</div>

<!-- Include JS -->
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

        update_page('Jurnal',  'page_jurnal');
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
    url: '<?= $this->url->get('Jurnal/list') ?>',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response);
    }
  });
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

$('#reservation').daterangepicker();
$('#reservation').on('apply.daterangepicker', function(ev, picker) {
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Jurnal/list') ?>',
    dataType:'html',
    data: 'start='+picker.startDate.format('YYYY-MM-DD')+'&end='+picker.endDate.format('YYYY-MM-DD'),
    success: function(response){
      $('#list_view').html(response);
      $('#date_title b').html(picker.startDate.format('DD MMMM YYYY')+' - '+picker.endDate.format('DD MMMM YYYY'));
      $('#PrintAll').find('#print').attr('href', 'Jurnal/printAll/'+picker.startDate.format('YYYY-MM-DD')+'/'+picker.endDate.format('YYYY-MM-DD'));
    }
  });
});

function clear_form(id) {
  $('#Tambah').find('#label_jurnal').text('Input Jurnal');
  var form = $('form[name="jurnal"]');
  form.find('[name]').val('');
  form.attr('action', '<?= $this->url->get('Jurnal/input') ?>');
  viewJurnal();
  if (id == 1) {
    $('#Tambah').modal('hide');
    $('#TutupBuku').modal('hide');
  }
}

function detail(id) {
  var popup = $('#Detail');
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Jurnal/detail/master') ?>',
    dataType:'json',
    data: 'id='+id,
    success: function(response){
      $.each(response, function (key, value) {
        if (key == 'total_debet' || key == 'total_kredit') {
          popup.find('.'+key).text('Rp. '+toRp(value));
        } else {
          popup.find('.'+key).text(value);
        }
      });

      var child = detailChild(response.id);
      var htmlChild = '';
      var no = 1;
      $.each(child, function (key, value) {
        htmlChild += '<tr><td>'+no+'</td>'+
                     '<td>'+listAccount(value.account)+'</td>'+
                     '<td>Rp. <span class="pull-right">'+toRp(value.debet)+'</span></td>'+
                     '<td>Rp. <span class="pull-right">'+toRp(value.kredit)+'</span></td></tr>';
        no++;
      });
      popup.find('#listChildDetail').html(htmlChild);
    }
  });
}

function detailChild(id) {
  var result = $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Jurnal/detail/child') ?>',
    dataType:'json',
    data: 'id='+id,
    async: false
  });
  return result.responseJSON;
}

function toRp(angka){
  if (angka == '') {
    angka = 0;
  }  
  var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
  var rev2    = '';
  for(var i = 0; i < rev.length; i++){
      rev2  += rev[i];
      if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
          rev2 += '.';
      }
  }
  return rev2.split('').reverse().join('') + ',-';
}

function listAccount(id) {
  var json = <?= $this->Prints->listAccount() ?>;
  $.each(json, function (key, value) {
    if (id == value.id) {
      result = value.account;
    }
  });
  return result;
}

function edit(id) {
  var modal = $('#Tambah');
  var form  = modal.find('form[name="jurnal"]');
  form.attr('action', 'Jurnal/update/'+id);
  modal.find('#label_jurnal').text('Update Jurnal');
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Jurnal/detail') ?>',
    dataType:'json',
    data: 'id='+id,
    success: function(response){
      $.each(response, function (key, value) {
        form.find('[name="'+key+'"]').val(value);
      });
      viewJurnal(id);
    }
  });
}

function viewJurnal(id) {
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Jurnal/viewJurnal') ?>',
    dataType:'html',
    data: 'id='+id,
    success: function(response){
      $('#jurnal_child').html(response);
    }
  });
}

function deleted_jurnal(id, kode) {
  $('form[name="deleted"]').attr('action', 'Jurnal/deleted/'+id);
  $('#Deleted').find('#label_deleted').text('Deleted '+kode);
}

$('[data-jurnal]').datetimepicker({
  viewMode: 'months',
  format: 'YYYY-MM'
});

function clearTutupBuku() {
  $('form[name="tutupBuku"]').find('input[name="tutup_bulan"]').val('');
}
</script>

