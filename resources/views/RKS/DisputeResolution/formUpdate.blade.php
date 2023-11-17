@extends('layout.index')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="#">List Dispute Resolutions</a></li>
        <li class="breadcrumb-item active">Form Update Dispute Resolution</li>
    </ol>
@endsection('breadcrumbs')

@section('title', 'Form Update Dispute Resolution')
@section('titleTab', 'Form Update Dispute Resolution')

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
                <h4 class="mt-0 header-title">Form Update Dispute Resolution</h4>
                <form class="form-horizontal auth-form my-4" action="<?= route('prosesUpdateDisputeResolution') ?>" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="periode">Periode</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" id="periode" name="periode" class="form-control" placeholder="Periode" value="{{ $detail->monthYear }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="total_case">Total Case</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="total_case" name="total_case" class="form-control" placeholder="Total Case" value="{{ number_format($detail->total_case, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="win_case">Win Case</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="win_case" name="win_case" class="form-control" placeholder="Win Case" value="{{ number_format($detail->win_case, 0, '', '.') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="target">Target</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                    </div>
                                    <input onkeyup="this.value=this.value.replace(/,/g, '.');" type="text" id="target" name="target" class="form-control" placeholder="Target" value="{{ round($detail->target, 2) }}" required>
                                </div>
                            </div>
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