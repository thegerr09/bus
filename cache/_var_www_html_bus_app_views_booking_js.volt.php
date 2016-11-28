<script>
$(document).ready(function() {
var handleDataTableButtons = function() {
  if ($("#example").length) {
    $("#example").DataTable({
      dom: "Bfrtip",
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

function new_booking() {
  driver(1);
  driver(2);
}







$('#tanggal_booking').datetimepicker();
$('#tanggal_start').datetimepicker();
$('#tanggal_back').datetimepicker();

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
        }
      });
      break;
    }
  }
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
    }
  });
}

function typee_bus(that) {
  var val = $(that).val();
  bus(val);
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
</script>