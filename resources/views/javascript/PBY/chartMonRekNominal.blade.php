<?php
$date1 = NULL;
$date2 = NULL;
$date3 = NULL;
if(!empty($date)){
    $date1 = $date->tanggal_1;
    $date2 = $date->tanggal_2;
    $date3 = $date->tanggal_3;
}

if(!empty($monRekNominal)){
    foreach ($monRekNominal as $data) {
        $chartData[] = [
        'name' => $data->cluster_rek,
        'data' => [(int)$data->normal,(int)$data->janggal,(int)$data->tidak_wajar,(int)$data->nihil,(int)$data->konstan],    
        ];
    }
}
?>

<script>
    Highcharts.chart('chartMonRekNominal', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'BY NOMINAL'
    },
    subtitle: {
    text: 
    @json($date1. ' | ' .$date2. ' | ' .$date3)
    },
    yAxis:{
        title: {
            text: 'Nominal'
        },
        labels:  {
            formatter: function () {
                const formattedLabel = 'Rp. ' + this.axis.defaultLabelFormatter.call(this);
                return formattedLabel.replace(/G/, 'M');          
            }
        }
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
    
    plotOptions: {
        column: {
            dataLabels:{
                enabled: true,
                crop: false,
                overflow: 'none',
                formatter: function () {
                    // Format data labels as currency
                    if(this.y > 1000000000 || this.y < -1000000000  ){
                        return 'Rp. ' + Highcharts.numberFormat(this.y/1000000000, 1) + " M";
                    }else if(this.y > 1000000 || this.y < -1000000){
                        return 'Rp. ' + Highcharts.numberFormat(this.y/1000000, 1) + " Jt"; 
                    }else if(this.y > 1000 || this.y < -1000){
                        return 'Rp. ' + Highcharts.numberFormat(this.y/1000, 0) + " Rb"; 
                    }else{
                        return 'Rp. ' + Highcharts.numberFormat(this.y, 0);
                    }
                }
            },
            pointPadding: 0.05,
            groupPadding: 0.1,
            borderWidth: 0,

        }
    },
    series: @json($chartData ?? null),
}); 


</script>