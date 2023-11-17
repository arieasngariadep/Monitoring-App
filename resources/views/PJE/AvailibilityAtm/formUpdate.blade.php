@extends('layout.index')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="#">List Availibility ATM</a></li>
        <li class="breadcrumb-item active">Form Update Availibility ATM</li>
    </ol>
@endsection('breadcrumbs')

@section('title', 'Form Update Availibility ATM')
@section('titleTab', 'Form Update Availibility ATM')

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
                <h4 class="mt-0 header-title">Form Update Availibility ATM</h4>
                <form class="form-horizontal auth-form my-4" action="<?= route('prosesUpdatePaguKas') ?>" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="bulan">Bulan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" id="bulan" name="bulan" class="form-control" placeholder="Periode" value="{{ $detail->monthYear }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="rata_event_problem">Rata-rata Event Problem</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="rata_event_problem" name="rata_event_problem" class="form-control" placeholder="Rata-rata Event Problem" value="{{ number_format($detail->rata_event_problem, 0, '', '.') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="durasi_bulan">Durasi per Bulan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    </div>
                                    <input onkeyup="this.value=this.value.replace(/,/g, '.');" type="text" id="durasi_bulan" name="durasi_bulan" class="form-control" placeholder="Durasi per Bulan" value="{{ round($detail->durasi_bulan, 2) }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="durasi_ytd">Durasi (YtD)</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    </div>
                                    <input onkeyup="this.value=this.value.replace(/,/g, '.');" type="text" id="durasi_ytd" name="durasi_ytd" class="form-control" placeholder="Durasi (YtD)" value="{{ round($detail->durasi_ytd, 2) }}" required>
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