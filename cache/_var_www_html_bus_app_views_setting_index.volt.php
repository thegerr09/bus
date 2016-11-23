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
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah">
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
                <tr>
                  <td><?= $no ?></td>
                  <td>
                    <i class="fa fa-edit cursor" data-toggle="modal" data-target="#Tambah" onclick="update('<?= $x->id ?>', '<?= $x->name ?>', '<?= $x->setting ?>')"></i> | 
                    <i class="fa fa-trash cursor" data-toggle="modal" data-target="#Delete"></i> | 
                    <i class="fa fa-power-off cursor text-green"></i> |
                    <span class="label bg-green">active</span>
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
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form(0)">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_setting">Input Driver</h4>
      </div>

      <form name="settings" action="<?= $this->url->get('Setting/input') ?>" method="POST" data-remote="data-remote">
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

function update(id, name, setting) {
	$('form[name="settings"]').attr('action', '<?= $this->url->get('Setting/update/') ?>'+id);
	$('form[name="setting"]').find('[name="name"]').val(name);
	$('form[name="settings"]').find('[name="setting"]').val(setting);
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

function clear_form(id){
  $('form[name="settings"]').find('[name]').val('');
  if (id == '1') {
    $('#Tambah').modal('hide');
  } else {
    $('#label_setting').text('Input Setting');
    $('form[name="settings"]').attr('action', '<?= $this->url->get('Setting/input') ?>');
    var btn_submit = $('form[name="settings"]').find('button[type="submit"]');
    btn_submit.removeClass('btn-primary');
    btn_submit.addClass('btn-success');
    btn_submit.text('Save');
  }
}
</script>