<script>
(function() {

  $('form[data-remote]').on('submit', function(e) {
    var form      = $(this);
    var url    	  = form.prop('action');
    var array_url = url.split("/");
    var last      = array_url.length - 1;
    var last2     = last - 1;
    var action	  = array_url[last];
    var action2	  = array_url[last2];

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
        update_page('Tarif', 'page_tarif');
        clear_form(response.close);
        if (action == 'inputRoute' || action2 == 'updateRoute' ) {
	        listRoute();
        } else {
	        listTarif();
        }
      }
    });
 
    e.preventDefault();
  });

})();

(function() {

  $('form[data-delete]').on('submit', function(e) {
    var form = $(this);
    var url = form.prop('action');
    var array_url = url.split("/");
    var last      = array_url.length - 1;
    var action	  = array_url[last];

   	// console.log(action);
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

        if (action == "deleteRoute") {
	        $('#delRoute').modal('hide');
	        $('#delR'+response.id).fadeOut(700);
	        $('#delRA'+response.id).fadeOut(700);
        } else {
	        $('#delTarif').modal('hide');
	        $('#delT'+response.id)	.fadeOut(700);
        }
        update_page('Tarif', 'page_tarif');
      }
    });

    e.preventDefault();
  });

})();


function updateRoute(id) {
  $('#label_route').text('Update Route');
	$('form[name="route"]').attr('action', '{{ url('Tarif/updateRoute/') }}'+id);
	$.ajax({
    type: 'POST',
    url: '{{ url('Tarif/detail') }}',
    dataType:'json',
    data: 'id=' + id + '&type=route',
    success: function(response){
      $.each(response, function(key, value) {
        $('form[name="route"]').find('[name="'+key+'"]')
          .not('input[name="area"]')
          .val(value);
      });
    }
  });
}

function deleteRoute(id, deleted) {
	$('form[name="delRoute"] #id_delete').val(id);
	$('span#deleteRoute').text(deleted);
}

function listRoute() {
  $.ajax({
    type: 'GET',
    url: '{{ url('Tarif/route') }}',
    dataType:'html',
    success: function(response){
      $('#list_route').html(response);
    }
  });
}

function updateTarif(id) {
  $('form[name="tarif"]').attr('action', '{{ url('Tarif/updateTarif/') }}'+id);
  $('#label_tarif').text('Update Tarif');
  $.ajax({
    type: 'POST',
    url: '{{ url('Tarif/detail') }}',
    dataType:'json',
    data: 'id=' + id,
    success: function(response){
      $.each(response, function(key, value) {
        $('form[name="tarif"]').find('[name="'+key+'"]')
          .not('input[name="route_id"]')
          .val(value);
      });
    }
  });
}

function deleteTarif(id, deleted) {
	$('form[name="delTarif"] #id_delete').val(id);
	$('span#deleteTarif').text(deleted);
}

function listTarif() {
  $.ajax({
    type: 'GET',
    url: '{{ url('Tarif/tarif') }}',
    dataType:'html',
    success: function(response){
      $('#list_tarif').html(response);
    }
  });
}

function searchRoute(that) {
  var val = $(that).val();
  $('.route_id').collapse();
  $.ajax({
    type: 'GET',
    url: '{{ url('Tarif/routeList/') }}' + val,
    dataType:'html',
    success: function(response){
      $('#route_list').html(response);
    }
  });
}

$("[data-med-agen]").inputmask({mask: "9999999999", placeholder: "",});
$("[data-big-agen]").inputmask({mask: "9999999999", placeholder: "",});
$("[data-med-umum]").inputmask({mask: "9999999999", placeholder: "",});
$("[data-big-umum]").inputmask({mask: "9999999999", placeholder: "",});

function clear_form(id) {
  $('form[name="route"]').find('[name]').val('');
  $('form[name="tarif"]').find('[name]').val('');
  $('#label_route').text('Tambah Route');
  $('#label_tarif').text('Tambah Tarif');
  $('form[name="route"]').attr('action', '{{ url('Tarif/inputRoute') }}');
  $('form[name="tarif"]').attr('action', '{{ url('Tarif/inputTarif') }}');
  if (id == '1') {
    $('#tambahRoute').modal('hide');
    $('#tambahTarif').modal('hide');
  }
}
</script>