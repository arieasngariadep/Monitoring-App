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
    $jumlah_withd_amount = [];
    $jumlah_deposit_amount = [];
    $jumlah_transfer_amount = [];
    $jumlah_payment_amount = [];
    if(!empty($amountTrxCrm))
    {
        foreach($amountTrxCrm as $aCrm)
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
            $categories[] = $name[$aCrm->bulan];
            $jumlah_withd_amount[] = $aCrm->jumlah_withd_amount;
            $jumlah_deposit_amount[] = $aCrm->jumlah_deposit_amount;
            $jumlah_transfer_amount[] = $aCrm->jumlah_transfer_amount;
            $jumlah_payment_amount[] = $aCrm->jumlah_payment_amount;
        }
    }
?>

<script>
    Highcharts.chart('AmountTrxCrm', {
    chart: {
        type: 'spline'
    },

    legend: {
        symbolWidth: 40
    },

    title: {
        text: 'Amount Trx CRM ' + <?= $year ?>
    },

    yAxis: {
        title: {
            text: 'Amount'
        },
        accessibility: {
            description: 'Amount'
        }
    },

    xAxis: {
        title: {
            text: 'Trilion'
        },
        accessibility: {
            description: 'Bulan'
        },
        categories: @json($categories),
    },

    plotOptions: {
        series: {
            cursor: 'pointer'
        }
    },

    series: [
        {
            name: 'Witdhrawal',
            data: @json($jumlah_withd_amount),
            dashStyle: 'ShortDashDot',
            color: colors[2]
        },  {
            name: 'Deposit',
            data: @json($jumlah_deposit_amount),
            dashStyle: 'Dash',
            color: colors[3]
        },  {
            name: 'Transfer',
            data: @json($jumlah_transfer_amount),
            dashStyle: 'Dot',
            color: colors[0]
        },  {
            name: 'Payment',
            data: @json($jumlah_payment_amount),
            color: colors[5]
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