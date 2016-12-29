<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PO. GALATAMA</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <?= $this->tag->stylesheetLink('css/bootstrap.min.css') ?>
  <?= $this->tag->stylesheetLink('plugins/font-awesome/css/font-awesome.min.css') ?>
  <?= $this->tag->stylesheetLink('css/AdminLTE.min.css') ?>
  <?= $this->tag->stylesheetLink('css/skins/_all-skins.min.css') ?>
  <?= $this->tag->stylesheetLink('css/animate.css') ?>

  <!-- favicon -->
  <?= $this->tag->stylesheetLink(['rel' => 'icon', 'href' => 'img/bus.png', 'type' => 'image/x-icon']) ?>

  <!-- JS -->
  <?= $this->tag->javascriptInclude('plugins/jQuery/jquery-2.2.3.min.js') ?>
  <?= $this->tag->javascriptInclude('js/bootstrap.min.js') ?>
  <?= $this->tag->javascriptInclude('plugins/file-style/bootstrap-filestyle.min.js') ?>

  <!-- ChartJs -->
  <?= $this->tag->javascriptInclude('plugins/chartjs/Chart.min.js') ?>

  <!-- iCheck -->
  <?= $this->tag->stylesheetLink('plugins/iCheck/all.css') ?>
  <?= $this->tag->javascriptInclude('plugins/iCheck/icheck.min.js') ?>

  <!-- Pnotify -->
  <?= $this->tag->stylesheetLink('plugins/pnotify/pnotify.min.css') ?>
  <?= $this->tag->javascriptInclude('plugins/pnotify/pnotify.core.js') ?>
  <?= $this->tag->javascriptInclude('plugins/pnotify/pnotify.buttons.js') ?>
  <?= $this->tag->javascriptInclude('plugins/pnotify/pnotify.nonblock.js') ?>

  <!-- dataTables css -->
  <?= $this->tag->stylesheetLink('plugins/datatables/jquery.dataTables.min.css') ?>
  <?= $this->tag->stylesheetLink('plugins/datatables/buttons.bootstrap.min.css') ?>
  <?= $this->tag->stylesheetLink('plugins/datatables/fixedHeader.bootstrap.min.css') ?>
  <?= $this->tag->stylesheetLink('plugins/datatables/responsive.bootstrap.min.css') ?>
  <?= $this->tag->stylesheetLink('plugins/datatables/scroller.bootstrap.min.css') ?>

  <!-- dataTables js -->
  <?= $this->tag->javascriptInclude('plugins/datatables/jquery.dataTables.min.js') ?>
  <?= $this->tag->javascriptInclude('plugins/datatables/dataTables.bootstrap.js') ?>
  <?= $this->tag->javascriptInclude('plugins/datatables/dataTables.buttons.min.js') ?>
  <?= $this->tag->javascriptInclude('plugins/datatables/buttons.bootstrap.min.js') ?>
  <?= $this->tag->javascriptInclude('plugins/datatables/jszip.min.js') ?>
  <?= $this->tag->javascriptInclude('plugins/datatables/pdfmake.min.js') ?>
  <?= $this->tag->javascriptInclude('plugins/datatables/vfs_fonts.js') ?>
  <?= $this->tag->javascriptInclude('plugins/datatables/buttons.html5.min.js') ?>
  <?= $this->tag->javascriptInclude('plugins/datatables/buttons.print.min.js') ?>
  <?= $this->tag->javascriptInclude('plugins/datatables/dataTables.fixedHeader.min.js') ?>
  <?= $this->tag->javascriptInclude('plugins/datatables/dataTables.keyTable.min.js') ?>
  <?= $this->tag->javascriptInclude('plugins/datatables/dataTables.responsive.min.js') ?>
  <?= $this->tag->javascriptInclude('plugins/datatables/responsive.bootstrap.min.js') ?>
  <?= $this->tag->javascriptInclude('plugins/datatables/dataTables.scroller.min.js') ?>
  <?= $this->tag->javascriptInclude('plugins/datatables/dataTables.fixedColumns.min.js') ?>

  <!-- datetimepiker -->
  <?= $this->tag->stylesheetLink('plugins/daterangepicker/daterangepicker.css') ?>
  <?= $this->tag->stylesheetLink('plugins/datetimepicker/build/css/bootstrap-datetimepicker.min.css') ?>
  <?= $this->tag->javascriptInclude('plugins/moment/min/moment.min.js') ?>
  <?= $this->tag->javascriptInclude('plugins/moment/locale/id.js') ?>
  <?= $this->tag->javascriptInclude('plugins/datetimepicker/build/js/bootstrap-datetimepicker.min.js') ?>
  <?= $this->tag->javascriptInclude('plugins/daterangepicker/daterangepicker.js') ?>

  <!-- all -->
  <?= $this->tag->javascriptInclude('plugins/slimScroll/jquery.slimscroll.min.js') ?>
  <?= $this->tag->javascriptInclude('plugins/fastclick/fastclick.js') ?>
  <?= $this->tag->javascriptInclude('plugins/input-mask/jquery.inputmask.js') ?>
  <?= $this->tag->javascriptInclude('js/app.min.js') ?>
  <?= $this->tag->javascriptInclude('js/demo.js') ?>
  <?= $this->tag->javascriptInclude('js/router.js') ?>
