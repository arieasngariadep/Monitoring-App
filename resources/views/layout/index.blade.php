<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layout.header')
    </head>

    <body>
        <!-- Top Bar Start -->
        @include('layout.topbar')
        <!-- Top Bar End -->

        <div class="page-wrapper">

            <!-- Left Sidenav -->
            <?php if(Session::get('kelompok_id') == 5) : ?>
            @include('layout.sidebar.pje')
            <?php else : ?>
            @include('layout.sidebar')
            <?php endif; ?>
            <!-- end left-sidenav-->

            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="float-right">
                                    @yield('breadcrumbs')
                                </div>
                                <h4 class="page-title">@yield('title')</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    @yield('content')
                </div><!-- container -->
                
                <footer class="footer text-center text-sm-left">
                    &copy; 2021 Divisi Digital Operation
                </footer><!--end footer-->
            </div>
            <!-- end page content -->

        </div>
        <!-- end page-wrapper -->

        
        @include('layout.js')
        @include('javascript.RKS.RekonRji.chartIssuer')
        @include('javascript.RKS.RekonRji.chartAcquiring')
        @include('javascript.RKS.RekonRji.chartPayment')
        @include('javascript.RKS.RekonRji.chartTotalRekonRji')
        @include('javascript.PBY.chartMonRek1')
        @include('javascript.PBY.chartMonRekNominal')
        <script>
            $('#bulan, #bulan1, #bulan2').datepicker({
                format: 'yyyy-mm',
                startView: 'months', 
                minViewMode: 'months',
                autoclose: true
            });
            
            function addcommas(x) {
                var retVal = x.toString().replace(/[^\d]/g,'');
                while(/(\d+)(\d{3})/.test(retVal)) {
                    retVal = retVal.replace(/(\d+)(\d{3})/,'$1'+'.'+'$2');
                }
                return retVal;
            }
        </script>
    </body>
</html>