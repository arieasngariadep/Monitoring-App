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
    
        <a href="#RKD-A" class="nav-link <?= Request::segment(1) == 'dashboard' ? 'active' : '' ?>" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="PBK Fitur">
            <svg class="nav-svg" version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
              <g>
                <ellipse class="svg-primary" transform="matrix(0.9998 -1.842767e-02 1.842767e-02 0.9998 -7.7858 3.0205)" cx="160" cy="424" rx="24" ry="24"/>
                <ellipse class="svg-primary" transform="matrix(2.381651e-02 -0.9997 0.9997 2.381651e-02 -48.5107 798.282)" cx="384.5" cy="424" rx="24" ry="24"/>
                <path d="M463.8,132.2c-0.7-2.4-2.8-4-5.2-4.2L132.9,96.5c-2.8-0.3-6.2-2.1-7.5-4.7c-3.8-7.1-6.2-11.1-12.2-18.6 c-7.7-9.4-22.2-9.1-48.8-9.3c-9-0.1-16.3,5.2-16.3,14.1c0,8.7,6.9,14.1,15.6,14.1c8.7,0,21.3,0.5,26,1.9c4.7,1.4,8.5,9.1,9.9,15.8 c0,0.1,0,0.2,0.1,0.3c0.2,1.2,2,10.2,2,10.3l40,211.6c2.4,14.5,7.3,26.5,14.5,35.7c8.4,10.8,19.5,16.2,32.9,16.2h236.6 c7.6,0,14.1-5.8,14.4-13.4c0.4-8-6-14.6-14-14.6H189h-0.1c-2,0-4.9,0-8.3-2.8c-3.5-3-8.3-9.9-11.5-26l-4.3-23.7 c0-0.3,0.1-0.5,0.4-0.6l277.7-47c2.6-0.4,4.6-2.5,4.9-5.2l16-115.8C464,134,464,133.1,463.8,132.2z"/>
              </g>
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
    
            <div id="GroupRKDA" class="main-icon-menu-pane <?= Request::segment(1) == 'pje' ? 'active' : '' ?>">
                <div class="title-box">
                  <h6 class="menu-title">PJE</h6>
                </div>
                
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link <?= (Request::segment(2) == 'dashboard' ? 'active' : '') ?>" href="<?= route('dashboardPJE') ?>">
                            <i class="dripicons-meter"></i>Dashboard
                        </a>
                    </li>
                    @if($segment2 == 'AntarBank')
                    <li class="nav-item">
                        <a class="nav-link <?= (Request::segment(2) == 'formUpload' ? 'active' : '') ?>" href="<?= route('formUploadAntarBank') ?>">
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
        </div><!--end menu-body-->
    </div><!-- end main-menu-inner-->
  </div>