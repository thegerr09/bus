<aside class="main-sidebar">
  <section class="sidebar">

    <div class="user-panel">
      
      <div class="pull-left image">
        <img src="{{ url('img/users/') }}{{ session.get('image') }}" class="img-circle" alt="User Image">
      </div>
      
      <div class="pull-left info">
        <p>{{ session.get('username')|upper }}</p>
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
          <li style="cursor: pointer;">
            <a onclick="return load_page('#','#','#')">
              <i class="fa fa-circle-o"></i> Tutup Buku
            </a>
          </li>
          <li style="cursor: pointer;">
            <a onclick="return load_page('#','#','#')">
              <i class="fa fa-circle-o"></i> Buku Besar
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