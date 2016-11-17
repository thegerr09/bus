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
        update_page(response.link, response.storage);
        update_page('Users', 'page_users');
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
        update_page(response.link, response.storage);
        update_page('Users', 'page_users');
      }
    });

    e.preventDefault();
  });

})();

function deleted(id, group) {
  $('input#id_delete').val(id);
  $('#group').text(group);
}

function update(id) {
  $.ajax({
    type: 'GET',
    url: '{{ url('Usergroup/detail/') }}'+id,
    dataType:'json',
    success: function(response){
      $.each(response, function(key, value) {
        $('form[name="group"]').find('[name="'+key+'"]').val(value);
      });
      $('#label_usergroup').text('Update Usergroup');
      $('form[name="group"]').attr('action', '{{ url('Usergroup/update/') }}'+id);
    }
  });
}

function list() {
  $.ajax({
    type: 'GET',
    url: '{{ url('Usergroup/list') }}',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response);
    }
  });
}

function clear_form(id) {
  $('form[name="delete"]').find('[name]').val('');
  $('form[name="group"]').find('[name]').val('');
  $('#label_usergroup').text('Input Usergroup');
  $('form[name="group"]').attr('action', '{{ url('Usergroup/input') }}');

  if (id == '1') { $('#Tambah').modal('hide'); }
}

function status_action(id, status, clas) {
  $.ajax({
    type: 'POST',
    url: '{{ url('Usergroup/status') }}',
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

      update_page('Usergroup', 'page_usergroup');
      update_page('Users', 'page_users');
    }
  });
}
</script>