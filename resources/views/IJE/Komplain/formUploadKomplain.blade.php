@extends('layout.index')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">IJE</li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Form Upload Komplain</li>
    </ol>
@endsection('breadcrumbs')

@section('title', 'Form Upload Komplain')
@section('titleTab', 'Form Upload Komplain')

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
                <h4 class="mt-0 header-title">Form Upload Komplain</h4>
                <p class="text-muted mb-3"><span style="color: red;">Format file upload .xlsx</span></p>
                <form action="<?= route('prosesImportKomplain') ?>" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="button-items mb-2">
                        <a type="button" class="btn btn-dark btn-square btn-outline-dashed waves-effect waves-light" href="../../Excel/IJE/Upload Komplain.xlsx"><i class="dripicons-cloud-download mr-2"></i>Download Format</a>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_komplain" class="col-md-2 my-1 control-label ml-3">Jenis Komplain</label>
                        <div class="col-md-8">
                            <select name="jenis_komplain" id="jenis_komplain" class="form-control">
                                <option value="">Please Select Option</option>
                                <option value="ATM">ATM</option>
                                <option value="EDC">EDC</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="file" name="file_import" id="input-file-now" class="dropify" />
                    </div>
                    <div class="button-items mt-3 text-center">
                        <button type="submit" class="btn btn-blue btn-square waves-effect waves-light"><i class="dripicons-cloud-upload mr-2"></i>Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection('content')