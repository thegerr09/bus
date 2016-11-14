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