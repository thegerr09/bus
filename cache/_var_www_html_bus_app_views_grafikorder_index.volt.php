<style>
.clear,.dataTables_scroll{clear:both}.dataTables_wrapper{position:relative;clear:both;zoom:1}.dataTables_processing{position:absolute;top:50%;left:50%;width:250px;height:30px;margin-left:-125px;margin-top:-15px;padding:14px 0 2px;border:1px solid #ddd;text-align:center;color:#999;font-size:14px;background-color:#fff}.dataTables_length{width:40%;float:left}.dataTables_filter{width:50%;float:right;text-align:right}.dataTables_info{width:60%;float:left}.dataTables_paginate{float:right;text-align:right}table.dataTable td.focus,table.dataTable th.focus{outline:#1ABB9C solid 2px!important;outline-offset:-1px}.dataTables_scrollBody{-webkit-overflow-scrolling:touch}.top .dataTables_info{float:none}.dataTables_empty{text-align:center}.example_alt_pagination div.dataTables_info{width:40%}td {color:#555;}hr{margin-top:4px;margin-bottom:3px;}.cursor{cursor:pointer;}.cursor:hover{background-color:#f4f4f4;}
}
</style>
<section class="content-header animated fadeIn">
  <h1>Grafik Order</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>Data Master</li>
    <li class="active">grafik order</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Grafik Order</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <!--  -->
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive" id="list_view">
            <table id="example" class="table table-bordered">
              <thead>
                <tr>
                  <td align="center" style="vertical-align: middle;" rowspan="2" width="100"><b>TANGGAl</b></td>
                  <?php $lenght = $this->length($bus); ?>
                  <td colspan="<?= $lenght + 1 ?>" align="center"><b>LIST BUS</b></td>
                </tr>
                <tr>
                  <?php foreach ($bus as $head) { ?>
                  <td align="center"><b><?= Phalcon\Text::upper($head->ukuran) ?><br><?= Phalcon\Text::upper($head->nomor_polisi) ?></b></td>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach (range(0, $dayInMonth) as $i) { ?>
                <tr>
                  <td align="center"><?= $listDate[$i] ?></td>
                  <?php foreach ($bus as $body) { ?>
                  <td <?= $this->Helpers->viewGrafik($filterDate[$i], $body->id) ?>></td>
                  <?php } ?>
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
<div class="modal fade" id="New" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">New Actions</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <button class="btn btn-primary btn-flat btn-lg btn-block" data-toggle="modal" data-target="#Booking" onclick="close_action()">
            New Booking
          </button>
        </div>
        <div class="form-group">
          <button class="btn btn-success btn-flat btn-lg btn-block">
            New Order
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="Booking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_booking">Input Booking</h4>
      </div>

      <form name="booking" action="<?= $this->url->get('Booking/input') ?>" method="POST" data-remote="data-remote">
        <div class="modal-body">
          <div class="row">

            <!-- left -->
            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <div class="input-group date">
                  <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </span>
                  <input type="text" name="tanggal_booking" id="tanggal_booking" class="form-control" placeholder="Tanggal Booking">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </span>
                  <input type="text" name="nama" class="form-control" placeholder="Nama"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </span>
                  <input type="text" name="telpon" data-telp class="form-control" placeholder="Nomor Telpon"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </span>
                  <input type="text" name="tanggal_mulai" id="tanggal_start" class="form-control" placeholder="Tanggal Mulai"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </span>
                  <input type="text" name="tanggal_kembali" id="tanggal_back" class="form-control" placeholder="Tanggal Kembali"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-money"></i>
                  </span>
                  <input type="text" name="tarif" data-tarif class="form-control" placeholder="Tarif"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-money"></i>
                  </span>
                  <input type="text" name="dp" data-dp class="form-control" placeholder="DP / Uang Muka"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-credit-card"></i>
                  </span>
                  <select name="metode_pembayaran" class="form-control">
                    <?= $this->Helpers->tagSetting('pembayaran', 'Methode Pembayaran', '') ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </span>
                  <select name="driver" class="form-control">
                    <option value="">Pilih Driver</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </span>
                  <select name="co_driver" class="form-control">
                    <option value="">Pilih Co. Driver</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- right -->
            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-cubes"></i>
                  </span>
                  <select name="paket" class="form-control" onchange="pakett(this)">
                    <?= $this->Helpers->tagSetting('paket', 'Pilih Paket', '') ?>
                  </select>
                </div>
              </div>

              <div class="collapse in" id="regular">
                <div class="form-group">
                  <div class="input-group" >
                    <span class="input-group-addon">
                      <i class="fa fa-map"></i>
                    </span>
                    <select name="area" class="form-control" onchange="areaa(this)">
                      <?= $this->Helpers->tagSetting('area', 'Pilih Area', '') ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group" >
                    <span class="input-group-addon">
                      <i class="fa fa-map-o"></i>
                    </span>
                    <select name="route" class="form-control" onchange="routee(this)">
                      <option value="">Pilih Route</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group" >
                    <span class="input-group-addon">
                      <i class="fa fa-map-marker"></i>
                    </span>
                    <select name="lokasi" class="form-control" onchange="lokasii()">
                      <option value="">Pilih Lokasi</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="collapse" id="jiarah">
                <div class="form-group">
                  <div class="input-group" >
                    <span class="input-group-addon">
                      <i class="fa fa-map-marker"></i>
                    </span>
                    <select name="route_jiarah" class="form-control">
                      <option value="">Pilih Route Jiarah</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-map-pin"></i>
                  </span>
                  <input type="text" name="lokasi_jemput" class="form-control" placeholder="Lokasi Penjemputan"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-road"></i>
                  </span>
                  <input type="number" name="jarak_jemput" class="form-control" placeholder="Jarak Penjemputan"> 
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-bus"></i>
                  </span>
                  <select name="type_bus" class="form-control" onchange="typee_bus(this)">
                    <option value="">Pilih Type Bus</option>
                    <?= $this->Helpers->tagSetting('type_bus', 'Pilih Type Bus', '') ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-bus"></i>
                  </span>
                  <select name="bus" class="form-control">
                    <option value="">Pilih Bus</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group" >
                  <span class="input-group-addon">
                    <i class="fa fa-book"></i>
                  </span>
                  <select name="type_booking" class="form-control" onchange="get_harga(this)">
                    <option value="">Booking Dari</option>
                    <?= $this->Helpers->tagSetting('Booking', 'Booking Dari', '') ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <table width="100%">
                  <tr>
                    <td style="border:1px solid #ccc;" height="25" width="25"></td>
                    <td>&nbsp; stand by</td>
                    <td class="bg-teal" width="25"></td>
                    <td>&nbsp; di booking</td>
                    <td class="bg-yellow" width="25"></td>
                    <td>&nbsp; di jalan</td>
                    <td class="bg-red" width="25"></td>
                    <td>&nbsp; rusak</td>
                  </tr>
                </table>
              </div>
            </div>

            <div class="col-md-12 col-xs-12">
              <div class="form-group">
                <textarea name="note" rows="3" class="form-control" placeholder="Catatan ...."></textarea>
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
$(document).ready(function() {
var handleDataTableButtons = function() {
  if ($("#example").length) {
    $("#example").DataTable({
      dom: "Bfrtip",
	  paging:       false,
  	  lengthChange: false,
      ordering: 	false,
      buttons: [
        {
          extend: "copy",
          className: "btn-sm"
        },
        {
          extend: "csv",
          className: "btn-sm"
        },
        {
          extend: "excel",
          className: "btn-sm"
        },
        {
          extend: "pdfHtml5",
          className: "btn-sm"
        },
        {
          extend: "print",
          className: "btn-sm"
        },
      ],
      responsive: true
    });
  }
};

TableManageButtons = function() {
  "use strict";
  return {
    init: function() {
      handleDataTableButtons();
    }
  };
}();
TableManageButtons.init();
});

$('input[type="radio"].flat-blue').iCheck({
  radioClass: 'iradio_flat-blue'
});

function new_action() {
  console.log('test');
}

(function() {

  $('form[data-remote]').on('submit', function(e) {
    var form = $(this);
    var url = form.prop('action');
    var array_url = url.split("/");
    var last      = array_url.length - 1;
    var action    = array_url[last];

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
        update_page('Booking',  'page_booking');
        update_page('Driver',   'page_driver');
        update_page('CoDriver', 'page_co_driver');
        update_page('Bus',      'page_bus');
        update_page('GrafikOrder', 'page_grafik_order');
        clear_form(response.close);
        if (action == 'cencle'){
          $('#Cencle').modal('hide');
        }
        list();
      }
    });
 
    e.preventDefault();
  });

})();

