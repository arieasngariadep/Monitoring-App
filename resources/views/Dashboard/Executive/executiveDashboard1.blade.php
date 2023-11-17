@extends('layout.dashboard_index')
@section('titleTab', 'Pemantauan Operasional ATM')
@section('titleButton', 'Dashboard 1')

@section('content')
<div class="row" id="ExecutiveDashboard1">

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="TotalAtmCrm"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="SlaAllPerMonth"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="SlaAllPerRegion"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')
