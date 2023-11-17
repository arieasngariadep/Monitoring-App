<?php
$date1 = NULL;
$date2 = NULL;
$date3 = NULL;
if(!empty($date)){
    $date1 = $date->tanggal_1;
    $date2 = $date->tanggal_2;
    $date3 = $date->tanggal_3;
}

if(!empty($monRekRTL)){
    foreach ($monRekRTL as $data) {
        $chartData[] = [
        'name' => $data->cluster_rek,
        'data' => [(int)$data->normal,(int)$data->janggal,(int)$data->tidak_wajar,(int)$data->nihil,(int)$data->konstan],    
        ];
    }
}
?>
<script>
    Highcharts.chart('chartMonRek1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'BY CLUSTER'
    },
    subtitle: {
    text: 
    @json($date1. ' | ' .$date2. ' | ' .$date3)
    },
    xAxis: {
        categories: [
            'Normal',
            'Janggal',
            'Tidak Wajar',
            'Nihil',
            'Konstan',
        ],
        crosshair: true
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            dataLabels:{
                enabled: true,
                crop: false,
                overflow: 'none'
            },
            pointPadding: 0.15,
            borderWidth: 0
        }
    },
    series: @json($chartData ?? null),
}); 


</script>