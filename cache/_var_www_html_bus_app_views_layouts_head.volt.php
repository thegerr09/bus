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
  <?= $this->tag->stylesheetLink('plugins/datetimepicker/build/css/bootstrap-datetimepicker.min.css') ?>
  <?= $this->tag->javascriptInclude('plugins/moment/min/moment.min.js') ?>
  <?= $this->tag->javascriptInclude('plugins/moment/locale/id.js') ?>
  <?= $this->tag->javascriptInclude('plugins/datetimepicker/build/js/bootstrap-datetimepicker.min.js') ?>

  <!-- all -->
  <?= $this->tag->javascriptInclude('plugins/slimScroll/jquery.slimscroll.min.js') ?>
  <?= $this->tag->javascriptInclude('plugins/fastclick/fastclick.js') ?>
  <?= $this->tag->javascriptInclude('plugins/input-mask/jquery.inputmask.js') ?>
  <?= $this->tag->javascriptInclude('js/app.min.js') ?>
  <?= $this->tag->javascriptInclude('js/demo.js') ?>
  <?= $this->tag->javascriptInclude('js/router.js') ?>
</head>