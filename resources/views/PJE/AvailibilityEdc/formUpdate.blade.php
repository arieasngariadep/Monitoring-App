@extends('layout.index')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="#">List Availibility EDC</a></li>
        <li class="breadcrumb-item active">Form Update Availibility EDC</li>
    </ol>
@endsection('breadcrumbs')

@section('title', 'Form Update Availibility EDC')
@section('titleTab', 'Form Update Availibility EDC')

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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Form Update Availibility EDC</h4>
                <form class="form-horizontal auth-form my-4" action="<?= route('prosesUpdateAvailibilityEdc') ?>" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="bulan">Periode</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" id="bulan" name="bulan" class="form-control" placeholder="Periode" value="{{ $detail->monthYear }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="total_mid">Total MID</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="total_mid" name="total_mid" class="form-control" placeholder="Total MID" value="{{ number_format($detail->total_mid, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="total_tid">Total TID</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="total_tid" name="total_tid" class="form-control" placeholder="Total TID" value="{{ number_format($detail->total_tid, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tid_tidak_trx">Jumlah TID Tidak Trx Dalam 30 Hari</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="tid_tidak_trx" name="tid_tidak_trx" class="form-control" placeholder="Jumlah TID Tidak Trx Dalam 30 Hari" value="{{ round($detail->tid_tidak_trx, 2) }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tid_trx">Jumlah TID Trx Dalam 30 Hari</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="tid_trx" name="tid_trx" class="form-control" placeholder="Jumlah TID Trx Dalam 30 Hari" value="{{ round($detail->tid_trx, 2) }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="availability_bulan">Persentase Availibility per Bulan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                    </div>
                                    <input onkeyup="this.value=this.value.replace(/,/g, '.');" type="text" id="availability_bulan" name="availability_bulan" class="form-control" placeholder="Persentase Pengisian" value="{{ round($detail->availability_bulan, 2) }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="availability_ytd">Persentase Availibility (YtD)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                    </div>
                                    <input onkeyup="this.value=this.value.replace(/,/g, '.');" type="text" id="availability_ytd" name="availability_ytd" class="form-control" placeholder="Persentase Pengisian" value="{{ round($detail->availability_ytd, 2) }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="id" name="id" class="form-control" value="{{ $detail->id }}" hidden>
                                <button type="submit" class="btn btn-primary">
                                    <i class="far fa-paper-plane"></i>&nbsp;&nbsp;Submit
                                </button>
                            </div> <!--end form-grop-->
                        </div>
                    </div>
                </form><!--end form-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->
@endsection('content')