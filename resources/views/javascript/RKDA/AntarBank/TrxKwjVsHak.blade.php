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

<?php
    $categories = [];
    $total_trx_kwj = [];
    $total_trx_hak = [];
    $total_trx_net = [];
    foreach ($KwjVsHak as $list)
    {
        $date = $list->tanggal;
        $hari = date("l", strtotime($date));

        $bulan = array(
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
        $dateSplit = explode("-", $date);
        $categories[] = $dateSplit[2]."-".$bulan[$dateSplit[1]]."-".$dateSplit[0];
        $total_trx_kwj[] = (int)$list->total_trx_kwj;
        $total_trx_hak[] = (int)$list->total_trx_hak;
        $total_trx_net[] = (int)$list->total_trx_net;
    }

    $categories = array_reverse($categories);
    $total_trx_kwj = array_reverse($total_trx_kwj);
    $total_trx_hak = array_reverse($total_trx_hak);
    $total_trx_net = array_reverse($total_trx_net);
?>

<script>
    Highcharts.chart('TrxKwjVsHak', {
        chart: {
            type: 'spline'
        },

        legend: {
            symbolWidth: 40
        },

        title: {
            text: 'TRX Kewajiban Vs Hak'
        },

        yAxis: {
            title: {
                text: 'Number Of Trx'
            },
            accessibility: {
                description: 'Number Of Trx'
            }
        },

        xAxis: {
            title: {
                text: 'Tanggal'
            },
            accessibility: {
                description: 'Tanggal'
            },
            categories: @json($categories)
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
        name: 'TRX Kewajiban',
        data: @json($total_trx_kwj),
        dashStyle: 'ShortDashDot',
        color: colors[2]
        }, {
        name: 'TRX Hak',
        data: @json($total_trx_hak),
        dashStyle: 'ShortDash',
        color: colors[0]
        }, {
        name: 'TRX Net',
        data: @json($total_trx_net),
        dashStyle: 'ShortDot',
        color: colors[5]
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
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
                        categories: @json($categories),
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