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
