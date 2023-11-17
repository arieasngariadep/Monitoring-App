@extends('layout.index')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="#">Dispute Resolution</a></li>
        <li class="breadcrumb-item active">List Dispute Resolution</li>
    </ol>
@endsection('breadcrumbs')

@section('title', 'List Dispute Resolution')
@section('titleTab', 'List Dispute Resolution')

@section('content')
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
            <div class="card-body">
                <form action="<?= route('getListDisputeResolution') ?>" method="GET">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <input autocomplete="off" type="text" class="form-control" id="bulan1" placeholder="Start Month" name="bulan1" value="<?= $bulan1 ?>" />
                        </div>
                        <div class="col-md-4"> 
                            <input autocomplete="off" type="text" class="form-control" id="bulan2" placeholder="End Month" name="bulan2" value="<?= $bulan2 ?>" />
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary" style="width: 180px; height: 38px;"><i class="dripicons-search"></i>&nbsp;&nbsp;Cari</button>
                        </div>
                    </div>
                </form>

                @if($bulan1 != NULL || $bulan2 != NULL)
                <div class="row mt-4">
                    <div class="col-md-5 text-right">
                        <form action="{{ route('exportReportDisputeResolution') }}" method="POST">
                            {{ csrf_field() }}
                            <input autocomplete="off" type="text" class="form-control" id="bulan1" placeholder="Start Month" name="bulan1" value="<?= $bulan1 ?>" hidden />
                            <input autocomplete="off" type="text" class="form-control" id="bulan2" placeholder="End Month" name="bulan2" value="<?= $bulan2 ?>" hidden />
                            <button type="submit" class="btn btn-primary" style="width: 180px; height: 38px;">
                                <i class="dripicons-cloud-download"></i>&nbsp;&nbsp;Download Report
                            </button>
                        </form>
                    </div>
                    <div class="col-md-2 text-center">
                        <form action="<?= route('prosesDeleteDisputeResolutionBulk') ?>" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="text" class="form-control" name="bulan1" value="<?= $bulan1 ?>" hidden />
                            <input type="text" class="form-control" name="bulan2" value="<?= $bulan2 ?>" hidden />
                            <div class="col-md-4 text-right">
                                <button type="submit" class="btn btn-danger" style="width: 180px; height: 38px;">
                                    <i class="dripicons-trash"></i>&nbsp;&nbsp;Delete Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif

                <hr class="mt-4 mb-4">

                <table class="table table-bordered table-striped table-md" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Periode</th>
                            <th>Total Case</th>
                            <th>Win Case</th>
                            <th>Target</th>
                            <th>Persentase per Bulan</th>
                            <th>Persentase (YtD)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if(isset($listData))
                    <tbody>
                        @if(count($listData) > 0)
                            @foreach($listData as $list)
                                <?php
                                    $date = $list->periode;
                                    $bulan = array(
                                        '01' => 'Januari',
                                        '02' => 'Febuari',
                                        '03' => 'Maret',
                                        '04' => 'April',
                                        '05' => 'Mei',
                                        '06' => 'Juni',
                                        '07' => 'Juli',
                                        '08' => 'Agustus',
                                        '09' => 'September',
                                        '10' => 'Oktober',
                                        '11' => 'November',
                                        '12' => 'Desember'
                                    );
                                    $dateSplit = explode("-", $date);
                                    $tanggal = $bulan[$dateSplit[1]]." ".$dateSplit[0];
                                ?>
                                <tr>
                                    <td>{{ $tanggal }}</td>
                                    <td>{{ number_format($list->total_case, 0, '', '.') }}</td>
                                    <td>{{ number_format($list->win_case, 0, '', '.') }}</td>
                                    <td>{{ round($list->target, 2) }} %</td>
                                    <td>{{ round($list->persentase_bulan, 2) }} %</td>
                                    <td>{{ round($list->persentase_ytd, 2) }} %</td>
                                    <td class='text-center'>
                                        <a href='<?= route('formUpdateDisputeResolution', ['id' => $list->id]) ?>' class='btn btn-outline-success' data-toggle='tooltip' data-placement='top' title='' data-original-title='Form Update'>
                                            <i class='fa fa-edit'></i>
                                        </a> | 
                                        <a href='<?= route('prosesDeleteDisputeResolution', ['id' => $list->id]) ?>' class='btn btn-outline-danger' data-toggle='tooltip' data-placement='top' title='' data-original-title='Delete'>
                                            <i class='fa fa-trash-alt'></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="6" class="text-center ">No Result Found</td></tr>
                        @endif
                    </tbody>
                    @endif
                </table>

                @if(isset($listData))
                <div class="row">
                    <div class="col-md-5">
                        @if(count($listData) > 0)
                        <div class="pull-left">
                            Showing {{ $listData->firstItem() }} to {{ $listData->lastItem() }} of {{ number_format($listData->total()) }} entries
                        </div>
                        @else
                        <div class="pull-left">
                            Showing 0 to 0 of {{ $listData->total() }} entries
                        </div>
                        @endif
                    </div>
                    <div class="col-md-7">
                        <div class="pull-right">
                            {{ $listData->links('layout.pagination') }}
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection('content')