function list() {
  $.ajax({
    type: 'GET',
    url: '<?= $this->url->get('GrafikOrder/list') ?>',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response);
      var handleDataTableButtons = function() {
        if ($("#example").length) {
          $("#example").DataTable({
            dom: "Bfrtip",
          paging:       false,
            lengthChange: false,
            ordering:   false,
            buttons: [
              {
                extend: "copy",
                className: "btn-sm"
              },
              {
                extend: "csv",
                className: "btn-sm"
              },
              {
                extend: "excel",
                className: "btn-sm"
              },
              {
                extend: "pdfHtml5",
                className: "btn-sm"
              },
              {
                extend: "print",
                className: "btn-sm"
              },
            ],
            responsive: true
          });
        }
      };

      TableManageButtons = function() {
        "use strict";
        return {
          init: function() {
            handleDataTableButtons();
          }
        };
      }();
      TableManageButtons.init();
    }
  });
}

function next(id) {
  var form = $('form[name="booking"]')
  form.attr('action', '<?= $this->url->get('Booking/next/') ?>'+id);
  form.find('button[type="submit"]')
      .removeClass('btn-success')
      .removeClass('btn-primary')
      .addClass('btn-danger')
      .text('Lanjut Sewa');
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Booking/detail/') ?>'+id,
    dataType:'json',
    success: function(response){
      $.each(response, function(key, value) {
        form.find('[name="'+key+'"]').val(value);
      });
      $('#label_booking').text('Lanjut Sewa kode booking "'+response.kode+'" ?');
      $('#'+response.paket).collapse('show');
      areaa_selected(response.area, response.route);
      driver(1, response.driver);
      driver(2, response.co_driver);
      lokasii(response.type_bus);
      bus(response.type_bus, response.bus);
      routee_selected(response.route, response.lokasi);
    }
  });
}

