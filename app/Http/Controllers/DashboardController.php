<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Alert;

class DashboardController extends Controller
{
    public function dashboardApp(Request $request)
    {
        $alert = $request->session()->get('alert');
        $passing = array(
            'alert' => Alert::alertDanger($alert)
        );
        return view('dashboardApp', $passing);
    }
}
