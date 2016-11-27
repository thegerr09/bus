<style>
.cursor:hover{
  cursor: pointer;
  color: #ccc;
}
td {
  font-size: 12px;
}
</style>
<section class="content-header animated fadeIn">
  <h1>Tarif</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>Data Master</li>
    <li class="active">tarif</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-3 col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Route Bus</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#tambahRoute" onclick="clear_form()">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="bg-blue">
                <tr>
                  <th>KOTA ASAL</th>
                  <th>KOTA TUJUAN</th>
                </tr>
              </thead>
              <tbody id="list_route">
                <?php foreach ($route as $r) { ?>
                <tr id="delR<?= $r->id ?>" data-toggle="collapse" data-target="#delRA<?= $r->id ?>" aria-expanded="false" aria-controls="delRA<?= $r->id ?>">
                  <td><?= $r->asal ?></td>
                  <td><?= $r->tujuan ?></td>
                </tr>
                <tr class="collapse" id="delRA<?= $r->id ?>">
                  <td colspan="2" align="center">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#tambahRoute" onclick="updateRoute('<?= $r->id ?>', '<?= $r->asal ?>', '<?= $r->tujuan ?>')">
                      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> Edit
                    </button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delRoute" onclick="deleteRoute('<?= $r->id ?>', '<?= $r->asal ?> / <?= $r->tujuan ?>')">
                      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i> Delete
                    </button>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-9 col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Tarif Bus</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#tambahTarif" onclick="clear_form()">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="bg-blue">
                <tr>
                  <td rowspan="2" width="70" align="center" style="vertical-align: middle;">ACTION</td>
                  <td colspan="3" align="center">ROUTE</td>
                  <td colspan="4" align="center">TARIF</td>
                </tr>
                <tr>
                  <td>Kota Asal</td>
                  <td>Kota Tujuan</td>
                  <td>Location</td>
                  <td>Med Agen</td>
                  <td>Big Agen</td>
                  <td>Med Umum</td>
                  <td>Big Umum</td>
                </tr>
              </thead>
              <tbody id="list_tarif">
                <?php foreach ($tarif as $x) { ?>
                <tr id="delT<?= $x->id ?>">
                  <td align="center">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#tambahTarif" onclick="updateTarif(<?= $x->id ?>)">
                      <i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delTarif" onclick="deleteTarif(<?= $x->id ?>, '<?= $x->location ?>')">
                      <i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                    </button>
                  </td>
                  <td><?= $x->asal ?></td>
                  <td><?= $x->tujuan ?></td>
                  <td><?= $x->location ?></td>
                  <td>Rp. <span class="pull-right"><?= $this->Helpers->number($x->med_agen) ?>,-</span></td>
                  <td>Rp. <span class="pull-right"><?= $this->Helpers->number($x->big_agen) ?>,-</span></td>
                  <td>Rp. <span class="pull-right"><?= $this->Helpers->number($x->med_umum) ?>,-</span></td>
                  <td>Rp. <span class="pull-right"><?= $this->Helpers->number($x->big_umu) ?>,-</span></td>
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

<!-- include popup -->
<div class="modal fade" id="tambahTarif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_tarif">Tambah Tarif</h4>
      </div>

      <form name="tarif" action="<?= $this->url->get('Tarif/inputTarif') ?>" method="POST" data-remote="data-remote">
        <div class="modal-body">
          <div class="form-group">
            <label>Route</label>
            <select name="route_id" class="form-control">
              <?= $this->Helpers->tagRoute('Pilih Route') ?>
            </select>
          </div>
          <div class="form-group">
            <label>Location</label>
            <input type="text" name="location" class="form-control" placeholder="Location"> 
          </div>
          <div class="form-group">
            <label>Tarif Medium Agen</label>
            <input type="text" name="med_agen" data-med-agen class="form-control" placeholder="Tarif Medium Agen"> 
          </div>
          <div class="form-group">
            <label>Tarif Big Agen</label>
            <input type="text" name="big_agen" data-big-agen class="form-control" placeholder="Tarif Big Agen"> 
          </div>
          <div class="form-group">
            <label>Tarif Medium Agen</label>
            <input type="text" name="med_umum" data-med-umum class="form-control" placeholder="Tarif Medium Agen"> 
          </div>
          <div class="form-group">
            <label>Tarif Big Agen</label>
            <input type="text" name="big_umum" data-big-umum class="form-control" placeholder="Tarif Big Agen"> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-success">Save Tarif</button>
        </div>
      </form>

    </div>
  </div>
</div>
<div class="modal fade" id="tambahRoute" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form()">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_route">Tambah Route</h4>
      </div>

      <form name="route" action="<?= $this->url->get('Tarif/inputRoute') ?>" method="POST" data-remote="data-remote">
        <div class="modal-body">
          <div class="form-group">
            <label>Kota Asal</label>
            <input type="text" name="asal" class="form-control" placeholder="Kota Asal">
          </div>
          <div class="form-group">
            <label>Kota Tujuan</label>
            <input type="text" name="tujuan" class="form-control" placeholder="Kota Tujuan"> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_form()">Close</button>
          <button type="submit" class="btn btn-success">Save Route</button>
        </div>
      </form>

    </div>
  </div>
</div>
<div class="modal fade" id="delTarif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Delete Tarif </h4>
      </div>

      <form name="delTarif" action="<?= $this->url->get('Tarif/deleteTarif') ?>" method="POST" data-delete="data-delete">
        <div class="modal-body">
          <input type="hidden" name="id" id="id_delete" value="">
          <p>Apakah anda yakin akan menghapus Tarif "<span id="deleteTarif" class="text-danger"></span>" ??</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default close_btn" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>

    </div>
  </div>
</div>
<div class="modal fade" id="delRoute" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Delete Route </h4>
      </div>

      <form name="delRoute" action="<?= $this->url->get('Tarif/deleteRoute') ?>" method="POST" data-delete="data-delete">
        <div class="modal-body">
          <input type="hidden" name="id" id="id_delete" value="">
          <p>Apakah anda yakin akan menghapus Route "<span id="deleteRoute" class="text-danger"></span>" ??</p>
          <p><i><b>Catatan :</b> ini akan berpengaruh pada daftar tarif yang menggunakan route ini,</i></p>
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
(function() {

  $('form[data-remote]').on('submit', function(e) {
    var form      = $(this);
    var url    	  = form.prop('action');
    var array_url = url.split("/");
    var last      = array_url.length - 1;
    var last2     = last - 1;
    var action	  = array_url[last];
    var action2	  = array_url[last2];

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
        update_page('Tarif', 'page_tarif');
        clear_form(response.close);
        if (action == 'inputRoute' || action2 == 'updateRoute' ) {
	        listRoute();
        } else {
	        listTarif();
        }
      }
    });
 
    e.preventDefault();
  });

})();

