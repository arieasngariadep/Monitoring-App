<style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 360px;
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
    $rata2 = [];
    $rata22 = [];
    if(!empty($oosLastYear))
    {
        foreach($oosLastYear as $last)
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
            $categories[] = $name[$last->bulan];
            $rata2[] = round($last->rata2);
        }
    }

    if(!empty($oosThisYear))
    {
        foreach($oosThisYear as $thisYear)
        {
            $rata22[] = round($thisYear->rata2);
        }
    }
?>

<script>
    Highcharts.chart('OosMonthly', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Average Total OOS ' + <?= $lastYear ?> + ' - ' + <?= $year ?>
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: @json($categories)
    },
    yAxis: {
        title: {
            text: 'Average'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
            name: @json($lastYear),
            data: @json($rata2)
        }, {
            name: @json($year),
            data: @json($rata22)
        }]
    });
</script>