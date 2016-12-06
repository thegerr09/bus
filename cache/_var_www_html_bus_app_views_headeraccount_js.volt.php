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
        clear_form(response.close);
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
        $('#del'+response.id).fadeOut(700);
        update_page('HeaderAccount', 'page_header_account');
        console.log(response.id);
      }
    });

    e.preventDefault();
  });

})();

function deleted(id, header, check) {
  $('input#id_delete').val(id);
  $('#header_label').text(header);
}

function list(check) {
  if (check == 'header') {
    $.ajax({
      type: 'GET',
      url: '<?= $this->url->get('HeaderAccount/list/header') ?>',
      dataType:'html',
      success: function(response){
        $('#list_header').html(response);
      }
    });
  } else if (check == 'account') {
    $.ajax({
      type: 'GET',
      url: '<?= $this->url->get('HeaderAccount/list/account') ?>',
      dataType:'html',
      success: function(response){
        $('#list_account').html(response);
      }
    });
  }
}

function clear_form() {
	
}
</script>