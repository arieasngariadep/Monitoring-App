<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layout.header')
    </head>
    <body class="account-body accountbg">
        @yield('content')
        @include('layout.js')
        <script>
            $(document).ready(function(){
                function startTimer(duration, display) {
                var timer = duration, minutes, seconds;
                setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);
                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;
                    display.text("Meneruskan..." + seconds);
                    if (--timer < 0) {
                        timer = duration;
                    }
                }, 1000);
            }
                var seconds = 3, 
                    display = $('#countdown');
                startTimer(seconds, display);
                setTimeout(function(){ window.location.href = '<?= route('dashboardApp') ?>' }, seconds*1000);
            });
        </script>
    </body>
</html>
