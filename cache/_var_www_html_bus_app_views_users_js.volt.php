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

function update(id) {
  $('#label_users').text('Update Users');
  $('form[name="form"]').attr('action', '<?= $this->url->get('Users/update/') ?>'+id);
  var btn_submit = $('form[name="form"]').find('button[type="submit"]');
  btn_submit.removeClass('btn-success');
  btn_submit.addClass('btn-primary');
  btn_submit.text('Save Update');

  $.ajax({
    type: 'GET',
    url: '<?= $this->url->get('Users/detail/') ?>'+id,
    dataType:'json',
    success: function(response){
      $.each(response, function(key, value) {
        $('form[name="form"]').find('[name="'+key+'"]')
          .not('input[name^="usergroup"]')
          .not('input[name="image"]')
          .not('input[name="password"]')
          .val(value);
        if (key == 'image') {
          $('input[name="remove_image"]').val(value);
          $('#uploadPreview').attr('src', 'img/users/'+value);
        }
        var str = response.usergroup;
        var res = str.split(",");
        for (var i = 0; i < res.length; i++) {
          $('input[type="checkbox"].flat-blue#data'+res[i]).iCheck('check');
        }
      });
    }
  });
}

function list() {
  $.ajax({
    type: 'GET',
    url: '<?= $this->url->get('Users/list') ?>',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response);
    }
  });
}

function clear_form(id){
  $('form[name="form"]').find('[name]').not('input[name^="usergroup"]').val('');
  $('input[type="checkbox"].flat-blue').iCheck('uncheck');
  $('#uploadPreview').attr('src', 'img/users/users.png');
  if (id == '1') { $('#Tambah').modal('hide'); }
}

function status_action(id, status, clas) {
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Users/status') ?>',
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
  $('input[name="remove_image"]').val('');
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

  oFReader.onload = function (oFREvent) {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
  };
};
</script>