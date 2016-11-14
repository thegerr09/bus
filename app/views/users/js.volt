<script>
(function() {

  $('form[data-remote]').on('submit', function(e) {
    var form = $(this);
    var url = form.prop('action');

    $.ajax({
      type: 'POST',
      url: url,
      dataType:'json',
      data: form.serialize(),
      success: function(response){
        console.log(response);
        // new PNotify({
        //   title: response.title,
        //   text: response.text,
        //   type: response.type
        // });
        // reload_pages(response.link, response.storage);
        // clear_form(response.close);
        // list();
      }
    });

    e.preventDefault();
  });

})();

function list() {
  $.ajax({
    type: 'GET',
    url: '{{ url('Users/list') }}',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response);
    }
  });
}


$(document).ready(function() {
  list();
});
</script>