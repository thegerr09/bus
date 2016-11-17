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
              window.location.href = "http://localhost/bus/";
            }else if (response.status == 'login_wrong') {
              $('#validation_wrong').fadeIn(500).delay(2500).fadeOut(500);
              $('#input_group').html(response.token);
              $('input[name="password"]').val('');
            }else {
              $('input[name="username"]')
                .attr("name", "password")
                .attr("type", "password")
                .attr("placeholder", "Enter Password")
                .val("");

              $('#icon').removeClass('fa-user').addClass('fa-lock');

              $('#foto').attr("src", "/bus/img/users/"+response.foto);

              $('#username').text(response.username);
              $('#input_group').html(response.token);

              $('form[data-login]')
                .removeAttr("data-login")
                .attr("action", "http://localhost/bus/account/LoginProses");
            }
          }
        });

        e.preventDefault();
      });

    })();
</script>