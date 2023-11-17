@extends('layout.dashboard_index')
@section('titleTab', 'Rekonsiliasi')
@section('titleButton', 'Rekonsiliasi')

@section('content')
<div class="row" id="ExecutiveDashboard4">

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="Switcher"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="Principal"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="E-Channel"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')
