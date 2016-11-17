<!DOCTYPE html>
<html>

{% include 'layouts/head.volt' %}

<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <!-- include header -->
  {% include 'layouts/header.volt' %}

  <!-- include sidebar -->
  {% include 'layouts/sidebar.volt' %}

  <!-- =============================================== -->

  <!-- include Content Wrapper -->
  <div class="content-wrapper">
    {{ content() }}
  </div>

  <!-- include footer -->
  {% include 'layouts/footer.volt' %}
</div>
<!-- ./wrapper -->


</body>
</html>
