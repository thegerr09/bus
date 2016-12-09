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

$('#tanggal').datetimepicker({
  viewMode: 'days',
  format: 'YYYY-MM-DD'
});

function clear_form() {
  $('form[name="jurnal"]').find('[name]').val('');
  $('form[name="jurnal"]').attr('action', '<?= $this->url->get('Jurnal/input') ?>');
}
</script>