<style>
.cursor{
  font-size: 18px;
}
.cursor:hover{
  cursor: pointer;
  color: #ccc;
}
.usergroup{
  cursor: pointer;
  color: #807c7c;
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
            <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Tambah">
              <i class="fa fa-plus-circle"></i> Tambah
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="example" class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>List Driver</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($driver as $x) { ?>
                <tr>
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
                            <i class="fa fa-edit cursor"></i> | 
                            <i class="fa fa-trash cursor"></i> | 
                            <i class="fa fa-list cursor"></i> | 
                            <i class="fa fa-power-off text-green cursor"></i> | 
                            <span class="label bg-green">active</span>
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
</script>