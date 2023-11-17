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
    var chartSL2021 = @json($chartSl2021);
    var chartSL2022 = @json($chartSl2022);
    var region = @json($region);
    var target = @json($target);

    Highcharts.chart('RegularUsageSlRegion', {
        chart: {
            type: 'spline'
        },

        legend: {
            symbolWidth: 40
        },

        title: {
            text: 'Pencapaian SLA ALL ATM per Wilayah 2021 - 2022'
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
            categories: region
        },

        tooltip: {
            valueSuffix: '%'
        },

        plotOptions: {
            series: {
            cursor: 'pointer'
            }
        },

        series: [
            {
            name: 'SLA 2021',
            data: chartSL2021,
            color: colors[2],
            accessibility: {
                description: 'This is the most used screen reader in 2019.'
            }
            }, {
            name: 'SLA 2022',
            data: chartSL2022,
            dashStyle: 'ShortDashDot',
            color: colors[0]
            }, {
            name: 'TARGET',
            data: target,
            dashStyle: 'ShortDashDot',
            color: '#eb6709'
            }
        ],

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
                        categories: region,
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
