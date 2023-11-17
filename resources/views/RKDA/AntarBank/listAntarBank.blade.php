@extends('layout.index')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="#">Antar Bank</a></li>
        <li class="breadcrumb-item active">List Antar Bank</li>
    </ol>
@endsection('breadcrumbs')

@section('title', 'List Antar Bank')
@section('titleTab', 'List Antar Bank')

@section('content')
<style>
    th, td {
        white-space: nowrap;
        overflow: hidden;
    }
    .table-wrapper {
        overflow-x: scroll;
        width: 1100px;
        margin: 0 auto;
        table-layout: fixed;
    }
    .address {
        width: 20px !important;
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
            <div class="card-body">
                <form action="<?= route('getListAntarBank') ?>" method="GET">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <input autocomplete="off" type="text" class="form-control" id="tanggal1" placeholder="Start Date" name="tanggal1" value="<?= $tanggal1 ?>" />
                        </div>
                        <div class="col-md-4"> 
                            <input autocomplete="off" type="text" class="form-control" id="tanggal2" placeholder="End Date" name="tanggal2" value="<?= $tanggal2 ?>" />
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary" style="width: 180px; height: 38px;"><i class="dripicons-search"></i>&nbsp;&nbsp;Cari</button>
                        </div>
                    </div>
                </form>

                @if($tanggal1 != NULL || $tanggal2 != NULL)
                <div class="row mt-4">
                    <div class="col-md-5 text-right">
                        <form action="{{ route('exportReportAntarBank') }}" method="POST">
                            {{ csrf_field() }}
                            <input autocomplete="off" type="text" class="form-control" id="tanggal1" placeholder="Start Month" name="tanggal1" value="<?= $tanggal1 ?>" hidden />
                            <input autocomplete="off" type="text" class="form-control" id="tanggal2" placeholder="End Month" name="tanggal2" value="<?= $tanggal2 ?>" hidden />
                            <button type="submit" class="btn btn-primary" style="width: 180px; height: 38px;">
                                <i class="dripicons-cloud-download"></i>&nbsp;&nbsp;Download Report
                            </button>
                        </form>
                    </div>
                    <div class="col-md-2 text-center">
                        <form action="<?= route('prosesDeleteAntarBankBulk') ?>" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="text" class="form-control" name="tanggal1" value="<?= $tanggal1 ?>" hidden />
                            <input type="text" class="form-control" name="tanggal2" value="<?= $tanggal2 ?>" hidden />
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

                <div class="card-body scrollme">
                    <div class="table-wrapper">
                        <table class="table table-bordered table-striped table-md" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th rowspan="4" style="text-align:center; vertical-align: middle;">Tanggal</th>
                                    <th colspan="24" style="text-align:center; vertical-align: middle;">HAK</th>
                                    <th colspan="24" style="text-align:center; vertical-align: middle;">KEWAJIBAN</th>
                                    <th rowspan="4" style="text-align:center; vertical-align: middle;">Action</th>
                                </tr>
                                <tr>
                                    <th colspan="10" style="text-align:center; vertical-align: middle;">WD (BNI AS ACQ)</th>
                                    <th rowspan="2" colspan="2" style="text-align:center; vertical-align: middle;">TOTAL WD</th>
                                    <th colspan="10" style="text-align:center; vertical-align: middle;">TRF (BNI AS DEST)</th>
                                    <th rowspan="2" colspan="2" style="text-align:center; vertical-align: middle;">TOTAL TRF</th>
                                    <th colspan="10" style="text-align:center; vertical-align: middle;">WD (BNI AS ISS)</th>
                                    <th rowspan="2" colspan="2" style="text-align:center; vertical-align: middle;">TOTAL WD</th>
                                    <th colspan="10" style="text-align:center; vertical-align: middle;">TRF TRF (BNI AS ISS)</th>
                                    <th rowspan="2" colspan="2" style="text-align:center; vertical-align: middle;">TOTAL TRF</th>
                                </tr>
                                <tr>
                                    <th colspan="2" style="text-align:center; vertical-align: middle;">LINK</th>
                                    <th colspan="2" style="text-align:center; vertical-align: middle;">MP</th>
                                    <th colspan="2" style="text-align:center; vertical-align: middle;">PRIMA</th>
                                    <th colspan="2" style="text-align:center; vertical-align: middle;">BERSAMA</th>
                                    <th colspan="2" style="text-align:center; vertical-align: middle;">ALTO</th>
                                    <th colspan="2" style="text-align:center; vertical-align: middle;">LINK</th>
                                    <th colspan="2" style="text-align:center; vertical-align: middle;">MP</th>
                                    <th colspan="2" style="text-align:center; vertical-align: middle;">PRIMA</th>
                                    <th colspan="2" style="text-align:center; vertical-align: middle;">BERSAMA</th>
                                    <th colspan="2" style="text-align:center; vertical-align: middle;">ALTO</th>
                                    <th colspan="2" style="text-align:center; vertical-align: middle;">LINK</th>
                                    <th colspan="2" style="text-align:center; vertical-align: middle;">MP</th>
                                    <th colspan="2" style="text-align:center; vertical-align: middle;">PRIMA</th>
                                    <th colspan="2" style="text-align:center; vertical-align: middle;">BERSAMA</th>
                                    <th colspan="2" style="text-align:center; vertical-align: middle;">ALTO</th>
                                    <th colspan="2" style="text-align:center; vertical-align: middle;">LINK</th>
                                    <th colspan="2" style="text-align:center; vertical-align: middle;">MP</th>
                                    <th colspan="2" style="text-align:center; vertical-align: middle;">PRIMA</th>
                                    <th colspan="2" style="text-align:center; vertical-align: middle;">BERSAMA</th>
                                    <th colspan="2" style="text-align:center; vertical-align: middle;">ALTO</th>
                                </tr>
                                <tr>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                    <th style="text-align:center; vertical-align: middle;">TRX</th>
                                    <th style="text-align:center; vertical-align: middle;">AMOUNT</th>
                                </tr>
                            </thead>
                            @if(isset($listData))
                            <tbody>
                                @if(count($listData) > 0)
                                    @foreach($listData as $list)
                                        @php
                                            $date = $list->tanggal;
                                            $hari = date("l", strtotime($date));
                                            $hariINDO = array(
                                                'Monday' => 'Senin',
                                                'Tuesday' => 'Selasa',
                                                'Wednesday' => 'Rabu',
                                                'Thursday' => 'Kamis',
                                                'Friday' => 'Jum&apos;at',
                                                'Saturday' => 'Sabtu',
                                                'Sunday' => 'Minggu'
                                            );
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
                                            $tanggal = $hariINDO[$hari].", ".$dateSplit[2]." ".$bulan[$dateSplit[1]]." ".$dateSplit[0];
                                        @endphp
                                        <tr>
                                            <td>{{ $tanggal }}</td>
                                            <td>{{ number_format($list->hak_trx_wd_link, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->hak_amount_wd_link, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->hak_trx_wd_mp, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->hak_amount_wd_mp, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->hak_trx_wd_prima, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->hak_amount_wd_prima, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->hak_trx_wd_bersama, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->hak_amount_wd_bersama, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->hak_trx_wd_alto, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->hak_amount_wd_alto, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->total_hak_trx_wd, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->total_hak_amount_wd, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->hak_trx_trf_link, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->hak_amount_trf_link, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->hak_trx_trf_mp, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->hak_amount_trf_mp, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->hak_trx_trf_prima, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->hak_amount_trf_prima, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->hak_trx_trf_bersama, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->hak_amount_trf_bersama, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->hak_trx_trf_alto, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->hak_amount_trf_alto, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->total_hak_trx_trf, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->total_hak_amount_trf, 0, '', '.') }}</td>           
                                            <td>{{ number_format($list->kwj_trx_wd_link, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->kwj_amount_wd_link, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->kwj_trx_wd_mp, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->kwj_amount_wd_mp, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->kwj_trx_wd_prima, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->kwj_amount_wd_prima, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->kwj_trx_wd_bersama, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->kwj_amount_wd_bersama, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->kwj_trx_wd_alto, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->kwj_amount_wd_alto, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->total_kwj_trx_wd, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->total_kwj_amount_wd, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->kwj_trx_trf_link, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->kwj_amount_trf_link, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->kwj_trx_trf_mp, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->kwj_amount_trf_mp, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->kwj_trx_trf_prima, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->kwj_amount_trf_prima, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->kwj_trx_trf_bersama, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->kwj_amount_trf_bersama, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->kwj_trx_trf_alto, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->kwj_amount_trf_alto, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->total_kwj_trx_trf, 0, '', '.') }}</td>
                                            <td>{{ number_format($list->total_kwj_amount_trf, 0, '', '.') }}</td>
                                            <td class='text-center'>
                                                <a href='<?= route('formUpdateAntarBank', ['id' => $list->id]) ?>' class='btn btn-outline-success' data-toggle='tooltip' data-placement='top' title='' data-original-title='Form Update'>
                                                    <i class='fa fa-edit'></i>
                                                </a> | 
                                                <a href='<?= route('prosesDeleteAntarBank', ['id' => $list->id]) ?>' class='btn btn-outline-danger' data-toggle='tooltip' data-placement='top' title='' data-original-title='Delete'>
                                                    <i class='fa fa-trash-alt'></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr><td colspan="27" class="text-center ">No Result Found</td></tr>
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
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection('content')