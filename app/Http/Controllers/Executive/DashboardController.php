<?php

namespace App\Http\Controllers\Executive;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Alert;
use Carbon\Carbon;
use App\Models\PJE\AtmCrmModel;
use App\Models\PJE\OosModel;
use App\Models\PJE\AvailibilityEdcModel;
use App\Models\PJE\PaguKasModel;
use App\Models\IJE\KomplainModel;
use App\Models\RKS\DisputeResolutionModel;
use App\Models\IJE\PemasanganEdcModel;
use App\Models\PJE\AvailibilityAtmModel;
use App\Models\PJE\KasModel;
use App\Models\PJE\RekapPemasanganEdcModel;
use App\Models\RKDA\RekonsiliasiModel;
use App\Models\RKDA\AntarBankModel;

class DashboardController extends Controller
{
    public function executiveDashboard1(Request $request)
    {
        $alert = $request->session()->get('alert');
        $year = Carbon::now()->format('Y');
        $lastYear = $year - 1;

        $atm = AtmCrmModel::getPopulasi('ATM');
        $crm = AtmCrmModel::getPopulasi('CRM');
        $slMonthly2022 = AtmCrmModel::getUsageSL($year, false, 'ATM');
        $slMonthly2021 = AtmCrmModel::getUsageSL($lastYear, false, 'ATM');
        $slRegion2021 = AtmCrmModel::getUsageSL($lastYear, true);
        $slRegion2022 = AtmCrmModel::getUsageSL($year, true);
        $slAtm2021 = AtmCrmModel::getUsageSL($lastYear, true, 'ATM');
        $slAtm2022 = AtmCrmModel::getUsageSL($year, true, 'ATM');
        $slCrm2021 = AtmCrmModel::getUsageSL($lastYear, true, 'CRM');
        $slCrm2022 = AtmCrmModel::getUsageSL($year, true, 'CRM');
        
        $passing = array(
            'alert' => Alert::alertDanger($alert),
            'year' => $year ?? NULL,
            'lastYear' => $lastYear ?? NULL,

            'atm' => $atm ?? NULL,
            'crm' => $crm ?? NULL,
            'slAtm2021' => $slAtm2021 ?? NULL,
            'slAtm2022' => $slAtm2022 ?? NULL,
            'slCrm2021' => $slCrm2021 ?? NULL,
            'slCrm2022' => $slCrm2022 ?? NULL,
            'sl2021' => $slMonthly2021 ?? NULL,
            'sl2022' => $slMonthly2022 ?? NULL,
            'slRegion2021' => $slRegion2021 ?? NULL,
            'slRegion2022' => $slRegion2022 ?? NULL,
        );
        return view('Dashboard.Executive.executiveDashboard1', $passing);
    }

    public function executiveDashboard2(Request $request)
    {
        $alert = $request->session()->get('alert');
        $year = Carbon::now()->format('Y');
        $lastYear = $year - 1;
        $komplainAtmTy = KomplainModel::getDataKomplain('ATM', $year);
        $komplainAtmLy = KomplainModel::getDataKomplain('ATM', $lastYear);
        $komplainEdcTy = KomplainModel::getDataKomplain('EDC', $year);
        $komplainEdcLy = KomplainModel::getDataKomplain('EDC', $lastYear);
        $downtimeAtmTy = AvailibilityAtmModel::getDataAvailibilityAtm($year);
        $downtimeAtmLy = AvailibilityAtmModel::getDataAvailibilityAtm($lastYear);
        $edc = AvailibilityEdcModel::getAvailibilityEdc();

        $passing = array(
            'alert' => Alert::alertDanger($alert),
            'year' => $year ?? NULL,
            'lastYear' => $lastYear ?? NULL,

            'komplainAtmTy' => $komplainAtmTy ?? NULL,
            'komplainAtmLy' => $komplainAtmLy ?? NULL,
            'komplainEdcTy' => $komplainEdcTy ?? NULL,
            'komplainEdcLy' => $komplainEdcLy ?? NULL,
            'downtimeAtmTy' => $downtimeAtmTy ?? NULL,
            'downtimeAtmLy' => $downtimeAtmLy ?? NULL,
            'edc' => $edc ?? NULL,
        );
        return view('Dashboard.Executive.executiveDashboard2', $passing);
    }

