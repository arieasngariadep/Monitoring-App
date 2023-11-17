<?php

namespace App\Http\Controllers\RKDA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Alert;
use Carbon\Carbon;
use App\Models\RKDA\RekonsiliasiModel;
use App\Models\RKDA\AntarBankModel;

class DashboardController extends Controller
{
    public function dashboardRKDA(Request $request)
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
        return view('rkda.dashboard', $passing);
    }
    
    public function dashboardRekon(Request $request)
    {
        $alert = $request->session()->get('alert');
        $year = Carbon::now()->format('Y');
        $lastYear = $year - 1;
        
        $rekon = RekonsiliasiModel::getDataRekon($year);
        $WdVsTf = AntarBankModel::getWdVsTf();
        $KwjVsHak = AntarBankModel::getKwjVsHak();

        $passing = array(
            'alert' => Alert::alertDanger($alert),
            'year' => $year ?? NULL,
            'lastYear' => $lastYear ?? NULL,

            'rekon' => $rekon ?? NULL,
            'WdVsTf' => $WdVsTf ?? NULL,
            'KwjVsHak' => $KwjVsHak ?? NULL,
        );
        return view('Dashboard.RKDA.dashboardRegular', $passing);
    }
}
