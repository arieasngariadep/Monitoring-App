<?php
    if($detail->jenis_komplain == 'ATM')
    {
        $judul = 'ATM & E-Channel';
    }else{
        $judul = 'EDC';
    }
?>
@extends('layout.index')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="#">List Komplain {{ $judul }}</a></li>
        <li class="breadcrumb-item active">Form Update Komplain {{ $judul }}</li>
    </ol>
@endsection('breadcrumbs')

@section('title', 'Form Update Komplain '.$judul.'')
@section('titleTab', 'Form Update Komplain '.$judul.'')

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
                <h4 class="mt-0 header-title">Form Update Komplain {{ $judul }}</h4>
                <form class="form-horizontal auth-form my-4" action="<?= route('prosesUpdateKomplain') ?>" method="POST">
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
                                <label for="pengambilan">Pengambilan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="pengambilan" name="pengambilan" class="form-control" placeholder="Pengambilan" value="{{ number_format($detail->pengambilan, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pengisian">Pengisian</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="pengisian" name="pengisian" class="form-control" placeholder="Pengisian" value="{{ number_format($detail->pengisian, 0, '', '.') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="sisa">Sisa</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="sisa" name="sisa" class="form-control" placeholder="Sisa" value="{{ round($detail->sisa, 2) }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="persentase_pengisian">Persentase Pengisian</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                    </div>
                                    <input onkeyup="this.value=this.value.replace(/,/g, '.');" type="text" id="persentase_pengisian" name="persentase_pengisian" class="form-control" placeholder="Persentase Pengisian" value="{{ round($detail->persentase_pengisian, 2) }}" required>
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