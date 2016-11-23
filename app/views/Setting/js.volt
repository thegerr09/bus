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

(function() {

  $('form[data-delete]').on('submit', function(e) {
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
          type: response.type,
          icon: response.icon
        });
        $('#Delete').modal('hide');
        $('#del'+response.id).fadeOut(1000);
        update_page('Setting', 'page_setting');
      }
    });

    e.preventDefault();
  });

})();

function update(id, name) {
	var setting = $('#del'+id+' > td').eq(3).text();
	$('#label_setting').text('Update Setting');
	$('form[name="setting"]').attr('action', '{{ url('Setting/update/') }}'+id);
	$('input[name="name"]').val(name);
	$('textarea[name="setting"]').val(setting);


    var btn_submit = $('form[name="setting"]').find('button[type="submit"]');
    btn_submit.removeClass('btn-success');
    btn_submit.addClass('btn-primary');
    btn_submit.text('Save Changes');
}

function deleted(id, setting) {
  $('input#id_delete').val(id);
  $('span#setting').text(setting);
}

function list() {
  $.ajax({
    type: 'GET',
    url: '{{ url('Setting/list') }}',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response);
    }
  });
}

function status_action(id, status, clas) {
  $.ajax({
    type: 'POST',
    url: '{{ url('Setting/status') }}',
    dataType:'json',
    data: 'id='+id+'&active='+status+'&class='+clas,
    success: function(response){
      new PNotify({
        title: response.title,
        text: response.text,
        type: response.type,
        icon: response.icon
      });
      $("#button_status"+id).removeClass()
        .addClass('fa fa-power-off cursor text-'+response.class)
        .attr("onclick", "status_action("+id+", '"+response.status+"', '"+response.class+"')");

      $("#label_status"+id).removeClass()
        .addClass('label bg-'+response.class)
        .text(response.label);

      update_page('Driver', 'page_driver');
    }
  });
}

function clear_form(id){
  $('form[name="setting"]').find('[name]').val('');
  if (id == '1') {
    $('#Tambah').modal('hide');
  } else {
    $('#label_setting').text('Input Setting');
    $('form[name="setting"]').attr('action', '{{ url('Setting/input') }}');
    var btn_submit = $('form[name="setting"]').find('button[type="submit"]');
    btn_submit.removeClass('btn-primary');
    btn_submit.addClass('btn-success');
    btn_submit.text('Save');
  }
}
</script>