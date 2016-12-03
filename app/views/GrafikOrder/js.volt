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
    url: '{{ url('GrafikOrder/list') }}',
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

function clear_form(id) {
  $('#label_booking').text('Tambah Booking');
  $('#New').modal('hide');

  var form = $('form[name="booking"]');

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

function close_action() {
  $('body').removeAttr('style');
}
</script>