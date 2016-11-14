<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  {{ stylesheet_link('css/bootstrap.min.css') }}
  {{ stylesheet_link('plugins/font-awesome/css/font-awesome.min.css') }}
  {{ stylesheet_link('css/AdminLTE.min.css') }}
  {{ stylesheet_link('plugins/iCheck/square/blue.css') }}
</head>

<body class="hold-transition login-page">
  <div style="background-color: rgba(0,0,0,0.21); height: 100%; width: 100%; position: absolute; top: 0px;"></div>

  <div class="lockscreen-wrapper lockscreen" style="padding-top: 20px; padding-bottom: 20px;">
    <div class="lockscreen-logo">
      <a href="#" style="color: #fff;">PO.<b>Galatama</b></a>
    </div>

    <div class="lockscreen-name" style="color: #fff;" id="username">Username</div>

    <div class="lockscreen-item">

      <div class="lockscreen-image">
        {{ image('img/users/users.png', 'id':'foto') }}
      </div>

      <form data-login="data-login" class="lockscreen-credentials" action="{{ url('account/cek') }}" method="post">
        <div class="input-group">
          <div id="input_group">
            <input type="hidden" name="{{ security.getTokenKey() }}" value="{{ security.getToken() }}"/>
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
    <div class="lockscreen-footer text-center" style="color: #fff;">
      Copyright &copy; 2016 <b><a href="https://www.facebook.com/saipul.hidayat.cuy" style="color: #fff;">@The'Gerr09</a></b><br>
      All rights reserved
    </div>
  </div>

  {{ javascript_include('plugins/jQuery/jquery-2.2.3.min.js') }}
  {{ javascript_include('js/bootstrap.min.js') }}
  <script>
    (function() {

      $('form[data-login]').on('submit', function(e) {
        var form = $(this);
        var url = form.prop('action');

        $.ajax({
          type: 'POST',
          url: url,
          dataType:'json',
          data: form.serialize(),
          success: function(response){
            if (response.status == 'gagal') {
              $('#validation').fadeIn(500).delay(2500).fadeOut(500);
            }else if (response.status == 'login') { 
              window.location.href = "{{ url('') }}";
            }else if (response.status == 'login_wrong') {
              $('#validation_wrong').fadeIn(500).delay(2500).fadeOut(500);
              $('#input_group').html(response.token);
            }else {
              $('input[name="username"]')
                .removeAttr("name")
                .attr("name", "password")
                .attr("placeholder", "Enter Password")
                .val("");

              $('#icon').removeClass('fa-user').addClass('fa-lock');

              $('#foto')
                .removeAttr("src")
                .attr("src", "/bus/img/users/"+response.foto);

              $('#username').text(response.username);
              $('#input_group').html(response.token);

              $('form[data-login]')
                .removeAttr("data-login")
                .removeAttr("action")
                .attr("action", "{{ url('account/LoginProses') }}");
            }
          }
        });

        e.preventDefault();
      });

    })();
  </script>
</body>
</html>
