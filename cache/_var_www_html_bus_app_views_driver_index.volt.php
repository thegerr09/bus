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
  <h1>Driver</h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i> Home</li>
    <li>Data Master</li>
    <li class="active">driver</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Driver</h3>
          <div class="box-tools pull-right" style="margin-top:2px;">
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah" onclick="clear_form()">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive" id="list_view">
            <table id="example" class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>List Driver</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($driver as $x) { ?>
                <tr id="del<?= $x->id ?>">
                  <td>
                    <div class="col-md-1">
                      <?= $this->tag->image(['img/driver/' . $x->image, 'class' => 'img-rounded', 'width' => '80']) ?>
                    </div>
                    <div class="col-md-7">
                      <span><b><?= Phalcon\Text::upper($x->nama) ?></b></span>
                      <table>
                        <tr>
                          <td valign="top" width="45px"><small>Alamat</small></td>
                          <td valign="top" ><small>&nbsp; : &nbsp;</small></td>
                          <td valign="top" ><small><?= $x->alamat ?></small></td>
                        </tr>
                        <tr>
                          <td valign="top" ><small>No. Telp</small></td>
                          <td valign="top" ><small>&nbsp; : &nbsp;</small></td>
                          <td valign="top" ><small><?= $x->telpon ?></small></td>
                        </tr>
                        <tr>
                          <td colspan="3" height="25">
                            <i class="fa fa-edit cursor" data-toggle="modal" data-target="#Tambah" onclick="update(<?= $x->id ?>)"></i> | 
                            <i class="fa fa-trash cursor" data-toggle="modal" data-target="#Delete" onclick="deleted(<?= $x->id ?>, '<?= $x->nama ?>')"></i> | 
                            <!-- <i class="fa fa-list cursor"></i> |  -->
                            <?php if ($x->active == 'Y') { ?>
                            <i class="fa fa-power-off cursor text-green" style="font-size:18px;" id="button_status<?= $x->id ?>" onclick="status_action(<?= $x->id ?>, 'N', 'red')"></i> |
                            <span class="label bg-green" id="label_status<?= $x->id ?>">active</span>
                            <?php } else { ?>
                            <i class="fa fa-power-off cursor text-red" style="font-size:18px;" id="button_status<?= $x->id ?>" onclick="status_action(<?= $x->id ?>, 'Y', 'green')"></i> |
                            <span class="label bg-red" id="label_status<?= $x->id ?>">not active</span>
                            <?php } ?>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-md-4">
                      <div class="chart">
                        <canvas id="salesChart<?= $no ?>" style="height: 80px;"></canvas>
                      </div>
                    </div>
                  </td>
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
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clear_form(0)">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="label_driver">Input Driver</h4>
      </div>

      <form name="form" action="<?= $this->url->get('Driver/input') ?>" method="POST" enctype="multipart/form-data" data-remote="data-remote">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" placeholder="Alamat lengkap driver ..."></textarea>  
          </div>
          <div class="form-group">
            <label>Nomor Telpon</label>
            <input type="text" name="telpon" class="form-control" data-mask placeholder="Nomor Telpon">
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" placeholder="Keterangan driver ..."></textarea>  
          </div>
          <div class="form-group">
            <label>Foto Driver</label>
            <input type="file" class="filestyle" name="image" id="uploadImage" value="img/driver/users.png" onchange="PreviewImage()">
            <input type="hidden" name="remove_image">
            <div align="center" style="margin-top:10px;">
              <?= $this->tag->image(['img/driver/users.png', 'width' => '150', 'height' => '150', 'id' => 'uploadPreview', 'class' => 'img-rounded']) ?>
            </div>
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

      <form name="delete" action="<?= $this->url->get('Driver/delete') ?>" method="POST" data-delete="data-delete">
        <div class="modal-body">
          <input type="hidden" name="id" id="id_delete" value="">
          <p>Apakah anda yakin akan menghapus Driver "<span id="driverr" class="text-success"></span>" ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default close_btn" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- include Js -->
<script>
$(function () {
  'use strict';

  $('#example').DataTable();

  <?php $no = 1; ?>
  <?php foreach ($driver as $x) { ?>
  var salesChartCanvas<?= $no ?> = $("#salesChart<?= $no ?>").get(0).getContext("2d");
  var salesChart<?= $no ?> = new Chart(salesChartCanvas<?= $no ?>);

  var salesChartData<?= $no ?> = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
    datasets: [
      {
        fillColor: "rgba(60,141,188,0.9)",
        data: [1, 15, 30, 5, 6, 7]
      }
    ]
  };

  var salesChartOptions<?= $no ?> = {
    showScale: true,
    scaleShowGridLines: false,
    scaleGridLineColor: "rgba(0,0,0,.05)",
    scaleGridLineWidth: 1,
    scaleShowHorizontalLines: true,
    scaleShowVerticalLines: true,
    bezierCurve: true,
    bezierCurveTension: 0.3,
    pointDot: false,
    pointDotRadius: 4,
    pointDotStrokeWidth: 1,
    pointHitDetectionRadius: 20,
    datasetStroke: true,
    datasetStrokeWidth: 2,
    datasetFill: true,
    maintainAspectRatio: true,
    responsive: true
  };
  salesChart<?= $no ?>.Line(salesChartData<?= $no ?>, salesChartOptions<?= $no ?>);
  <?php $no = $no + 1; ?>
  <?php } ?>
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
        update_page('Driver', 'page_driver');
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
        update_page('Driver', 'page_driver');
      }
    });

    e.preventDefault();
  });

})();

