<script>
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
        update_page('Users', 'page_users');
        clear_form();
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
          type: response.type
        });
        $('#Delete').modal('hide');
        $('#del'+response.id).fadeOut(1000);
        update_page(response.link, response.storage);
      }
    });

    e.preventDefault();
  });

})();

function deleted(id, user) {
  $('input#id_delete').val(id);
  $('#user').text(user);
}

function list() {
  $.ajax({
    type: 'GET',
    url: '{{ url('Users/list') }}',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response);
    }
  });
}

function clear_form(){
  $('form[name="form"]').find('[name]').not('input[name^="usergroup"]').val('');
  $('input[type="checkbox"].flat-blue').iCheck('uncheck');
  $('#uploadPreview').attr('src', 'img/users/users.png');
}

function status_action(id, status, clas) {
  $.ajax({
    type: 'POST',
    url: '{{ url('Users/status') }}',
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

      update_page('Users', 'page_users');
    }
  });
}

$('input[type="checkbox"].flat-blue').iCheck({
  checkboxClass: 'icheckbox_flat-blue'
});

$("[data-mask]").inputmask({mask: "99999999999999", placeholder: "",});

$(":file").filestyle({
  buttonName: "btn-default",
  iconName: "fa fa-image",
  buttonText: "Upload Photo",
  input: false,
  badge: false
});

function PreviewImage() {
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

  oFReader.onload = function (oFREvent) {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
  };
};
</script>