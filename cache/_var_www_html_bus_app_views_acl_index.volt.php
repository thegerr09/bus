<style>
#except:hover{
  cursor: pointer;
  background-color: rgba(209,197,197,0.25);
}
.cursor:hover{
  cursor: pointer;
  color: #ccc;
}
.usergroup{
  cursor: pointer;
  color: #807c7c;
}
</style>
<section class="content-header animated fadeIn">
  <h1>Access Control List</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>Data Master</li>
    <li class="active">acl</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Acl</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah" onclick="clear_form()">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body" id="list_view">
          <table id="example" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Action</th>
                <th>Controller</th>
                <th>Action</th>
                <?php foreach ($this->AclAction->usergroup() as $ug) { ?>
                <th><?= $ug->usergroup ?></th>
                <?php } ?>
                <th>Except</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($acl as $x) { ?>
              <tr id="del<?= $x->id ?>">
                <td><?= $no ?></td>
                <td>
                  <i class="fa fa-edit cursor" style="font-size:18px;" data-toggle="modal" data-target="#Update" onclick="update_acl('<?= $x->id ?>', '<?= $x->controller ?>', '<?= $x->action ?>')"></i> |
                  <i class="fa fa-trash cursor" style="font-size:18px;" data-toggle="modal" data-target="#Delete" onclick="deleted('<?= $x->id ?>', '<?= $x->controller ?>')"></i> |
                  <?php if ($x->active == 'Y') { ?>
                  <i class="fa fa-power-off cursor text-green" style="font-size:18px;" id="button_status<?= $x->id ?>" onclick="status_action(<?= $x->id ?>, 'N', 'red')"></i> |
                  <span class="label bg-green" id="label_status<?= $x->id ?>">active</span>
                  <?php } else { ?>
                  <i class="fa fa-power-off cursor text-red" style="font-size:18px;" id="button_status<?= $x->id ?>" onclick="status_action(<?= $x->id ?>, 'Y', 'green')"></i> |
                  <span class="label bg-red" id="label_status<?= $x->id ?>">not active</span>
                  <?php } ?>
                </td>
                <td><?= $x->controller ?></td>
                <td><?php if ($x->action != null) { ?><?= $x->action ?><?php } else { ?>{default index}<?php } ?></td>
                <?php foreach ($this->AclAction->usergroup() as $ug) { ?>
                <td align="center">
                  <label class="usergroup">
                    <input type="checkbox" class="flat-blue check" value="<?= $x->id ?>,<?= $ug->id ?>"
                    <?php if ($this->isIncluded($ug->id, $this->AclAction->acl_usergroup($x->usergroup))) { ?>checked<?php } ?>>
                  </label>
                </td>
                <?php } ?>
                <td style="padding: 0px;"><div ondblclick="return except(this)" style="padding: 10px;" acl="<?= $x->id ?>"><?= $x->except ?></div></td>
              </tr>
              <?php $no = $no + 1; ?>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- include JS -->
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_usergroup">Input Acl</h4>
      </div>

      <form name="group" action="<?= $this->url->get('Acl/input') ?>" method="POST" data-remote="data-remote">
        <div class="modal-body">
          <div class="form-group">
            <label>Controller</label>
            <input type="text" name="controller" class="form-control" placeholder="Controller">
          </div>
          <div class="form-group">
            <label>Action</label>
            <input type="text" name="actions" class="form-control" placeholder="Action"> 
          </div>
          <div class="form-group">
            <label>Usergroup</label><br>
            <?php foreach ($this->AclAction->usergroup() as $ug) { ?>
            <td align="center">
              <label class="usergroup">
                <input type="checkbox" name="usergroup[]" class="flat-blue tambah" value="<?= $ug->id ?>"> <?= $ug->usergroup ?>
              </label><br>
            </td>
            <?php } ?>
          </div>
          <div class="form-group">
            <label>Except</label>
            <textarea name="except" class="form-control" placeholder="Except usergroup ..."></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>
<div class="modal fade" id="Update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Update Acl</h4>
      </div>

      <form name="update" action="<?= $this->url->get('Acl/update') ?>" method="POST" data-remote="data-remote">
        <input type="hidden" name="id" id="u_id">
        <div class="modal-body">
          <div class="form-group">
            <label>Controller</label>
            <input type="text" name="controller" id="u_controller" class="form-control" placeholder="Controller">
          </div>
          <div class="form-group">
            <label>Action</label>
            <input type="text" name="actions" id="u_actions" class="form-control" placeholder="Action"> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>

    </div>
  </div>
</div>
<div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Delete Acl </h4>
      </div>

      <form name="delete" action="<?= $this->url->get('Acl/delete') ?>" method="POST" data-delete="data-delete">
        <div class="modal-body">
          <input type="hidden" name="id" id="id_delete" value="">
          <p>Apakah anda yakin akan menghapus Controller "<span id="acl" class="text-danger"></span>"</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default close_btn" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- include JS -->
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
    url: '<?= $this->url->get('Acl/list') ?>',
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
    url: '<?= $this->url->get('Acl/status') ?>',
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