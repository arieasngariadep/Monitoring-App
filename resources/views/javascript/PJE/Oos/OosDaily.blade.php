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
    if(!empty($oosDaily))
    {
        foreach($oosDaily as $daily)
        {
            $date = $daily->tanggal;
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
            $categories[] = $dateSplit[2]."-".$bulan[$dateSplit[1]];
            $rata2[] = round($daily->avg);
        }
    }
?>

<script>
    Highcharts.chart('OosDaily', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Average OOS Daily - July 2022'
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
            name: 'Juli 2022',
            data: @json($rata2)
        }]
    });
</script>