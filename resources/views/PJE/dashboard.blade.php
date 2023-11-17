@extends('layout/index')
@section('titleTab', 'PJE')

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
                <h5 class="mb-4 font-16">ATM CRM</h5>
                <p class="text-muted mb-4"></p>
                <a href="<?= route('getListAtmCrm') ?>" class="btn btn-sm btn-outline-primary d-sm-inline-block">Masuk Ke Aplikasi</a>         
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
                <h5 class="mb-4 font-16">Out Of Service (OOS)</h5>
                <p class="text-muted mb-4"></p>
                <a href="<?= route('getListOos') ?>" class="btn btn-sm btn-outline-primary d-sm-inline-block">Masuk Ke Aplikasi</a>         
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
                <h5 class="mb-4 font-16">Availibility EDC</h5>
                <p class="text-muted mb-4"></p>
                <a href="<?= route('getListAvailibilityEdc') ?>" class="btn btn-sm btn-outline-primary d-sm-inline-block">Masuk Ke Aplikasi</a>         
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
                <h5 class="mb-4 font-16">Availibility ATM</h5>
                <p class="text-muted mb-4"></p>
                <a href="<?= route('getListAvailibilityAtm') ?>" class="btn btn-sm btn-outline-primary d-sm-inline-block">Masuk Ke Aplikasi</a>         
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
                <h5 class="mb-4 font-16">Kas ATM/CRM</h5>
                <p class="text-muted mb-4"></p>
                <a href="<?= route('getListKas') ?>" class="btn btn-sm btn-outline-primary d-sm-inline-block">Masuk Ke Aplikasi</a>         
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
                <h5 class="mb-4 font-16">Rekap Pemasangan EDC</h5>
                <p class="text-muted mb-4"></p>
                <a href="<?= route('getListRekapPemasanganEdc') ?>" class="btn btn-sm btn-outline-primary d-sm-inline-block">Masuk Ke Aplikasi</a>         
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
                <h5 class="mb-4 font-16">Pagu Kas</h5>
                <p class="text-muted mb-4"></p>
                <a href="<?= route('getListPaguKas') ?>" class="btn btn-sm btn-outline-primary d-sm-inline-block">Masuk Ke Aplikasi</a>         
              </div><!--end media body-->
            </div><!--end media-->
          </div><!--end card-body-->
        </div>
      </div> <!-- end card body -->
    </div> <!-- end card -->
  </div> <!-- end col -->
</div> <!-- end row -->
@endsection('content')