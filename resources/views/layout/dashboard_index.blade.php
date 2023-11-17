<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layout.header')
    </head>

    <body>
        <!-- Page Content-->
        <div class="page-content mt-4">
            <div class="container-fluid">
                @if(Request::segment(1) == 'executive')
                <div class="btn-group mb-4">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@yield('titleButton') <i class="mdi mdi-chevron-down"></i></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('executiveDashboard1') }}">Dashboard 1</a>
                        <a class="dropdown-item" href="{{ route('executiveDashboard6') }}">Usage ATM / CRM</a>
                        <a class="dropdown-item" href="{{ route('executiveDashboard2') }}">Dashboard 2</a>
                        <a class="dropdown-item" href="{{ route('executiveDashboard3') }}">Dashboard 3</a>
                        <a class="dropdown-item" href="{{ route('executiveDashboard4') }}">Rekonsiliasi</a>
                        <a class="dropdown-item" href="{{ route('executiveDashboard5') }}">Antar Bank</a>
                    </div>
                </div><!-- /btn-group -->
                @endif
                @yield('content')
            </div><!-- container -->

            <footer class="footer text-center text-sm-left">
                &copy; 2021 Divisi Digital Operation
            </footer><!--end footer-->
        </div>
        <!-- end page content -->
        @include('layout.js')

        <script>
            var colors = Highcharts.getOptions().colors;
            Highcharts.setOptions({
                lang: {
                    numericSymbols: [' Ribu', ' Juta', ' Milyar', ' Trilyun']
                }
            });
        </script>

        @include('layout.access')

        <script>
            $("#datepicker").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });
        </script>
    </body>
</html>
