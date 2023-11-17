@extends('layout.index')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="#">ATM CRM</a></li>
        <li class="breadcrumb-item active">List ATM CRM</li>
    </ol>
@endsection('breadcrumbs')

@section('title', 'List ATM CRM')
@section('titleTab', 'List ATM CRM')

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
                <form action="<?= route('getListAtmCrm') ?>" method="GET">
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <input autocomplete="off" type="text" class="form-control" id="tanggal1" placeholder="Start Date" name="tanggal1" value="<?= $tanggal1 ?>" />
                        </div>
                        <div class="col-md-3"> 
                            <input autocomplete="off" type="text" class="form-control" id="tanggal2" placeholder="End Date" name="tanggal2" value="<?= $tanggal2 ?>" />
                        </div>
                        <div class="col-md-3"> 
                            <select name="jenis_atm" id="jenis_atm" class="form-control">
                                <option value="">Please Select Option</option>
                                <option value="ATM" <?= $jenis_atm == 'ATM' ? 'selected' : '' ?>>ATM</option>
                                <option value="CRM" <?= $jenis_atm == 'CRM' ? 'selected' : '' ?>>CRM</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary" style="width: 180px; height: 38px;"><i class="dripicons-search"></i>&nbsp;&nbsp;Cari</button>
                        </div>
                    </div>
                </form>

                @if($tanggal1 != NULL || $tanggal2 != NULL)
                <div class="row mt-4">
                    <div class="col-md-5 text-right">
                        <form action="{{ route('exportReportAtmCrm') }}" method="POST">
                            {{ csrf_field() }}
                            <input autocomplete="off" type="text" class="form-control" id="tanggal1" placeholder="Start Month" name="tanggal1" value="<?= $tanggal1 ?>" hidden />
                            <input autocomplete="off" type="text" class="form-control" id="tanggal2" placeholder="End Month" name="tanggal2" value="<?= $tanggal2 ?>" hidden />
                            <input autocomplete="off" type="text" class="form-control" id="jenis_atm" placeholder="Jenis ATM" name="jenis_atm" value="<?= $jenis_atm ?>" hidden />
                            <button type="submit" class="btn btn-primary" style="width: 180px; height: 38px;">
                                <i class="dripicons-cloud-download"></i>&nbsp;&nbsp;Download Report
                            </button>
                        </form>
                    </div>
                    <div class="col-md-2 text-center">
                        <form action="<?= route('prosesDeleteAtmCrmBulk') ?>" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="text" class="form-control" name="tanggal1" value="<?= $tanggal1 ?>" hidden />
                            <input type="text" class="form-control" name="tanggal2" value="<?= $tanggal2 ?>" hidden />
                            <input type="text" class="form-control" name="jenis_atm" value="<?= $jenis_atm ?>" hidden />
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
                                    <th>Periode</th>
                                    <th>Pengelola ATM</th>
                                    <th>ATM ID</th>
                                    <th>Lokasi</th>
                                    <th>Kode Wilayah</th>
                                    <th>Wilayah</th>
                                    <th>Cabang</th>
                                    <th>Jenis ATM</th>
                                    <th>Service Level</th>
                                    <th>OOS</th>
                                    <th>Hardfault</th>
                                    <th>Vandalism</th>
                                    <th>Supplyout</th>
                                    <th>Cashout</th>
                                    <th>Comm</th>
                                    <th>Reversal Usage</th>
                                    <th>Reversal Amount</th>
                                    <th>Withd Usage</th>
                                    <th>Withd Amount</th>
                                    <th>Deposit Usage</th>
                                    <th>Deposit Amount</th>
                                    <th>Transfer Usage</th>
                                    <th>Transfer Amount</th>
                                    <th>Payment Usage</th>
                                    <th>Payment Amount</th>
                                    <th>Inquiry Usage</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @if(isset($listData))
                            <tbody>
                                @if(count($listData) > 0)
                                    @foreach($listData as $list)
                                        <tr>
                                            <td>{{ $list->tanggal }}</td>
                                            <td>{{ $list->pengelola_atm }}</td>
                                            <td>{{ $list->atmid }}</td>
                                            <td>{{ $list->lokasi }}</td>
                                            <td>{{ $list->kode_wil }}</td>
                                            <td>{{ $list->wilayah }}</td>
                                            <td>{{ $list->cabang }}</td>
                                            <td>{{ $list->jenis_atm }}</td>
                                            <td>{{ round($list->service_level, 2) }}</td>
                                            <td>{{ round($list->oos, 2) }}</td>
                                            <td>{{ round($list->hardfault, 2) }}</td>
                                            <td>{{ $list->vandalism }}</td>
                                            <td>{{ round($list->supplyout, 2) }}</td>
                                            <td>{{ round($list->cashout, 2) }}</td>
                                            <td>{{ round($list->comm, 2) }}</td>
                                            <td>{{ $list->reversal_usage }}</td>
                                            <td>{{ $list->reversal_amount }}</td>
                                            <td>{{ $list->withd_usage }}</td>
                                            <td>{{ $list->withd_amount }}</td>
                                            <td>{{ $list->deposit_usage }}</td>
                                            <td>{{ $list->deposit_amount }}</td>
                                            <td>{{ $list->transfer_usage }}</td>
                                            <td>{{ $list->transfer_amount }}</td>
                                            <td>{{ $list->payment_usage }}</td>
                                            <td>{{ $list->payment_amount }}</td>
                                            <td>{{ $list->inquiry_usage }}</td>
                                            <td>{{ $list->total }}</td>
                                            <td class='text-center'>
                                                <a href='<?= route('formUpdateAtmCrm', ['id' => $list->id]) ?>' class='btn btn-outline-success' data-toggle='tooltip' data-placement='top' title='' data-original-title='Form Update'>
                                                    <i class='fa fa-edit'></i>
                                                </a> | 
                                                <a href='<?= route('prosesDeleteAtmCrm', ['id' => $list->id]) ?>' class='btn btn-outline-danger' data-toggle='tooltip' data-placement='top' title='' data-original-title='Delete'>
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