@extends('layout.success')
@section('titleTab', 'Sukses Login')

@section('content')
<style>
    section{ 
        background-image: url('{{ asset('assets/img/bg-sukses.jpg') }}');
        background-repeat: no-repeat;
        background-size: cover;
        height: 100%;
    }
    .iconSukses{
        font-size:50px;
        color: #1ecab8;
    }
    .textSukses{
        padding-top:20px;
        text-align:center;
    }
</style>

<section class="section">
    <div class="row vh-100 ">
        <div class="col-12 align-self-center">
            <div class="auth-page" style="margin:0 auto !important;">
                <div class="card auth-card shadow-lg" style="width: 500px;margin-left: auto;margin-right: auto;margin-top: 15%;">
                    <div class="card-body">
                        <div class="px-3">
                            <div class="textSukses">
                                <i class="far fa-check-circle iconSukses"></i>
                            </div>
                            <div class="text-center auth-logo-text mb-4">
                                <h4 class="mt-0 mb-3 mt-5">Sukses Login</h4>
                                <div id="countdown">Meneruskan...</div> 
                            </div> <!--end auth-logo-text-->
                        </div><!--end /div-->                                
                    </div><!--end card-body-->                            
                </div><!--end card-->
            </div><!--end auth-page-->
        </div><!--end col-->           
    </div><!--end row-->
</section>
@endsection('content')