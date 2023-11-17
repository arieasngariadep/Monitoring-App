@extends('layout.index')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="#">Monitoring Rekening RTL</a></li>
        <li class="breadcrumb-item active">Form Edit Monitoring Rekening RTL</li>
    </ol>
@endsection('breadcrumbs')

@section('title', 'Form Edit Monitoring Rekening RTL')
@section('titleTab', 'Form Edit Monitoring Rekening RTL')

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
                <h4 class="mt-0 header-title">Form Edit Monitoring Rekening RTL</h4>
                <form class="form-horizontal auth-form my-4" action="<?= route('prosesEditMonRek') ?>" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" id="id" name="id" value="{{ $monRek->id }}" hidden>
                                <label for="periode">Nomor Rekening</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" id="noRek" name="noRek" class="form-control" placeholder="Nomor Rekening" value="{{ $monRek->no_rek }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jenis_rekon">Nama Rekening</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input type="text" id="namaRek" name="namaRek" class="form-control" placeholder="Nama Rekening" value="{{ $monRek->nama_rek }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="item_trx">Fungsi Rekening</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input type="text" id="fungsiRek" name="fungsiRek" class="form-control" placeholder="Fungsi Rekening" value="{{$monRek->fungsi_rek}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nominal">Cluster</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input type="text" id="clusterRek" name="clusterRek" class="form-control" placeholder="Cluster" value="{{ $monRek->cluster_rek }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="item_trx_match">{{ $date->tanggal_1 }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input type="text" id="nominal1" name="nominal1" class="form-control" placeholder="Nominal 1" value="{{ $monRek->nominal_tanggal_1 }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nominal_trx_match">{{ $date->tanggal_2 }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input type="text" id="nominal2" name="nominal2" class="form-control" placeholder="Nominal 2" value="{{ $monRek->nominal_tanggal_2 }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="item_trx_unmatch">{{ $date->tanggal_3 }}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input type="text" id="nominal3" name="nominal3" class="form-control" placeholder="Nominal 3" value="{{ $monRek->nominal_tanggal_3 }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nominal_trx_unmatch">Keterangan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input type="text" id="ketRek" name="ketRek" class="form-control" placeholder="Keterangan" value="{{ $monRek->ket_rek }}">
                                </div>
                            </div>    
                        </div>
                    </div>
                    
                    <div class="col-md-2 text-center">
                        <div class="form-group">
                            <input type="submit"  class="btn btn-primary btn-user btn-block" value="Submit">
                        </div> <!--end form-grop-->
                    </div>
                </form><!--end form-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div><!--end row-->
 
@endsection('content')

