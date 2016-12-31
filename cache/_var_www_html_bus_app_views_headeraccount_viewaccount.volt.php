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
          <h3 class="box-title">List Account</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#TambahAccount" onclick="clear_form()">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="account" class="table table-bordered table-hover">
              <thead class="bg-blue">
                <tr>
                  <td align="center" width="40">NO</td>
                  <td align="center" width="70">ACTION</td>
                  <td align="center">NAMA ACCOUNT</td>
                  <td align="center">HEADER</td>
                  <td align="center">TIPE</td>
                </tr>
              </thead>
              <tbody id="list_account">
                <?php $no = 1; ?>
                <?php foreach ($account as $a) { ?>
                <tr id="delAccount<?= $a->id ?>">
                  <td><?= $no ?></td>
                  <td>
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#TambahAccount" onclick="update_account(<?= $a->id ?>, '<?= $a->account ?>', '<?= $a->id_header ?>', '<?= $a->name_header ?>', '<?= $a->tipe ?>')">
                      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DeleteAccount" onclick="deleted(<?= $a->id ?>,'<?= $a->account ?>', 'account')">
                      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                    </button>
                  </td>
                  <td><?= $a->account ?></td>
                  <td><?= $a->name_header ?></td>
                  <td><?= $a->tipe ?></td>
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
<div class="modal fade" id="TambahAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_header">Input Account</h4>
      </div>

      <form name="account" action="<?= $this->url->get('HeaderAccount/input/account') ?>" method="POST" data-remote="data-remote">
        <input type="hidden" name="id">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Account</label>
            <input type="text" name="account" class="form-control" placeholder="Nama account">
          </div>
          <div class="form-group">
            <label>Header</label>
            <select name="id_header" class="form-control" onchange="headerr(this)">
              <?= $this->Helpers->tagHeader() ?>
            </select>
            <input type="hidden" name="name_header">
          </div>
          <div class="form-group">
            <label>Tipe Account</label>
            <select name="tipe" class="form-control">
              <option value="">Pilih Tipe</option>
              <option value="debet">Debet</option>
              <option value="kredit">Kredit</option>
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
<div class="modal fade" id="DeleteAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Delete Account </h4>
      </div>

      <form name="deleteAccount" action="<?= $this->url->get('HeaderAccount/delete/account') ?>" method="POST" data-delete="data-delete">
        <div class="modal-body">
          <input type="hidden" name="id" id="id_delete_account" value="">
          <p>Apakah anda yakin akan menghapus Account "<span id="account_label" class="text-red"></span>" ?</p>
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