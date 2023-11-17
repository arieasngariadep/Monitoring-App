<div class="left-sidenav">
    <div class="main-icon-menu">
      <nav class="nav">

        <a href="#appDashboard" class="nav-link <?= Request::segment(1) == 'dashboardApp' ? 'active' : '' ?>" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="Dashboard App">
            <svg class="nav-svg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
              <g>
                <path d="M184,448h48c4.4,0,8-3.6,8-8V72c0-4.4-3.6-8-8-8h-48c-4.4,0-8,3.6-8,8v368C176,444.4,179.6,448,184,448z"/>
                <path class="svg-primary" d="M88,448H136c4.4,0,8-3.6,8-8V296c0-4.4-3.6-8-8-8H88c-4.4,0-8,3.6-8,8V440C80,444.4,83.6,448,88,448z"/>
                <path class="svg-primary" d="M280.1,448h47.8c4.5,0,8.1-3.6,8.1-8.1V232.1c0-4.5-3.6-8.1-8.1-8.1h-47.8c-4.5,0-8.1,3.6-8.1,8.1v207.8C272,444.4,275.6,448,280.1,448z"/>
                <path d="M368,136.1v303.8c0,4.5,3.6,8.1,8.1,8.1h47.8c4.5,0,8.1-3.6,8.1-8.1V136.1c0-4.5-3.6-8.1-8.1-8.1h-47.8C371.6,128,368,131.6,368,136.1z"/>
              </g>
            </svg>
        </a><!--end MetricaAnalytic-->
    
        <a href="#GroupPJE" class="nav-link <?= Request::segment(1) == 'pje' ? 'active' : '' ?>" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="Kelompok PJE">
            <svg class="nav-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path class="svg-primary" d="M256 32C132.288 32 32 132.288 32 256s100.288 224 224 224 224-100.288 224-224S379.712 32 256 32zm135.765 359.765C355.5 428.028 307.285 448 256 448s-99.5-19.972-135.765-56.235C83.972 355.5 64 307.285 64 256s19.972-99.5 56.235-135.765C156.5 83.972 204.715 64 256 64s99.5 19.972 135.765 56.235C428.028 156.5 448 204.715 448 256s-19.972 99.5-56.235 135.765z"/>
              <path d="M200.043 106.067c-40.631 15.171-73.434 46.382-90.717 85.933H256l-55.957-85.933zM412.797 288A160.723 160.723 0 0 0 416 256c0-36.624-12.314-70.367-33.016-97.334L311 288h101.797zM359.973 134.395C332.007 110.461 295.694 96 256 96c-7.966 0-15.794.591-23.448 1.715L310.852 224l49.121-89.605zM99.204 224A160.65 160.65 0 0 0 96 256c0 36.639 12.324 70.394 33.041 97.366L201 224H99.204zM311.959 405.932c40.631-15.171 73.433-46.382 90.715-85.932H256l55.959 85.932zM152.046 377.621C180.009 401.545 216.314 416 256 416c7.969 0 15.799-.592 23.456-1.716L201.164 288l-49.118 89.621z"/>
            </svg>
        </a><!--end UploadFile-->
  
      </nav><!--end nav-->
    </div><!--end main-icon-menu-->
  
    <div class="main-menu-inner">
        <div class="menu-body slimscroll">

            <div id="appDashboard" class="main-icon-menu-pane <?= Request::segment(1) == 'dashboardApp' ? 'active' : '' ?>">
                <div class="title-box">
                    <h6 class="menu-title">Dashboard App</h6>       
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link <?= Request::segment(1) == 'dashboardApp' ? 'active' : '' ?>" href="<?= route('dashboardApp') ?>">
                            <i class="dripicons-meter"></i>Dashboard
                        </a>
                    </li>
                </ul>
            </div><!-- end Analytic -->
    
            <div id="GroupPJE" class="main-icon-menu-pane <?= Request::segment(1) == 'pje' ? 'active' : '' ?>">
                <div class="title-box">
                    <h6 class="menu-title">PJE</h6>
                </div>

                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link <?= (Request::segment(2) == 'dashboard' ? 'active' : '') ?>" href="<?= route('dashboardPJE') ?>">
                            <i class="dripicons-meter"></i>Dashboard
                        </a>
                    </li>

                    @if($segment2 == 'AtmCrm')
                    <li class="nav-item">
                        <a class="nav-link <?= (Request::segment(2) == 'formUpload' ? 'active' : '') ?>" href="<?= route('formUploadAtmCrm') ?>">
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
                        <a class="nav-link <?= (Request::segment(2) == 'formUpload' ? 'active' : '') ?>" href="<?= route('formUploadOos') ?>">
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
                        <a class="nav-link <?= (Request::segment(2) == 'formUpload' ? 'active' : '') ?>" href="<?= route('formUploadAvailibilityEdc') ?>">
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
                    
                    @if($segment2 == 'Komplain')
                    <li class="nav-item">
                        <a class="nav-link <?= (Request::segment(2) == 'formUpload' ? 'active' : '') ?>" href="<?= route('formUploadKomplain') ?>">
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
                    
                    @if($segment2 == 'DisputeResolution')
                    <li class="nav-item">
                        <a class="nav-link <?= (Request::segment(2) == 'formUpload' ? 'active' : '') ?>" href="<?= route('formUploadDisputeResolution') ?>">
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
                    
                    @if($segment2 == 'PemasanganEdc')
                    <li class="nav-item">
                        <a class="nav-link <?= (Request::segment(2) == 'formUpload' ? 'active' : '') ?>" href="<?= route('formUploadPemasanganEdc') ?>">
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
                    
                    @if($segment2 == 'AvailibilityAtm')
                    <li class="nav-item">
                        <a class="nav-link <?= (Request::segment(2) == 'formUpload' ? 'active' : '') ?>" href="<?= route('formUploadAvailibilityAtm') ?>">
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
                        <a class="nav-link <?= (Request::segment(2) == 'formUpload' ? 'active' : '') ?>" href="<?= route('formUploadKas') ?>">
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
                        <a class="nav-link <?= (Request::segment(2) == 'formUpload' ? 'active' : '') ?>" href="<?= route('formUploadRekapPemasanganEdc') ?>">
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

        </div><!--end menu-body-->
    </div><!-- end main-menu-inner-->
  </div>