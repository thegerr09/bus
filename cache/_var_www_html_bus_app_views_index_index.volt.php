<section class="content-header animated fadeIn">
  <h1>Dashboard</h1>
  <ol class="breadcrumb">
    <li><a><i class="fa fa-home"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<section class="content animated fadeIn">
  <!-- Info boxes -->
  <div class="row">

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-bus"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">BUS</span>
          <span class="info-box-number">AB 2654 BG</span>
          <span>OMSET : 15 JT</span>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">PELANGGAN</span>
          <span class="info-box-number">410</span>
        </div>
      </div>
    </div>

    <!-- <div class="clearfix visible-sm-block"></div> -->

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-arrow-circle-o-down"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">PEMASUKAN</span>
          <span class="info-box-number">Rp. 20 Jt</span>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-arrow-circle-o-up"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">PENGELUARAN</span>
          <span class="info-box-number">Rp. 10 Jt</span>
        </div>
      </div>
    </div>

  </div>

  <div class="row">

    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Grafik Keuangan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <p class="text-center">
                <strong>January, 2016 - December, 2016</strong>
              </p>

              <div class="chart">
                <!-- Sales Chart Canvas -->
                <canvas id="salesChart" style="height: 180px;"></canvas>
              </div>
              <!-- /.chart-responsive -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- ./box-body -->
        <div class="box-footer">
          <div class="row">
            <div class="col-sm-3 col-xs-6">
              <div class="description-block border-right">
                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                <h5 class="description-header">$35,210.43</h5>
                <span class="description-text">TOTAL REVENUE</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-xs-6">
              <div class="description-block border-right">
                <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                <h5 class="description-header">$10,390.90</h5>
                <span class="description-text">TOTAL COST</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-xs-6">
              <div class="description-block border-right">
                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                <h5 class="description-header">$24,813.53</h5>
                <span class="description-text">TOTAL PROFIT</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-xs-6">
              <div class="description-block">
                <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                <h5 class="description-header">1200</h5>
                <span class="description-text">GOAL COMPLETIONS</span>
              </div>
              <!-- /.description-block -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">List member</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding" style="height: 362px; overflow: scroll;">
          <ul class="users-list clearfix">
            <?php foreach ($bus as $b) { ?>
            <li>
              <?php $cekTglPajak = $this->Helpers->tglPenting($b->tanggal_pajak); ?>
              <a class="users-list-name" href="#">PAJAK<?= $cekTglPajak ?></a>
              <?= $this->tag->image(['img/' . $cekTglPajak, 'alt' => 'User Image']) ?>
              <a class="users-list-name" href="#"><?= $b->nomor_polisi ?></a>
              <span class="users-list-date"><?= $this->Helpers->dateChange($b->tanggal_pajak) ?></span>
            </li>
            <li>
              <?php $cekTglKir = $this->Helpers->tglPenting($b->tanggal_kir); ?>
              <a class="users-list-name" href="#">KIR<?= $cekTglKir ?></a>
              <?= $this->tag->image(['img/' . $cekTglKir, 'alt' => 'User Image']) ?>
              <a class="users-list-name" href="#"><?= $b->nomor_polisi ?></a>
              <span class="users-list-date"><?= $this->Helpers->dateChange($b->tanggal_kir) ?></span>
            </li>
            <li>
              <?php $cekTglKps = $this->Helpers->tglPenting($b->tanggal_ijin_kps); ?>
              <a class="users-list-name" href="#">IJIN KPS<?= $cekTglKps ?></a>
              <?= $this->tag->image(['img/' . $cekTglKps, 'alt' => 'User Image']) ?>
              <a class="users-list-name" href="#"><?= $b->nomor_polisi ?></a>
              <span class="users-list-date"><?= $this->Helpers->dateChange($b->tanggal_ijin_kps) ?></span>
            </li>
            <li>
              <?php $cekTglAsuransi = $this->Helpers->tglPenting($b->tanggal_asuransi); ?>
              <a class="users-list-name" href="#">ASURANSI<?= $cekTglAsuransi ?></a>
              <?= $this->tag->image(['img/' . $cekTglAsuransi, 'alt' => 'User Image']) ?>
              <a class="users-list-name" href="#"><?= $b->nomor_polisi ?></a>
              <span class="users-list-date"><?= $this->Helpers->dateChange($b->tanggal_asuransi) ?></span>
            </li>
            <?php } ?>
          </ul>
          <!-- /.users-list -->
        </div>
        <!-- /.box-body -->
      </div>
      <!--/.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Pendapatan Mobil</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="chart-responsive">
                <canvas id="pieChart" height="150"></canvas>
              </div>
              <!-- ./chart-responsive -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer no-padding" style="height: 182px; overflow: scroll;">
          <ul class="nav nav-pills nav-stacked">
            <li><a href="#">AB 9878 SD
              <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
            <li><a href="#">AA 3454 BN <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
            </li>
            <li><a href="#">BG 7567 UJ
              <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
          </ul>
        </div>
        <!-- /.footer -->
      </div>
      <!-- /.box -->
    </div>
    <div class="col-md-3">
      <!-- Info Boxes Style 2 -->
      <div class="info-box bg-yellow">
        <span class="info-box-icon"><i class="fa fa-cubes"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Ban</span>
          <span class="info-box-number">50 Buah</span>

          <div class="progress">
            <div class="progress-bar" style="width: 50%"></div>
          </div>
              <span class="progress-description">
                Sisa 50 buah dari 100
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="fa fa-cubes"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Kampas Rem</span>
          <span class="info-box-number">70 Buah</span>

          <div class="progress">
            <div class="progress-bar" style="width: 20%"></div>
          </div>
              <span class="progress-description">
                Sisa 70 buah dari 100
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box bg-red">
        <span class="info-box-icon"><i class="fa fa-cubes"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Oli</span>
          <span class="info-box-number">80 Buah</span>

          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
              <span class="progress-description">
                Sisa 80 buah dari 100
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box bg-aqua">
        <span class="info-box-icon"><i class="fa fa-cubes"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Dongkrak</span>
          <span class="info-box-number">10 Buah</span>

          <div class="progress">
            <div class="progress-bar" style="width: 40%"></div>
          </div>
              <span class="progress-description">
                Sisa 10 buah dari 100
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>

  </div>
