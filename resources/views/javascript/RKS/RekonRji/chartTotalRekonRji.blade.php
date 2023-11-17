<?php
    $totalItemTrx = 0;
    $totalItemTrxMatch = 0;
    $totalItemTrxUnmatch = 0;
    $totalPercentMatch = 0;
    $totalPercentUnmatch = 0;
    if(!empty($chartTotalRekonRji)){
        foreach ($chartTotalRekonRji as $list) {
            $totalItemTrx = $list->item_trx;
            $totalItemTrxMatch = $list->item_trx_match;
            $totalItemTrxUnmatch = $list->item_trx_unmatch;
        }
        $totalPercentMatch = $totalItemTrxMatch/$totalItemTrx * 100;
        $totalPercentUnmatch = $totalItemTrxUnmatch/$totalItemTrx * 100;
    }
?>

<script>
    Highcharts.chart('chartTotalRekonRji', {
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
        text: 'Rekonsiliasi RJI'
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
        size:'100%',
        innerSize: '50%',
        data: [{
            name: 'Match',
            y: @json($totalPercentMatch)
        }, {
            name: 'Unmatch',
            y: @json($totalPercentUnmatch)
        }]
    }]
}); 

// var colors = Highcharts.getOptions().colors,
//   categories = [
//     'Issuer',
//     'Payment',
//     'Acquiring',
//   ],
//   data = [
//     {
//       y: 61.04,
//       color: colors[2],
//       drilldown: {
//         name: 'Issuer',
//         categories: [
//           'Match',
//           'Unmatch'
//         ],
//         data: [
//           36.89,
//           18.16
//         ]
//       }
//     },
//     {
//       y: 9.47,
//       color: colors[3],
//       drilldown: {
//         name: 'Payment',
//         categories: [
//           'Match',
//           'Unmatch'
//         ],
//         data: [
//           4.1,
//           2.01
//         ]
//       }
//     },
//     {
//       y: 9.32,
//       color: colors[5],
//       drilldown: {
//         name: 'Acquiring',
//         categories: [
//           'Match',
//           'Unmatch'
//         ],
//         data: [
//           6.62,
//           2.55
//         ]
//       }
//     }
//   ],
//   browserData = [],
//   versionsData = [],
//   i,
//   j,
//   dataLen = data.length,
//   drillDataLen,
//   brightness;


// // Build the data arrays
// for (i = 0; i < dataLen; i += 1) {

//   // add browser data
//   browserData.push({
//     name: categories[i],
//     y: data[i].y,
//     color: data[i].color
//   });

//   // add version data
//   drillDataLen = data[i].drilldown.data.length;
//   for (j = 0; j < drillDataLen; j += 1) {
//     brightness = 0.2 - (j / drillDataLen) / 5;
//     versionsData.push({
//       name: data[i].drilldown.categories[j],
//       y: data[i].drilldown.data[j],
//       color: Highcharts.color(data[i].color).brighten(brightness).get()
//     });
//   }
// }

// // Create the chart
// Highcharts.chart('chartTotalRekonRji', {
//   chart: {
//     type: 'pie'
//   },
//   title: {
//     text: 'Browser market share, January, 2022',
//     align: 'left'
//   },
//   subtitle: {
//     text: 'Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>',
//     align: 'left'
//   },
//   plotOptions: {
//     pie: {
//       shadow: false,
//       center: ['50%', '50%']
//     }
//   },
//   tooltip: {
//     valueSuffix: '%'
//   },
//   series: [{
//     name: 'Browsers',
//     data: browserData,
//     size: '60%',
//     dataLabels: {
//       formatter: function () {
//         return this.y > 5 ? this.point.name : null;
//       },
//       color: '#ffffff',
//       distance: -30
//     }
//   }, {
//     name: 'Versions',
//     data: versionsData,
//     size: '80%',
//     innerSize: '60%',
//     dataLabels: {
//       formatter: function () {
//         // display only if larger than 1
//         return this.y > 1 ? '<b>' + this.point.name + ':</b> ' +
//           this.y + '%' : null;
//       }
//     },
//     id: 'versions'
//   }],
//   responsive: {
//     rules: [{
//       condition: {
//         maxWidth: 400
//       },
//       chartOptions: {
//         series: [{
//         }, {
//           id: 'versions',
//           dataLabels: {
//             enabled: false
//           }
//         }]
//       }
//     }]
//   }
// });
</script>