$('#tanggal_booking').datetimepicker({
  viewMode: 'days',
  format: 'YYYY-MM-DD'
});
$('#tanggal_start').datetimepicker({
  viewMode: 'days',
  format: 'YYYY-MM-DD'
});
$('#tanggal_back').datetimepicker({
  viewMode: 'days',
  format: 'YYYY-MM-DD'
});

$("[data-telp]").inputmask({mask: "99999999999999", placeholder: "",});
$("[data-tarif]").inputmask({mask: "9999999999", placeholder: "",});
$("[data-dp]").inputmask({mask: "9999999999", placeholder: "",});

function pakett(that) {
  var val = $(that).val(); 
  if (val == 'regular') {
    $('#regular').collapse('show');
    $('#jiarah').collapse('hide');
  } else if (val == 'jiarah') {
    $('#regular').collapse('hide');
    $('#jiarah').collapse('show');
  } else {
    $('#regular').collapse('hide');
    $('#jiarah').collapse('hide');
  }
}

function areaa(that) {
  var val  = $(that).val();
  var data = Object.keys(<?= $this->Helpers->areaJson() ?>);
  for (var i = 0; i < data.length; i++) {
    if (data[i] == val) {
      $.ajax({
        type: 'POST',
        url: '<?= $this->url->get('Booking/data/') ?>'+4,
        dataType:'html',
        data: 'area='+val,
        success: function(response){
          $('select[name="route"]').html(response);
          $('select[name="type_bus"]').html('<option value="">Pilih Type Bus</option>');
          $('select[name="bus"]').html('<option value="">Pilih Bus</option>');
          $('select[name="lokasi"]').html('<option value="">Pilih Lokasi</option>');
        }
      });
      break;
    }
  }
}

