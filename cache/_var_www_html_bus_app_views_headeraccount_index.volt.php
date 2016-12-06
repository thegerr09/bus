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

    <div class="col-md-5">
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
                  <td align="center">JENIS</td>
                </tr>
              </thead>
              <tbody id="list_header">
                <?php $no = 1; ?>
                <?php foreach ($header as $h) { ?>
                <tr id="del<?= $h->id ?>">
                  <td align="center"><?= $no ?></td>
                  <td align="center">
                    <button type="button" class="btn btn-primary btn-xs">
                      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DeleteHeader" onclick="deleted(<?= $h->id ?>,'<?= $h->header ?>', 'header')">
                      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                    </button>
                  </td>
                  <td><?= $h->header ?></td>
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

    <div class="col-md-7">
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
                </tr>
              </thead>
              <tbody id="list_account">
                <?php $no = 1; ?>
                <?php foreach ($account as $a) { ?>
                <tr>
                  <td><?= $no ?></td>
                  <td>
                    <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                  </td>
                  <td><?= $a->account ?></td>
                  <td><?= $a->name_header ?></td>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_header">Input Header</h4>
      </div>

      <form name="header" action="<?= $this->url->get('HeaderAccount/input/header') ?>" method="POST" data-remote="data-remote">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Header</label>
            <input type="text" name="header" class="form-control" placeholder="Nama Header">
          </div>
          <div class="form-group">
            <label>Jenis</label>
            <select name="jenis" class="form-control">
              <option value="">Pilih Jenis</option>
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
<div class="modal fade" id="TambahAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_header">Input Account</h4>
      </div>

      <form name="account" action="<?= $this->url->get('HeaderAccount/input/account') ?>" method="POST" data-remote="data-remote">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Account</label>
            <input type="text" name="account" class="form-control" placeholder="Nama account">
          </div>
          <div class="form-group">
            <label>Header</label>
            <select name="jenis" class="form-control">
              <option value="">Pilih Header</option>
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
          <input type="hidden" name="id" id="id_delete" value="">
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
		dom: '<"pull-left"f><"pull-right"s>tp',
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
        update_page('HeaderAccount', 'page_header_account');
        clear_form(response.close);
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
        $('#del'+response.id).fadeOut(700);
        update_page('HeaderAccount', 'page_header_account');
        console.log(response.id);
      }
    });

    e.preventDefault();
  });

})();

function deleted(id, header, check) {
  $('input#id_delete').val(id);
  $('#header_label').text(header);
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

function clear_form() {
	
}
</script>