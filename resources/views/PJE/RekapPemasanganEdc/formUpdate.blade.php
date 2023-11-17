@extends('layout.index')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="#">List Rekap Pemasangan EDC</a></li>
        <li class="breadcrumb-item active">Form Update Rekap Pemasangan EDC</li>
    </ol>
@endsection('breadcrumbs')

@section('title', 'Form Update Rekap Pemasangan EDC')
@section('titleTab', 'Form Update Rekap Pemasangan EDC')

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
                <h4 class="mt-0 header-title">Form Update Rekap Pemasangan EDC</h4>
                <form class="form-horizontal auth-form my-4" action="<?= route('prosesUpdatePaguKas') ?>" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="bulan">Wilayah</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <select name="wilayah" id="wilayah" class="form-control">
                                        <option value="">Please Select Option</option>
                                        <?php
                                            foreach($listWilayah as $w)
                                            {
                                                if($w->wilayah == $detail->wilayah)
                                                {
                                                    $sel = 'selected';
                                                }else{
                                                    $sel = '';
                                                }
                                                echo "<option value='$w->wilayah' $sel>$w->wilayah</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="new_merchant">New Merchant</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="new_merchant" name="new_merchant" class="form-control" placeholder="New Merchant" value="{{ $detail->pengambilan }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="edc_terpasang">EDC Terpasang</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="edc_terpasang" name="edc_terpasang" class="form-control" placeholder="EDC Terpasang" value="{{ number_format($detail->edc_terpasang, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="persentase_edc_terpasang">Persentase EDC Terpasang</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                    </div>
                                    <input onkeyup="this.value=this.value.replace(/,/g, '.');" type="text" id="persentase_edc_terpasang" name="persentase_edc_terpasang" class="form-control" placeholder="Persentase EDC Terpasang" value="{{ round($detail->persentase_edc_terpasang, 2) }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="belum_pasang_sudah_spk">Belum Pasang (Sudah SPK)</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="belum_pasang_sudah_spk" name="belum_pasang_sudah_spk" class="form-control" placeholder="Belum Pasang (Sudah SPK)" value="{{ number_format($detail->belum_pasang_sudah_spk, 0, '', '.') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="belum_pasang_belum_spk">Belum Pasang (Belum SPK)</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="belum_pasang_belum_spk" name="belum_pasang_belum_spk" class="form-control" placeholder="Belum Pasang (Belum SPK)" value="{{ number_format($detail->belum_pasang_belum_spk, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="persentase_belum_terpasang">Persentase Belum Terpasang</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                    </div>
                                    <input onkeyup="this.value=this.value.replace(/,/g, '.');" type="text" id="persentase_belum_terpasang" name="persentase_belum_terpasang" class="form-control" placeholder="Persentase Belum Terpasang" value="{{ round($detail->persentase_belum_terpasang, 2) }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="failed">Failed</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input onkeyup="this.value=addcommas(this.value);" type="text" id="failed" name="failed" class="form-control" placeholder="Failed" value="{{ number_format($detail->failed, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pending">Pending</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input type="text" id="pending" name="pending" class="form-control" placeholder="Pending" value="{{ number_format($detail->pending, 0, '', '.') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="persentase_gagal_pasang">Persentase Gagal Pasang</label>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                    </div>
                                    <input onkeyup="this.value=this.value.replace(/,/g, '.');" type="text" id="persentase_gagal_pasang" name="persentase_gagal_pasang" class="form-control" placeholder="Persentase Gagal Pasang" value="{{ round($detail->persentase_gagal_pasang, 2) }}" required>
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