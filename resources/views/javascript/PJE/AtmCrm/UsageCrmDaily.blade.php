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
    $jumlah_withd_usage = [];
    $jumlah_deposit_usage = [];
    $jumlah_transfer_usage = [];
    $jumlah_payment_usage = [];
    $jumlah_inquiry_usage = [];
    if(!empty($usageCrmDaily))
    {
        foreach($usageCrmDaily as $uCrm)
        {
            $date = $uCrm->tanggal;
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
            $jumlah_withd_usage[] = $uCrm->jumlah_withd_usage;
            $jumlah_deposit_usage[] = $uCrm->jumlah_deposit_usage;
            $jumlah_transfer_usage[] = $uCrm->jumlah_transfer_usage;
            $jumlah_payment_usage[] = $uCrm->jumlah_payment_usage;
            $jumlah_inquiry_usage[] = $uCrm->jumlah_inquiry_usage;
        }

        $categories = array_reverse($categories);
        $jumlah_withd_usage = array_reverse($jumlah_withd_usage);
        $jumlah_deposit_usage = array_reverse($jumlah_deposit_usage);
        $jumlah_transfer_usage = array_reverse($jumlah_transfer_usage);
        $jumlah_payment_usage = array_reverse($jumlah_payment_usage);
        $jumlah_inquiry_usage = array_reverse($jumlah_inquiry_usage);
    }
?>

<script>
    Highcharts.chart('UsageCrmDaily', {
        chart: {
            type: 'spline'
        },

        legend: {
            symbolWidth: 40
        },

        title: {
            text: 'Usage CRM Daily'
        },

        yAxis: {
            title: {
                text: 'Number Of Usage'
            },
            accessibility: {
                description: 'Number Of Usage'
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

        series: [
            {
                name: 'Witdhrawal',
                data: @json($jumlah_withd_usage),
                dashStyle: 'ShortDashDot',
                color: colors[2]
            },  {
                name: 'Deposit',
                data: @json($jumlah_deposit_usage),
                dashStyle: 'Dash',
                color: colors[3]
            },  {
                name: 'Transfer',
                data: @json($jumlah_transfer_usage),
                dashStyle: 'Dot',
                color: colors[0]
            },  {
                name: 'Payment',
                data: @json($jumlah_payment_usage),
                dashStyle: 'ShortDot',
                color: colors[5]
            },  {
                name: 'Inquiry',
                data: @json($jumlah_inquiry_usage),
                dashStyle: 'ShortDash',
                color: colors[9]
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