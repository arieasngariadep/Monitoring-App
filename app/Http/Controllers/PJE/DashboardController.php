<?php

namespace App\Http\Controllers\PJE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Alert;
use Carbon\Carbon;
use App\Models\PJE\AtmCrmModel;
use App\Models\PJE\OosModel;
use App\Models\PJE\AvailibilityEdcModel;
use App\Models\PJE\PaguKasModel;
use App\Models\IJE\KomplainModel;
use App\Models\IJE\PemasanganEdcModel;
use App\Models\RKS\DisputeResolutionModel;
use App\Models\PJE\AvailibilityAtmModel;
use App\Models\PJE\KasModel;
use App\Models\PJE\RekapPemasanganEdcModel;

class DashboardController extends Controller
{
    public function dashboardPJE(Request $request)
    {
        $alert = $request->session()->get('alert');
        $alertSuccess = $request->session()->get('alertSuccess');
        $alertInfo = $request->session()->get('alertInfo');
        if($alertSuccess){
            $showalert = Alert::alertSuccess($alertSuccess);
        }else if($alertInfo){
            $showalert = Alert::alertinfo($alertInfo);
        }else{
            $showalert = Alert::alertDanger($alert);
        }

        $passing = array(
            'alert' => $showalert,
        );
        return view('PJE.dashboard', $passing);
    }
    
    public function dashboardPOA(Request $request)
    {
        $alert = $request->session()->get('alert');
        $year = Carbon::now()->format('Y');
        $lastYear = $year - 1;
        
        $atm = AtmCrmModel::getPopulasi('ATM');
        $crm = AtmCrmModel::getPopulasi('CRM');
        $totalPopulasi = AtmCrmModel::getTotalAtm();
        $usageAtm = AtmCrmModel::getUsage('ATM');
        $usageCrm = AtmCrmModel::getUsage('CRM');
        $usageAtmDaily = AtmCrmModel::getUsageDaily('ATM');
        $usageCrmDaily = AtmCrmModel::getUsageDaily('CRM');
        $amountTrxAtm = AtmCrmModel::getAmountTrx('ATM');
        $amountTrxCrm = AtmCrmModel::getAmountTrx('CRM');

        $slMonthly2022 = AtmCrmModel::getUsageSL($year, false, 'ATM');
        $slMonthly2021 = AtmCrmModel::getUsageSL($lastYear, false, 'ATM');
        $slRegion2021 = AtmCrmModel::getUsageSL($lastYear, true);
        $slRegion2022 = AtmCrmModel::getUsageSL($year, true);
        $slAtm2021 = AtmCrmModel::getUsageSL($lastYear, true, 'ATM');
        $slAtm2022 = AtmCrmModel::getUsageSL($year, true, 'ATM');
        $slCrm2021 = AtmCrmModel::getUsageSL($lastYear, true, 'CRM');
        $slCrm2022 = AtmCrmModel::getUsageSL($year, true, 'CRM');

        $oosThisYear = OosModel::getOosMonthly($year);
        $oosLastYear = OosModel::getOosMonthly($lastYear);
        $oosDaily = OosModel::getOosDaily();
        $komplainAtmTy = KomplainModel::getDataKomplain('ATM', $year);
        $komplainAtmLy = KomplainModel::getDataKomplain('ATM', $lastYear);
        $komplainEdcTy = KomplainModel::getDataKomplain('EDC', $year);
        $komplainEdcLy = KomplainModel::getDataKomplain('EDC', $lastYear);
        $downtimeAtmTy = AvailibilityAtmModel::getDataAvailibilityAtm($year);
        $downtimeAtmLy = AvailibilityAtmModel::getDataAvailibilityAtm($lastYear);
        $edc = AvailibilityEdcModel::getAvailibilityEdc();

        $kasTy = KasModel::getDataKas($year);
        $kasLy = KasModel::getDataKas($lastYear);
        $paguKasLastYear = PaguKasModel::getPaguKas($lastYear);
        $paguKasThisYear = PaguKasModel::getPaguKas($year);
        $disputeRThis = DisputeResolutionModel::getDataDisputeR($year);
        $disputeRLast = DisputeResolutionModel::getDataDisputeR($lastYear);

        $pemasanganTY = PemasanganEdcModel::getDataPemasanganEdc($year);
        $pemasanganLY = PemasanganEdcModel::getDataPemasanganEdc($lastYear);
        $rpedc = RekapPemasanganEdcModel::getDataRekapPemasanganEdc();

        $passing = array(
            'alert' => Alert::alertDanger($alert),
            'year' => $year ?? NULL,
            'lastYear' => $lastYear ?? NULL,

            'atm' => $atm ?? NULL,
            'crm' => $crm ?? NULL,
            'totalPopulasi' => $totalPopulasi ?? NULL,
            'usageAtm' => $usageAtm ?? NULL,
            'usageCrm' => $usageCrm ?? NULL,
            'usageAtmDaily' => $usageAtmDaily ?? NULL,
            'usageCrmDaily' => $usageCrmDaily ?? NULL,
            'amountTrxAtm' => $amountTrxAtm ?? NULL,
            'amountTrxCrm' => $amountTrxCrm ?? NULL,

            'slAtm2021' => $slAtm2021 ?? NULL,
            'slAtm2022' => $slAtm2022 ?? NULL,
            'slCrm2021' => $slCrm2021 ?? NULL,
            'slCrm2022' => $slCrm2022 ?? NULL,
            'sl2021' => $slMonthly2021 ?? NULL,
            'sl2022' => $slMonthly2022 ?? NULL,
            'slRegion2021' => $slRegion2021 ?? NULL,
            'slRegion2022' => $slRegion2022 ?? NULL,

            'oosThisYear' => $oosThisYear ?? NULL,
            'oosLastYear' => $oosLastYear ?? NULL,
            'oosDaily' => $oosDaily ?? NULL,
            'komplainAtmTy' => $komplainAtmTy ?? NULL,
            'komplainAtmLy' => $komplainAtmLy ?? NULL,
            'komplainEdcTy' => $komplainEdcTy ?? NULL,
            'komplainEdcLy' => $komplainEdcLy ?? NULL,
            'downtimeAtmTy' => $downtimeAtmTy ?? NULL,
            'downtimeAtmLy' => $downtimeAtmLy ?? NULL,
            'edc' => $edc ?? NULL,

            'kasTy' => $kasTy ?? NULL,
            'kasLy' => $kasLy ?? NULL,
            'paguKasThisYear' => $paguKasThisYear ?? NULL,
            'paguKasLastYear' => $paguKasLastYear ?? NULL,
            'disputeRThis' => $disputeRThis ?? NULL,
            'disputeRLast' => $disputeRLast ?? NULL,

            'pemasanganTY' => $pemasanganTY ?? NULL,
            'pemasanganLY' => $pemasanganLY ?? NULL,
            'rpedc' => $rpedc ?? NULL,
        );
        return view('Dashboard.PJE.dashboardRegular', $passing);
    }
}