function deleted(id, driver) {
  $('input#id_delete').val(id);
  $('span#driverr').text(driver);
}

function update(id) {
  $('#label_driver').text('Update Driver');
  $('form[name="form"]').attr('action', '<?= $this->url->get('Driver/update/') ?>'+id);
  var btn_submit = $('form[name="form"]').find('button[type="submit"]');
  btn_submit.removeClass('btn-success');
  btn_submit.addClass('btn-primary');
  btn_submit.text('Save Update');

  $.ajax({
    type: 'GET',
    url: '<?= $this->url->get('Driver/detail/') ?>'+id,
    dataType:'json',
    success: function(response){
      $.each(response, function(key, value) {
        $('form[name="form"]').find('[name="'+key+'"]')
        .not('input[name="image"]')
        .val(value);
        if (key == 'image') {
          $('input[name="remove_image"]').val(value);
          $('#uploadPreview').attr('src', 'img/driver/'+value);
          $('input[name="image"]').attr('data-placeholder', value);
        }
      });
    }
  });
}

function list() {
  $.ajax({
    type: 'GET',
    url: '<?= $this->url->get('Driver/list') ?>',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response);
      
      $(function () {
        'use strict';

        $('#example').DataTable();

        <?php $no = 1; ?>
        <?php foreach ($driver as $x) { ?>
        var salesChartCanvas<?= $no ?> = $("#salesChart<?= $no ?>").get(0).getContext("2d");
        var salesChart<?= $no ?> = new Chart(salesChartCanvas<?= $no ?>);

        var salesChartData<?= $no ?> = {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
          datasets: [
            {
              fillColor: "rgba(60,141,188,0.9)",
              data: [1, 15, 30, 5, 6, 7]
            }
          ]
        };

        var salesChartOptions<?= $no ?> = {
          showScale: true,
          scaleShowGridLines: false,
          scaleGridLineColor: "rgba(0,0,0,.05)",
          scaleGridLineWidth: 1,
          scaleShowHorizontalLines: true,
          scaleShowVerticalLines: true,
          bezierCurve: true,
          bezierCurveTension: 0.3,
          pointDot: false,
          pointDotRadius: 4,
          pointDotStrokeWidth: 1,
          pointHitDetectionRadius: 20,
          datasetStroke: true,
          datasetStrokeWidth: 2,
          datasetFill: true,
          maintainAspectRatio: true,
          responsive: true
        };
        salesChart<?= $no ?>.Line(salesChartData<?= $no ?>, salesChartOptions<?= $no ?>);
        <?php $no = $no + 1; ?>
        <?php } ?>
      });
    }
  });
}

function status_action(id, status, clas) {
  $.ajax({
    type: 'POST',
    url: '<?= $this->url->get('Driver/status') ?>',
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
  $('form[name="form"]').find('[name]').val('');
  $('#uploadPreview').attr('src', 'img/driver/users.png');
  if (id == '1') {
    $('#Tambah').modal('hide');
  } else {
    $('#label_driver').text('Input Driver');
    $('form[name="form"]').attr('action', '<?= $this->url->get('Driver/input') ?>');
    var btn_submit = $('form[name="form"]').find('button[type="submit"]');
    btn_submit.removeClass('btn-primary');
    btn_submit.addClass('btn-success');
    btn_submit.text('Save');
  }
}

$("[data-mask]").inputmask({mask: "99999999999999", placeholder: "",});

$(":file").filestyle({
  buttonName: "btn-default",
  iconName: "fa fa-image",
  buttonText: "Browse"
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