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
    url: '{{ url('Pelanggan/list') }}',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response);
    }
  });
}

$("[data-debetKredit]").inputmask({mask: "9999999999", placeholder: "",});

function clear_form(id) {
	var modal = $('#Tambah');
  modal.find('form').attr('action', '{{ url('Pelanggan/input') }}');
}
</script>