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
  <?= $this->tag->stylesheetLink('plugins/iCheck/square/blue.css') ?>
  
  <!-- favicon -->
  <?= $this->tag->stylesheetLink(['rel' => 'icon', 'href' => 'img/bus.png', 'type' => 'image/x-icon']) ?>
</head>

<body class="hold-transition login-page">
  <div style="background-color: rgba(0,0,0,0.21); height: 100%; width: 100%; position: absolute; top: 0px;"></div>

  <div class="lockscreen-wrapper lockscreen" style="padding-top: 20px;padding-bottom: 20px;">
    <div class="lockscreen-logo">
      <a href="#" style="color:#fff;">PO.<b>GALATAMA</b></a>
    </div>

    <div class="lockscreen-name" id="username" style="color:#fff;">Username</div>

    <div class="lockscreen-item">

      <div class="lockscreen-image">
        <?= $this->tag->image(['img/users/users.png', 'id' => 'foto']) ?>
      </div>

      <form data-login="data-login" class="lockscreen-credentials" action="<?= $this->url->get('account/cek') ?>" method="post">
        <div class="input-group">
          <div id="input_group">
            <input type="hidden" name="<?= $this->security->getTokenKey() ?>" value="<?= $this->security->getToken() ?>"/>
          </div>
          <input type="text" name="username" class="form-control" placeholder="Username" autofocus>
          <div class="input-group-btn">
            <button type="submit" class="btn"><i id="icon" class="fa fa-user text-muted"></i></button>
          </div>
        </div>
      </form>

    </div>

    <div class="help-block text-center bg-red" style="color: #fff; display: none;" id="validation">
      Username Tidak Terdaftar
    </div>
    <div class="help-block text-center bg-red" style="color: #fff; display: none;" id="validation_wrong">
      Password yang anda masukan salah
    </div>
    <div class="lockscreen-footer text-center" style="color:#fff;">
      Copyright &copy; 2016 <b><a href="https://www.facebook.com/saipul.hidayat.cuy" style="color:#fff;">Qodr.or.id</a></b><br>
      All rights reserved
    </div>
  </div>
  <?= $this->tag->javascriptInclude('plugins/jQuery/jquery-2.2.3.min.js') ?>
  <?= $this->tag->javascriptInclude('js/bootstrap.min.js') ?>
  <?= $this->tag->javascriptInclude('js/login.min.js') ?>
</body>
</html>
