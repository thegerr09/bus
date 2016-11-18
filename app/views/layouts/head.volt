<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PO. GALATAMA</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  {{ stylesheet_link('css/bootstrap.min.css') }}
  {{ stylesheet_link('plugins/font-awesome/css/font-awesome.min.css') }}
  {{ stylesheet_link('css/AdminLTE.min.css') }}
  {{ stylesheet_link('css/skins/_all-skins.min.css') }}
  {{ stylesheet_link('css/animate.css') }}

  <!-- favicon -->
  {{ stylesheet_link(["rel":"icon", "href":"img/bus.png", "type":"image/x-icon"]) }}

  <!-- JS -->
  {{ javascript_include('plugins/jQuery/jquery-2.2.3.min.js') }}
  {{ javascript_include('js/bootstrap.min.js') }}
  {{ javascript_include('plugins/file-style/bootstrap-filestyle.min.js') }}

  <!-- ChartJs -->
  {{ javascript_include('plugins/chartjs/Chart.min.js') }}
  
  <!-- iCheck -->
  {{ stylesheet_link('plugins/iCheck/flat/blue.css') }}
  {{ javascript_include('plugins/iCheck/icheck.min.js') }}

  <!-- Pnotify -->
  {{ stylesheet_link('plugins/pnotify/pnotify.min.css') }}
  {{ javascript_include("plugins/pnotify/pnotify.core.js") }}
  {{ javascript_include("plugins/pnotify/pnotify.buttons.js") }}
  {{ javascript_include("plugins/pnotify/pnotify.nonblock.js") }}

  <!-- dataTables css -->
  {{ stylesheet_link("plugins/datatables/jquery.dataTables.min.css") }}
  {{ stylesheet_link("plugins/datatables/buttons.bootstrap.min.css") }}
  {{ stylesheet_link("plugins/datatables/fixedHeader.bootstrap.min.css") }}
  {{ stylesheet_link("plugins/datatables/responsive.bootstrap.min.css") }}
  {{ stylesheet_link("plugins/datatables/scroller.bootstrap.min.css") }}

  <!-- dataTables js -->
  {{ javascript_include("plugins/datatables/jquery.dataTables.min.js") }}
  {{ javascript_include("plugins/datatables/dataTables.bootstrap.js") }}
  {{ javascript_include("plugins/datatables/dataTables.buttons.min.js") }}
  {{ javascript_include("plugins/datatables/buttons.bootstrap.min.js") }}
  {{ javascript_include("plugins/datatables/jszip.min.js") }}
  {{ javascript_include("plugins/datatables/pdfmake.min.js") }}
  {{ javascript_include("plugins/datatables/vfs_fonts.js") }}
  {{ javascript_include("plugins/datatables/buttons.html5.min.js") }}
  {{ javascript_include("plugins/datatables/buttons.print.min.js") }}
  {{ javascript_include("plugins/datatables/dataTables.fixedHeader.min.js") }}
  {{ javascript_include("plugins/datatables/dataTables.keyTable.min.js") }}
  {{ javascript_include("plugins/datatables/dataTables.responsive.min.js") }}
  {{ javascript_include("plugins/datatables/responsive.bootstrap.min.js") }}
  {{ javascript_include("plugins/datatables/dataTables.scroller.min.js") }}
  {{ javascript_include("plugins/datatables/dataTables.fixedColumns.min.js") }}

  <!-- all -->
  {{ javascript_include('plugins/slimScroll/jquery.slimscroll.min.js') }}
  {{ javascript_include('plugins/fastclick/fastclick.js') }}
  {{ javascript_include('plugins/input-mask/jquery.inputmask.js') }}
  {{ javascript_include('js/app.min.js') }}
  {{ javascript_include('js/demo.js') }}
  {{ javascript_include('js/router.js') }}
</head>