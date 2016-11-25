<script>
$(function () {
  'use strict';

  $('#example').DataTable();

  {% set no = 1 %}
  {% for x in codriver %}
  var salesChartCanvas{{ no }} = $("#salesChart{{ no }}").get(0).getContext("2d");
  var salesChart{{ no }} = new Chart(salesChartCanvas{{ no }});

  var salesChartData{{ no }} = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
    datasets: [
      {
        fillColor: "rgba(60,141,188,0.9)",
        data: [1, 15, 30, 5, 6, 7]
      }
    ]
  };

  var salesChartOptions{{ no }} = {
    showScale: true,
    scaleShowGridLines: false,
    scaleGridLineColor: "rgba(0,0,0,.05)",
    scaleGridLineWidth: 1,
    scaleShowHorizontalLines: true,
    scaleShowVerticalLines: true,
    bezierCurve: true,
    bezierCurveTension: 0.3,
    pointDot: false,
    pointDotRadius: 4,
    pointDotStrokeWidth: 1,
    pointHitDetectionRadius: 20,
    datasetStroke: true,
    datasetStrokeWidth: 2,
    datasetFill: true,
    maintainAspectRatio: true,
    responsive: true
  };
  salesChart{{ no }}.Line(salesChartData{{ no }}, salesChartOptions{{ no }});
  {% set no = no + 1 %}
  {% endfor %}
});

(function() {

  $('form[data-remote]').on('submit', function(e) {
    var form = $(this);
    var url = form.prop('action');

    $.ajax({
      type: 'POST',
      url: url,
      dataType:'json',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(response){
        new PNotify({
          title: response.title,
          text: response.text,
          type: response.type
        });
        update_page('CoDriver', 'page_co_driver');
        clear_form(response.close);
        list();
      }
    });

    e.preventDefault();
  });

})();

(function() {

  $('form[data-delete]').on('submit', function(e) {
    var form = $(this);
    var url = form.prop('action');

    $.ajax({
      type: 'POST',
      url: url,
      dataType:'json',
      data: form.serialize(),
      success: function(response){
        new PNotify({
          title: response.title,
          text: response.text,
          type: response.type,
          icon: response.icon
        });
        $('#Delete').modal('hide');
        $('#del'+response.id).fadeOut(1000);
        update_page('CoDriver', 'page_co_driver');
      }
    });

    e.preventDefault();
  });

})();

function deleted(id, driver) {
  $('input#id_delete').val(id);
  $('span#driverr').text(driver);
}

function update(id) {
  $('#label_driver').text('Update Co. Driver');
  $('form[name="form"]').attr('action', '{{ url('CoDriver/update/') }}'+id);
  var btn_submit = $('form[name="form"]').find('button[type="submit"]');
  btn_submit.removeClass('btn-success');
  btn_submit.addClass('btn-primary');
  btn_submit.text('Save Update');

  $.ajax({
    type: 'GET',
    url: '{{ url('CoDriver/detail/') }}'+id,
    dataType:'json',
    success: function(response){
      $.each(response, function(key, value) {
        $('form[name="form"]').find('[name="'+key+'"]')
        .not('input[name="image"]')
        .val(value);
        if (key == 'image') {
          $('input[name="remove_image"]').val(value);
          $('#uploadPreview').attr('src', 'img/codriver/'+value);
          $('input[name="image"]').attr('data-placeholder', value);
        }
      });
    }
  });
}

function list() {
  $.ajax({
    type: 'GET',
    url: '{{ url('CoDriver/list') }}',
    dataType:'html',
    success: function(response){
      $('#list_view').html(response);
      
      $(function () {
        'use strict';

        $('#example').DataTable();

        {% set no = 1 %}
        {% for x in codriver %}
        var salesChartCanvas{{ no }} = $("#salesChart{{ no }}").get(0).getContext("2d");
        var salesChart{{ no }} = new Chart(salesChartCanvas{{ no }});

        var salesChartData{{ no }} = {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
          datasets: [
            {
              fillColor: "rgba(60,141,188,0.9)",
              data: [1, 15, 30, 5, 6, 7]
            }
          ]
        };

        var salesChartOptions{{ no }} = {
          showScale: true,
          scaleShowGridLines: false,
          scaleGridLineColor: "rgba(0,0,0,.05)",
          scaleGridLineWidth: 1,
          scaleShowHorizontalLines: true,
          scaleShowVerticalLines: true,
          bezierCurve: true,
          bezierCurveTension: 0.3,
          pointDot: false,
          pointDotRadius: 4,
          pointDotStrokeWidth: 1,
          pointHitDetectionRadius: 20,
          datasetStroke: true,
          datasetStrokeWidth: 2,
          datasetFill: true,
          maintainAspectRatio: true,
          responsive: true
        };
        salesChart{{ no }}.Line(salesChartData{{ no }}, salesChartOptions{{ no }});
        {% set no = no + 1 %}
        {% endfor %}
      });
    }
  });
}

function status_action(id, status, clas) {
  $.ajax({
    type: 'POST',
    url: '{{ url('CoDriver/status') }}',
    dataType:'json',
    data: 'id='+id+'&active='+status+'&class='+clas,
    success: function(response){
      new PNotify({
        title: response.title,
        text: response.text,
        type: response.type,
        icon: response.icon
      });
      $("#button_status"+id).removeClass()
        .addClass('fa fa-power-off cursor text-'+response.class)
        .attr("onclick", "status_action("+id+", '"+response.status+"', '"+response.class+"')");

      $("#label_status"+id).removeClass()
        .addClass('label bg-'+response.class)
        .text(response.label);

       if (response.type == 'error') {
         $('#kondisi'+id).hide();
       } else {
         $('#kondisi'+id).show();
       }

      update_page('CoDriver', 'page_co_driver');
    }
  });
}

function clear_form(id){
  $('form[name="form"]').find('[name]').val('');
  $('#uploadPreview').attr('src', 'img/codriver/users.png');
  if (id == '1') {
    $('#Tambah').modal('hide');
  } else {
    $('#label_driver').text('Input Driver');
    $('form[name="form"]').attr('action', '{{ url('CoDriver/input') }}');
    var btn_submit = $('form[name="form"]').find('button[type="submit"]');
    btn_submit.removeClass('btn-primary');
    btn_submit.addClass('btn-success');
    btn_submit.text('Save');
  }
}

$("[data-mask]").inputmask({mask: "99999999999999", placeholder: "",});

$(":file").filestyle({
  buttonName: "btn-default",
  iconName: "fa fa-image",
  buttonText: "Browse"
});

function PreviewImage() {
  $('input[name="remove_image"]').val('');
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

  oFReader.onload = function (oFREvent) {
    document.getElementById("uploadPreview").src = oFREvent.target.result;
  };
};
</script>