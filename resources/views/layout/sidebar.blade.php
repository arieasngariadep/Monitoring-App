<?php
  $segment1 = Request::segment(1);
  $segment2 = Request::segment(2);
  $segment3 = Request::segment(3);
?>
<div class="left-sidenav">
  <div class="main-icon-menu">
    <nav class="nav">

      <a href="#appDashboard" class="nav-link <?= $segment1 == 'dashboardApp' ? 'active' : '' ?>" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="Dashboard App">
        <svg class="nav-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
          <g>
            <path d="M184,448h48c4.4,0,8-3.6,8-8V72c0-4.4-3.6-8-8-8h-48c-4.4,0-8,3.6-8,8v368C176,444.4,179.6,448,184,448z"/>
            <path class="svg-primary" d="M88,448H136c4.4,0,8-3.6,8-8V296c0-4.4-3.6-8-8-8H88c-4.4,0-8,3.6-8,8V440C80,444.4,83.6,448,88,448z"/>
            <path class="svg-primary" d="M280.1,448h47.8c4.5,0,8.1-3.6,8.1-8.1V232.1c0-4.5-3.6-8.1-8.1-8.1h-47.8c-4.5,0-8.1,3.6-8.1,8.1v207.8C272,444.4,275.6,448,280.1,448z"/>
            <path d="M368,136.1v303.8c0,4.5,3.6,8.1,8.1,8.1h47.8c4.5,0,8.1-3.6,8.1-8.1V136.1c0-4.5-3.6-8.1-8.1-8.1h-47.8C371.6,128,368,131.6,368,136.1z"/>
          </g>
        </svg>
      </a><!--end DashboardApp-->

      <a href="#GroupPJE" class="nav-link <?= $segment1 == 'pje' ? 'active' : '' ?>" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="Kelompok PJE">
        <svg class="nav-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path class="svg-primary" d="M410.5 279.2c-5-11.5-12.7-21.6-28.1-30.1-8.2-4.5-16.1-7.8-25.4-10 5.4-2.5 10-5.4 16.3-11 7.5-6.6 13.1-15.7 15.6-23.3 2.6-7.5 4.1-18 3.5-28.2-1.1-16.8-4.4-33.1-13.2-44.8-8.8-11.7-21.2-20.7-37.6-27-12.6-4.8-25.5-7.8-45.5-8.9V32h-40v64h-32V32h-41v64H96v48h27.9c8.7 0 14.6.8 17.6 2.3 3.1 1.5 5.3 3.5 6.5 6 1.3 2.5 1.9 8.4 1.9 17.5V343c0 9-.6 14.8-1.9 17.4-1.3 2.6-2 4.9-5.1 6.3-3.1 1.4-3.2 1.3-11.8 1.3h-26.4L96 416h87v64h41v-64h32v64h40v-64.4c26-1.3 44.5-4.7 59.4-10.3 19.3-7.2 34.1-17.7 44.7-31.5 10.6-13.8 14.9-34.9 15.8-51.2.7-14.5-.9-33.2-5.4-43.4zM224 150h32v74h-32v-74zm0 212v-90h32v90h-32zm72-208.1c6 2.5 9.9 7.5 13.8 12.7 4.3 5.7 6.5 13.3 6.5 21.4 0 7.8-2.9 14.5-7.5 20.5-3.8 4.9-6.8 8.3-12.8 11.1v-65.7zm28.8 186.7c-7.8 6.9-12.3 10.1-22.1 13.8-2 .8-4.7 1.4-6.7 1.9v-82.8c5 .8 7.6 1.8 11.3 3.4 7.8 3.3 15.2 6.9 19.8 13.2 4.6 6.3 8 15.6 8 24.7 0 10.9-2.8 19.2-10.3 25.8z"/>
        </svg>
      </a><!--end GroupPJE-->

      <a href="#GroupIJE" class="nav-link <?= $segment1 == 'ije' ? 'active' : '' ?>" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="Kelompok IJE">
        <svg class="nav-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path class="svg-primary" d="M256 32C132.288 32 32 132.288 32 256s100.288 224 224 224 224-100.288 224-224S379.712 32 256 32zm135.765 359.765C355.5 428.028 307.285 448 256 448s-99.5-19.972-135.765-56.235C83.972 355.5 64 307.285 64 256s19.972-99.5 56.235-135.765C156.5 83.972 204.715 64 256 64s99.5 19.972 135.765 56.235C428.028 156.5 448 204.715 448 256s-19.972 99.5-56.235 135.765z"/>
          <path d="M200.043 106.067c-40.631 15.171-73.434 46.382-90.717 85.933H256l-55.957-85.933zM412.797 288A160.723 160.723 0 0 0 416 256c0-36.624-12.314-70.367-33.016-97.334L311 288h101.797zM359.973 134.395C332.007 110.461 295.694 96 256 96c-7.966 0-15.794.591-23.448 1.715L310.852 224l49.121-89.605zM99.204 224A160.65 160.65 0 0 0 96 256c0 36.639 12.324 70.394 33.041 97.366L201 224H99.204zM311.959 405.932c40.631-15.171 73.433-46.382 90.715-85.932H256l55.959 85.932zM152.046 377.621C180.009 401.545 216.314 416 256 416c7.969 0 15.799-.592 23.456-1.716L201.164 288l-49.118 89.621z"/>
        </svg>
      </a><!--end GroupIJE-->

      <a href="#GroupRKS" class="nav-link <?= $segment1 == 'rks' ? 'active' : '' ?>" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="Kelompok RKS">
        <svg class="nav-svg" version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
          <g>
            <ellipse class="svg-primary" transform="matrix(0.9998 -1.842767e-02 1.842767e-02 0.9998 -7.7858 3.0205)" cx="160" cy="424" rx="24" ry="24"/>
            <ellipse class="svg-primary" transform="matrix(2.381651e-02 -0.9997 0.9997 2.381651e-02 -48.5107 798.282)" cx="384.5" cy="424" rx="24" ry="24"/>
            <path d="M463.8,132.2c-0.7-2.4-2.8-4-5.2-4.2L132.9,96.5c-2.8-0.3-6.2-2.1-7.5-4.7c-3.8-7.1-6.2-11.1-12.2-18.6 c-7.7-9.4-22.2-9.1-48.8-9.3c-9-0.1-16.3,5.2-16.3,14.1c0,8.7,6.9,14.1,15.6,14.1c8.7,0,21.3,0.5,26,1.9c4.7,1.4,8.5,9.1,9.9,15.8 c0,0.1,0,0.2,0.1,0.3c0.2,1.2,2,10.2,2,10.3l40,211.6c2.4,14.5,7.3,26.5,14.5,35.7c8.4,10.8,19.5,16.2,32.9,16.2h236.6 c7.6,0,14.1-5.8,14.4-13.4c0.4-8-6-14.6-14-14.6H189h-0.1c-2,0-4.9,0-8.3-2.8c-3.5-3-8.3-9.9-11.5-26l-4.3-23.7 c0-0.3,0.1-0.5,0.4-0.6l277.7-47c2.6-0.4,4.6-2.5,4.9-5.2l16-115.8C464,134,464,133.1,463.8,132.2z"/>
          </g>
        </svg>
      </a><!--end GroupRKS-->

      <a href="#GroupRKDA" class="nav-link <?= $segment1 == 'rkda' ? 'active' : '' ?>" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="Kelompok RKDA">
        <svg class="nav-svg" version="1.1" id="Layer_3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
          <g>
            <g>
              <path d="M276,68.1v219c0,3.7-2.5,6.8-6,7.7L81.1,343.4c-2.3,0.6-3.6,3.1-2.7,5.4C109.1,426,184.9,480.6,273.2,480
                  C387.8,479.3,480,386.5,480,272c0-112.1-88.6-203.5-199.8-207.8C277.9,64.1,276,65.9,276,68.1z"/>
            </g>
            <path class="svg-primary" d="M32,239.3c0,0,0.2,48.8,15.2,81.1c0.8,1.8,2.8,2.7,4.6,2.2l193.8-49.7c3.5-0.9,6.4-4.6,6.4-8.2V36c0-2.2-1.8-4-4-4
                C91,33.9,32,149,32,239.3z"/>
          </g>
        </svg>
      </a><!--end GroupRKDA-->

      <a href="#Users" class="nav-link <?= $segment1 == 'users' ? 'active' : '' ?>" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="Users">
        <svg class="nav-svg" version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
          <path d="M337.454 232c33.599 0 61.092-27.002 61.092-60 0-32.997-27.493-60-61.092-60s-61.09 27.003-61.09 60c0 32.998 27.491 60 61.09 60zm-162.908 0c33.599 0 61.09-27.002 61.09-60 0-32.997-27.491-60-61.09-60s-61.092 27.003-61.092 60c0 32.998 27.493 60 61.092 60zm0 44C126.688 276 32 298.998 32 346v54h288v-54c0-47.002-97.599-70-145.454-70zm162.908 11.003c-6.105 0-10.325 0-17.454.997 23.426 17.002 32 28 32 58v54h128v-54c0-47.002-94.688-58.997-142.546-58.997z"/>
        </svg>
      </a><!--end Users-->

    </nav><!--end nav-->
  </div><!--end main-icon-menu-->

  <div class="main-menu-inner">
    <div class="menu-body slimscroll">
      
      <div id="appDashboard" class="main-icon-menu-pane <?= $segment1 == 'dashboardApp' ? 'active' : '' ?>">
        <div class="title-box">
          <h6 class="menu-title">Dashboard App</h6>       
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link <?= $segment1 == 'dashboardApp' ? 'active' : '' ?>" href="<?= route('dashboardApp') ?>">
              <i class="dripicons-meter"></i>Dashboard
            </a>
          </li>
        </ul>
      </div><!-- end Analytic -->

      <div id="GroupPJE" class="main-icon-menu-pane <?= $segment1 == 'pje' ? 'active' : '' ?>">
        <div class="title-box">
          <h6 class="menu-title">PJE</h6>
        </div>

        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link <?= ($segment1 == 'pje' && $segment2 == 'dashboard' ? 'active' : '') ?>" href="<?= route('dashboardPJE') ?>">
              <i class="dripicons-meter"></i>Dashboard
            </a>
          </li>

          @if($segment2 == 'AtmCrm')
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'formUpload' ? 'active' : '') ?>" href="<?= route('formUploadAtmCrm') ?>">
              <i class="dripicons-cloud-upload"></i>Form Upload ATM CRM
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'AtmCrm' && ($segment3 == 'list' || $segment3 == 'formUpdate') ? 'active' : '') ?>" href="<?= route('getListAtmCrm') ?>">
              <i class="dripicons-checklist"></i>List ATM CRM
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'AtmCrm' && $segment3 == 'formUpdateBulk' ? 'active' : '') ?>" href="<?= route('formUpdateBulkAtmCrm') ?>">
              <i class="dripicons-cloud-upload"></i>Form Update Bulk ATM CRM
            </a>
          </li>
          @endif

          @if($segment2 == 'Oos')
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'formUpload' ? 'active' : '') ?>" href="<?= route('formUploadOos') ?>">
              <i class="dripicons-cloud-upload"></i>Form Upload OOS
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'Oos' && ($segment3 == 'list' || $segment3 == 'formUpdate') ? 'active' : '') ?>" href="<?= route('getListOos') ?>">
              <i class="dripicons-checklist"></i>List OOS
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'Oos' && $segment3 == 'formUpdateBulk' ? 'active' : '') ?>" href="<?= route('formUpdateBulkOos') ?>">
              <i class="dripicons-cloud-upload"></i>Form Update Bulk OOS
            </a>
          </li>
          @endif
          
          @if($segment2 == 'AvailibilityEdc')
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'formUpload' ? 'active' : '') ?>" href="<?= route('formUploadAvailibilityEdc') ?>">
              <i class="dripicons-cloud-upload"></i>Form Upload Availibility EDC
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'AvailibilityEdc' && ($segment3 == 'list' || $segment3 == 'formUpdate') ? 'active' : '') ?>" href="<?= route('getListAvailibilityEdc') ?>">
              <i class="dripicons-checklist"></i>List Availibility EDC
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'AvailibilityEdc' && $segment3 == 'formUpdateBulk' ? 'active' : '') ?>" href="<?= route('formUpdateBulkAvailibilityEdc') ?>">
              <i class="dripicons-cloud-upload"></i>Form Update Bulk Availibility EDC
            </a>
          </li>
          @endif
          
          @if($segment2 == 'AvailibilityAtm')
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'formUpload' ? 'active' : '') ?>" href="<?= route('formUploadAvailibilityAtm') ?>">
              <i class="dripicons-cloud-upload"></i>Form Upload Availibility ATM
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'AvailibilityAtm' && ($segment3 == 'list' || $segment3 == 'formUpdate') ? 'active' : '') ?>" href="<?= route('getListAvailibilityAtm') ?>">
              <i class="dripicons-checklist"></i>List Availibility ATM
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'AvailibilityAtm' && $segment3 == 'formUpdateBulk' ? 'active' : '') ?>" href="<?= route('formUpdateBulkAvailibilityAtm') ?>">
              <i class="dripicons-cloud-upload"></i>Form Update Bulk Availibility ATM
            </a>
          </li>
          @endif
          
          @if($segment2 == 'Kas')
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'formUpload' ? 'active' : '') ?>" href="<?= route('formUploadKas') ?>">
              <i class="dripicons-cloud-upload"></i>Form Upload Kas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'Kas' && ($segment3 == 'list' || $segment3 == 'formUpdate') ? 'active' : '') ?>" href="<?= route('getListKas') ?>">
              <i class="dripicons-checklist"></i>List Kas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'Kas' && $segment3 == 'formUpdateBulk' ? 'active' : '') ?>" href="<?= route('formUpdateBulkKas') ?>">
              <i class="dripicons-cloud-upload"></i>Form Update Bulk Kas
            </a>
          </li>
          @endif
          
          @if($segment2 == 'RekapPemasanganEdc')
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'formUpload' ? 'active' : '') ?>" href="<?= route('formUploadRekapPemasanganEdc') ?>">
              <i class="dripicons-cloud-upload"></i>Form Upload Rekap Pemasangan EDC
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'RekapPemasanganEdc' && ($segment3 == 'list' || $segment3 == 'formUpdate') ? 'active' : '') ?>" href="<?= route('getListRekapPemasanganEdc') ?>">
              <i class="dripicons-checklist"></i>List Rekap Pemasangan EDC
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'RekapPemasanganEdc' && $segment3 == 'formUpdateBulk' ? 'active' : '') ?>" href="<?= route('formUpdateBulkRekapPemasanganEdc') ?>">
              <i class="dripicons-cloud-upload"></i>Form Update Bulk Rekap Pemasangan EDC
            </a>
          </li>
          @endif

          @if($segment2 == 'PaguKas')
          <!-- Pagu Kas Sidebar -->
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'PaguKas' && $segment3 == 'formUpload' ? 'active' : '') ?>" href="<?= route('formUploadPaguKas') ?>">
              <i class="dripicons-cloud-upload"></i>Form Upload Pagu Kas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'PaguKas' && ($segment3 == 'list' || $segment3 == 'formUpdate') ? 'active' : '') ?>" href="<?= route('getListPaguKas') ?>">
              <i class="dripicons-checklist"></i>List Pagu Kas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'PaguKas' && $segment3 == 'formUpdateBulk' ? 'active' : '') ?>" href="<?= route('formUpdateBulkPaguKas') ?>">
              <i class="dripicons-cloud-upload"></i>Form Update Bulk Pagu Kas
            </a>
          </li>
          @endif

        </ul>
      </div><!-- end Dashboard -->
      
      <div id="GroupIJE" class="main-icon-menu-pane <?= $segment1 == 'ije' ? 'active' : '' ?>">
        <div class="title-box">
          <h6 class="menu-title">IJE</h6>
        </div>
        
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link <?= ($segment1 == 'ije' && $segment2 == 'dashboard' ? 'active' : '') ?>" href="{{ route('dashboardIJE') }}">
              <i class="dripicons-meter"></i>Dashboard
            </a>
          </li>

          @if($segment2 == 'Komplain')
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'formUpload' ? 'active' : '') ?>" href="<?= route('formUploadKomplain') ?>">
              <i class="dripicons-cloud-upload"></i>Form Upload Komplain
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'Komplain' && ($segment3 == 'list' || $segment3 == 'formUpdate') ? 'active' : '') ?>" href="<?= route('getListKomplain') ?>">
              <i class="dripicons-checklist"></i>List Komplain
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'Komplain' && $segment3 == 'formUpdateBulk' ? 'active' : '') ?>" href="<?= route('formUpdateBulkKomplain') ?>">
              <i class="dripicons-cloud-upload"></i>Form Update Bulk Komplain
            </a>
          </li>
          @endif

          @if($segment2 == 'PemasanganEdc')
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'formUpload' ? 'active' : '') ?>" href="<?= route('formUploadPemasanganEdc') ?>">
              <i class="dripicons-cloud-upload"></i>Form Upload Pemasangan EDC
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'PemasanganEdc' && ($segment3 == 'list' || $segment3 == 'formUpdate') ? 'active' : '') ?>" href="<?= route('getListPemasanganEdc') ?>">
              <i class="dripicons-checklist"></i>List Pemasangan EDC
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'PemasanganEdc' && $segment3 == 'formUpdateBulk' ? 'active' : '') ?>" href="<?= route('formUpdateBulkPemasanganEdc') ?>">
              <i class="dripicons-cloud-upload"></i>Form Update Bulk Pemasangan EDC
            </a>
          </li>
          @endif

        </ul>
      </div><!-- end Dashboard -->

      <div id="GroupPBY" class="main-icon-menu-pane <?= $segment1 == 'pby' ? 'active' : '' ?>">
        <div class="title-box">
          <h6 class="menu-title">PBY</h6>
        </div>
        
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link <?= ($segment1 == 'pby' && $segment2 == 'dashboard' ? 'active' : '') ?>" href="{{ route('dashboardPBY') }}">
              <i class="dripicons-meter"></i>Dashboard
            </a>
          </li>

          @if($segment2 == 'MonRekRTL')
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'MonRekRTL' && $segment3 == 'formUploadMonRek' ? 'active' : '') ?>" href="<?= route('formUploadMonRek') ?>">
              <i class="dripicons-cloud-upload"></i>Form Upload Monitoring Rekening RTL
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'MonRekRTL' && $segment3 == 'formUpdateMonRek' ? 'active' : '') ?>" href="<?= route('formUpdateMonRek') ?>">
              <i class="dripicons-cloud-upload"></i>Form Update Bulk Monitoring Rekening RTL
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'MonRekRTL' && $segment3 == 'getMorek' ? 'active' : '') ?>" href="<?= route('getMonRek') ?>">
              <i class="dripicons-checklist"></i>Monitoring Rekening RTL
            </a>
          </li>
          @endif
        </ul>
      </div><!-- end Dashboard -->
      
      <div id="GroupRKS" class="main-icon-menu-pane <?= $segment1 == 'rks' ? 'active' : '' ?>">
        <div class="title-box">
          <h6 class="menu-title">RKS</h6>
        </div>
        
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link <?= ($segment1 == 'rks' && $segment2 == 'dashboard' ? 'active' : '') ?>" href="{{ route('dashboardRKS') }}">
              <i class="dripicons-meter"></i>Dashboard
            </a>
          </li>

          @if($segment2 == 'DisputeResolution')
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'formUpload' ? 'active' : '') ?>" href="<?= route('formUploadDisputeResolution') ?>">
              <i class="dripicons-cloud-upload"></i>Form Upload Dispute Resolution
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'DisputeResolution' && ($segment3 == 'list' || $segment3 == 'formUpdate') ? 'active' : '') ?>" href="<?= route('getListDisputeResolution') ?>">
              <i class="dripicons-checklist"></i>List Dispute Resolution
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'DisputeResolution' && $segment3 == 'formUpdateBulk' ? 'active' : '') ?>" href="<?= route('formUpdateBulkDisputeResolution') ?>">
              <i class="dripicons-cloud-upload"></i>Form Update Bulk Dispute Resolution
            </a>
          </li>
          @endif

          @if($segment2 == 'RekonRji')
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'RekonRji' && ($segment3 == 'list' || $segment3 == 'formUpdate') ? 'active' : '') ?>" href="<?= route('getAllRekonRji') ?>">
              <i class="dripicons-checklist"></i>Rekon Rji
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'formUpload' ? 'active' : '') ?>" href="<?=route('uploadBulkRekonRji')?>">
              <i class="dripicons-cloud-upload"></i>Update Bulk
            </a>
          </li>
          @endif

        </ul>
      </div><!-- end Dashboard -->
      
      <div id="GroupRKDA" class="main-icon-menu-pane <?= $segment1 == 'rkda' ? 'active' : '' ?>">
        <div class="title-box">
          <h6 class="menu-title">RKDA</h6>
        </div>
        
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link <?= ($segment1 == 'pje' && $segment2 == 'dashboard' ? 'active' : '') ?>" href="{{ route('dashboardRKDA') }}">
              <i class="dripicons-meter"></i>Dashboard
            </a>
          </li>

          @if($segment2 == 'AntarBank')
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'formUpload' ? 'active' : '') ?>" href="<?= route('formUploadAntarBank') ?>">
              <i class="dripicons-cloud-upload"></i>Form Upload Antar Bank
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'AntarBank' && ($segment3 == 'list' || $segment3 == 'formUpdate') ? 'active' : '') ?>" href="<?= route('getListAntarBank') ?>">
              <i class="dripicons-checklist"></i>List Antar Bank
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= ($segment2 == 'AntarBank' && $segment3 == 'formUpdateBulk' ? 'active' : '') ?>" href="<?= route('formUpdateBulkAntarBank') ?>">
              <i class="dripicons-cloud-upload"></i>Form Update Bulk Antar Bank
            </a>
          </li>
          @endif

        </ul>
      </div><!-- end Dashboard -->
      
      <div id="Users" class="main-icon-menu-pane <?= $segment1 == 'users' ? 'active' : '' ?>">
        <div class="title-box">
          <h6 class="menu-title">Users</h6>
        </div>
        
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link <?= ($segment1 == 'users' ? 'active' : '') ?>" href="{{ route('getListUsers') }}">
              <i class="dripicons-meter"></i>List Users
            </a>
          </li>
        </ul>
      </div><!-- end Dashboard -->

    </div><!--end menu-body-->
  </div><!-- end main-menu-inner-->
</div>