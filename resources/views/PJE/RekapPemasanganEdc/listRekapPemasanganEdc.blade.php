@extends('layout.index')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="#">Rekap Pemasangan EDC</a></li>
        <li class="breadcrumb-item active">List Rekap Pemasangan EDC</li>
    </ol>
@endsection('breadcrumbs')

@section('title', 'List Rekap Pemasangan EDC')
@section('titleTab', 'List Rekap Pemasangan EDC')

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
                <form action="<?= route('getListRekapPemasanganEdc') ?>" method="GET">
                    <div class="row mt-3">
                        <div class="col-md-6"> 
                            <select name="wilayah" id="wilayah" class="form-control">
                                <option value="">Please Select Option</option>
                                @if(!empty($listWilayah))
                                @foreach($listWilayah as $w)
                                    @if($w->wilayah == $wilayah)
                                        {{ $sel = 'selected'; }}
                                    @else
                                        {{ $sel = ''; }}
                                    @endif
                                <option value="{{ $w->wilayah }}" {{ $sel }}>{{ $w->wilayah }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary" style="width: 180px; height: 38px;"><i class="dripicons-search"></i>&nbsp;&nbsp;Cari</button>
                        </div>
                    </div>
                </form>

                @if($wilayah != NULL)
                <div class="row mt-4">
                    <div class="col-md-5 text-right">
                        <form action="{{ route('exportReportRekapPemasanganEdc') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" class="form-control" name="wilayah" value="<?= $wilayah ?>" hidden />
                            <button type="submit" class="btn btn-primary" style="width: 180px; height: 38px;">
                                <i class="dripicons-cloud-download"></i>&nbsp;&nbsp;Download Report
                            </button>
                        </form>
                    </div>
                    <div class="col-md-2 text-center">
                        <form action="<?= route('prosesDeleteRekapPemasanganEdcBulk') ?>" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="text" class="form-control" name="wilayah" value="<?= $wilayah ?>" hidden />
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
                            <th rowspan="2" style="text-align:center; vertical-align: middle;">Wilayah</th>
                            <th rowspan="2" style="text-align:center; vertical-align: middle;">New Merchant</th>
                            <th rowspan="2" style="text-align:center; vertical-align: middle;">EDC Terpasang</th>
                            <th rowspan="2" style="text-align:center; vertical-align: middle;">% EDC Terpasang</th>
                            <th colspan="2" style="text-align:center; vertical-align: middle;">EDC Belum Terpasang</th>
                            <th rowspan="2" style="text-align:center; vertical-align: middle;">% Belum Terpasang</th>
                            <th rowspan="2" style="text-align:center; vertical-align: middle;">Failed</th>
                            <th rowspan="2" style="text-align:center; vertical-align: middle;">Pending</th>
                            <th rowspan="2" style="text-align:center; vertical-align: middle;">% Gagal Pasang</th>
                            <th rowspan="2" style="text-align:center; vertical-align: middle;">Action</th>
                        </tr>
                        <tr>
                            <th style="text-align:center; vertical-align: middle;">Sudah SPK</th>
                            <th style="text-align:center; vertical-align: middle;">Belum SPK</th>
                        </tr>
                    </thead>
                    @if(isset($listData))
                    <tbody>
                        @if(count($listData) > 0)
                            @foreach($listData as $list)
                                <tr>
                                    <td>{{ $list->wilayah }}</td>
                                    <td>{{ $list->new_merchant }}</td>
                                    <td>{{ $list->edc_terpasang }}</td>
                                    <td>{{ round($list->persentase_edc_terpasang, 2) }} %</td>
                                    <td>{{ $list->belum_pasang_sudah_spk }}</td>
                                    <td>{{ $list->belum_pasang_belum_spk }}</td>
                                    <td>{{ round($list->belum_pasang_sudah_spk, 2) }} %</td>
                                    <td>{{ $list->failed }}</td>
                                    <td>{{ $list->pending }}</td>
                                    <td>{{ round($list->persentase_gagal_pasang, 2) }} %</td>
                                    <td class='text-center'>
                                        <a href='<?= route('formUpdateRekapPemasanganEdc', ['id' => $list->id]) ?>' class='btn btn-outline-success' data-toggle='tooltip' data-placement='top' title='' data-original-title='Form Update'>
                                            <i class='fa fa-edit'></i>
                                        </a> | 
                                        <a href='<?= route('prosesDeleteRekapPemasanganEdc', ['id' => $list->id]) ?>' class='btn btn-outline-danger' data-toggle='tooltip' data-placement='top' title='' data-original-title='Delete'>
                                            <i class='fa fa-trash-alt'></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="11" class="text-center ">No Result Found</td></tr>
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