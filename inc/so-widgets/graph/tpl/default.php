
            <div class="col-xs-12 col-md-6">
              <canvas id="chart-area"></canvas>
            </div>

<script type="text/javascript">
jQuery(document).ready(function () {

  if (typeof Chart != "undefined") {

    var areaChartData = {
      labels: ["20th Jan", "21th Jan", "22th Jan", "23th Jan", "24th Jan", "25th Jan"],
      datasets: [{
        label: "Personal",
        backgroundColor: chartColors.red,
        data: [5, 24, 17, 10, 21, 38]
      }, {
        label: "Business1",
        backgroundColor: chartColors.blue,
        data: [18, 10, 4, 20, 30, 42]
      },
      {
        label: "sudeep",
        backgroundColor: chartColors.blue,
        data: [18, 10, 4, 20, 30, 42]
      }]
    };

    if (jQuery('#chart-area').length) {
      new Chart(jQuery('#chart-area'), {
        type: 'line',
        data: areaChartData,
        options: chartOptions
      });
    }


  }


});



</script>