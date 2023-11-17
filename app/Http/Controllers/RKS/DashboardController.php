<?php

namespace App\Http\Controllers\RKS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Alert;

class DashboardController extends Controller
{
    public function dashboardRKS(Request $request)
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
        return view('RKS.dashboard', $passing);
    }
}
