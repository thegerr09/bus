<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <?= $this->tag->stylesheetLink('css/bootstrap.min.css') ?>
  <?= $this->tag->stylesheetLink('plugins/font-awesome/css/font-awesome.min.css') ?>
  <?= $this->tag->stylesheetLink('css/AdminLTE.min.css') ?>
  <?= $this->tag->stylesheetLink('css/skins/_all-skins.min.css') ?>
  <?= $this->tag->stylesheetLink('css/animate.css') ?>
  <?= $this->tag->stylesheetLink('plugins/pnotify/pnotify.min.css') ?>

  <!-- Jquery -->
  <?= $this->tag->javascriptInclude('plugins/jQuery/jquery-2.2.3.min.js') ?>
  <?= $this->tag->javascriptInclude('js/bootstrap.min.js') ?>
  <?= $this->tag->javascriptInclude('plugins/file-style/bootstrap-filestyle.min.js') ?>

  <!-- nprogress -->
  <?= $this->tag->javascriptInclude('plugins/nprogress/nprogress.js') ?>
  <?= $this->tag->stylesheetLink('plugins/nprogress/nprogress.css') ?>

  <!-- favicon -->
  <?= $this->tag->stylesheetLink(['rel' => 'icon', 'href' => 'img/bus.png', 'type' => 'image/x-icon']) ?>
</head>

<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <!-- include header -->
  <header class="main-header">
  
  <a href="<?= $this->url->get() ?>" class="logo">
    <span class="logo-mini"><b>BUS</b></span>
    <span class="logo-lg"><b>BUSWAY</b></span>
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

        <li class="dropdown notifications-menu">
          
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">10</span>
          </a>

          <ul class="dropdown-menu animated fadeInDown">
            <li class="header">You have 10 notifications</li>
            
            <li>
              <ul class="menu">
                <li>
                  <a href="#">
                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                  </a>
                </li>
              </ul>
            </li>

            <li class="footer"><a href="#">View all</a></li>
          </ul>

        </li>

        <li class="dropdown user user-menu">
          
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?= $this->url->get('img/bus.png') ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo strtoupper($_SESSION['username']); ?></span>
          </a>

          <ul class="dropdown-menu animated fadeInDown">
            <li class="user-header">

              <img src="<?= $this->url->get('img/bus.png') ?>" class="img-circle" alt="User Image">

              <p>
                <?php echo strtoupper($_SESSION['username']); ?>
              </p>

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
        <img src="<?= $this->url->get('img/bus.png') ?>" class="img-circle" alt="User Image">
      </div>
      
      <div class="pull-left info">
        <p><?php echo strtoupper($_SESSION['username']); ?></p>
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
            <a onclick="return load_page('#','#','#')">
              <i class="fa fa-circle-o"></i> BUS
            </a>
          </li>
          <li style="cursor: pointer;">
            <a onclick="return load_page('#','#','#')">
              <i class="fa fa-circle-o"></i> Driver
            </a>
          </li>
          <li style="cursor: pointer;">
            <a onclick="return load_page('#','#','#')">
              <i class="fa fa-circle-o"></i> Setting
            </a>
          </li>
          <li style="cursor: pointer;">
            <a onclick="return load_page('#','#','#')">
              <i class="fa fa-circle-o"></i> Setting
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="#Dashboard" onclick="return load_page('#','#','#')">
          <i class="fa fa-book"></i> <span>Booking</span>
        </a>
      </li>
      <li>
        <a href="#Dashboard" onclick="return load_page('#','#','#')">
          <i class="fa fa-credit-card"></i> <span>Order</span>
        </a>
      </li>
      <li>
        <a href="#Dashboard" onclick="return load_page('#','#','#')">
          <i class="fa fa-area-chart"></i> <span>Grafik Order</span>
        </a>
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
  <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>. | Editor <a>SAIPUL HIDAYAT</a></strong>
</footer>
</div>
<!-- ./wrapper -->

<!-- Include Js -->
<!-- Pnotify -->
<?= $this->tag->javascriptInclude('plugins/pnotify/pnotify.core.js') ?>
<?= $this->tag->javascriptInclude('plugins/pnotify/pnotify.buttons.js') ?>
<?= $this->tag->javascriptInclude('plugins/pnotify/pnotify.nonblock.js') ?>

<?= $this->tag->javascriptInclude('plugins/slimScroll/jquery.slimscroll.min.js') ?>
<?= $this->tag->javascriptInclude('plugins/fastclick/fastclick.js') ?>
<?= $this->tag->javascriptInclude('plugins/input-mask/jquery.inputmask.js') ?>
<?= $this->tag->javascriptInclude('js/app.min.js') ?>
<?= $this->tag->javascriptInclude('js/demo.js') ?>
<?= $this->tag->javascriptInclude('js/router.js') ?>

</body>
</html>
