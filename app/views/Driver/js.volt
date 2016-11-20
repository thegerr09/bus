<script>
$(function () {
  'use strict';

  $('#example').DataTable();

  {% set no = 1 %}
  {% for x in driver %}
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
</script>