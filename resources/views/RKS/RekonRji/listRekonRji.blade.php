@extends('layout.index')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="#">Rekon Rji</a></li>
        <li class="breadcrumb-item active">List Rekon Rji</li>
    </ol>
@endsection('breadcrumbs')

@section('content')
<style>
    .notation {
      height: 25px;
      width: 25px;
      /* background-color: #33ff00; */
      border-radius: 0%;
      display: inline-block;
    }
    </style>

<div class="row">
    <div class="col-lg-12 col-xl-12">
        <?php if($alert): ?>
        <div class="card m-b-30">
            <div class="card-body">
                <?= $alert ?>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="col-md-5 text-left">
                <form action="<?= route('exportReportRekonRji') ?>" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary" style="width: 180px; height: 38px;">
                        <i class="dripicons-cloud-download"></i>&nbsp;&nbsp;Download Report
                    </button>
                </form>
            </div>
            <div class="card-body">

                

                <table class="table table-bordered table-striped table-md" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Jenis Rekon</th>
                            <th>Tanggal</th>
                            <th>Item Trx</th>
                            <th>Nominal</th>
                            <th>Item Trx Match</th>
                            <th>Nominal Trx Match</th>
                            <th>Item Trx Unmatch</th>
                            <th>Nominal Trx Unmatch</th>
                            <th>Percentage Match</th>
                            <th>Percentage Unmatch</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($data) > 0)
                            <?php
                            $totalItemTrx = 0;
                            $totalNominalTrx = 0;
                            $totalItemTrxMatch = 0;
                            $totalNominalTrxMatch = 0;
                            $totalItemTrxUnmatch = 0;
                            $totalNominalTrxUnmatch = 0;
                            ?>
                            @foreach($data as $list)

                            <?php
                            $itemTrx = $list->item_trx;
                            $itemTrxMatch = $list->item_trx_match;
                            $itemTrxUnmatch = $list->item_trx_unmatch;

                            $totalItemTrx += $itemTrx;
                            $totalNominalTrx += $list->nominal;
                            $totalItemTrxMatch += $itemTrxMatch;
                            $totalNominalTrxMatch += $list->nominal_trx_match;
                            $totalItemTrxUnmatch += $itemTrxUnmatch;
                            $totalNominalTrxUnmatch += $list->nominal_trx_unmatch;

                            if($itemTrx != null || $itemTrxMatch != null || $itemTrxUnmatch != null){
                                $percentMatch = $itemTrxMatch/$itemTrx * 100;
                                $percentUnmatch = $itemTrxUnmatch/$itemTrx * 100;
                                $totalPercentMatch = $totalItemTrxMatch/$totalItemTrx * 100;
                                $totalPercentUnmatch = $totalItemTrxUnmatch/$totalItemTrx * 100;
                            }else{
                                $percentMatch = 0;
                                $percentUnmatch = 0;
                                $totalPercentMatch = 0;
                                $totalPercentUnmatch = 0;
                            }

                            

                            if($percentUnmatch > 1){
                                $status = '#ff0000';
                            }elseif($percentUnmatch > 0.5){
                                $status = '#fffb00';
                            }else{
                                $status = '#33ff00';
                            }; 

                            if($totalPercentUnmatch > 1){
                                $totalStat = '#ff0000';
                            }elseif($totalPercentUnmatch >0.5){
                                $totalStat = '#fffb00';
                            }else{
                                $totalStat = '#33ff00';
                            }
            
                            
                            ?>
                                <tr>
                                    <td>{{ $list->jenis_rekon }}</td>
                                    <td>{{ $list->tanggal }}</td>
                                    <td>{{ number_format($itemTrx,0,'','.') }}</td>
                                    <td>{{ number_format($list->nominal,0,'','.') }} </td>
                                    <td>{{ number_format($list->item_trx_match,0,'','.') }} </td>
                                    <td>{{ number_format($list->nominal_trx_match,0,'','.') }} </td>
                                    <td>{{ number_format($list->item_trx_unmatch,0,'','.') }} </td>
                                    <td>{{ number_format($list->nominal_trx_unmatch,0,'','.') }} </td>
                                    <td>{{ number_format($percentMatch,2,',','') }} % </td>
                                    <td>{{ number_format($percentUnmatch,2,',','') }} % </td>
                                    <td><div class="notation" style="background-color:{{$status}}"></div></td>
                                    <td class='text-center'>
                                        <a href='<?= route('editRekonRji', ['id' => $list->id]) ?>' class='btn btn-outline-success' data-toggle='tooltip' data-placement='top' title='' data-original-title='Form Update'>
                                            <i class='fa fa-edit'></i>
                                        </a>  
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="6" class="text-center ">No Result Found</td></tr>
                        @endif 
                        <tr>
                            <th>Total</th>
                            <td></td>
                            <td>{{number_format($totalItemTrx,0,'','.')}}</td>
                            <td>{{ number_format($totalNominalTrx,0,'','.') }}</td>
                            <td>{{ number_format($totalItemTrxMatch,0,'','.') }}</td>
                            <td>{{ number_format($totalNominalTrxMatch,0,'','.') }}</td>
                            <td>{{ number_format($totalItemTrxUnmatch,0,'','.') }}</td>
                            <td>{{ number_format($totalNominalTrxUnmatch,0,'','.') }}</td>
                            <td>{{ number_format($totalPercentMatch,2,',','') }} % </td>
                            <td>{{ number_format($totalPercentUnmatch,2,',','') }} % </td>
                            <td><div class="notation" style="background-color:{{ $totalStat }}"></div></td>
                            <td></td>
                        </tr>                       
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="chartAcquiring"></div>                   
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="chartIssuer"></div>                   
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="chartPayment"></div>                   
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="chartTotalRekonRji"></div>                   
                </div>
            </div>
        </div>
    </div>

</div> <!-- end row -->
@endsection('content')

