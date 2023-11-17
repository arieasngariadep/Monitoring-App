@extends('layout.index')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="#">List Antar Bank</a></li>
        <li class="breadcrumb-item active">Form Update Antar Bank</li>
    </ol>
@endsection('breadcrumbs')

@section('title', 'Form Update Antar Bank')
@section('titleTab', 'Form Update Antar Bank')

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
                <h4 class="mt-0 header-title">Form Update Antar Bank</h4>
                <form class="form-horizontal auth-form my-4" action="<?= route('prosesUpdateAntarBank') ?>" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" id="tanggal" name="tanggal" class="form-control" placeholder="Periode" value="{{ $detail->tanggal }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="hak_trx_wd_link">HAK TRX WD LINK</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="hak_trx_wd_link" name="hak_trx_wd_link" class="form-control" placeholder="HAK TRX WD LINK" value="{{ number_format($detail->hak_trx_wd_link, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hak_trx_wd_mp">HAK TRX WD MP</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="hak_trx_wd_mp" name="hak_trx_wd_mp" class="form-control" placeholder="HAK TRX WD MP" value="{{ number_format($detail->hak_trx_wd_mp, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hak_trx_wd_prima">HAK TRX WD PRIMA</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="hak_trx_wd_prima" name="hak_trx_wd_prima" class="form-control" placeholder="HAK TRX WD PRIMA" value="{{ number_format($detail->hak_trx_wd_prima, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hak_trx_wd_bersama">HAK TRX WD BERSAMA</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="hak_trx_wd_bersama" name="hak_trx_wd_bersama" class="form-control" placeholder="HAK TRX WD BERSAMA" value="{{ number_format($detail->hak_trx_wd_bersama, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hak_trx_wd_alto">HAK TRX WD ALTO</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="hak_trx_wd_alto" name="hak_trx_wd_alto" class="form-control" placeholder="hAK TRX WD ALTO" value="{{ number_format($detail->hak_trx_wd_alto, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hak_trx_trf_link">HAK TRX TRF LINK</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="hak_trx_trf_link" name="hak_trx_trf_link" class="form-control" placeholder="HAK TRX TRF LINK" value="{{ number_format($detail->hak_trx_trf_link, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hak_trx_trf_mp">HAK TRX TRF MP</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="hak_trx_trf_mp" name="hak_trx_trf_mp" class="form-control" placeholder="HAK TRX TRF MP" value="{{ number_format($detail->hak_trx_trf_mp, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hak_trx_trf_prima">HAK TRX TRF PRIMA</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="hak_trx_trf_prima" name="hak_trx_trf_prima" class="form-control" placeholder="HAK TRX TRF PRIMA" value="{{ number_format($detail->hak_trx_trf_prima, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hak_trx_trf_bersama">HAK TRX TRF BERSAMA</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="hak_trx_trf_bersama" name="hak_trx_trf_bersama" class="form-control" placeholder="HAK TRX TRF BERSAMA" value="{{ number_format($detail->hak_trx_trf_bersama, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hak_trx_trf_alto">HAK TRX TRF ALTO</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="hak_trx_trf_alto" name="hak_trx_trf_alto" class="form-control" placeholder="HAK TRX TRF ALTO" value="{{ number_format($detail->hak_trx_trf_alto, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kwj_trx_wd_link">KEWAJIBAN TRX WD LINK</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="kwj_trx_wd_link" name="kwj_trx_wd_link" class="form-control" placeholder="KEWAJIBAN TRX WD LINK" value="{{ number_format($detail->kwj_trx_wd_link, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kwj_trx_wd_mp">KEWAJIBAN TRX WD MP</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="kwj_trx_wd_mp" name="kwj_trx_wd_mp" class="form-control" placeholder="KEWAJIBAN TRX WD MP" value="{{ number_format($detail->kwj_trx_wd_mp, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kwj_trx_wd_prima">KEWAJIBAN TRX WD PRIMA</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="kwj_trx_wd_prima" name="kwj_trx_wd_prima" class="form-control" placeholder="KEWAJIBAN TRX WD PRIMA" value="{{ number_format($detail->kwj_trx_wd_prima, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kwj_trx_wd_bersama">KEWAJIBAN TRX WD BERSAMA</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="kwj_trx_wd_bersama" name="kwj_trx_wd_bersama" class="form-control" placeholder="KEWAJIBAN TRX WD BERSAMA" value="{{ number_format($detail->kwj_trx_wd_bersama, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kwj_trx_wd_alto">KEWAJIBAN TRX WD ALTO</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="kwj_trx_wd_alto" name="kwj_trx_wd_alto" class="form-control" placeholder="KEWAJIBAN TRX WD ALTO" value="{{ number_format($detail->kwj_trx_wd_alto, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kwj_trx_wd_link">KEWAJIBAN TRX WD LINK</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="kwj_trx_wd_link" name="kwj_trx_wd_link" class="form-control" placeholder="KEWAJIBAN TRX WD LINK" value="{{ number_format($detail->kwj_trx_wd_link, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kwj_trx_wd_mp">KEWAJIBAN TRX WD MP</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="kwj_trx_wd_mp" name="kwj_trx_wd_mp" class="form-control" placeholder="KEWAJIBAN TRX WD MP" value="{{ number_format($detail->kwj_trx_wd_mp, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kwj_trx_wd_prima">KEWAJIBAN TRX WD PRIMA</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="kwj_trx_wd_prima" name="kwj_trx_wd_prima" class="form-control" placeholder="KEWAJIBAN TRX WD PRIMA" value="{{ number_format($detail->kwj_trx_wd_prima, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kwj_trx_wd_bersama">KEWAJIBAN TRX WD BERSAMA</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="kwj_trx_wd_bersama" name="kwj_trx_wd_bersama" class="form-control" placeholder="KEWAJIBAN TRX WD BERSAMA" value="{{ number_format($detail->kwj_trx_wd_bersama, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kwj_trx_wd_alto">KEWAJIBAN TRX WD ALTO</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="kwj_trx_wd_alto" name="kwj_trx_wd_alto" class="form-control" placeholder="KEWAJIBAN TRX WD ALTO" value="{{ number_format($detail->kwj_trx_wd_alto, 0, '', '.') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="hak_amount_wd_link">HAK AMOUNT WD LINK</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="hak_amount_wd_link" name="hak_amount_wd_link" class="form-control" placeholder="HAK AMOUNT WD LINK" value="{{ number_format($detail->hak_amount_wd_link, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hak_amount_wd_mp">HAK AMOUNT WD MP</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="hak_amount_wd_mp" name="hak_amount_wd_mp" class="form-control" placeholder="HAK AMOUNT WD MP" value="{{ number_format($detail->hak_amount_wd_mp, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hak_amount_wd_prima">HAK AMOUNT WD PRIMA</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="hak_amount_wd_prima" name="hak_amount_wd_prima" class="form-control" placeholder="HAK AMOUNT WD PRIMA" value="{{ number_format($detail->hak_amount_wd_prima, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hak_amount_wd_bersama">HAK AMOUNT WD BERSAMA</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="hak_amount_wd_bersama" name="hak_amount_wd_bersama" class="form-control" placeholder="HAK AMOUNT WD BERSAMA" value="{{ number_format($detail->hak_amount_wd_bersama, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hak_amount_wd_alto">HAK AMOUNT WD ALTO</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="hak_amount_wd_alto" name="hak_amount_wd_alto" class="form-control" placeholder="hAK AMOUNT WD ALTO" value="{{ number_format($detail->hak_amount_wd_alto, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hak_amount_trf_link">HAK AMOUNT TRF LINK</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="hak_amount_trf_link" name="hak_amount_trf_link" class="form-control" placeholder="HAK AMOUNT TRF LINK" value="{{ number_format($detail->hak_amount_trf_link, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hak_amount_trf_mp">HAK AMOUNT TRF MP</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="hak_amount_trf_mp" name="hak_amount_trf_mp" class="form-control" placeholder="HAK AMOUNT TRF MP" value="{{ number_format($detail->hak_amount_trf_mp, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hak_amount_trf_prima">HAK AMOUNT TRF PRIMA</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="hak_amount_trf_prima" name="hak_amount_trf_prima" class="form-control" placeholder="HAK AMOUNT TRF PRIMA" value="{{ number_format($detail->hak_amount_trf_prima, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hak_amount_trf_bersama">HAK AMOUNT TRF BERSAMA</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="hak_amount_trf_bersama" name="hak_amount_trf_bersama" class="form-control" placeholder="HAK AMOUNT TRF BERSAMA" value="{{ number_format($detail->hak_amount_trf_bersama, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hak_amount_trf_alto">HAK AMOUNT TRF ALTO</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="hak_amount_trf_alto" name="hak_amount_trf_alto" class="form-control" placeholder="HAK AMOUNT TRF ALTO" value="{{ number_format($detail->hak_amount_trf_alto, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kwj_amount_wd_link">KEWAJIBAN AMOUNT WD LINK</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="kwj_amount_wd_link" name="kwj_amount_wd_link" class="form-control" placeholder="KEWAJIBAN AMOUNT WD LINK" value="{{ number_format($detail->kwj_amount_wd_link, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kwj_amount_wd_mp">KEWAJIBAN AMOUNT WD MP</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="kwj_amount_wd_mp" name="kwj_amount_wd_mp" class="form-control" placeholder="KEWAJIBAN AMOUNT WD MP" value="{{ number_format($detail->kwj_amount_wd_mp, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kwj_amount_wd_prima">KEWAJIBAN AMOUNT WD PRIMA</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="kwj_amount_wd_prima" name="kwj_amount_wd_prima" class="form-control" placeholder="KEWAJIBAN AMOUNT WD PRIMA" value="{{ number_format($detail->kwj_amount_wd_prima, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kwj_amount_wd_bersama">KEWAJIBAN AMOUNT WD BERSAMA</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="kwj_amount_wd_bersama" name="kwj_amount_wd_bersama" class="form-control" placeholder="KEWAJIBAN AMOUNT WD BERSAMA" value="{{ number_format($detail->kwj_amount_wd_bersama, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kwj_amount_wd_alto">KEWAJIBAN AMOUNT WD ALTO</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="kwj_amount_wd_alto" name="kwj_amount_wd_alto" class="form-control" placeholder="KEWAJIBAN AMOUNT WD ALTO" value="{{ number_format($detail->kwj_amount_wd_alto, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kwj_amount_wd_link">KEWAJIBAN AMOUNT WD LINK</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="kwj_amount_wd_link" name="kwj_amount_wd_link" class="form-control" placeholder="KEWAJIBAN AMOUNT WD LINK" value="{{ number_format($detail->kwj_amount_wd_link, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kwj_amount_wd_mp">KEWAJIBAN AMOUNT WD MP</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="kwj_amount_wd_mp" name="kwj_amount_wd_mp" class="form-control" placeholder="KEWAJIBAN AMOUNT WD MP" value="{{ number_format($detail->kwj_amount_wd_mp, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kwj_amount_wd_prima">KEWAJIBAN AMOUNT WD PRIMA</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="kwj_amount_wd_prima" name="kwj_amount_wd_prima" class="form-control" placeholder="KEWAJIBAN AMOUNT WD PRIMA" value="{{ number_format($detail->kwj_amount_wd_prima, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kwj_amount_wd_bersama">KEWAJIBAN AMOUNT WD BERSAMA</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="kwj_amount_wd_bersama" name="kwj_amount_wd_bersama" class="form-control" placeholder="KEWAJIBAN AMOUNT WD BERSAMA" value="{{ number_format($detail->kwj_amount_wd_bersama, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kwj_amount_wd_alto">KEWAJIBAN AMOUNT WD ALTO</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="kwj_amount_wd_alto" name="kwj_amount_wd_alto" class="form-control" placeholder="KEWAJIBAN AMOUNT WD ALTO" value="{{ number_format($detail->kwj_amount_wd_alto, 0, '', '.') }}" required>
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