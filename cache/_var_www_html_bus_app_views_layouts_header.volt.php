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