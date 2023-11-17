<?php

namespace App\Http\Controllers\PJE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PJE\PaguKas\PaguKasImport;
use App\Models\PJE\PaguKasModel;
use App\Imports\PJE\PaguKas\UpdateBulkPaguKasImport;
use App\Exports\PJE\PaguKas\PaguKasExport;

class PaguKasController extends Controller
{
    public function formUploadPaguKas(Request $request)
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
        return view('PJE.PaguKas.formUploadPaguKas', $passing);
    }

    public function prosesImportPaguKas(Request $request)
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

            Excel::import(new PaguKasImport, public_path("/Import/PJE/".$filename));
            unlink(base_path('public/Import/PJE/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data Pagu Kas Berhasil Di Upload');
        }
    }

    public function getListPaguKas(Request $request)
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

        $bulan1 = $request->bulan1;
        $bulan2 = $request->bulan2;
        $listData = PaguKasModel::getListPaguKas($bulan1, $bulan2);

        $passing = array(
            'alert' => $showalert,
            'bulan1' => $bulan1,
            'bulan2' => $bulan2,
            'listData' => $listData,
        );
        return view('PJE.PaguKas.listPaguKas', $passing);
    }

    public function formUpdatePaguKas(Request $request)
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

        $detail = PaguKasModel::getPaguKasById($request->id);

        $passing = array(
            'alert' => $showalert,
            'detail' => $detail,
        );
        return view('PJE.PaguKas.formUpdate', $passing);
    }

    public function prosesUpdatePaguKas(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok"); //set you countary name from below timezone list
        $data = array(
            'bulan' => $request->bulan.'-01',
            'realisasi' => $request->realisasi,
            'pagu_kas' => $request->pagu_kas,
            'persentase_bulan' => $request->persentase_bulann,
            'persentase_ytd' => $request->persentase_ytd,
            'updated_at' => date("Y-m-d h:i:s"),
        );
        PaguKasModel::where('id', $request->id)->update($data);

        return redirect('pje/PaguKas/list')->with('alertSuccess', 'Data Berhasil Diupdate');
    }

    public function formUpdateBulkPaguKas(Request $request)
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
        return view('PJE.PaguKas.formUpdateBulk', $passing);
    }

    public function prosesUpdateBulkPaguKas(Request $request)
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

            Excel::import(new UpdateBulkPaguKasImport, public_path("/Import/PJE/".$filename));
            unlink(base_path('public/Import/PJE/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data Pagu Kas Berhasil Di Update');
        }
    }

    public function exportReportPaguKas(Request $request)
    {
        $bulan1 = $request->bulan1;
        $bulan2 = $request->bulan2;

        return Excel::download(new PaguKasExport($bulan1, $bulan2), "Report Pagu Kas.xlsx");
    }

    public function prosesDeletePaguKas(Request $request)
    {
        PaguKasModel::where('id', $request->id)->delete();
        return redirect()->back()->with('alertSuccess', 'Data Berhasil Di Hapus');
    }

    public function prosesDeletePaguKasBulk(Request $request)
    {
        $bulan1 = $request->bulan1;
        $bulan2 = $request->bulan2;
        PaguKasModel::whereBetween(DB::raw('substring(bulan, 1, 7)'), [$bulan1, $bulan2])->delete();

        return redirect()->back()->with('alertSuccess', 'Data Berhasil Dihapus');
    }
}
