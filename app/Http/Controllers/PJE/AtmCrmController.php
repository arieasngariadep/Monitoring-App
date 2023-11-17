<?php

namespace App\Http\Controllers\PJE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PJE\AtmCrmImport;
use App\Models\PJE\AtmCrmModel;
use App\Imports\PJE\AtmCrm\UpdateBulkAtmCrmImport;
use App\Exports\PJE\AtmCrm\AtmCrmExport;

class AtmCrmController extends Controller
{
    public function formUploadAtmCrm(Request $request)
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
        return view('PJE.AtmCrm.formUploadAtmCrm', $passing);
    }

    public function prosesImportAtmCrm(Request $request)
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

            Excel::import(new AtmCrmImport, public_path("/Import/PJE/".$filename));
            unlink(base_path('public/Import/PJE/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data ATM CRM Berhasil Di Upload');
        }
    }

    public function getListAtmCrm(Request $request)
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

        $tanggal1 = $request->tanggal1;
        $tanggal2 = $request->tanggal2;
        $jenis_atm = $request->jenis_atm;
        $listData = AtmCrmModel::getListAtmCrm($tanggal1, $tanggal2, $jenis_atm);

        $passing = array(
            'alert' => $showalert,
            'tanggal1' => $tanggal1,
            'tanggal2' => $tanggal2,
            'jenis_atm' => $jenis_atm,
            'listData' => $listData,
        );
        return view('PJE.AtmCrm.listAtmCrm', $passing);
    }

    public function formUpdateAtmCrm(Request $request)
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

        $detail = AtmCrmModel::getAtmCrmById($request->id);

        $passing = array(
            'alert' => $showalert,
            'detail' => $detail,
        );
        return view('PJE.AtmCrm.formUpdate', $passing);
    }

    public function prosesUpdateAtmCrm(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok"); //set you countary name from below timezone list
        $data = array(
            'periode' => $request->periode,
            'pengambilan' => $request->pengambilan,
            'pengisian' => $request->pengisian,
            'sisa' => $request->sisa,
            'persentase_pengisian' => $request->persentase_pengisian,
            'updated_at' => date("Y-m-d h:i:s"),
        );
        AtmCrmModel::where('id', $request->id)->update($data);

        return redirect('pje/AtmCrm/list')->with('alertSuccess', 'Data Berhasil Diupdate');
    }

    public function formUpdateBulkAtmCrm(Request $request)
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
        return view('PJE.AtmCrm.formUpdateBulk', $passing);
    }

    public function prosesUpdateBulkAtmCrm(Request $request)
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

            Excel::import(new UpdateBulkAtmCrmImport, public_path("/Import/PJE/".$filename));
            unlink(base_path('public/Import/PJE/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data AtmCrm Berhasil Di Update');
        }
    }

    public function exportReportAtmCrm(Request $request)
    {
        $tanggal1 = $request->tanggal1;
        $tanggal2 = $request->tanggal2;
        $jenis_atm = $request->jenis_atm;

        return Excel::download(new AtmCrmExport($tanggal1, $tanggal2, $jenis_atm), "Report AtmCrm.xlsx");
    }

    public function prosesDeleteAtmCrm(Request $request)
    {
        AtmCrmModel::where('id', $request->id)->delete();
        return redirect()->back()->with('alertSuccess', 'Data Berhasil Di Hapus');
    }

    public function prosesDeleteAtmCrmBulk(Request $request)
    {
        $tanggal1 = $request->tanggal1;
        $tanggal2 = $request->tanggal2;
        $jenis_atm = $request->jenis_atm;
        AtmCrmModel::prosesDeleteAtmCrmBulk($tanggal1, $tanggal2, $jenis_atm);

        return redirect()->back()->with('alertSuccess', 'Data Berhasil Dihapus');
    }
}
