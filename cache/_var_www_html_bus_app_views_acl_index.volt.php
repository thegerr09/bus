<style>
#except:hover{
  cursor: pointer;
  background-color: rgba(209,197,197,0.25);
}
</style>
<section class="content-header animated fadeIn">
  <h1>Access Control List</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
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
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
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
              <tr>
                <td><?= $no ?></td>
                <td>
                  <i class="fa fa-edit cursor" style="font-size:18px;"></i> |
                  <i class="fa fa-trash cursor" style="font-size:18px;"></i> |
                  <i class="fa fa-power-off cursor text-green" style="font-size:18px;"></i> |
                  <span class="label bg-green">Active</span>
                </td>
                <td><?= $x->controller ?></td>
                <td><?php if (isset($x->action)) { ?><?= $x->action ?><?php } else { ?>{default index}<?php } ?></td>
                <?php foreach ($this->AclAction->usergroup() as $ug) { ?>
                <td align="center">
                  <label class="usergroup">
                    <input type="checkbox" class="flat-blue" value="<?= $x->id ?>,<?= $ug->id ?>"
                    <?php if ($this->isIncluded($ug->id, $this->AclAction->acl_usergroup($x->usergroup))) { ?>checked<?php } ?>>
                  </label>
                </td>
                <?php } ?>
                <td id="except" value="<?= $x->except ?>"><?= $x->except ?></td>
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

<!-- include Popup -->
<div class="modal fade" id="except" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Except Usergroup </h4>
      </div>

      <form name="delete" action="<?= $this->url->get('Usergroup/delete') ?>" method="POST" data-remote="data-remote">
        <div class="modal-body">
          <div class="form-group">
            <?php foreach ($this->AclAction->usergroup() as $exc) { ?>
            <label>
              <input type="checkbox" class="flat-blue" value="<?= $exc->id ?>"> <?= $exc->usergroup ?>
            </label>
            <?php } ?>
          </div>
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