</head>


<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <!-- include header -->
  <header class="main-header">
  
  <a href="<?= $this->url->get() ?>" class="logo">
    <span class="logo-mini"><b>BUS</b></span>
    <span class="logo-lg"><b>PO. </b>GALATAMA</span>
  </a>

  <nav class="navbar navbar-static-top">
    
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <li class="dropdown user user-menu">
          
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?= $this->url->get('img/users/') ?><?= $this->session->get('image') ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?= Phalcon\Text::upper($this->session->get('username')) ?></span>
          </a>

          <ul class="dropdown-menu animated fadeInDown">
            <li class="user-header">

              <img src="<?= $this->url->get('img/users/') ?><?= $this->session->get('image') ?>" class="img-circle" alt="User Image">

              <p><?= Phalcon\Text::upper($this->session->get('username')) ?></p>

            </li>

            <li class="user-footer">
              
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>
              
              <div class="pull-right">
                <a href="<?= $this->url->get('account/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
            
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>

  <!-- include sidebar -->
  <aside class="main-sidebar">
  <section class="sidebar">

    <div class="user-panel">
      
      <div class="pull-left image">
        <img src="<?= $this->url->get('img/users/') ?><?= $this->session->get('image') ?>" class="img-circle" alt="User Image">
      </div>
      
      <div class="pull-left info">
        <p><?= Phalcon\Text::upper($this->session->get('username')) ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    
    </div>

    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>

    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li>
        <a href="#Dashboard" onclick="return load_page('page_dashboard','Dashboard','page_dashboard')">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-database"></i> <span>Data Master</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li style="cursor: pointer;">
            <a onclick="return load_page('page_users','Users','page_users')">
              <i class="fa fa-circle-o"></i> Users
            </a>
          </li>
          <li style="cursor: pointer;">
            <a onclick="return load_page('page_usergroup','Usergroup','page_usergroup')">
              <i class="fa fa-circle-o"></i> Usergroup
            </a>
          </li>
          <li style="cursor: pointer;">
            <a onclick="return load_page('page_acl','Acl','page_acl')">
              <i class="fa fa-circle-o"></i> Acl
            </a>
          </li>
          <li style="cursor: pointer;">
            <a onclick="return load_page('page_driver','Driver','page_driver')">
              <i class="fa fa-circle-o"></i> Driver
            </a>
          </li>
          <li style="cursor: pointer;">
            <a onclick="return load_page('page_co_driver','CoDriver','page_co_driver')">
              <i class="fa fa-circle-o"></i> CO. Driver
            </a>
          </li>
          <li style="cursor: pointer;">
            <a onclick="return load_page('page_bus','Bus','page_bus')">
              <i class="fa fa-circle-o"></i> BUS
            </a>
          </li>
          <li style="cursor: pointer;">
            <a onclick="return load_page('page_tarif','Tarif','page_tarif')">
              <i class="fa fa-circle-o"></i> Tarif
            </a>
          </li>
          <li style="cursor: pointer;">
            <a onclick="return load_page('page_setting','Setting','page_setting')">
              <i class="fa fa-circle-o"></i> Setting
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="#Booking" onclick="return load_page('page_booking','Booking','page_booking')">
          <i class="fa fa-book"></i> <span>Booking</span>
        </a>
      </li>
      <li>
        <a href="#Dashboard" onclick="return load_page('page_order','ListOrder','page_order')">
          <i class="fa fa-credit-card"></i> <span>Invoice</span>
        </a>
      </li>
      <li>
        <a href="#Dashboard" onclick="return load_page('page_grafik_order','GrafikOrder','page_grafik_order')">
          <i class="fa fa-area-chart"></i> <span>Grafik Order</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-paste"></i> <span>Akuntansi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li style="cursor: pointer;">
            <a onclick="return load_page('page_header_account','HeaderAccount','page_header_account')">
              <i class="fa fa-circle-o"></i> Header & Account
            </a>
          </li>
          <li style="cursor: pointer;">
            <a onclick="return load_page('page_jurnal','Jurnal','page_jurnal')">
              <i class="fa fa-circle-o"></i> Jurnal
            </a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-paste"></i> <span>Laporan Akuntansi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li style="cursor: pointer;">
            <a onclick="return load_page('#','#','#')">
              <i class="fa fa-circle-o"></i> Buku Besar
            </a>
          </li>
          <li style="cursor: pointer;">
            <a onclick="return load_page('#','#','#')">
              <i class="fa fa-circle-o"></i> Laba Rugi
            </a>
          </li>
          <li style="cursor: pointer;">
            <a onclick="return load_page('#','#','#')">
              <i class="fa fa-circle-o"></i> Neraca
            </a>
          </li>
          <li style="cursor: pointer;">
            <a onclick="return load_page('#','#','#')">
              <i class="fa fa-circle-o"></i> Neraca Detail
            </a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-cubes"></i> <span>Iventaris Barang</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li style="cursor: pointer;">
            <a onclick="return load_page('page_users','Users','page_users')">
              <i class="fa fa-circle-o"></i> Bengkel
            </a>
          </li>
          <li style="cursor: pointer;">
            <a onclick="return load_page('page_users','Users','page_users')">
              <i class="fa fa-circle-o"></i> Kantor
            </a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i> <span>Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li style="cursor: pointer;">
            <a onclick="return load_page('page_users','Users','page_users')">
              <i class="fa fa-circle-o"></i> Pemasukan
            </a>
          </li>
          <li style="cursor: pointer;">
            <a onclick="return load_page('page_users','Users','page_users')">
              <i class="fa fa-circle-o"></i> Pengeluaran
            </a>
          </li>
        </ul>
      </li>
      <li class="header">CREDITS</li>
      <li>
        <a href="#Dashboard" onclick="return load_page('#','#','#')">
          <i class="fa fa-users"></i> <span>Credits</span>
        </a>
      </li>
      <li>
        <a href="#Dashboard" onclick="return load_page('#','#','#')">
          <i class="fa fa-file"></i> <span>Licensi</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

  <!-- =============================================== -->

  <!-- include Content Wrapper -->
  <div class="content-wrapper">
    <?= $this->getContent() ?>
  </div>

  <!-- include footer -->
  <footer class="main-footer">
  <strong>Copyright &copy; 2016 <a href="http://qodr.or.id">Qodr.or.id</a></strong>
  <span class="pull-right"><b>Version</b> : 1.0.1</span>
</footer>
</div>
<!-- ./wrapper -->

</body>
</html>
