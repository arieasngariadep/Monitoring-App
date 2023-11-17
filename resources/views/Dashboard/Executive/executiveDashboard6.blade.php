@extends('layout.dashboard_index')
@section('titleTab', 'Pemantauan Operasional ATM')
@section('titleButton', 'Usage ATM / CRM')

@section('content')
<div class="row" id="UsageAtmCrm">

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="UsageAtmDaily"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="UsageAtm"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="UsageCrmDaily"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="UsageCrm"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')
