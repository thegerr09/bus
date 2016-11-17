<style>
.cursor:hover{
  cursor: pointer;
  color: #ccc;
}
</style>
<section class="content-header animated fadeIn">
  <h1>Usergroup</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>Data</li>
    <li class="active">usergroup</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Usergroup</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td width="60">
                    <b>No</b>
                  </td>
                  <td align="center" width="16%">
                    <b>Action</b>
                  </td>
                  <td align="center" width="20%">
                    <b>Usergroup</b>
                  </td>
                  <td align="center">
                    <b>Description</b>
                  </td>
                </tr>
              </thead>
              <tbody id="list_view">
                <?php $no = 1; ?>
                <?php foreach ($group as $x) { ?>
                <tr id="del<?= $x->id ?>">
                  <td align="center"><?php echo $no++; ?></td>
                  <td style="vertical-align:middle;">
                    <i class="fa fa-edit cursor" style="font-size:18px;" data-toggle="modal" data-target="#Tambah" onclick="update(<?= $x->id ?>)"></i> |
                    <i class="fa fa-trash cursor" style="font-size:18px;" data-toggle="modal" data-target="#Delete" onclick="deleted(<?= $x->id ?>,'<?= $x->usergroup ?>')"></i> |
                    <?php if ($x->active == 'Y') { ?>
                    <i class="fa fa-power-off cursor text-green" style="font-size:18px;" id="button_status<?= $x->id ?>" onclick="status_action(<?= $x->id ?>, 'N', 'red')"></i> |
                    <span class="label bg-green" id="label_status<?= $x->id ?>">active</span>
                    <?php } else { ?>
                    <i class="fa fa-power-off cursor text-red" style="font-size:18px;" id="button_status<?= $x->id ?>" onclick="status_action(<?= $x->id ?>, 'Y', 'green')"></i> |
                    <span class="label bg-red" id="label_status<?= $x->id ?>">not active</span>
                    <?php } ?>
                  </td>
                  <td><?= $x->usergroup ?></td>
                  <td><?= $x->description ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- popup -->
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_usergroup">Input Usergroup</h4>
      </div>

      <form name="group" action="<?= $this->url->get('Usergroup/input') ?>" method="POST" data-remote="data-remote">
        <div class="modal-body">
          <div class="form-group">
            <label>Usergroup</label>
            <input type="text" name="usergroup" class="form-control" placeholder="Usergroup">
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" placeholder="Text Description ..."></textarea>  
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
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
        <h4 class="modal-title">Delete Usergroup </h4>
      </div>

      <form name="delete" action="<?= $this->url->get('Usergroup/delete') ?>" method="POST" data-delete="data-delete">
        <div class="modal-body">
          <input type="hidden" name="id" id="id_delete" value="">
          <p>Apakah anda yakin akan menghapus usergroup "<span id="group" class="text-success"></span>"</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default close_btn" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- js -->
<script>

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
        new PNotify({
          title: response.title,
          text: response.text,
          type: response.type
        });
        update_page(response.link, response.storage);
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
          type: response.type,
          icon: response.icon
        });
        $('#Delete').modal('hide');
        $('#del'+response.id).fadeOut(1000);
        update_page(response.link, response.storage);
        update_page('Users', 'page_users');
      }
    });

    e.preventDefault();
  });

})();

function deleted(id, group) {
  $('input#id_delete').val(id);
  $('#group').text(group);
}

function update(id) {
  $.ajax({
    type: 'GET',
    url: '<?= $this->url->get('Usergroup/detail/') ?>'+id,
    dataType:'json',
    success: function(response){
      $.each(response, function(key, value) {
        $('form[name="group"]').find('[name="'+key+'"]').val(value);
      });
      $('#label_usergroup').text('Update Usergroup');
      $('form[name="group"]').attr('action', '<?= $this->url->get('Usergroup/update/') ?>'+id);
    }
  });
}

function list() {
  $.ajax({
    type: 'GET',
    url: '<?= $this->url->get('Usergroup/list') ?>',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response);
    }
  });
}

function clear_form(id) {
  $('form[name="delete"]').find('[name]').val('');
  $('form[name="group"]').find('[name]').val('');
  $('#label_usergroup').text('Input Usergroup');
  $('form[name="group"]').attr('action', '<?= $this->url->get('Usergroup/input') ?>');

  if (id == '1') { $('#Tambah').modal('hide'); }
}

function status_action(id, status, clas) {
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Usergroup/status') ?>',
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

      update_page('Usergroup', 'page_usergroup');
      update_page('Users', 'page_users');
    }
  });
}
</script>