@extends('layout.dashboard_index')
@section('titleTab', 'Rekonsiliasi')
@section('titleButton', 'Antar Bank')

@section('content')
<div class="row" id="ExecutiveDashboard5">

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="TrxWdVsTrf"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="AmountWdVsTrf"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="TrxKwjVsHak"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="AmountKwjVsHak"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')
