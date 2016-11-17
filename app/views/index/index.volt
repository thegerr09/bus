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
    <!-- /.col -->
    <div class="col-md-4">
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
            <div class="col-md-7">
              <div class="chart-responsive">
                <canvas id="pieChart" height="150"></canvas>
              </div>
              <!-- ./chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-5">
              <ul class="chart-legend clearfix">
                <li><i class="fa fa-circle-o text-red"></i> AB 9878 SD</li>
                <li><i class="fa fa-circle-o text-green"></i> RT 4355 GH</li>
                <li><i class="fa fa-circle-o text-yellow"></i> DF 4567 GH</li>
                <li><i class="fa fa-circle-o text-aqua"></i> BG 7567 UJ</li>
                <li><i class="fa fa-circle-o text-light-blue"></i> AB 9875 GH</li>
                <li><i class="fa fa-circle-o text-gray"></i> AA 3454 BN</li>
              </ul>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer no-padding">
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
    <div class="col-md-4">
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
        <div class="box-body no-padding">
          <ul class="users-list clearfix">
            <li>
              {{ image('img/bus.png', "alt":"User Image") }}
              <a class="users-list-name" href="#">Alexander Pierce</a>
              <span class="users-list-date">Today</span>
            </li>
            <li>
              {{ image('img/bus.png', "alt":"User Image") }}
              <a class="users-list-name" href="#">Norman</a>
              <span class="users-list-date">Yesterday</span>
            </li>
            <li>
              {{ image('img/bus.png', "alt":"User Image") }}
              <a class="users-list-name" href="#">Jane</a>
              <span class="users-list-date">12 Jan</span>
            </li>
            <li>
              {{ image('img/bus.png', "alt":"User Image") }}
              <a class="users-list-name" href="#">John</a>
              <span class="users-list-date">12 Jan</span>
            </li>
            <li>
              {{ image('img/bus.png', "alt":"User Image") }}
              <a class="users-list-name" href="#">Alexander</a>
              <span class="users-list-date">13 Jan</span>
            </li>
            <li>
              {{ image('img/bus.png', "alt":"User Image") }}
              <a class="users-list-name" href="#">Sarah</a>
              <span class="users-list-date">14 Jan</span>
            </li>
            <li>
              {{ image('img/bus.png', "alt":"User Image") }}
              <a class="users-list-name" href="#">Nora</a>
              <span class="users-list-date">15 Jan</span>
            </li>
            <li>
              {{ image('img/bus.png', "alt":"User Image") }}
              <a class="users-list-name" href="#">Nadia</a>
              <span class="users-list-date">15 Jan</span>
            </li>
            <li>
              {{ image('img/bus.png', "alt":"User Image") }}
              <a class="users-list-name" href="#">Sarah</a>
              <span class="users-list-date">14 Jan</span>
            </li>
            <li>
              {{ image('img/bus.png', "alt":"User Image") }}
              <a class="users-list-name" href="#">Nora</a>
              <span class="users-list-date">15 Jan</span>
            </li>
            <li>
              {{ image('img/bus.png', "alt":"User Image") }}
              <a class="users-list-name" href="#">Nadia</a>
              <span class="users-list-date">15 Jan</span>
            </li>
            <li>
              {{ image('img/bus.png', "alt":"User Image") }}
              <a class="users-list-name" href="#">Nadia</a>
              <span class="users-list-date">15 Jan</span>
            </li>
          </ul>
          <!-- /.users-list -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
          <a href="javascript:void(0)" class="uppercase">View All Users</a>
        </div>
        <!-- /.box-footer -->
      </div>
      <!--/.box -->
    </div>
    <div class="col-md-4">
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
{% include "index/js.volt" %}