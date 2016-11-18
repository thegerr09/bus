<script type="text/javascript" class="init">
$(document).ready(function() {
	var table = $('#example').DataTable( {
		scrollY:        "310px",
		dom: 			'<"pull-left"f><"pull-right"i>tip',
		scrollX:        true,
		scrollCollapse: true,
		paging:         false,
      	lengthChange: 	false,
        ordering: 		false,
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

$('.usergroup').on('ifChecked', 'input[type="checkbox"].flat-blue', function(event) {
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
}).on('ifUnchecked', 'input[type="checkbox"].flat-blue', function(event) {
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

$('#example tr').on('click', '#except', function(event) {
	var val = $(this).attr('value');
	console.log(val+'1');
	$('#except').modal('show');
});
</script>