(function() {

  $('form[data-delete]').on('submit', function(e) {
    var form = $(this);
    var url = form.prop('action');
    var array_url = url.split("/");
    var last      = array_url.length - 1;
    var action	  = array_url[last];

   	// console.log(action);
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

        if (action == "deleteRoute") {
	        $('#delRoute').modal('hide');
	        $('#delR'+response.id).fadeOut(700);
	        $('#delRA'+response.id).fadeOut(700);
        } else {
	        $('#delTarif').modal('hide');
	        $('#delT'+response.id)	.fadeOut(700);
        }
        update_page('Tarif', 'page_tarif');
      }
    });

    e.preventDefault();
  });

})();


function updateRoute(id, asal, tujuan) {
    $('#label_route').text('Update Route');
	$('form[name="route"]').attr('action', '<?= $this->url->get('Tarif/updateRoute/') ?>'+id);
	$('form[name="route"] input[name="asal"]').val(asal);
	$('form[name="route"] input[name="tujuan"]').val(tujuan);
}

function deleteRoute(id, deleted) {
	$('form[name="delRoute"] #id_delete').val(id);
	$('span#deleteRoute').text(deleted);
}

function listRoute() {
  $.ajax({
    type: 'GET',
    url: '<?= $this->url->get('Tarif/route') ?>',
    dataType:'html',
    success: function(response){
      $('#list_route').html(response);
    }
  });
}

function updateTarif(id) {
  $('form[name="tarif"]').attr('action', '<?= $this->url->get('Tarif/updateTarif/') ?>'+id);
  $('#label_tarif').text('Update Tarif');
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Tarif/detail') ?>',
    dataType:'json',
    data: 'id=' + id,
    success: function(response){
      $.each(response, function(key, value) {
        $('form[name="tarif"]').find('[name="'+key+'"]')
          .not('input[name="route_id"]')
          .val(value);
      });
    }
  });
}

function deleteTarif(id, deleted) {
	$('form[name="delTarif"] #id_delete').val(id);
	$('span#deleteTarif').text(deleted);
}

function listTarif() {
  $.ajax({
    type: 'GET',
    url: '<?= $this->url->get('Tarif/tarif') ?>',
    dataType:'html',
    success: function(response){
      $('#list_tarif').html(response);
    }
  });
}

$("[data-med-agen]").inputmask({mask: "9999999999", placeholder: "",});
$("[data-big-agen]").inputmask({mask: "9999999999", placeholder: "",});
$("[data-med-umum]").inputmask({mask: "9999999999", placeholder: "",});
$("[data-big-umum]").inputmask({mask: "9999999999", placeholder: "",});

function clear_form(id) {
  $('form[name="route"]').find('[name]').val('');
  $('form[name="tarif"]').find('[name]').val('');
  $('#label_route').text('Tambah Route');
  $('#label_tarif').text('Tambah Tarif');
  $('form[name="route"]').attr('action', '<?= $this->url->get('Tarif/inputRoute') ?>');
  $('form[name="tarif"]').attr('action', '<?= $this->url->get('Tarif/inputTarif') ?>');
  if (id == '1') {
    $('#tambahRoute').modal('hide');
    $('#tambahTarif').modal('hide');
  }
}
</script>