<style>

    .highcharts-figure,
    .highcharts-data-table table {
      min-width: 360px;
      max-width: 820px;
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
  $date = [];
  $target = [];
  if(!empty($sl2021))
  {
    foreach ($sl2021 as $service_level) {
      $name = array(
        '01' => 'Jan',
        '02' => 'Feb',
        '03' => 'Mar',
        '04' => 'Apr',
        '05' => 'Mei',
        '06' => 'Jun',
        '07' => 'Jul',
        '08' => 'Agust',
        '09' => 'Sep',
        '10' => 'Okt',
        '11' => 'Nov',
        '12' => 'Des'
      );
      $chartSl2021[] = (float)$service_level->average_sl ?? 0;
      $date[] = $name[$service_level->month];
      $target[] = (float)99.54;
    };
  }
  if(!empty($sl2022))
  {
    foreach ($sl2022 as $service_level) {
      $chartSl2022[] = (float)$service_level->average_sl;
    };
  }
@endphp


<script>
  var colors = Highcharts.getOptions().colors;
  var chartSL2021 = @json($chartSl2021);
  var chartSL2022 = @json($chartSl2022);
  var date = @json($date);
  var target = @json($target);

  Highcharts.chart('SlaAllPerMonth', {
    chart: {
      type: 'spline'
    },

    legend: {
      symbolWidth: 40
    },

    title: {
      text: 'Performance SLA ATM ' + <?= $year ?>
    },

    yAxis: {
      title: {
        text: 'Percentage usage'
      },
      accessibility: {
        description: 'Percentage usage'
      }
    },

    xAxis: {
      title: {
        text: 'Time'
      },
      accessibility: {
        description: 'Time from December 2010 to September 2019'
      },
      categories: date
    },

    tooltip: {
      valueSuffix: '%'
    },

    plotOptions: {
      series: {
        cursor: 'pointer',
        label: {
          enabled: false
        }
      }
    },

    series: [{
      name: 'SLA ' + <?= $year ?>,
      data: chartSL2022,
      dashStyle: 'ShortDashDot',
      color: colors[0]
    }, {
      name: 'TARGET',
      data: target,
      dashStyle: 'ShortDashDot',
      color: '#eb6709'
    }],

    responsive: {
      rules: [{
        condition: {
          maxWidth: 550
        },
        chartOptions: {
          chart: {
            spacingLeft: 3,
            spacingRight: 3
          },
          legend: {
            itemWidth: 150
          },
          xAxis: {
            categories: date,
            title: ''
          },
          yAxis: {
            visible: true
          }
        }
      }]
    }
  });
</script>
