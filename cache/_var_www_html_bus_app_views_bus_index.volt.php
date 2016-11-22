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
  <h1>Bus</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>Data Master</li>
    <li class="active">bus</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Bus</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered">
              <thead>
                <tr>
                  <th>List Bus</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($bus as $x) { ?>
                <tr id="del<?= $x->id ?>">
                  <td>
                    <div class="col-md-2" align="center">
                      <?= $this->tag->image(['img/bus/' . $x->image, 'class' => 'img-rounded', 'width' => '150', 'style' => 'margin-bottom: 10px;']) ?>
                      <i class="fa fa-edit cursor"></i> | 
                      <i class="fa fa-trash cursor"></i> |
                      <?php if ($x->active == 'Y') { ?>
                      <i class="fa fa-power-off text-green cursor"></i> | 
                      <span class="label bg-green">Active</span>
                      <?php } else { ?>
                      <i class="fa fa-power-off text-red cursor"></i> | 
                      <span class="label bg-red">Not Active</span>
                      <?php } ?>
                    </div>
                    <div class="col-md-10">
                      <h3><b><?= $x->name_bus ?></b></h3>
                      <table class="table">
                        <tr>
                          <td width="90"><b>No Polisi</b></td>
                          <td> : </td>
                          <td><?= $x->no_polisi ?></td>
                          <td width="120"><b>Tgl pajak STNK</b></td>
                          <td> : </td>
                          <td><?= $x->tgl_stnk ?></td>
                          <td width="100"><b>KM Skrg</b></td>
                          <td> : </td>
                          <td><?= $x->km_skrng ?> KM</td>
                        </tr>
                        <tr>
                          <td><b>No Rangka</b></td>
                          <td> : </td>
                          <td><?= $x->no_rangka ?></td>
                          <td><b>Tgl KIR</b></td>
                          <td> : </td>
                          <td><?= $x->tgl_kir ?></td>
                          <td><b>Kondisi</b></td>
                          <td> : </td>
                          <td>
                            <?php if ($x->kondisi == 'N') { ?>
                            <label class="label bg-green">Bagus</label>
                            <?php } else { ?>
                            <label class="label bg-red">Rusak</label>
                            <?php } ?>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </td>
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
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form(0)">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_driver">Input Bus</h4>
      </div>

      <form name="form" action="<?= $this->url->get('Bus/input') ?>" method="POST" enctype="multipart/form-data" data-remote="data-remote">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Bus</label>
                <input type="text" name="name_bus" class="form-control" placeholder="Nama Bus">
              </div>
              <div class="form-group">
                <label>Nomor Posilisi</label>
                <input type="text" name="no_polisi" class="form-control" placeholder="Nomor Posili">
              </div>
              <div class="form-group">
                <label>Nomor Kerangka</label>
                <input type="text" name="no_rangka" class="form-control" placeholder="Nomor Kerangka">
              </div>
              <div class="form-group">
                <label>Tanggal Pajak STNK</label>
                <input type="text" name="tgl_stnk" class="form-control" placeholder="Tanggal Pajak STNK">
              </div>
            </div>
            <div class="col-md-6"></div>
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

function PreviewImage() {
  $('input[name="remove_image"]').val('');
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

  oFReader.onload = function (oFREvent) {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
  };
};
</script>