<style>
  .highcharts-figure,
  .highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
  }
  
  .highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
  }
  
  .highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
  }
  
  .highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
  }
  
  .highcharts-data-table td,
  .highcharts-data-table th,
  .highcharts-data-table caption {
    padding: 0.5em;
  }
  
  .highcharts-data-table thead tr,
  .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
  }
  
  .highcharts-data-table tr:hover {
    background: #f1f7ff;
  }
</style>
  
@php
  $chartSl2021 = [];
  $chartSl2022 = [];
  $region = [];
  $target = [];
  if(!empty($slRegion2021))
  {
    foreach ($slRegion2021 as $service_level) {
      $chartSl2021[] = (float)$service_level->average_sl ?? 0;
    };
  }
  if(!empty($slRegion2022))
  {
    foreach ($slRegion2022 as $service_level) {
      $chartSl2022[] = (float)$service_level->average_sl;
      $region[] = $service_level->kode_wil;
      $target[] = (float)99.54;
    };
  }
@endphp
  
  
<script>
  var colors = Highcharts.getOptions().colors;
  var chartSL2021 = @json($chartSl2021);
  var chartSL2022 = @json($chartSl2022);
  var region = @json($region);
  var target = @json($target);

  Highcharts.chart('SlaAllPerRegion', {
    title: {
      text: 'Pencapaian SLA ALL ATM Per Wilayah 2021 - 2022'
    },

    yAxis: {
      allowDecimals: false,
      type: 'logarithmic',
      thinInterval: 0.5
    },

    xAxis: {
      categories: region
    },

    series: [{
      type: 'column',
      name: 'SLA 2021',
      data: chartSL2021,
      color: colors[5]
    }, {
      type: 'column',
      name: 'SLA 2022',
      data: chartSL2022,
      color: '#eb6709'
    }, {
      type: 'spline',
      name: 'Target',
      data: target,
      marker: {
        lineWidth: 2,
        lineColor: '#f22e2e',
        fillColor: 'white'
      }
    }]
  });
</script>
