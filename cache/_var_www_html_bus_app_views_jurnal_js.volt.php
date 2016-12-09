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
        // clear_form(response.close);
        // list();
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