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
    $pengisian1 = [];
    $pengambilan1 = [];
    $target = [];
    $persentase_pengisian1 = [];
    if(!empty($kasTy))
    {
        foreach ($kasTy as $kty)
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
            $categories[] = $name[$kty->bulan];
            $pengisian1[] = (float)$kty->pengisian;
            $pengambilan1[] = (float)$kty->pengambilan;
            $persentase_pengisian1[] = round($kty->persentase_pengisian, 2);
            $target[] = (float)100.00;
        }
    }else{
        $categories[] = NULL;
            $pengisian1[] = NULL;
            $pengambilan1[] = NULL;
            $persentase_pengisian1[] = NULL;
            $target[] = (float)100.00;
    }
?>

<script>
    Highcharts.chart('KasAtmCrm', {
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Kas ATM/CRM ' + <?= $year ?>
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
            name: 'Pengambilan Kas Teller',
            type: 'column',
            color: colors[5],
            data: @json($pengambilan1),
            tooltip: {
                valueSuffix: ''
            }
        }, {
            name: 'Pengisian Kas ATM',
            type: 'column',
            color: '#eb6709',
            data: @json($pengisian1),
            tooltip: {
                valueSuffix: ''
            }
        }, {
            name: 'Persentase Pengisian',
            type: 'spline',
            color: '#FFD700',
            yAxis: 1,
            data: @json($persentase_pengisian1),
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