@extends('layout.index')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="#">Monitoring Rekening RTL</a></li>
        <li class="breadcrumb-item active">Monitoring Rekening RTL</li>
    </ol>
@endsection('breadcrumbs')

@section('title', 'Monitoring Rekening RTL')
@section('titleTab', 'Monitoring Rekening RTL')

@section('content')
<style>
    th, td {
        white-space: nowrap;
        overflow: hidden;
    }
    .table-wrapper {
        overflow-x: scroll;
        width: 1100px;
        margin: 0 auto;
        table-layout: fixed;
    }
    .address {
        width: 20px !important;
    }
</style>

<div class="row">
    <div class="col-lg-12 col-xl-12">
        <?php if($alert): ?>
        <div class="card m-b-30">
            <div class="card-body">
                <?= $alert ?>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="<?= route('exportMonRek') ?>" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary" style="width: 180px; height: 38px;">
                        <i class="dripicons-cloud-download"></i>&nbsp;&nbsp;Download Report
                    </button>
                </form>
                <hr class="mt-4 mb-4">

                <div class="card-body row">
                    <div class="table col-md-12" style="margin-top: 25px">
                        <h1>Monitoring Rekening</h1>
                        <table class="table table-bordered table-striped table-md" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Cluster</th>
                                    <th>Normal</th>
                                    <th>Janggal</th>
                                    <th>Tidak Wajar</th>
                                    <th>Nihil</th>
                                    <th>Konstan</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($monRekRTL as $list)
                                        <tr>
                                            <td>{{ $list->cluster_rek }}</td>
                                            <td>{{ $list->normal }}</td>
                                            <td>{{ $list->janggal }}</td>
                                            <td>{{ $list->tidak_wajar }}</td>
                                            <td>{{ $list->nihil }}</td>
                                            <td>{{ $list->konstan }}</td>
                                            <td>{{ $list->normal + $list->konstan + $list->janggal +  $list->tidak_wajar + $list->nihil }}</td>
                                        </tr>
                                    @endforeach
                            </tbody>
                            
                        </table>
                    </div>  
                </div>
                <div class="col-md-12">
                    <label for="formChart">Chart Kategori :</label>
                    <select name="formChart" id="formChart">
                        <option value="cluster" selected>By Cluster</option>
                        <option value="nominal">By Nominal</option>
                    </select>
                    <div class="card" name="chartMonRek" id="chartMonRek">
                        <div class="card-body" style="width: 100%">
                            <div class="chart-demo" id="chartCategory" name="chartCategory">
                                <div id="clusterContent">
                                    <div id="chartMonRek1"></div>
                                </div>
                                
                                <div id="nominalContent" style="display: none">
                                    <div id="chartMonRekNominal"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-right">
                    <form action="<?=route('deleteMonRek')?>">
                        <button type="submit" class="btn btn-danger" style="width: 180px; height: 38px;">
                            <i class="dripicons-trash"></i>&nbsp;&nbsp;Clean Data
                        </button>
                    </form>
                </div>

                <hr class="mt-4 mb-4">

                <div class="card-body row">
                    <div class="table col-md-12" style="margin-top: 25px">
                        <h1>Data Rekening</h1>
                        <table class="table table-bordered table-striped table-md" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Rekening</th>
                                    <th>Nama Rekening</th>
                                    <th>Fungsi Rekening</th>
                                    <th>Cluster</th>
                                    <th>{{ $date->tanggal_1 }}</th>
                                    <th>{{ $date->tanggal_2 }}</th>
                                    <th>{{ $date->tanggal_3 }}</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1?>
                                    @foreach($listRek as $data)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $data->no_rek }}</td>
                                            <td>{{ $data->nama_rek }}</td>
                                            <td>{{ $data->fungsi_rek }}</td>
                                            <td>{{ $data->cluster_rek }}</td>
                                            <td>{{ $data->nominal_tanggal_1 }}</td>
                                            <td>{{ $data->nominal_tanggal_2 }}</td>
                                            <td>{{ $data->nominal_tanggal_3 }}</td>
                                            <td>{{ $data->ket_rek }}</td>
                                            <td>
                                                <a href='<?= route('editMonRek', ['id' => $data->id]) ?>' class='btn btn-outline-success' data-toggle='tooltip' data-placement='top' title='' data-original-title='Form Update'>
                                                    <i class='fa fa-edit'></i>
                                                </a>  

                                            </td>
                                        </tr>
                                        <?php $no++?>
                                    @endforeach
                            </tbody>
                            
                        </table>
                    </div>  
                </div>

            </div>
        </div>
    </div> <!-- end col -->

    <script>
    // Get references to the select element and the content divs
    var formChart = document.getElementById('formChart');
    var clusterContent = document.getElementById('clusterContent');
    var nominalContent = document.getElementById('nominalContent');

    // Add an event listener to handle the selection change
    formChart.addEventListener('change', function () {
        if (formChart.value === 'cluster') {
            clusterContent.style.display = 'block';  // Show cluster content
            nominalContent.style.display = 'none';   // Hide nominal content
        } else if (formChart.value === 'nominal') {
            clusterContent.style.display = 'none';    // Hide cluster content
            nominalContent.style.display = 'block';  // Show nominal content
        } else {
            clusterContent.style.display = 'none';    // Hide both contents
            nominalContent.style.display = 'none';
        }
    });
    </script>
   
</div> <!-- end row -->
@endsection('content')
