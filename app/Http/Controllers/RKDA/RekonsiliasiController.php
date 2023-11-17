<?php

namespace App\Http\Controllers\RKDA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RKDA\RekonsiliasiImport;

class RekonsiliasiController extends Controller
{
    public function formUploadRekonsiliasi(Request $request)
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
        return view('PJE.formUploadRekonsiliasi', $passing);
    }

    public function prosesImportRekonsiliasi(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok"); // Set your country name from below timezone list
        $userId = $request->session()->get('userId');
        $ekstensi_file = array($request->file('file_import')->getClientOriginalExtension());
        $extensions = array("xlsx", "xls", "csv");

        if(!in_array($ekstensi_file[0], $extensions)){
            return redirect()->back()->with('alert', 'Format file yang anda upload bukan Excel');
        }else{
            $file = $request->file('file_import');
            $filename = $file->getClientOriginalName();
            $file->move(\base_path() ."/public/Import/PJE/", $filename);

            Excel::import(new RekonsiliasiImport, public_path("/Import/PJE/".$filename));
            
            unlink(base_path('public/Import/PJE/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data Dispute Resolution Berhasil Di Upload');
        }
    }
}
