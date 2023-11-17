<?php
    $segment1 = Request::segment(1);
    $segment2 = Request::segment(2);
?>

@if($segment1 == "poa")
@include('index.PJE.Regular')
@endif

@if($segment1 == "rekon")
@include('index.RKDA.Regular')
@endif

@if($segment2 == "dashboard1")
@include('index.Executive.executiveDashboard1')
@endif

@if($segment2 == "UsageAtmCrm")
@include('index.Executive.executiveDashboard6')
@endif

@if($segment2 == "dashboard2")
@include('index.Executive.executiveDashboard2')
@endif

@if($segment2 == "dashboard3")
@include('index.Executive.executiveDashboard3')
@endif

@if($segment2 == "Rekonsiliasi")
@include('index.Executive.executiveDashboard4')
@endif

@if($segment2 == "AntarBank")
@include('index.Executive.executiveDashboard5')
@endif