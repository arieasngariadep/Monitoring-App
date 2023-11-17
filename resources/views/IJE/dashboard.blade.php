@extends('layout/index')
@section('titleTab', 'RKS')

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="card ico-card">
          <div class="card-body">
            <span class="badge badge-soft-success float-right">Active</span>
            <div class="media">
              <img src="{{ asset('assets') }}/images/bni-logo.webp" class="mr-3 thumb-md rounded-circle" alt="...">
              <div class="media-body align-self-center">
                <h5 class="mb-4 font-16">Komplain ATM & E-Channel dan EDC</h5>
                <p class="text-muted mb-4"></p>
                <a href="<?= route('getListKomplain') ?>" class="btn btn-sm btn-outline-primary d-sm-inline-block">Masuk Ke Aplikasi</a>         
              </div><!--end media body-->
            </div><!--end media-->
          </div><!--end card-body-->
        </div>
      </div> <!-- end card body -->
    </div> <!-- end card -->
  </div> <!-- end col -->

  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="card ico-card">
          <div class="card-body">
            <span class="badge badge-soft-success float-right">Active</span>
            <div class="media">
              <img src="{{ asset('assets') }}/images/bni-logo.webp" class="mr-3 thumb-md rounded-circle" alt="...">
              <div class="media-body align-self-center">
                <h5 class="mb-4 font-16">Pemasangan EDC</h5>
                <p class="text-muted mb-4"></p>
                <a href="<?= route('getListPemasanganEdc') ?>" class="btn btn-sm btn-outline-primary d-sm-inline-block">Masuk Ke Aplikasi</a>         
              </div><!--end media body-->
            </div><!--end media-->
          </div><!--end card-body-->
        </div>
      </div> <!-- end card body -->
    </div> <!-- end card -->
  </div> <!-- end col -->
</div> <!-- end row -->
@endsection('content')