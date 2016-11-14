<aside class="main-sidebar">
  <section class="sidebar">

    <div class="user-panel">
      
      <div class="pull-left image">
        <img src="{{ url('img/bus.png') }}" class="img-circle" alt="User Image">
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