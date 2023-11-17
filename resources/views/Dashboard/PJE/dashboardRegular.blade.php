@extends('layout.dashboard_index')
@section('titleTab', 'Pemantauan Operasional ATM')

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

<div class="row" id="poa">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="TotalAtmCrm"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
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
                    <div id="UsageAtmDaily"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="AmountTrxAtm"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="TotalAllAtm"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="UsageCrm"></div>
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
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="AmountTrxCrm"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="SlaAllPerMonth"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="RegularUsageSlRegion"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="SlaAtmRegion"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="SlaCrmRegion"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="OosMonthly"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="OosDaily"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="AvailibilityEdc"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="AvailibilityAtm"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="KomplainAtm"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="KomplainEdc"></div>
                </div>
            </div>
        </div>
    </div><div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="KasAtmCrm"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="PaguKas"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="DisputeResolution"></div>
                </div>
            </div>
        </div>
    </div><div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="PemasanganEdc"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="chart-demo">
                    <div id="RekapPemasanganEdc"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')
