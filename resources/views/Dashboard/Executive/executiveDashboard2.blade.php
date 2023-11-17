@extends('layout.dashboard_index')
@section('titleTab', 'Pemantauan Operasional ATM')
@section('titleButton', 'Dashboard 2')

@section('content')
<div class="row" id="ExecutiveDashboard2">

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="KomplainAtm"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="KomplainEdc"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="AvailibilityAtm"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="AvailibilityEdc"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')
