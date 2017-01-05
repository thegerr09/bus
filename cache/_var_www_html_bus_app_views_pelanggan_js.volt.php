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