function areaa_selected(area, selected) {
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Booking/data/') ?>'+4,
    dataType:'html',
    data: 'area='+area+'&selected='+selected,
    success: function(response){
      $('select[name="route"]').html(response);
    }
  });
}

function routee(that) {
  var val = $(that).val();
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Booking/data/') ?>'+5,
    dataType:'html',
    data: 'lokasi='+val+'&selected=not',
    success: function(response){
      $('select[name="lokasi"]').html(response);
      $('select[name="type_bus"]').html('<option value="">Pilih Type Bus</option>');
      $('select[name="bus"]').html('<option value="">Pilih Bus</option>');
    }
  });
}

function routee_selected(route, selected) {
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Booking/data/') ?>'+5,
    dataType:'html',
    data: 'lokasi='+route+'&selected='+selected,
    success: function(response){
      $('select[name="lokasi"]').html(response);
    }
  });
}

function lokasii(id) {
  if (id == 'medium') {
    var html = '<option value="">Pilih Type Bus</option><option value="medium" selected>Medium</option><option value="big">Big</option>';
  } else if (id == 'big') {
    var html = '<option value="">Pilih Type Bus</option><option value="medium">Medium</option><option value="big" selected>Big</option>';
  } else {
    var html = '<option value="">Pilih Type Bus</option><option value="medium">Medium</option><option value="big">Big</option>';
  }
  $('select[name="type_bus"]').html(html);
}

function typee_bus(that) {
  var val = $(that).val();
  bus(val);

  var html = '<option value="">Booking Dari</option><option value="agen">Agen</option><option value="umum">Umum</option>';
  $('select[name="type_booking"]').html(html);
}

function bus(ukuran, selected) {
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Booking/data/') ?>'+3,
    dataType:'html',
    data: 'ukuran='+ukuran+'&selected='+selected,
    success: function(response){
      $('select[name="bus"]').html(response);
    }
  });
}

function get_harga(that) {
  var val      = $(that).val();
  var type_bus = $('select[name="type_bus"]').val();
  var lokasi   = $('select[name="lokasi"]').val();

  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Booking/data/') ?>'+6,
    dataType:'html',
    data: 'id='+lokasi+'&key='+type_bus+'_'+val,
    success: function(response){
      $('input[name="tarif"]').val(response);
    }
  });
}

function driver(id, selected) {
  if (id == 1) {
    $.ajax({
      type: 'POST',
      url: '<?= $this->url->get('Booking/data/') ?>'+id,
      dataType:'html',
      data: 'selected='+selected,
      success: function(response){
        $('select[name="driver"]').html(response);
      }
    });
  } else if(id == 2) {
    $.ajax({
      type: 'POST',
      url: '<?= $this->url->get('Booking/data/') ?>'+id,
      dataType:'html',
      data: 'selected='+selected,
      success: function(response){
        $('select[name="co_driver"]').html(response);
      }
    });
  }
}

function clear_form(id) {
  $('#label_booking').text('Tambah Booking');
  $('#New').modal('hide');

  var form = $('form[name="booking"]');

  form.find('[name]').val('');

  form.attr('action', '<?= $this->url->get('Booking/input') ?>');

  form.find('button[type="submit"]')
      .removeClass('btn-primary')
      .addClass('btn-success')
      .text('Save');

  driver(1);
  driver(2);
  lokasii();

  if (id == 1) {
    $('#Tambah').modal('hide');
  }
}

function close_action() {
  $('body').removeAttr('style');
}
</script>