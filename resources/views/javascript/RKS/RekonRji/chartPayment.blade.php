<?php
$itemTrx=0;
$trxMatch = 0;
$trxUnmatch = 0;
$percentMatch = 0;
$percentUnmatch = 0;
$date =null;
if(!empty($chartIssuer)){
        foreach ($chartPayment as $key) {
            $date = $key->tanggal;
            $itemTrx = $key->item_trx;
            $trxMatch = $key->item_trx_match;
            $trxUnmatch = $key->item_trx_unmatch;
        }
    $percentMatch = $trxMatch / $itemTrx * 100;    
    $percentUnmatch = $trxUnmatch / $itemTrx * 100;    
}
?>

<script>
    Highcharts.chart('chartPayment', {
    colors: ['#01BAF2', '#71BF45', '#FAA74B', '#B37CD2'],
    chart: {
        type: 'pie'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    title: {
        text: 'Rekonsiliasi Payment'
    },
    subtitle: {
    text: @json($date),
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y:.2f} %'
            },
            showInLegend: true
        }
    },
    series: [{
        name: '',
        colorByPoint: true,
        size:'80%',
        innerSize: '50%',
        data: [{
            name: 'Match',
            y: @json($percentMatch)
        }, {
            name: 'Unmatch',
            y: @json($percentUnmatch)
        }]
    }]
}); 
</script>