    public function executiveDashboard3(Request $request)
    {
        $alert = $request->session()->get('alert');
        $year = Carbon::now()->format('Y');
        $lastYear = $year - 1;

        $kasTy = KasModel::getDataKas($year);
        $kasLy = KasModel::getDataKas($lastYear);
        $paguKasLastYear = PaguKasModel::getPaguKas($lastYear);
        $paguKasThisYear = PaguKasModel::getPaguKas($year);
        $disputeRThis = DisputeResolutionModel::getDataDisputeR($year);
        $disputeRLast = DisputeResolutionModel::getDataDisputeR($lastYear);
        $pemasanganTY = PemasanganEdcModel::getDataPemasanganEdc($year);
        $pemasanganLY = PemasanganEdcModel::getDataPemasanganEdc($lastYear);

        $passing = array(
            'alert' => Alert::alertDanger($alert),
            'year' => $year ?? NULL,
            'lastYear' => $lastYear ?? NULL,

            'kasTy' => $kasTy ?? NULL,
            'kasLy' => $kasLy ?? NULL,
            'paguKasThisYear' => $paguKasThisYear ?? NULL,
            'paguKasLastYear' => $paguKasLastYear ?? NULL,
            'disputeRThis' => $disputeRThis ?? NULL,
            'disputeRLast' => $disputeRLast ?? NULL,
            'pemasanganTY' => $pemasanganTY ?? NULL,
            'pemasanganLY' => $pemasanganLY ?? NULL,
        );
        return view('Dashboard.Executive.executiveDashboard3', $passing);
    }

    public function executiveDashboard4(Request $request)
    {
        $alert = $request->session()->get('alert');
        $year = Carbon::now()->format('Y');
        $lastYear = $year - 1;

        $rpedc = RekapPemasanganEdcModel::getDataRekapPemasanganEdc();
        $rekon = RekonsiliasiModel::getDataRekon($year);

        $passing = array(
            'alert' => Alert::alertDanger($alert),
            'year' => $year ?? NULL,
            'lastYear' => $lastYear ?? NULL,

            'rpedc' => $rpedc ?? NULL,
            'rekon' => $rekon ?? NULL,
        );
        return view('Dashboard.Executive.executiveDashboard4', $passing);
    }

    public function executiveDashboard5(Request $request)
    {
        $alert = $request->session()->get('alert');
        $year = Carbon::now()->format('Y');
        $lastYear = $year - 1;

        $WdVsTf = AntarBankModel::getWdVsTf();
        $KwjVsHak = AntarBankModel::getKwjVsHak();

        $passing = array(
            'alert' => Alert::alertDanger($alert),
            'year' => $year ?? NULL,
            'lastYear' => $lastYear ?? NULL,

            'WdVsTf' => $WdVsTf ?? NULL,
            'KwjVsHak' => $KwjVsHak ?? NULL,
        );
        return view('Dashboard.Executive.executiveDashboard5', $passing);
    }

    public function executiveDashboard6(Request $request)
    {
        $alert = $request->session()->get('alert');
        $year = Carbon::now()->format('Y');
        $lastYear = $year - 1;

        $usageAtm = AtmCrmModel::getUsage('ATM');
        $usageCrm = AtmCrmModel::getUsage('CRM');
        $usageAtmDaily = AtmCrmModel::getUsageDaily('ATM');
        $usageCrmDaily = AtmCrmModel::getUsageDaily('CRM');

        $passing = array(
            'alert' => Alert::alertDanger($alert),
            'year' => $year ?? NULL,
            'lastYear' => $lastYear ?? NULL,

            'usageAtm' => $usageAtm ?? NULL,
            'usageCrm' => $usageCrm ?? NULL,
            'usageAtmDaily' => $usageAtmDaily ?? NULL,
            'usageCrmDaily' => $usageCrmDaily ?? NULL,
        );
        return view('Dashboard.Executive.executiveDashboard6', $passing);
    }
}
