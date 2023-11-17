@extends('layout.index')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="#">List Rekon Rji</a></li>
        <li class="breadcrumb-item active">Form Edit Rekon Rji</li>
    </ol>
@endsection('breadcrumbs')

@section('title', 'Form Edit Rekon Rji')
@section('titleTab', 'Form Edit Rekon Rji')

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
                <h4 class="mt-0 header-title">Form Edit Rekon Rji</h4>
                <form class="form-horizontal auth-form my-4" action="<?= route('prosesEditRekonRji') ?>" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="periode">Tanggal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal" value="{{ $data->tanggal }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jenis_rekon">Jenis Rekon Rji</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input type="text" id="jenis_rekon" name="jenis_rekon" class="form-control" placeholder="Jenis Rekon" value="{{ $data->jenis_rekon }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="item_trx">Item Transaksi</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input type="text" id="item_trx" name="item_trx" class="form-control" placeholder="Item Transaksi" value="{{$data->item_trx}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nominal">Nominal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input type="text" id="nominal" name="nominal" class="form-control" placeholder="Nominal" value="{{ $data->nominal }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="item_trx_match">Item Transaksi Match</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input type="text" id="item_trx_match" name="item_trx_match" class="form-control" placeholder="Item Transaksi Match" value="{{ $data->item_trx_match }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nominal_trx_match">Nominal Transaksi Match</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input type="text" id="nominal_trx_match" name="nominal_trx_match" class="form-control" placeholder="Nominal Transaksi Match" value="{{ $data->nominal_trx_match }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="item_trx_unmatch">Item Transaksi Unmatch</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input type="text" id="item_trx_unmatch" name="item_trx_unmatch" class="form-control" placeholder="Item Transaksi Unmatch" value="{{ $data->item_trx_unmatch }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nominal_trx_unmatch">Nominal Transaksi Unmatch</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                                    </div>
                                    <input type="text" id="nominal_trx_unmatch" name="nominal_trx_unmatch" class="form-control" placeholder="Nominal Transaksi Unmatch" value="{{ $data->nominal_trx_unmatch }}" required>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="id" name="id" class="form-control" value="{{ $data->id }}" hidden>
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

