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
    $jumlah_atm = [];
    if(!empty($atm))
    {
        foreach($atm as $a)
        {
            $categories[] = $a->kode_wil;
            $jumlah_atm[] = $a->jumlah;
        }
    }

    $jumlah_crm = [];
    if(!empty($crm))
    {
        foreach($crm as $c)
        {
            $jumlah_crm[] = $c->jumlah;
        }
    }

?>

<script>
    Highcharts.chart('TotalAtmCrm', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Total Populasi ATM / CRM'
        },
        xAxis: {
            categories: @json($categories)
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total'
            },
            labels: {
                format: '{value}',
                formatter: function() {
                    return Highcharts.numberFormat(this.value, 0, ' ', ',');
                }
            },
        },
        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b><br/>',
            shared: true
        },
        plotOptions: {
            column: {
                stacking: 'items'
            }
        },
        series: [{
            name: 'ATM',
            color: colors[5],
            data: @json($jumlah_atm)
        }, {
            name: 'CRM',
            color: '#eb6709',
            data: @json($jumlah_crm)
        }]
    });
</script>