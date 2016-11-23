<script>
$(function () {
  $('#example').DataTable();
});

(function() {

  $('form[data-remote]').on('submit', function(e) {
    var form = $(this);
    var url = form.prop('action');

    $.ajax({
      type: 'POST',
      url: url,
      dataType:'json',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(response){
        new PNotify({
          title: response.title,
          text: response.text,
          type: response.type
        });
        update_page('Setting', 'page_setting');
        clear_form(response.close);
        list();
      }
    });

    e.preventDefault();
  });

})();

function update(id, name, setting) {
	$('form[name="settings"]').attr('action', '<?= $this->url->get('Setting/update/') ?>'+id);
	$('form[name="setting"]').find('[name="name"]').val(name);
	$('form[name="settings"]').find('[name="setting"]').val(setting);
}

function list() {
  $.ajax({
    type: 'GET',
    url: '<?= $this->url->get('Setting/list') ?>',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response);
    }
  });
}

function clear_form(id){
  $('form[name="settings"]').find('[name]').val('');
  if (id == '1') {
    $('#Tambah').modal('hide');
  } else {
    $('#label_setting').text('Input Setting');
    $('form[name="settings"]').attr('action', '<?= $this->url->get('Setting/input') ?>');
    var btn_submit = $('form[name="settings"]').find('button[type="submit"]');
    btn_submit.removeClass('btn-primary');
    btn_submit.addClass('btn-success');
    btn_submit.text('Save');
  }
}
</script>