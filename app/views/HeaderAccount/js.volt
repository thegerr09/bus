<script>
$(function () {
	$("#header").DataTable({
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
        update_page('HeaderAccount/view/header', 'page_header');
        update_page('HeaderAccount/view/account', 'page_account');
        update_page('Jurnal', 'page_jurnal');
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
        update_page('HeaderAccount/view/header', 'page_header');
        update_page('HeaderAccount/view/account', 'page_account');
        update_page('Jurnal', 'page_jurnal');
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

function update_header(id, header, group, jenis) {
  $('#label_header').val('Update Header');
  $('form[name="header"]').attr('action', '{{ url('HeaderAccount/update/header') }}');
  $('input[name="id"]').val(id);
  $('input[name="header"]').val(header);
  $('select[name="group"]').val(group);
  $('select[name="jenis"]').val(jenis);
}

function update_account(id, account, id_header, header, tipe) {
  $('#label_header').val('Update Account');
  $('form[name="account"]').attr('action', '{{ url('HeaderAccount/update/account') }}');
  $('form[name="account"]').find('input[name="id"]').val(id);
  $('input[name="account"]').val(account);
  $('select[name="id_header"]').val(id_header);
  $('input[name="name_header"]').val(header);
  $('select[name="tipe"]').val(tipe);
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