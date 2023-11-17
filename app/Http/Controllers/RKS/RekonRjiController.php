<?php

namespace App\Http\Controllers\RKS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RKS\RekonRji\RekonRjiImport;
use App\Exports\RKS\RekonRji\RekonRjiExport;
use App\Models\RKS\RekonRjiModel;

class RekonRjiController extends Controller{
    
    
    public function getAllRekonRji(Request $request){

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

        $data = RekonRjiModel::getAll();
        $chartIssuer = RekonRjiModel::getIssuer();
        $chartPayment = RekonRjiModel::getPayment();
        $chartAcquiring = RekonRjiModel::getAcquiring();
        $chartTotalRekonRji = RekonRjiModel::getTotalRekonRji();

        $rekonRji = array(
            'alert' => $showalert,
            'data' => $data ?? NULL,
            'chartIssuer' => $chartIssuer ?? NULL,
            'chartPayment' => $chartPayment ?? NULL,
            'chartAcquiring' => $chartAcquiring ?? NULL,
            'chartTotalRekonRji' => $chartTotalRekonRji ?? NULL,
        );
        return view('RKS.RekonRji.listRekonRji',$rekonRji);
    }

    public function editRekonRji(Request $request){
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

        $data = RekonRjiModel::getByIdRekonRji($request->id);

        $rekonRjiById = array(
            'alert' => $showalert,
            'data' => $data,
        );

        return view('RKS.RekonRji.formEditRekonRji',$rekonRjiById);

    }

    public function prosesEditRekonRji(Request $request){
        $data = array(
            'tanggal' => $request->tanggal,
            'jenis_rekon' => $request->jenis_rekon,
            'item_trx' => $request->item_trx,
            'nominal' => $request->nominal,
            'item_trx_match' => $request->item_trx_match,
            'nominal_trx_match' => $request->nominal_trx_match,
            'item_trx_unmatch' => $request->item_trx_unmatch,
            'nominal_trx_unmatch' => $request->nominal_trx_unmatch,
        );
        RekonRjiModel::where('id', $request->id)->update($data);
        return redirect('rks/RekonRji/listRekonRji')->with('alertSuccess', 'Data Berhasil Diupdate');
    }

    public function uploadBulkRekonRji(Request $request){
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
        return view('RKS.RekonRji.formUpdateBulk', $passing);
    }


    public function prosesUploadBulkRekonRji(Request $request){
        date_default_timezone_set("Asia/Bangkok"); // Set your country name from below timezone list
        $userId = $request->session()->get('userId');
        $ekstensi_file = array($request->file('file_import')->getClientOriginalExtension());
        $extensions = array("xlsx", "xls", "csv");

        if(!in_array($ekstensi_file[0], $extensions)){
            return redirect()->back()->with('alert', 'Format file yang anda upload bukan Excel');
        }else{
            $file = $request->file('file_import');
            $filename = $file->getClientOriginalName();
            $file->move(\base_path() ."/public/Import/RKS/", $filename);

            Excel::import(new RekonRjiImport, public_path("/Import/RKS/".$filename));
            unlink(base_path('public/Import/RKS/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data Rekon Rji Berhasil Di Update');
        }
    }

    public function exportReportRekonRji(Request $request){
        return Excel::download(new RekonRjiExport(), "Report Rekonsiliasi RJI.xlsx");
    }

}

?>