@extends('layout.index')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="#">Availibility EDC</a></li>
        <li class="breadcrumb-item active">List Availibility EDC</li>
    </ol>
@endsection('breadcrumbs')

@section('title', 'List Availibility EDC')
@section('titleTab', 'List Availibility EDC')

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
                <form action="<?= route('getListAvailibilityEdc') ?>" method="GET">
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
                        <form action="{{ route('exportReportAvailibilityEdc') }}" method="POST">
                            {{ csrf_field() }}
                            <input autocomplete="off" type="text" class="form-control" id="bulan1" placeholder="Start Month" name="bulan1" value="<?= $bulan1 ?>" hidden />
                            <input autocomplete="off" type="text" class="form-control" id="bulan2" placeholder="End Month" name="bulan2" value="<?= $bulan2 ?>" hidden />
                            <button type="submit" class="btn btn-primary" style="width: 180px; height: 38px;">
                                <i class="dripicons-cloud-download"></i>&nbsp;&nbsp;Download Report
                            </button>
                        </form>
                    </div>
                    <div class="col-md-2 text-center">
                        <form action="<?= route('prosesDeleteAvailibilityEdcBulk') ?>" method="POST">
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
                            <th rowspan="2" style="text-align:center; vertical-align: middle;">Bulan</th>
                            <th rowspan="2" style="text-align:center; vertical-align: middle;">Total MID</th>
                            <th rowspan="2" style="text-align:center; vertical-align: middle;">Total TID</th>
                            <th colspan="2" style="text-align:center; vertical-align: middle;">Jumlah TID</th>
                            <th rowspan="2" style="text-align:center; vertical-align: middle;">% Availability per Bulan</th>
                            <th rowspan="2" style="text-align:center; vertical-align: middle;">% Availability (YtD)</th>
                            <th rowspan="2" style="text-align:center; vertical-align: middle;">Action</th>
                        </tr>
                        <tr>
                            <th style="text-align:center; vertical-align: middle;">Tidak Trx Dalam 30 Hari</th>
                            <th style="text-align:center; vertical-align: middle;">Trx Dalam 30 Hari</th>
                        </tr>
                    </thead>
                    @if(isset($listData))
                    <tbody>
                        @if(count($listData) > 0)
                            @foreach($listData as $list)
                                <?php
                                    $date = $list->bulan;
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
                                    <td>{{ number_format($list->total_mid, 0, '', '.') }}</td>
                                    <td>{{ number_format($list->total_tid, 0, '', '.') }}</td>
                                    <td>{{ number_format($list->tid_tidak_trx, 0, '', '.') }}</td>
                                    <td>{{ number_format($list->tid_trx, 0, '', '.') }}</td>
                                    <td>{{ round($list->availability_bulan, 2) }} %</td>
                                    <td>{{ round($list->availability_ytd, 2) }} %</td>
                                    <td class='text-center'>
                                        <a href='<?= route('formUpdateAvailibilityEdc', ['id' => $list->id]) ?>' class='btn btn-outline-success' data-toggle='tooltip' data-placement='top' title='' data-original-title='Form Update'>
                                            <i class='fa fa-edit'></i>
                                        </a> | 
                                        <a href='<?= route('prosesDeleteAvailibilityEdc', ['id' => $list->id]) ?>' class='btn btn-outline-danger' data-toggle='tooltip' data-placement='top' title='' data-original-title='Delete'>
                                            <i class='fa fa-trash-alt'></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="8" class="text-center ">No Result Found</td></tr>
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