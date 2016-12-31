<section class="content-header animated fadeIn">
  <h1>Header Account</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>Akuntansi</li>
    <li class="active">header account</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Header</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#TambahHeader" onclick="clear_form()">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="header" class="table table-bordered table-hover">
              <thead class="bg-blue">
                <tr>
                  <td align="center" width="30">NO</td>
                  <td align="center" width="60">ACTION</td>
                  <td align="center">NAMA HEADER</td>
                  <td align="center">GROUP</td>
                  <td align="center">JENIS</td>
                </tr>
              </thead>
              <tbody id="list_header">
                <?php $no = 1; ?>
                <?php foreach ($header as $h) { ?>
                <tr id="delHeader<?= $h->id ?>">
                  <td align="center"><?= $no ?></td>
                  <td align="center">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#TambahHeader" onclick="update_header(<?= $h->id ?>, '<?= $h->header ?>', '<?= $h->group ?>', '<?= $h->jenis ?>', 'header')">
                      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DeleteHeader" onclick="deleted(<?= $h->id ?>,'<?= $h->header ?>', 'header')">
                      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                    </button>
                  </td>
                  <td><?= $h->header ?></td>
                  <td><?= $h->group ?></td>
                  <td><?= $h->jenis ?></td>
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

<!-- popup -->
<div class="modal fade" id="TambahHeader" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_header">Input Header</h4>
      </div>

      <form name="header" action="<?= $this->url->get('HeaderAccount/input/header') ?>" method="POST" data-remote="data-remote">
        <input type="hidden" name="id">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Header</label>
            <input type="text" name="header" class="form-control" placeholder="Nama Header">
          </div>
          <div class="form-group">
            <label>Group</label>
            <select name="group" class="form-control">
              <?= $this->Helpers->tagSetting('group_header', 'Pilih Group', '') ?>
            </select>
          </div>
          <div class="form-group">
            <label>Jenis</label>
            <select name="jenis" class="form-control">
              <option value="">Pilih Jenis</option>
              <option value="kas">Kas</option>
              <option value="bank">Bank</option>
            </select>
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
<div class="modal fade" id="DeleteHeader" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Delete Header </h4>
      </div>

      <form name="deleteHeader" action="<?= $this->url->get('HeaderAccount/delete/header') ?>" method="POST" data-delete="data-delete">
        <div class="modal-body">
          <input type="hidden" name="id" id="id_delete_header" value="">
          <p>Apakah anda yakin akan menghapus Header "<span id="header_label" class="text-red"></span>" ?</p>
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
$(function () {
	$("#header").DataTable({
		ordering: false
	});
	$("#account").DataTable({
	    ordering: false
	});
});

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
        update_page('HeaderAccount/view/header', 'page_header');
        update_page('HeaderAccount/view/account', 'page_account');
        update_page('Jurnal', 'page_jurnal');
        clear_form();
        $('#Tambah'+response.close).modal('hide');
        list(response.check);
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
        $('#Delete'+response.check).modal('hide');
        $('#del'+response.check+response.id).fadeOut(700);
        update_page('HeaderAccount/view/header', 'page_header');
        update_page('HeaderAccount/view/account', 'page_account');
        update_page('Jurnal', 'page_jurnal');
      }
    });

    e.preventDefault();
  });

})();

function deleted(id, val, check) {
  if (check == 'header') {
    $('input#id_delete_header').val(id);
    $('#header_label').text(val);
  } else if (check == 'account') {
    $('input#id_delete_account').val(id);
    $('#account_label').text(val);
  }
}

function update_header(id, header, group, jenis) {
  $('#label_header').val('Update Header');
  $('form[name="header"]').attr('action', '<?= $this->url->get('HeaderAccount/update/header') ?>');
  $('input[name="id"]').val(id);
  $('input[name="header"]').val(header);
  $('select[name="group"]').val(group);
  $('select[name="jenis"]').val(jenis);
}

function update_account(id, account, id_header, header, tipe) {
  $('#label_header').val('Update Account');
  $('form[name="account"]').attr('action', '<?= $this->url->get('HeaderAccount/update/account') ?>');
  $('form[name="account"]').find('input[name="id"]').val(id);
  $('input[name="account"]').val(account);
  $('select[name="id_header"]').val(id_header);
  $('input[name="name_header"]').val(header);
  $('select[name="tipe"]').val(tipe);
}

function list(check) {
  if (check == 'header') {
    $.ajax({
      type: 'GET',
      url: '<?= $this->url->get('HeaderAccount/list/header') ?>',
      dataType:'html',
      success: function(response){
        $('#list_header').html(response);
      }
    });
  } else if (check == 'account') {
    $.ajax({
      type: 'GET',
      url: '<?= $this->url->get('HeaderAccount/list/account') ?>',
      dataType:'html',
      success: function(response){
        $('#list_account').html(response);
      }
    });
  }
}

function headerr(that) {
  var val  = $(that).val();
  var name = $(that).find('[value="'+val+'"]').text();
  $('form[name="account"]').find('[name="name_header"]').val(name);  
}

function clear_form() {
  $('form[name="header"]').find('[name]').val('');
  $('form[name="header"]').attr('action', '<?= $this->url->get('HeaderAccount/input/header') ?>');
  $('form[name="account"]').find('[name]').val('');
  $('form[name="account"]').attr('action', '<?= $this->url->get('HeaderAccount/input/account') ?>');
}
</script>