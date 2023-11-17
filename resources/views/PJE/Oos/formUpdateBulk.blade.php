@extends('layout.index')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">PJE</li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Form Update Bulk OOS</li>
    </ol>
@endsection('breadcrumbs')

@section('title', 'Form Update Bulk OOS')
@section('titleTab', 'Form Update Bulk OOS')

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
                <h4 class="mt-0 header-title">Form Update Bulk OOS</h4>
                <p class="text-muted mb-3"><span style="color: red;">Silahkan Download Report Terlebih Dahulu.</span></p>
                <form action="{{ route('prosesUpdateBulkOos') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="file_import" id="input-file-now" class="dropify" />
                    <div class="button-items mt-3 text-center">
                        <button type="submit" class="btn btn-blue btn-square waves-effect waves-light"><i class="dripicons-cloud-upload mr-2"></i>Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection('content')