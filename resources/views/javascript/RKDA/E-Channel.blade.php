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
    $item_channel = [];
    $sesuai_sla_channel = [];
    $persentase_channel = [];
    foreach ($rekon as $ry)
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
        $categories[] = $name[$ry->bulan];
        $item_channel[] = (int)$ry->total_item_channel;
        $sesuai_sla_channel[] = (int)$ry->sesuai_sla_channel;
        $persentase_channel[] = round($ry->persentase_channel, 2);
    }
?>

<script>
    Highcharts.chart('E-Channel', {
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Rekonsiliasi Transaksi E-Channel ' + <?= $year ?>
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
            shared: true,
            valueDecimals: 2
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
            name: 'Total Item ',
            type: 'column',
            color: colors[5],
            data: @json($item_channel),
            tooltip: {
                valueSuffix: ''
            }
        }, {
            name: 'Sesuai SLA ',
            type: 'column',
            color: '#eb6709',
            data: @json($sesuai_sla_channel),
            tooltip: {
                valueSuffix: ''
            }
        }, {
            name: 'Persentase ',
            type: 'spline',
            color: '#FFD700',
            yAxis: 1,
            data: @json($persentase_channel),
            tooltip: {
                valueSuffix: '{point.percentage:.1f}%'
            }
        }]
    });
</script>