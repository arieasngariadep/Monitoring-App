<?php

namespace App\Http\Controllers\PJE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PJE\Kas\KasImport;
use App\Models\PJE\KasModel;
use App\Imports\PJE\Kas\UpdateBulkKasImport;
use App\Exports\PJE\Kas\KasExport;

class KasController extends Controller
{
    public function formUploadKas(Request $request)
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
        return view('PJE.Kas.formUploadKas', $passing);
    }

    public function prosesImportKas(Request $request)
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

            Excel::import(new KasImport, public_path("/Import/PJE/".$filename));
            
            unlink(base_path('public/Import/PJE/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data Dispute Resolution Berhasil Di Upload');
        }
    }

    public function getListKas(Request $request)
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
        $listData = KasModel::getListKas($bulan1, $bulan2);

        $passing = array(
            'alert' => $showalert,
            'bulan1' => $bulan1,
            'bulan2' => $bulan2,
            'listData' => $listData,
        );
        return view('PJE.Kas.listKas', $passing);
    }

    public function formUpdateKas(Request $request)
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

        $detail = KasModel::getKasById($request->id);

        $passing = array(
            'alert' => $showalert,
            'detail' => $detail,
        );
        return view('PJE.Kas.formUpdate', $passing);
    }

    public function prosesUpdateKas(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok"); //set you countary name from below timezone list
        $data = array(
            'periode' => $request->periode.'-01',
            'pengambilan' => $request->pengambilan,
            'pengisian' => $request->pengisian,
            'sisa' => $request->sisa,
            'persentase_pengisian' => $request->persentase_pengisian,
            'updated_at' => date("Y-m-d h:i:s"),
        );
        KasModel::where('id', $request->id)->update($data);

        return redirect('pje/Kas/list')->with('alertSuccess', 'Data Berhasil Diupdate');
    }

    public function formUpdateBulkKas(Request $request)
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
        return view('PJE.Kas.formUpdateBulk', $passing);
    }

    public function prosesUpdateBulkKas(Request $request)
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

            Excel::import(new UpdateBulkKasImport, public_path("/Import/PJE/".$filename));
            unlink(base_path('public/Import/PJE/'.$filename));

            return redirect()->back()->with('alertSuccess', 'Data Kas Berhasil Di Update');
        }
    }

    public function exportReportKas(Request $request)
    {
        $bulan1 = $request->bulan1;
        $bulan2 = $request->bulan2;

        return Excel::download(new KasExport($bulan1, $bulan2), "Report Kas.xlsx");
    }

    public function prosesDeleteKas(Request $request)
    {
        KasModel::where('id', $request->id)->delete();
        return redirect()->back()->with('alertSuccess', 'Data Berhasil Di Hapus');
    }

    public function prosesDeleteKasBulk(Request $request)
    {
        $bulan1 = $request->bulan1;
        $bulan2 = $request->bulan2;
        KasModel::whereBetween(DB::raw('substring(periode, 1, 7)'), [$bulan1, $bulan2])->delete();

        return redirect()->back()->with('alertSuccess', 'Data Berhasil Dihapus');
    }
}
