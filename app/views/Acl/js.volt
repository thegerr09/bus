<script type="text/javascript" class="init">
$(document).ready(function() {
	var table = $('#example').DataTable( {
		scrollY:        "310px",
		dom: 			'<"pull-left"f><"pull-right"i>tip',
		scrollX:        true,
		scrollCollapse: true,
		paging:         false,
  	lengthChange: 	false,
    ordering: 		  false,
		columnDefs: [
	        { "width": "25px",  "targets": [0] },
	        { "width": "128px", "targets": [1] },
	        { "width": "100px", "targets": [2] },
	        { "width": "100px", "targets": [3] },
	        { "width": "80px",  "targets": [4] },
	        { "width": "80px",  "targets": [5] },
	        { "width": "80px",  "targets": [6] },
	        { "width": "80px",  "targets": [7] },
	        { "width": "150px", "targets": [8] }
    	]
	});
	new $.fn.dataTable.FixedColumns( table, {
		leftColumns: 4,
	});
});

$('input[type="checkbox"].flat-blue').iCheck({
	checkboxClass: 'icheckbox_flat-blue'
});

$('.usergroup').on('ifChecked', 'input[type="checkbox"].flat-blue.check', function(event) {
	var val = $(this).val();
	var res = val.split(",");
	
    $.ajax({
      type: 'POST',
      url: 'Acl/access',
      dataType:'json',
      data: 'acl_id='+res[0]+'&ug_id='+res[1],
      success: function(response){
        new PNotify({
          title: response.title,
          text: response.text,
          type: response.type
        });
        update_page('Acl', 'page_acl');
      }
    });
}).on('ifUnchecked', 'input[type="checkbox"].flat-blue.check', function(event) {
	var val = $(this).val();
	var res = val.split(",");
	
    $.ajax({
      type: 'POST',
      url: 'Acl/access',
      dataType:'json',
      data: 'acl_id='+res[0]+'&ug_id='+res[1],
      success: function(response){
        new PNotify({
          title: response.title,
          text: response.text,
          type: response.type
        });
        update_page('Acl', 'page_acl');
      }
    });
});

$('.except').keyup(function(event) {
    newText = event.target.value;
    $('textarea.except').attr('textval', newText);
    console.log(newText);
});

function except(that) {
	var isi = $(that).html().trim();
	var id  = $(that).attr('acl');
	$(that).parent().html('<textarea class="form-control" onblur="return except_back(this)" style="width:100%; height:100%;" acl="'+id+'">'+isi+'</textarea>').click(); 
    $(that).parent().find('textarea').focus();
	return false;
}
function except_back(that){
	var isi = $(that).val();
	var id  = $(that).attr('acl');
	$(that).parent().html('<div ondblclick="return except(this)" style="padding: 10px;" acl="'+id+'">'+isi+'</div>');
	$.ajax({
        method: "POST",
        dataType: "json",
        url: 'Acl/except',
        data: 'id='+id+'&except='+isi,
        success: function(response){
	        new PNotify({
	          title: response.title,
	          text: response.text,
	          type: response.type
	        });
	        update_page('Acl', 'page_acl');
        }
    });
    return false;
}

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
        list();
        new PNotify({
          title: response.title,
          text: response.text,
          type: response.type
        });
        update_page('Acl', 'page_acl');
        clear_form(response.close);
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
        list();
        new PNotify({
          title: response.title,
          text: response.text,
          type: response.type
        });
        $('#Delete').modal('hide');
        update_page('Acl', 'page_acl');
      }
    });

    e.preventDefault();
  });

})();

function deleted(id, acl) {
  $('input#id_delete').val(id);
  $('#acl').text(acl);
}

function list() {
  $.ajax({
    type: 'GET',
    url: '{{ url('Acl/list') }}',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response).iCheck({
        checkboxClass: 'icheckbox_flat-blue'
      });
      var table = $('#example').DataTable( {
        scrollY:        "310px",
        dom:      '<"pull-left"f><"pull-right"i>tip',
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
            lengthChange:   false,
            ordering:     false,
        columnDefs: [
              { "width": "25px",  "targets": [0] },
              { "width": "128px", "targets": [1] },
              { "width": "100px", "targets": [2] },
              { "width": "100px", "targets": [3] },
              { "width": "80px",  "targets": [4] },
              { "width": "80px",  "targets": [5] },
              { "width": "80px",  "targets": [6] },
              { "width": "80px",  "targets": [7] },
              { "width": "150px", "targets": [8] }
          ]
      });
      new $.fn.dataTable.FixedColumns( table, {
        leftColumns: 4,
      });
    }
  });
}

function update_acl(id, controller, action) {
  $('form[name="update"] #u_id').val(id);
  $('form[name="update"] #u_controller').val(controller);
  $('form[name="update"] #u_actions').val(action);
}

function clear_form(id){
  $('form[name="group"]').find('[name]').not('input[name^="usergroup"]').val('');
  $('input[type="checkbox"].flat-blue.tambah').iCheck('uncheck');
  if (id == '1') {
    $('#Update').modal('hide');
  }
}

function status_action(id, status, clas) {
  $.ajax({
    type: 'POST',
    url: '{{ url('Acl/status') }}',
    dataType:'json',
    data: 'id='+id+'&active='+status+'&class='+clas,
    success: function(response){
      new PNotify({
        title: response.title,
        text: response.text,
        type: response.type,
        icon: response.icon
      });
      $("td i#button_status"+id).removeClass()
        .addClass('fa fa-power-off cursor text-'+response.class)
        .attr("onclick", "status_action("+id+", '"+response.status+"', '"+response.class+"')");

      $("td span#label_status"+id).removeClass()
        .addClass('label bg-'+response.class)
        .text(response.label);

      update_page('Acl', 'page_acl');
    }
  });
}
</script>