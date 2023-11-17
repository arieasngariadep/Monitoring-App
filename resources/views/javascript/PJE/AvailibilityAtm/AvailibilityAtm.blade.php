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

<?php
    $categories = [];
    $rata_event_problem2 = [];
    $durasi_bulan2 = [];
    if(!empty($downtimeAtmTy))
    {
        foreach ($downtimeAtmTy as $ty)
        {
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
            $categories[] = $name[$ty->bulan];
            $rata_event_problem2[] = (int)$ty->rata_event_problem;
            $durasi_bulan2[] = round($ty->durasi_bulan, 2);
        }
    }
?>

<script>
    Highcharts.chart('AvailibilityAtm', {
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Downtime ATM ' + <?= $year ?>
        },
        xAxis: [{
            categories: @json($categories),
            crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value}',
                style: {
                    color: Highcharts.getOptions().colors[0]
                },
                formatter: function() {
                    return Highcharts.numberFormat(this.value, 0, ' ', ',');
                }
            },
            title: {
                text: 'Rata-Rata',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            }
        }, { // Secondary yAxis
            title: {
                text: 'Menit',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            labels: {
                format: '{value} Menit',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            opposite: true
        }],
        tooltip: {
            shared: true
        },
        legend: {
            layout: 'horizontal',
            align: 'center',
            x: 0,
            horizontalAlign: 'buttom',
            y: 0,
            backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || // theme
            'rgba(255,255,255,0.25)'
        },
        plotOptions: {
            series: {
                label: {
                    enabled: false
                }
            }
        },
        series: [{
            name: 'Rata-rata Event Problem ' + <?= $year ?>,
            type: 'column',
            color: colors[5],
            data: @json($rata_event_problem2),
            tooltip: {
                valueSuffix: ''
            }
        }, {
            name: 'Durasi Downtime Per Bulan ' + <?= $year ?>,
            type: 'spline',
            color: '#eb6709',
            yAxis: 1,
            data: @json($durasi_bulan2),
            tooltip: {
                valueSuffix: '{point.y} Menit'
            }
        }]
    });
</script>