</section>
<script>
$(function () {
  'use strict';
  var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
  var salesChart = new Chart(salesChartCanvas);

  var salesChartData = {
    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
    datasets: [
      {
        label: "PROFIT",
        fillColor: "rgb(210, 214, 222)",
        strokeColor: "rgb(210, 214, 222)",
        pointColor: "rgb(210, 214, 222)",
        pointStrokeColor: "#c1c7d1",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgb(220,220,220)",
        data: [65, 59, 80, 81, 56, 55, 40, 80, 81, 56, 55, 40]
      },
      {
        label: "OMSET",
        fillColor: "rgba(60,141,188,0.9)",
        strokeColor: "rgba(60,141,188,0.8)",
        pointColor: "#3b8bba",
        pointStrokeColor: "rgba(60,141,188,1)",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(60,141,188,1)",
        data: [28, 48, 40, 19, 86, 27, 90, 40, 19, 86, 27, 90]
      }
    ]
  };

  var salesChartOptions = {
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
  salesChart.Line(salesChartData, salesChartOptions);

  //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = [
    {
      value: 700,
      color: "#f56954",
      highlight: "#f56954",
      label: "Chrome"
    },
    {
      value: 500,
      color: "#00a65a",
      highlight: "#00a65a",
      label: "IE"
    },
    {
      value: 400,
      color: "#f39c12",
      highlight: "#f39c12",
      label: "FireFox"
    },
    {
      value: 600,
      color: "#00c0ef",
      highlight: "#00c0ef",
      label: "Safari"
    },
    {
      value: 300,
      color: "#3c8dbc",
      highlight: "#3c8dbc",
      label: "Opera"
    },
    {
      value: 100,
      color: "#d2d6de",
      highlight: "#d2d6de",
      label: "Navigator"
    }
  ];
  var pieOptions = {
    //Boolean - Whether we should show a stroke on each segment
    segmentShowStroke: true,
    //String - The colour of each segment stroke
    segmentStrokeColor: "#fff",
    //Number - The width of each segment stroke
    segmentStrokeWidth: 1,
    //Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    //Number - Amount of animation steps
    animationSteps: 100,
    //String - Animation easing effect
    animationEasing: "easeOutBounce",
    //Boolean - Whether we animate the rotation of the Doughnut
    animateRotate: true,
    //Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale: false,
    //Boolean - whether to make the chart responsive to window resizing
    responsive: true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: false,
    //String - A tooltip template
    tooltipTemplate: "<%=value %> <%=label%> users"
  };
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(PieData, pieOptions);
  //-----------------
  //- END PIE CHART -
  //-----------------
});
</script>