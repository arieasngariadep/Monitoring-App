@extends('layout.dashboard_index')
@section('titleTab', 'Rekonsiliasi')

@section('content')
<style>
.grid-container {
  display: grid;
  grid-gap: 10px;
  /* background-color: #2196F3; */
  padding: 10px;
}

.grid-item {
  /* background-color: rgba(255, 255, 255, 0.8); */
  text-align: center;
  /* padding: 20px; */
  font-size: 30px;
}

.item1 {
  margin-top: 50px;
  width : 700px;
  grid-column: 1 ;
  grid-row: 1 / span 2;
}

.item2 {
width : 700px;
  grid-column: 2 / span 3;
  grid-row: 1;
}

.item3 {
  margin-top: 0;
  width : 700px;
  grid-column: 2 / span 3;
  grid-row: 2;
}
</style>

<div class="row" id="rekon">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="Switcher"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="Principal"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="E-Channel"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="TrxWdVsTrf"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="AmountWdVsTrf"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="TrxKwjVsHak"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
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
