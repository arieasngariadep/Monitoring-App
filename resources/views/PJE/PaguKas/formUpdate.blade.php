@extends('layout.index')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="#">List Pagu Kas</a></li>
        <li class="breadcrumb-item active">Form Update Pagu Kas</li>
    </ol>
@endsection('breadcrumbs')

@section('title', 'Form Update Pagu Kas')
@section('titleTab', 'Form Update Pagu Kas')

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
                <h4 class="mt-0 header-title">Form Update Pagu Kas</h4>
                <form class="form-horizontal auth-form my-4" action="<?= route('prosesUpdatePaguKas') ?>" method="POST">
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
                                <label for="realisasi">Realisasi</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="realisasi" name="realisasi" class="form-control" placeholder="Realisasi" value="{{ number_format($detail->realisasi, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pagu_kas">Pagu Kas</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="pagu_kas" name="pagu_kas" class="form-control" placeholder="Pagu Kas" value="{{ number_format($detail->pagu_kas, 0, '', '.') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="persentase_bulan">Persentase per Bulan</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                    </div>
                                    <input onkeyup="this.value=this.value.replace(/,/g, '.');" type="text" id="persentase_bulan" name="persentase_bulan" class="form-control" placeholder="Persentase per Bulan" value="{{ round($detail->persentase_bulan, 2) }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="persentase_ytd">Persentase (YtD)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                    </div>
                                    <input onkeyup="this.value=this.value.replace(/,/g, '.');" type="text" id="persentase_ytd" name="persentase_ytd" class="form-control" placeholder="Persentase (YtD)" value="{{ round($detail->persentase_ytd, 2) }}" required>
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