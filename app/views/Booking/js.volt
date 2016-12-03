<script>
$(document).ready(function() {
var handleDataTableButtons = function() {
  if ($("#example").length) {
    $("#example").DataTable({
      dom: "Bfrtip",
      ordering: false,
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

        $('#del'+response.id).fadeOut(700);
        $('#Delete').modal('hide');
        update_page('Booking',  'page_booking');
        update_page('Driver',   'page_driver');
        update_page('CoDriver', 'page_co_driver');
        update_page('Bus',      'page_bus');
        update_page('GrafikOrder', 'page_grafik_order');
      }
    });

    e.preventDefault();
  });

})();

function list() {
  $.ajax({
    type: 'GET',
    url: '{{ url('Booking/list') }}',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response);
    }
  });
}

function edit(id) {
  var form = $('form[name="booking"]')
  form.attr('action', '{{ url('Booking/update/') }}'+id);
  form.find('button[type="submit"]')
      .removeClass('btn-success')
      .addClass('btn-primary')
      .text('Save Update');
  $.ajax({
    type: 'POST',
    url: '{{ url('Booking/detail/') }}'+id,
    dataType:'json',
    success: function(response){
      $.each(response, function(key, value) {
        form.find('[name="'+key+'"]').val(value);
      });
      $('#label_booking').text('Update Data Booking "'+response.kode+'"');
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

function next(id) {
  var form = $('form[name="booking"]')
  form.attr('action', '{{ url('Booking/next/') }}'+id);
  form.find('button[type="submit"]')
      .removeClass('btn-success')
      .removeClass('btn-primary')
      .addClass('btn-danger')
      .text('Lanjut Sewa');
  $.ajax({
    type: 'POST',
    url: '{{ url('Booking/detail/') }}'+id,
    dataType:'json',
    success: function(response){
      $.each(response, function(key, value) {
        form.find('[name="'+key+'"]')
        .not('[name="modal"]')
        .val(value);
      });
      $('#label_booking').text('Lanjut Sewa kode booking "'+response.kode+'" ?');
      $('#'+response.paket).collapse('show');
      areaa_selected(response.area, response.route);
      driver(1, response.driver);
      driver(2, response.co_driver);
      lokasii(response.type_bus);
      bus(response.type_bus, response.bus);
      routee_selected(response.route, response.lokasi);
      $('select[name="driver"]').attr('onchange', 'modal_driver()');
      $('select[name="co_driver"]').attr('onchange', 'modal_driver()');
      modal_driver();
    }
  });
}

function cencled(id, kode) {
  $('form[name="cencle"]').find('#cencle_booking').text(kode);
  $('form[name="cencle"]').find('input[name="id"]').val(id);
}

function deleted(id, kode) {
  $('form[name="delete"]').find('#delete_booking').text(kode);
  $('form[name="delete"]').find('input[name="id"]').val(id);
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
$("[data-modalDriver]").inputmask({mask: "9999999999", placeholder: "",});

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
  var data = Object.keys({{ Helpers.areaJson() }});
  for (var i = 0; i < data.length; i++) {
    if (data[i] == val) {
      $.ajax({
        type: 'POST',
        url: '{{ url('Booking/data/') }}'+4,
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
    url: '{{ url('Booking/data/') }}'+4,
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
    url: '{{ url('Booking/data/') }}'+5,
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
    url: '{{ url('Booking/data/') }}'+5,
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
    url: '{{ url('Booking/data/') }}'+3,
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
    url: '{{ url('Booking/data/') }}'+6,
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
      url: '{{ url('Booking/data/') }}'+id,
      dataType:'html',
      data: 'selected='+selected,
      success: function(response){
        $('select[name="driver"]').html(response);
      }
    });
  } else if(id == 2) {
    $.ajax({
      type: 'POST',
      url: '{{ url('Booking/data/') }}'+id,
      dataType:'html',
      data: 'selected='+selected,
      success: function(response){
        $('select[name="co_driver"]').html(response);
      }
    });
  }
}

function modal_driver() {
  var driver    = $('select[name="driver"]').val();
  var co_driver = $('select[name="co_driver"]').val();
  $('#note_modal').show();
  if (driver != '' && co_driver != '') {
    $('#modal_driver').collapse('show');
  } else {
    $('#modal_driver').collapse('hide');
  }
}

function clear_form(id) {
  $('#label_booking').text('Tambah Booking');

  var form = $('form[name="booking"]');

  $('#modal_driver').collapse('hide');
  $('#note_modal').hide();

  form.find('[name]').val('');

  form.attr('action', '{{ url('Booking/input') }}');

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
</script>