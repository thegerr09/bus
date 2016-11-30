<style>
.cursor{
  font-size: 18px;
}
.cursor:hover{
  cursor: pointer;
  color: #ccc;
}
</style>
<section class="content-header animated fadeIn">
  <h1>Setting</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>Data Master</li>
    <li class="active">setting</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Setting</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah" onclick="clear_form(0)">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th width="30">No.</th>
                  <th width="16%">Action</th>
                  <th width="20%">Name</th>
                  <th>Settings</th>
                </tr>
              </thead>
              <tbody id="list_view">
                <?php $no = 1; ?>
                <?php foreach ($setting as $x) { ?>
                <tr id="del<?= $x->id ?>">
                  <td><?= $no ?></td>
                  <td>
                    <i class="fa fa-edit cursor" data-toggle="modal" data-target="#Tambah" onclick="update('<?= $x->id ?>', '<?= $x->name ?>')"></i> | 
                    <i class="fa fa-trash cursor" data-toggle="modal" data-target="#Delete" onclick="deleted('<?= $x->id ?>', '<?= $x->name ?>')"></i> | 
                    <?php if ($x->active == 'Y') { ?>
                    <i class="fa fa-power-off cursor text-green" style="font-size:18px;" id="button_status<?= $x->id ?>" onclick="status_action(<?= $x->id ?>, 'N', 'red')"></i> |
                    <span class="label bg-green" id="label_status<?= $x->id ?>">active</span>
                    <?php } else { ?>
                    <i class="fa fa-power-off cursor text-red" style="font-size:18px;" id="button_status<?= $x->id ?>" onclick="status_action(<?= $x->id ?>, 'Y', 'green')"></i> |
                    <span class="label bg-red" id="label_status<?= $x->id ?>">not active</span>
                    <?php } ?>
                  </td>
                  <td><?= $x->name ?></td>
                  <td><?= $x->setting ?></td>
                </tr>
                <?php $no = $no + 1; ?>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- include popup -->
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form(0)">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_setting">Input Driver</h4>
      </div>

      <form name="setting" action="<?= $this->url->get('Setting/input') ?>" method="POST" data-remote="data-remote">
        <div class="modal-body">
          <div class="form-group">
            <label>Name Setting</label>
            <input type="text" name="name" class="form-control" placeholder="Name Setting">
          </div>
          <div class="form-group">
            <label>Setting</label>
            <textarea name="setting" class="form-control" placeholder="Input Setting ..." style="height:100px;"></textarea>  
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form(0)">Close</button>
          <button type="submit" class="btn btn-success">Save</button>
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
        <h4 class="modal-title">Delete Driver</h4>
      </div>

      <form name="delete" action="<?= $this->url->get('Setting/delete') ?>" method="POST" data-delete="data-delete">
        <div class="modal-body">
          <input type="hidden" name="id" id="id_delete" value="">
          <p>Apakah anda yakin akan menghapus Setting "<span id="setting" class="text-success"></span>" ?</p>
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
        update_page('Setting', 'page_setting');
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
          type: response.type,
          icon: response.icon
        });
        $('#Delete').modal('hide');
        $('#del'+response.id).fadeOut(1000);
        update_page('Setting', 'page_setting');
      }
    });

    e.preventDefault();
  });

})();

function update(id, name) {
	var setting = $('#del'+id+' > td').eq(3).text();
	$('#label_setting').text('Update Setting');
	$('form[name="setting"]').attr('action', '<?= $this->url->get('Setting/update/') ?>'+id);
	$('input[name="name"]').val(name);
	$('textarea[name="setting"]').val(setting);


    var btn_submit = $('form[name="setting"]').find('button[type="submit"]');
    btn_submit.removeClass('btn-success');
    btn_submit.addClass('btn-primary');
    btn_submit.text('Save Changes');
}

function deleted(id, setting) {
  $('input#id_delete').val(id);
  $('span#setting').text(setting);
}

function list() {
  $.ajax({
    type: 'GET',
    url: '<?= $this->url->get('Setting/list') ?>',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response);
    }
  });
}

function status_action(id, status, clas) {
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Setting/status') ?>',
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

      update_page('Driver', 'page_driver');
    }
  });
}

function clear_form(id){
  $('form[name="setting"]').find('[name]').val('');
  if (id == '1') {
    $('#Tambah').modal('hide');
  } else {
    $('#label_setting').text('Input Setting');
    $('form[name="setting"]').attr('action', '<?= $this->url->get('Setting/input') ?>');
    var btn_submit = $('form[name="setting"]').find('button[type="submit"]');
    btn_submit.removeClass('btn-primary');
    btn_submit.addClass('btn-success');
    btn_submit.text('Save');
  }
}
</script>