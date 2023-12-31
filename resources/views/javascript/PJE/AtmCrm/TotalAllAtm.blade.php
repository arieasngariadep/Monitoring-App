<style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 320px;
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

    input[type="number"] {
        min-width: 50px;
    }
</style>

<?php
    if(count($totalPopulasi) > 0)
    {
        $jenisAtm = $totalPopulasi[0]->jenis_atm;
        $totalAtm = $totalPopulasi[0]->total;
        $jenisCrm = $totalPopulasi[1]->jenis_atm;
        $totalCrm = $totalPopulasi[1]->total;
    }else{
        $jenisAtm  = NULL;
        $totalAtm  = NULL;
        $jenisCrm  = NULL;
        $totalCrm  = NULL;
    }
?>

<script>
    Highcharts.chart('TotalAllAtm', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Total All ATM'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y} Items</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} Items'
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: @json($jenisAtm),
                y: @json($totalAtm),
                color: colors[5],
                sliced: true,
                selected: true
            }, {
                name: @json($jenisCrm),
                y: @json($totalCrm),
                color: '#eb6709',
            }]
        }]
    });
</script>