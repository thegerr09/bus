<script>
$(function () {
  'use strict';

  $('#example').DataTable();

  var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
  var salesChart = new Chart(salesChartCanvas);

  var salesChartCanvas1 = $("#salesChart1").get(0).getContext("2d");
  var salesChart1 = new Chart(salesChartCanvas1);

  var salesChartCanvas2 = $("#salesChart2").get(0).getContext("2d");
  var salesChart2 = new Chart(salesChartCanvas2);

  var salesChartData = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
    datasets: [
      {
        fillColor: "rgba(60,141,188,0.9)",
        data: [1, 15, 30, 5, 6, 7]
      }
    ]
  };

  var salesChartOptions = {
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
  salesChart.Line(salesChartData, salesChartOptions);
  salesChart1.Line(salesChartData, salesChartOptions);
  salesChart2.Line(salesChartData, salesChartOptions);
});
</script>