<!--Segment 1 -->
@include('javascript.RKDA.AntarBank.TrxWdVsTrf')
@include('javascript.RKDA.AntarBank.AmountWdVsTrf')
@include('javascript.RKDA.AntarBank.TrxKwjVsHak')
@include('javascript.RKDA.AntarBank.AmountKwjVsHak')

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
        display = $('#ExecutiveDashboard5');
        startTimer(seconds, display);
        setTimeout(function(){ window.location.href = '<?= route('executiveDashboard1') ?>' }, seconds*1000);
    });
</script>