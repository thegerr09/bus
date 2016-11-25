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
        update_page('Bus', 'page_bus');
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
        update_page('Bus', 'page_bus');
      }
    });

    e.preventDefault();
  });

})();

function detail() {
  $.ajax({
    type: 'GET',
    url: '{{ url('Bus/detail') }}',
    dataType:'html',
    success: function(response){
      $('#detail_view').html(response);
    }
  });
}

function deleted(id, bus) {
  $('input#id_delete').val(id);
  $('span#bus').text(bus);
}

function update(id) {
  $('#label_bus').text('Update Bus');
  $('form[name="form"]').attr('action', '{{ url('Bus/update/') }}'+id);
  var btn_submit = $('form[name="form"]').find('button[type="submit"]');
  btn_submit.removeClass('btn-success');
  btn_submit.addClass('btn-primary');
  btn_submit.text('Save Update');

  $.ajax({
    type: 'GET',
    url: '{{ url('Bus/detail/') }}'+id,
    dataType:'json',
    success: function(response){
      $.each(response, function(key, value) {
        $('form[name="form"]').find('[name="'+key+'"]')
          .not('input[name="image"]')
          .val(value);
        if (key == 'image') {
          $('input[name="remove_image"]').val(value);
          $('#uploadPreview').attr('src', 'img/bus/'+value);
        }
      });
    }
  });
}

function list() {
  $.ajax({
    type: 'GET',
    url: '{{ url('Bus/list') }}',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response);
      $('input[type="checkbox"].flat-blue').iCheck({
        checkboxClass: 'icheckbox_flat-green'
      });
    }
  });
}

function status_action(id, status, clas) {
  $.ajax({
    type: 'POST',
    url: '{{ url('Bus/status') }}',
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

       if (response.type == 'error') {
         $('#kondisi'+id).hide();
       } else {
         $('#kondisi'+id).show();
       }

      update_page('Bus', 'page_bus');
    }
  });
}

function PreviewImage() {
  $('input[name="remove_image"]').val('');
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

  oFReader.onload = function (oFREvent) {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
  };
};

$(":file").filestyle({
  buttonName: "btn-default btn-xs",
  iconName: "fa fa-image",
  buttonText: "Upload Photo",
  input: false,
  badge: false
});

$("[data-cc]").inputmask({mask: "99999", placeholder: "",});

$('[data-pajak]').datetimepicker({ 
	viewMode: 'days',
    format: 'YYYY-MM-DD'
});
$('[data-tahun-perakitan]').datetimepicker({ 
	viewMode: 'years',
    format: 'YYYY'
});
$('[data-tahun-beli]').datetimepicker({ 
	viewMode: 'years',
    format: 'YYYY'
});

function clear_form(id){
  $('form[name="form"]').find('[name]').val('');
  $('#uploadPreview').attr('src', 'img/bus/bus.jpg');
  if (id == '1') {
    $('#Tambah').modal('hide');
  } else {
    $('#label_bus').text('Input Bus');
    $('form[name="form"]').attr('action', '{{ url('Bus/input') }}');
    var btn_submit = $('form[name="form"]').find('button[type="submit"]');
    btn_submit.removeClass('btn-primary');
    btn_submit.addClass('btn-success');
    btn_submit.text('Save');
  }
}

$('input[type="checkbox"].flat-blue').iCheck({
	checkboxClass: 'icheckbox_flat-green'
});

$('.usergroup').on('ifChecked', 'input[type="checkbox"].flat-blue.check', function(event) {
  var id = $(this).val();

	$.ajax({
    type: 'POST',
    url: '{{ url('Bus/kondisi') }}',
    dataType:'json',
    data: 'id='+id+'&kondisi=N',
    success: function(response){
      new PNotify({
        title: response.title,
        text: response.text,
        type: response.type,
        icon: response.icon
      });
      $("#status_kondisi"+id).removeClass()
        .addClass('label bg-'+response.class)
        .text(response.label);

      update_page('Bus', 'page_bus');
    }
  });
}).on('ifUnchecked', 'input[type="checkbox"].flat-blue.check', function(event) {
  var id = $(this).val();

  $.ajax({
    type: 'POST',
    url: '{{ url('Bus/kondisi') }}',
    dataType:'json',
    data: 'id='+id+'&kondisi=Y',
    success: function(response){
      new PNotify({
        title: response.title,
        text: response.text,
        type: response.type,
        icon: response.icon
      });
      $("#status_kondisi"+id).removeClass()
        .addClass('label bg-'+response.class)
        .text(response.label);

      update_page('Bus', 'page_bus');
    }
  });
});

</script>