<!--Segment 1 -->
@include('javascript.PJE.AtmCrm.UsageAtm')
@include('javascript.PJE.AtmCrm.UsageAtmDaily')
@include('javascript.PJE.AtmCrm.UsageCrm')
@include('javascript.PJE.AtmCrm.UsageCrmDaily')

<script>
    $(document).ready(function(){
        function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;
            if (--timer < 0) {
                timer = duration;
            }
        }, 1000);
    }
        var seconds = 120,
        display = $('#UsageAtmCrm');
        startTimer(seconds, display);
        setTimeout(function(){ window.location.href = '<?= route('executiveDashboard2') ?>' }, seconds*1000);
    });
</script>