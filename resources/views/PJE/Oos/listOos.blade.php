@extends('layout.index')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="#">OOS</a></li>
        <li class="breadcrumb-item active">List OOS</li>
    </ol>
@endsection('breadcrumbs')

@section('title', 'List OOS')
@section('titleTab', 'List OOS')

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
                <form action="<?= route('getListOos') ?>" method="GET" class="mb-4">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <input autocomplete="off" type="text" class="form-control" id="tanggal1" placeholder="Start Month" name="tanggal1" value="<?= $tanggal1 ?>" />
                        </div>
                        <div class="col-md-4"> 
                            <input autocomplete="off" type="text" class="form-control" id="tanggal2" placeholder="End Month" name="tanggal2" value="<?= $tanggal2 ?>" />
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary" style="width: 180px; height: 38px;"><i class="dripicons-search"></i>&nbsp;&nbsp;Cari</button>
                        </div>
                    </div>
                </form>

                @if($tanggal1 != NULL || $tanggal2 != NULL)
                <div class="row mt-4">
                    <div class="col-md-5 text-right">
                        <form action="{{ route('exportReportOos') }}" method="POST">
                            {{ csrf_field() }}
                            <input autocomplete="off" type="text" class="form-control" id="tanggal1" placeholder="Start Month" name="tanggal1" value="<?= $tanggal1 ?>" hidden />
                            <input autocomplete="off" type="text" class="form-control" id="tanggal2" placeholder="End Month" name="tanggal2" value="<?= $tanggal2 ?>" hidden />
                            <button type="submit" class="btn btn-primary" style="width: 180px; height: 38px;">
                                <i class="dripicons-cloud-download"></i>&nbsp;&nbsp;Download Report
                            </button>
                        </form>
                    </div>
                    <div class="col-md-2 text-center">
                        <form action="<?= route('prosesDeleteOosBulk') ?>" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="text" class="form-control" name="tanggal1" value="<?= $tanggal1 ?>" hidden />
                            <input type="text" class="form-control" name="tanggal2" value="<?= $tanggal2 ?>" hidden />
                            <div class="col-md-4 text-right">
                                <button type="submit" class="btn btn-danger" style="width: 180px; height: 38px;">
                                    <i class="dripicons-trash"></i>&nbsp;&nbsp;Delete Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif

                <hr class="mt-4 mb-4">

                <div class="card-body scrollme">
                    <div class="table-wrapper">
                        <table class="table table-bordered table-striped table-md" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>00:00</th>
                                    <th>02:00</th>
                                    <th>04:00</th>
                                    <th>05:00</th>
                                    <th>05:30</th>
                                    <th>06:00</th>
                                    <th>06:30</th>
                                    <th>07:00</th>
                                    <th>07:30</th>
                                    <th>08:00</th>
                                    <th>08:30</th>
                                    <th>09:00</th>
                                    <th>09:30</th>
                                    <th>10:00</th>
                                    <th>10:30</th>
                                    <th>11:00</th>
                                    <th>11:30</th>
                                    <th>12:00</th>
                                    <th>12:30</th>
                                    <th>13:00</th>
                                    <th>13:30</th>
                                    <th>14:00</th>
                                    <th>14:30</th>
                                    <th>15:00</th>
                                    <th>15:30</th>
                                    <th>16:00</th>
                                    <th>16:30</th>
                                    <th>17:00</th>
                                    <th>17:30</th>
                                    <th>18:00</th>
                                    <th>18:30</th>
                                    <th>19:00</th>
                                    <th>19:30</th>
                                    <th>20:00</th>
                                    <th>20:30</th>
                                    <th>21:00</th>
                                    <th>21:30</th>
                                    <th>22:00</th>
                                    <th>Average</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @if(isset($listData))
                            <tbody>
                                @if(count($listData) > 0)
                                    @foreach($listData as $list)
                                        <?php
                                            $date = $list->tanggal;
                                            $tanggal = array(
                                                '01' => 'Januari',
                                                '02' => 'Febuari',
                                                '03' => 'Maret',
                                                '04' => 'April',
                                                '05' => 'Mei',
                                                '06' => 'Juni',
                                                '07' => 'Juli',
                                                '08' => 'Agustus',
                                                '09' => 'September',
                                                '10' => 'Oktober',
                                                '11' => 'November',
                                                '12' => 'Desember'
                                            );
                                            $dateSplit = explode("-", $date);
                                            $tanggal = $tanggal[$dateSplit[1]]." ".$dateSplit[0];
                                        ?>
                                        <tr>
                                            <td>{{ $list->tanggal }}</td>
                                            <td>{{ $list->satu }}</td>
                                            <td>{{ $list->dua }}</td>
                                            <td>{{ $list->tiga }}</td>
                                            <td>{{ $list->empat }}</td>
                                            <td>{{ $list->lima }}</td>
                                            <td>{{ $list->enam }}</td>
                                            <td>{{ $list->tujuh }}</td>
                                            <td>{{ $list->delapan }}</td>
                                            <td>{{ $list->sembilan }}</td>
                                            <td>{{ $list->sepuluh }}</td>
                                            <td>{{ $list->sebelas }}</td>
                                            <td>{{ $list->duabelas }}</td>
                                            <td>{{ $list->tigabelas }}</td>
                                            <td>{{ $list->empatbelas }}</td>
                                            <td>{{ $list->limabelas }}</td>
                                            <td>{{ $list->enambelas }}</td>
                                            <td>{{ $list->tujuhbelas }}</td>
                                            <td>{{ $list->delapanbelas }}</td>
                                            <td>{{ $list->sembilanbelas }}</td>
                                            <td>{{ $list->duapuluh }}</td>
                                            <td>{{ $list->duapuluhsatu }}</td>
                                            <td>{{ $list->duapuluhdua }}</td>
                                            <td>{{ $list->duapuluhtiga }}</td>
                                            <td>{{ $list->duapuluhempat }}</td>
                                            <td>{{ $list->duapuluhlima }}</td>
                                            <td>{{ $list->duapuluhenam }}</td>
                                            <td>{{ $list->duapuluhtujuh }}</td>
                                            <td>{{ $list->duapuluhdelapan }}</td>
                                            <td>{{ $list->duapuluhsembilan }}</td>
                                            <td>{{ $list->tigapuluh }}</td>
                                            <td>{{ $list->tigapuluhsatu }}</td>
                                            <td>{{ $list->tigapuluhdua }}</td>
                                            <td>{{ $list->tigapuluhtiga }}</td>
                                            <td>{{ $list->tigapuluhempat }}</td>
                                            <td>{{ $list->tigapuluhlima }}</td>
                                            <td>{{ $list->tigapuluhenam }}</td>
                                            <td>{{ $list->tigapuluhtujuh }}</td>
                                            <td>{{ $list->tigapuluhdelapan }}</td>
                                            <td>{{ $list->avg }}</td>
                                            <td class='text-center'>
                                                <a href='<?= route('prosesDeleteOos', ['id' => $list->id]) ?>' class='btn btn-outline-danger' data-toggle='tooltip' data-placement='top' title='' data-original-title='Delete'>
                                                    <i class='fa fa-trash-alt'></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr><td colspan="41" class="text-center ">No Result Found</td></tr>
                                @endif
                            </tbody>
                            @endif
                        </table>

                        @if(isset($listData))
                        <div class="row">
                            <div class="col-md-5">
                                @if(count($listData) > 0)
                                <div class="pull-left">
                                    Showing {{ $listData->firstItem() }} to {{ $listData->lastItem() }} of {{ number_format($listData->total()) }} entries
                                </div>
                                @else
                                <div class="pull-left">
                                    Showing 0 to 0 of {{ $listData->total() }} entries
                                </div>
                                @endif
                            </div>
                            <div class="col-md-7">
                                <div class="pull-right">
                                    {{ $listData->links('layout.pagination') }}
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection('content')