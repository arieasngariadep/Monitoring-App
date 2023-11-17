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
    $realisasi2 = [];
    $persentase2 = [];
    $target = [];
    if(!empty($paguKasThisYear))
    {
        foreach ($paguKasThisYear as $thisYear)
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
            $categories[] = $name[$thisYear->bulan];
            $realisasi2[] = (float)$thisYear->realisasi;
            $persentase2[] = round($thisYear->persentase_bulan, 2);
            $target[] = (float)100.00;
        }
    }else{
        $categories[] = NULL;
        $realisasi2[] = NULL;
        $persentase2[] = NULL;
        $target[] = (float)100.00;
    }
?>

<script>
    Highcharts.chart('PaguKas', {
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Pagu Kas ' + <?= $year ?>
        },
        xAxis: [{
            categories: @json($categories),
            crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{text}',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            title: {
                text: 'Total',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            }
        }, { // Secondary yAxis
            title: {
                text: 'Persentase',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            labels: {
                format: '{value}%',
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
            name: 'Realisasi',
            type: 'column',
            color: colors[5],
            data: @json($realisasi2),
            tooltip: {
                valueSuffix: ''
            }
        }, {
            name: 'Percentage',
            type: 'spline',
            color: '#eb6709',
            yAxis: 1,
            data: @json($persentase2),
            tooltip: {
                valueSuffix: '{point.percentage:.1f}%'
            }
        }, {
            type: 'spline',
            name: 'Target',
            data: @json($target),
            yAxis: 1,
            marker: {
                lineWidth: 2,
                lineColor: '#f22e2e',
                fillColor: 'white'
            },
            tooltip: {
                valueSuffix: '{point.percentage:.1f}%'
            }
        }]
    });
</script>