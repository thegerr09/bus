<script>
$(function () {
	$("#header").DataTable({
		dom: '<"pull-left"f><"pull-right"s>tp',
	    ordering: false
	});
	$("#account").DataTable({
	    ordering: false
	});
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
        update_page('HeaderAccount', 'page_header_account');
        clear_form();
        $('#Tambah'+response.close).modal('hide');
        list(response.check);
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
        $('#Delete'+response.check).modal('hide');
        $('#del'+response.check+response.id).fadeOut(700);
        update_page('HeaderAccount', 'page_header_account');
      }
    });

    e.preventDefault();
  });

})();

function deleted(id, val, check) {
  if (check == 'header') {
    $('input#id_delete_header').val(id);
    $('#header_label').text(val);
  } else if (check == 'account') {
    $('input#id_delete_account').val(id);
    $('#account_label').text(val);
  }
}

function update(id, header, jenis, check, name_header) {
  if (check == 'header') {
    $('#label_header').val('Update Header');
    $('form[name="header"]').attr('action', '{{ url('HeaderAccount/update/header') }}');
    $('input[name="id"]').val(id);
    $('input[name="header"]').val(header);
    $('select[name="jenis"]').val(jenis);
  } else if (check == 'account') {
    $('#label_header').val('Update Account');
    $('form[name="account"]').attr('action', '{{ url('HeaderAccount/update/account') }}');
    $('form[name="account"]').find('input[name="id"]').val(id);
    $('input[name="account"]').val(header);
    $('select[name="id_header"]').val(jenis);
    $('input[name="name_header"]').val(name_header);
  }
}

function list(check) {
  if (check == 'header') {
    $.ajax({
      type: 'GET',
      url: '{{ url('HeaderAccount/list/header') }}',
      dataType:'html',
      success: function(response){
        $('#list_header').html(response);
      }
    });
  } else if (check == 'account') {
    $.ajax({
      type: 'GET',
      url: '{{ url('HeaderAccount/list/account') }}',
      dataType:'html',
      success: function(response){
        $('#list_account').html(response);
      }
    });
  }
}

function headerr(that) {
  var val  = $(that).val();
  var name = $(that).find('[value="'+val+'"]').text();
  $('form[name="account"]').find('[name="name_header"]').val(name);  
}

function clear_form() {
  $('form[name="header"]').find('[name]').val('');
  $('form[name="header"]').attr('action', '{{ url('HeaderAccount/input/header') }}');
  $('form[name="account"]').find('[name]').val('');
  $('form[name="account"]').attr('action', '{{ url('HeaderAccount/input/account') }}');
}
</script>