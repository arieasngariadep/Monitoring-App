@extends('layout.index')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">PBY</li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Form Upload Monitoring Rekening RTL</li>
    </ol>
@endsection('breadcrumbs')

@section('title', 'Form Upload MonRek RTL')
@section('titleTab', 'Form Upload MonRek RTL')

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
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Form Upload Monitoring Rekening RTL</h4>
                <p class="text-muted mb-3"><span style="color: red;">Format file upload .xlsx</span></p>
                <form action="<?=route('prosesImportMonRek1')?>" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="button-items mb-2">
                        <a type="button" class="btn btn-dark btn-square btn-outline-dashed waves-effect waves-light" href="../../Excel/PBY/Upload Data MonRekRTL.xlsx"><i class="dripicons-cloud-download mr-2"></i>Download Format</a>
                    </div>
                    <label for="">Monitoring Rekening RTL</label>
                    <input type="file" name="file_import" id="input-file-now" />
                    <div class="button-items mt-3">
                        <button type="submit" class="btn btn-blue btn-square waves-effect waves-light"><i class="dripicons-cloud-upload mr-2"></i>Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection('content')