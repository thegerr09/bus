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

function list() {
  $.ajax({
    type: 'GET',
    url: '{{ url('Bus/list') }}',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response);
      $('input[type="checkbox"].flat-blue').iCheck({
        checkboxClass: 'icheckbox_flat-blue'
      });
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
	// var val = $(this).val();
	// var res = val.split(",");
	
 //    $.ajax({
 //      type: 'POST',
 //      url: 'Acl/access',
 //      dataType:'json',
 //      data: 'acl_id='+res[0]+'&ug_id='+res[1],
 //      success: function(response){
 //        new PNotify({
 //          title: response.title,
 //          text: response.text,
 //          type: response.type
 //        });
 //        update_page('Acl', 'page_acl');
 //      }
 //    });
}).on('ifUnchecked', 'input[type="checkbox"].flat-blue.check', function(event) {
	// var val = $(this).val();
	// var res = val.split(",");
	
 //    $.ajax({
 //      type: 'POST',
 //      url: 'Acl/access',
 //      dataType:'json',
 //      data: 'acl_id='+res[0]+'&ug_id='+res[1],
 //      success: function(response){
 //        new PNotify({
 //          title: response.title,
 //          text: response.text,
 //          type: response.type
 //        });
 //        update_page('Acl', 'page_acl');
 //      }
 //    });
});

</script>