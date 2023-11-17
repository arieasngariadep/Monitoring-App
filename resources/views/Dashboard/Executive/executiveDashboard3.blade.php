@extends('layout.dashboard_index')
@section('titleTab', 'Pemantauan Operasional ATM')
@section('titleButton', 'Dashboard 3')

@section('content')
<div class="row" id="ExecutiveDashboard3">

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="KasAtmCrm"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="PaguKas"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="DisputeResolution"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="PemasanganEdc"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')
