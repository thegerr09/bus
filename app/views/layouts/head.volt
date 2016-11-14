<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  {{ stylesheet_link('css/bootstrap.min.css') }}
  {{ stylesheet_link('plugins/font-awesome/css/font-awesome.min.css') }}
  {{ stylesheet_link('css/AdminLTE.min.css') }}
  {{ stylesheet_link('css/skins/_all-skins.min.css') }}
  {{ stylesheet_link('css/animate.css') }}
  {{ stylesheet_link('plugins/pnotify/pnotify.min.css') }}

  <!-- Jquery -->
  {{ javascript_include('plugins/jQuery/jquery-2.2.3.min.js') }}
  {{ javascript_include('js/bootstrap.min.js') }}
  {{ javascript_include('plugins/file-style/bootstrap-filestyle.min.js') }}

  <!-- nprogress -->
  {{ javascript_include('plugins/nprogress/nprogress.js') }}
  {{ stylesheet_link('plugins/nprogress/nprogress.css') }}

  <!-- favicon -->
  {{ stylesheet_link(["rel":"icon", "href":"img/bus.png", "type":"image/x-icon"]) }}
</head>